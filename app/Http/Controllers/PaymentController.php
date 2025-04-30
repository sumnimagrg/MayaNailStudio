<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Appointment;
use App\Models\Services;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Xentixar\EsewaSdk\Esewa;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Initiate eSewa Payment
     */
    public function pay()
    {
        $data = session('appointment_data');
        if (!$data) return redirect()->route('book')->with('error', 'Session expired.');

        $transaction_id = strtoupper(bin2hex(random_bytes(5)));
        session(['transaction_code' => $transaction_id]);

        $price = $data['total_price'] ?? 0;
        if ($price <= 0) return redirect()->route('book')->with('error', 'Invalid price.');

        $esewa = new Esewa();
        $esewa->config(
            route('esewa.check'),
            route('esewa.check'),
            $price,
            $transaction_id
        );

        return $esewa->init();
    }


    public function check()
    {
        $esewa = new Esewa();
        $data = $esewa->decode();

        // dd($data);
        if ($data && $data['status'] === 'COMPLETE') {
            $appData = session('appointment_data');
            if (!$appData) return redirect()->route('book')->with('error', 'No appointment data');

            $amount = (float) str_replace(',', '', $data['total_amount']);

            $appointment = Appointment::create([
                ...$appData,
                'price' => $amount,
                'status' => 'Confirmed',
                'confirmed_at' => now(),
            ]);

            $payment = Payment::create([
                'user_id' => Auth::id(),
                'appointment_id' => $appointment->id,
                'payment_date' => now(),
                'transaction_code' => $data['transaction_code'],
                'amount' => $amount,
                'status' => 'completed',
                'method' => 'esewa',
            ]);

            $usedPoints = session('appointment_data.used_reward_points', 0);
            $user = User::find(Auth::id());

            if ($user && $usedPoints > 0) {
                $user->decrement('reward_points', $usedPoints);
            }

            session()->forget(['appointment_data', 'transaction_code']);

            return view('payment.success', compact('payment', 'appointment'));
        }
    }
    public function download($id)
    {
        $payment = Payment::with('appointment')->findOrFail($id);

        $pdf = Pdf::loadView('payment.pdf', compact('payment'));

        return $pdf->download('payment_receipt_' . $payment->transaction_code . '.pdf');
    }
}
