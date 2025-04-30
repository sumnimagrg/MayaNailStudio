@extends('layouts.main')
@section('container')

<div class="team-wrapper">
    <div class="team-header">
        <h2>Meet Our Team</h2>
        {{-- <div class="basic-lines"></div>  --}}
        <p>In the hands of experts, perfection isn't a promise—it's our standard.</p>
    </div>

    <div class="team-container">
        @foreach ($employees as $employee)
        <div class="team-card">
            <img src="{{ asset('uploads/' . $employee->image) }}" alt="{{ $employee->fullName }}" class="team-image">
            <div class="team-info">
                <h3 class="team-name">{{ $employee->fullName }}</h3>
                <div class="team-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $employee->rating)
                            <i class="fas fa-star filled"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </div>
                <p class="team-bio">{{ $employee->bio }}</p>
                <div class="team-buttons">
                    <a href="/book" class="team-btn">Book Now</a>
                    <a href="{{ route('portfolio.show', ['id' => $employee->id]) }}" class="team-btn secondary">
                        View Portfolio
                    </a>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
