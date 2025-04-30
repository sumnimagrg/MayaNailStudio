@extends('layouts.main')
@section('container')

<div class="blog-container">
<h1 class="blog-header">Welcome!</h1>
<p class="intro">Get To Know us!-- At Maya Nails Studio, we provide exceptional nail care with professional and experienced technicians since 2024. Explore our services and get the taste of top-notch nail service.</p>

<div class="blog-content">
<div class="blog-item">
<img src="{{asset('assets/img/blog1.jpeg')}}" alt="luxury place" class="blog-img" >
<div class="blog-description">
    <h2>Great Ambience</h2>
    <p>We provide luxury and comfortable sitting for you through out your session. Your comfortableness is what makes us happy.</p>
</div>
</div>
<div class="blog-item">
<img src="{{asset('assets/img/blog3.jpeg')}}" alt="luxury place" class="blog-img">
<div class="blog-description">
    <h2>Quality Products</h2>
    <p>We provide luxury and comfortable sitting for you through out your session. Your comfortableness is what makes us happy.</p>
</div>
</div>
<div class="blog-item">
<img src="{{asset('assets/img/blog2.jpeg')}}" alt="luxury place" class="blog-img">
<div class="blog-description">
    <h2>Experienced and Friendly Technicians</h2>
    <p>We provide luxury and comfortable sitting for you through out your session. Your comfortableness is what makes us happy.</p>
</div>
</div>
<div class="blog-item">
<img src="{{asset('assets/img/blog4.jpeg')}}" alt="luxury place" class="blog-img">
<div class="blog-description">
    <h2>Creative Designs</h2>
    <p>We provide luxury and comfortable sitting for you through out your session. Your comfortableness is what makes us happy.</p>
</div>
</div>

</div>

</div>

@endsection