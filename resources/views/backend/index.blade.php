@extends('backend.layout.main')

@section('container')
    <div class="col grid-margin transparent">
        <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale" style="background-color:rgb(166, 166, 166)">
            <div class="card-body">
                <h4 class="mb-4 text-center text-white">Jumlah Kategori</h4>
                <h4 class="fs-30 mb-2 text-center text-white">{{ $category }}</h4>
                <!-- <h4>10.00% (30 days)</h4> -->
            </div>
            </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transh4arent">
            <div class="card card-dark-blue" style="background-color:rgb(166, 166, 166)">
            <div class="card-body">
                <h4 class="mb-4 text-center text-white">Jumlah Wisata</h4>
                <h4 class="fs-30 mb-2 text-center text-white">{{ $tour }}</h4>
                <!-- <p>22.00% (30 days)</p> -->
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue " style="background-color:rgb(166, 166, 166)">
            <div class="card-body">
                <h4 class="mb-4 text-center text-white">Jumlah  Event</h4>
                <h4 class="fs-30 mb-2 text-center text-white">{{ $event }}</h4>
                <!-- <p>2.00% (30 days)</p> -->
            </div>
            </div>
        </div>
        
        </div>
    </div>

  
@endsection