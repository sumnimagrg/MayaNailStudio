@extends('layouts.main')

@section('container')

<section class="portfolio-section">
    <div class="portfolio-header">
      <h2>{{ $employee->fullName }}'s Gallery</h2>
      <div class="portfolio-line"></div>
      <div class="artist-image">
        <img src="{{ asset('uploads/' . $employee->image) }}" alt="{{ $employee->fullName }}" />
      </div>
    </div>

    <div class="portfolio-gallery">
      @forelse ($images as $image)
          <div class="portfolio-item">
            <img src="{{ asset($image->image_url) }}" alt="Nail Design" />
          </div>
      @empty
          <p>No portfolio images uploaded yet.</p>
      @endforelse
    </div>
</section>

@endsection
