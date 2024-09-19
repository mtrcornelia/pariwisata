@extends('frontend.layout.main')

@section('container')
  
  
  <div class="container " style="margin-top: 100px">
    @foreach ($tour->gallery as $image)
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <div class="img-container">
          <img src="/images/<?php echo $image->image_path;?>" alt="" class="img-fluid fixed-size-img">
        </div>
      </div>
    </div>
    @endforeach
  </div>
 
  <!-- Content -->
  <div class="container">
    <div class="">
      <h3 class="">Keterangan</h3>
      <p style="text-align: justify; line-height: 24px">{{$tour->description}}</p>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <h3 class="">Fasilitas</h3>
        <ul>
          @foreach($tour->facilities as $facility)
              <li>{{ $facility->facility_name }}</li>
          @endforeach
      </ul>
      
      
      <h3>alamat:</h3>
      <p>{{ $tour->address }}</p>
      
      <div id="map" style="height: 400px; width: 100%;"></div>

      <h3>Dibuat:</h3>
      <i class="fa fa-time">{{ $tour->created_date }}</i>
      
      <div class="btn-toolbar text-center">
        <form action="{{ route('tour.like', $tour->id) }}" method="POST">
            @csrf
            @if(in_array($tour->id, session()->get('liked_tours', [])))
                <button type="submit" class="btn btn-danger">
                    Unlike ({{ $tour->likes_count }})
                </button>
            @else
                <button type="submit" class="btn btn-success">
                    Like ({{ $tour->likes_count }})
                </button>
            @endif
        </form>
    </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          @include('frontend.event_terbaru')
        </div>
    </div>
    </div>
  </div><!-- End Content -->
@endsection

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script>
  document.addEventListener('DOMContentLoaded', function() {
      // Ambil nilai lokasi dari field lokasi
      var location = "{{ $tour->location }}";
      
      // Pisahkan lokasi menjadi latitude dan longitude
      var coords = location.split(',');
      var latitude = parseFloat(coords[0]);
      var longitude = parseFloat(coords[1]);

      // Inisialisasi peta
      var map = L.map('map').setView([latitude, longitude], 13);

      // Menambahkan tile layer dari OpenStreetMap
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      // Menambahkan marker pada peta
      L.marker([latitude, longitude]).addTo(map)
          .bindPopup('Tour Location')
          .openPopup();
  });
</script>

