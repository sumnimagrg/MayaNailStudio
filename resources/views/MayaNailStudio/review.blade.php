@extends('layouts.main')
@section('container')


{{-- connectwith us --}}
<div class="contact-container">
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif
    <h2>Get in Touch</h2>
    <form class="contact-form" method="POST" action="{{ route('contact.send') }}">
        @csrf
      <input type="text" name="name" placeholder="Your Full Name" required>
      <input type="email" name="email" placeholder="Your Email Address" required>
      <input type="text" name="phone" placeholder="Your Phone Number" required>
      <textarea name="message" placeholder="Type your message here..." required></textarea>
      <button type="submit">Send Message</button>
    </form>
  </div>

{{-- connectwith us --}}

@endsection