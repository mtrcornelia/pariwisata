@extends('frontend.layout.main')

@section('container')
<div class="container" style="margin-top: 100px">    
  <div class="row"> 
    <div class="col-sm-8">
      <div class="row mb-5">
        <h2><b>{{$events->title}}</b></h2>
      </div>
      <div class="row" style="margin-top: 10px">
        <h4>Keterangan</h4>
        <p>{{$events->description}}</p>
      </div>
      <div class="row" style="margin-top: 20px">
        <h4 class="">Tanggal pelaksanaan</h4>
        <p>{{$events->event_time}}</p>
      </div>
      <div class="row" style="margin-top: 20px">
        <h4 class="">Tempat pelaksanaan</h4>
        <p>{{$events->address}}</p>
      </div>
      <div id="map" style="height: 400px; width: 100%;"></div>        
    </div>

    <div class="col-sm-4">
      <img src="/images/<?php echo $events->file;?>" width="100%" height="80%" alt="">
    </div>
  </div>
</div>
@endsection
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script>
  document.addEventListener('DOMContentLoaded', function() {
      // Ambil nilai lokasi dari field lokasi
      var location = "{{ $events->location }}";
      
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
          .bindPopup('Event Location')
          .openPopup();
  });
</script>