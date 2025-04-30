@extends('layouts.main')
@section('container')

{{-- home --}}
    <div class="section"
        style="background-image: url('assets/img/try.png'); 
    background-repeat: no-repeat; 
    width: 100%;
    height: auto;
    background-position: center center; 
    background-size: cover;">
        <div class="content">
            <h1>WELCOME TO MAYA NAIL STUDIO</h1>
            <p>
                Where artistry meets your fingertips.<br />Your dream nails await!
            </p>
            <div class="buttons">
                <a href="/book" class="btns book">Book Appointment</a>
                <a href="/services" class="btns serve">Our Services</a>
            </div>
        </div>
    </div>
    {{-- homeEND --}}
    {{-- abtUS --}}    
    <div class="about" >
        <h2>About Us</h2>
        <p>At Maya Nail Studio, we are dedicated to providing top-notch nail artistry, combining creativity with precision.
           Our expert team ensures that every customer enjoys a relaxing and personalized experience. Whether you're looking
           for a classic look or something bold and trendy, we have got you covered.</p> <br>
           <div class="basic-line"></div>
    </div>
    
    <section class="container-abt">
        <div class="text-content">
            <h2>At Maya Nail Studio, <br> every nail tells a story.</h2>
            <p>Maya Nail Studio established in 2024 to offer expert nail services to enhance your style and confidence.
               Experience personalized, high-quality nail artistry in a serene and welcoming space, designed to leave you
               feeling refreshed and fabulous.</p> <br>

               <a href="/blog" class="btns">Discover More</a>
        </div>
        <div class="image-gallery">
            <img src="{{ asset('assets/img/abt1.jpeg') }}" alt="Nail Art 1" class="image image1">
            <img src="{{ asset('assets/img/abt2.jpeg') }}" alt="Nail Art 2" class="image image2">
            <img src="{{ asset('assets/img/abt3.jpeg') }}" alt="Nail Art 3" class="image image3">
            {{-- <img src="{{ asset('assets/img/abt4.jpeg') }}" alt="Nail Art 4" class="image image4">             --}}
        </div>
    </section>
    {{-- abtUSEND --}}
    
    {{-- Our services --}}
    <section class="servicess-section">
        <div class="servicess-nave">
        <h2 class="sections-title">Our Services</h2>
        <p class="sections-subtitle">Come, Relax And Enjoy</p>
    </div>
    <div class="servicess-card">
        <div class="servicess-content">
            <div class="maya-service">
                <img src="{{asset('assets/img/mani.jpeg')}}" alt="Manicure" class="servicess-images">
                <h3 class="servicess-title">Manicure</h3>
                <p class="servicess-description">Your Nails will amaze everyone!</p>
                <a href="/book" class="book-nail">Book Now →</a>
            </div>

            <div class="servicess-menu">
                <p>Pamper Yourself With Us</p> <br>
                
                <a href="/services" class="service-menu-btn">Service Menu</a>
            </div>

            <div class="maya-service">
                <img src="{{asset('assets/img/pedi.jpeg')}}" alt="Pedicure" class="servicess-images">
                <h3 class="servicess-title">Pedicure</h3>
                <p class="servicess-description">Your toes will look perfect!</p>
                <a href="/book" class="book-nail">Book Now →</a>
            </div>
        </div>
    </div>
    </section>
    {{-- Our services end --}}


{{-- ourteam --}}

<div class="swiper-main">
    <div class="swiper-text">
       <h2>Meet Our Team</h2>
       <div class="basic-lines"></div> <br>
       <p>In the hands of experts, perfection isn't a promise—it's our standard.</p>
    </div>
 
    <!-- Swiper -->
    <div class="swiper mySwiper">
       <div class="swiper-wrapper">
        @foreach ($employees as $employee )
                    
        <div class="swiper-slide">
           <img src="{{asset('uploads/'. $employee->image)}}" alt="1tech">
           <h2>{{$employee->fullName}}</h2>
           <i class="fas fa-star star-rating"></i> 
           <i class="fas fa-star star-rating"></i> 
           <i class="fas fa-star star-rating"></i> 
           <i class="fas fa-star star-rating"></i> 
           <i class="far fa-star star-rating"></i> 
        </div>
        @endforeach
  </div>
          
       </div>
</div> 
</div>
 </div>
 
{{-- ourteamend --}}

{{-- gallery --}}
<div class="gallery">
    <div class="browse-gallery">
        <h3>Maya Gallery</h3>
        <p>I See It I want It I Get it!!</p>
    </div>

    <div class="photo-gallery">
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall8.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall2.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall3.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall4.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall5.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall7.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall6.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall1.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall10.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall9.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall12.jpeg') }}" alt="nail">    
        </div>
        <div class="gallery-item">
            <img src="{{ asset('assets/img/gall13.jpeg') }}" alt="nail">    
        </div>
    </div>
</div>
{{-- browse gallery end --}}

{{-- connectwith us --}}

<section class="feedback-section">
    <h2>What Our Clients Say</h2>
    <div class="slider-container">
      <div class="arrow left" onclick="scrollSlider(-1)">‹</div>
      <div class="feedback-slider" id="feedbackSlider">

        <div class="feedback-card">
          <div class="name">Sweta Lalchan</div>
          <div class="rating">Rating: 5.0</div>
          <p>Loved the ambiance and the quality of service! My nails have never looked this good. Definitely my go-to salon!</p>
        </div>

        <div class="feedback-card">
          <div class="name">Rojina Khadgi</div>
          <div class="rating">Rating: 4.5</div>
          <p>Beautiful studio with friendly staff. I got gel nails and they lasted so long! Will recommend to all my friends.</p>
        </div>

        <div class="feedback-card">
          <div class="name">Pratikshya Gurung</div>
          <div class="rating">Rating: 5.0</div>
          <p>Very hygienic and professional. They recreated my Pinterest design perfectly. Love Maya Nail Studio!</p>
        </div>

        <div class="feedback-card">
          <div class="name">Monika Magar</div>
          <div class="rating">Rating: 4.2</div>
          <p>The place is relaxing and the technicians are highly skilled. A bit pricey but worth it!</p>
        </div>

        <div class="feedback-card">
          <div class="name">Smriti Gurung</div>
          <div class="rating">Rating: 4.7</div>
          <p>Great customer service and wide variety of polish. Highly recommend!</p>
        </div>

      </div>
      <div class="arrow right" onclick="scrollSlider(1)">›</div>
    </div>
  </section>



{{-- connectwith us --}}

@endsection
