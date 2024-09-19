@extends('frontend.layout.main')

@section('container')

<div class="container thumbs " style="margin-top: 100px">
@foreach ($events as $item)

  <div class="col-sm-6 col-md-4 mt-5">
    <div class="thumbnail">
    <a href="/event-frontend/{{$item->id}}"><img src="/images/<?php echo $item->file;?>" width="250" height="80" alt="" class="img-responsive"></a>
      {{-- <img src="img/pic1.jpg" alt="" class="img-responsive"> --}}
      <div class="caption">
        <div style="margin-bottom: 5px; font-weight: bold">{{$item->title}}</div>
        
        {{-- <p>{{$item->description}}</p> --}}
        <div class="btn-toolbar text-center">
            <a href="/event-frontend/{{$item->id}}" class="btn btn-primary">Readmore</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
</div>
@endsection