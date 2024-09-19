@extends('frontend.layout.main')

@section('container')

<div class="container" style="margin-top: 100px">
  @foreach ($tours as $item)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href="/tour-frontend/{{$item->id}}">
      <div class="img-container">
        <img src="/images/<?php echo $item->cover;?>" alt="" class="img-fluid fixed-size-img">
      </div>
    </a>
      <div class="caption">
        <div style="margin-bottom: 5px; font-weight: bold">{{$item->tour_name}}</div>
        <div class="btn-toolbar text-center">
            <a href="/tour-frontend/{{$item->id}}" class="btn btn-primary">Readmore</a>
        </div>
      </div>
    </div>
  </div>
@endforeach

</div>
@endsection