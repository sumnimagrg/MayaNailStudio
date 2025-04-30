@extends('layouts.main')
@section('container')

<div class="service-wrapper">
    <div class="service-header">
        <h2>Our Services</h2>
        <p>We present to you quality services. Feel free to browse!</p>
    </div>
    <div class="service-list">
        @foreach ($services as $index => $service)
            <div class="service-card">
                <img src="{{asset('uploads/'. $service->image)}}" alt="" class="service-image">
                <div class="service-title">{{$service->service_name}}</div>
                <div class="service-category">{{$service->serviceCategories->category_name}}</div>
                <div class="service-duration">Duration: {{$service->duration}} hrs</div>
                <div class="service-description">{{$service->service_desc}}</div>
                <div class="service-price">NPR {{$service->price}}</div>
                <a href="/book" class="book-service">Book Now</a>
            </div> 
        @endforeach
    </div>
    {{-- <label for="view-more-toggle" class="view-more-btn"></label> --}}
</div>

@endsection

