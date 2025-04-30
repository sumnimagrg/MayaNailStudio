<div class="wrapper">
<footer class="footer">
    <div class="footer-container">
<div class="footer-links">
    <a href="/">Home</a>
    <a href="/service">Our Services</a>
    <a href="/">Blog</a>
    <a href="/">Meet Our Team</a>
    <a href="/">Gallery</a>
    <a href="/Book">Book NOW</a>
</div>
<div class="social-media">
<a href="#"><i class="fab fa-facebook"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
<a href="#"><i class="fab fa-twitter"></i></a>
</div>
<p> 2025 Maya Nail Studio. All rights reserved.</p>
</div>
</footer>
</div>

{{-- datepicker --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#appointmentDate", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        minDate: "today"
    });

    flatpickr("#appointmentTime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
</script>
{{-- datepicker --}}


{{-- swiper --}}
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
   var swiper = new Swiper(".mySwiper", {
     effect: "coverflow",
     grabCursor: true,
     centeredSlides: true,
     slidesPerView: "auto",
     loop: true,
     autoplay: {
        delay: 2000,
        disableOnInteraction: false,
     },
     coverflowEffect: {
       rotate: 10,      // Tilt angle
       stretch: -20,     // Spacing between slides
       depth: 100,      // Depth effect
       modifier: 1,     
       slideShadows: true,
     },
    //  pagination: {
    //    el: ".swiper-pagination",
    //    clickable: true,
    //  },
     breakpoints: {
       640: { slidesPerView: 1 },
       768: { slidesPerView: 3 },
    //    1024: { slidesPerView: 3},
     }
   });
</script>
{{-- swiperend --}}


<script>
  function scrollSlider(direction) {
    const slider = document.getElementById('feedbackSlider');
    const cardWidth = slider.querySelector('.feedback-card').offsetWidth + 20;
    slider.scrollBy({
      left: cardWidth * direction,
      behavior: 'smooth'
    });
  }
</script>
</body>

</html>
