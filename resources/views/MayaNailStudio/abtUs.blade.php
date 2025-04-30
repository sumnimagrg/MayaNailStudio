@extends('layouts.main')
@section('container')
    <div class="container-abt">
        <div class="text-content">
            <h2>At Maya Nail Studio, <br> every nail tells a story.</h2>
            <p>Maya Nail Studio established in 2024 to offer expert nail services to enhance your style and confidence.
               Experience personalized, high-quality nail artistry in a serene and welcoming space, designed to leave you
               feeling refreshed and fabulous.</p>
            <button class="discover-btn">Discover More</button>
        </div>
        <div class="image-gallery">
            <img src="{{ asset('assets/img/abt1.jpeg') }}" alt="Nail Art 1" class="image image1">
            <img src="{{ asset('assets/img/abt2.jpeg') }}" alt="Nail Art 2" class="image image2">
            <img src="{{ asset('assets/img/abt3.jpeg') }}"alt="Nail Art 3" class="image image3">
        </div>
    </div>
@endsection
