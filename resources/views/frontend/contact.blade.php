@extends('frontend.layout.main')

@section('container')
<style>
    .form-contact{
        margin-top: 15px;
        padding-right:30px;
    }
</style>
<div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="col-sm-8 ">
        <form action="/contact/create" method="POST" >
            @csrf
            <div class="row form-contact">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name')is-invalid @enderror" id="name " value="{{old('name')}}" name="name" placeholder="masukan nama !!">
                @error('name')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
              </div>

              <div class="row form-contact">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email')is-invalid @enderror" id="email " value="{{old('email')}}" name="email" placeholder="masukan email !!">
                @error('email')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
              </div>

              <div class="row form-contact">
                <label class="form-label">Pesan</label>
                <textarea class="form-control @error('message') is-invalid @enderror" placeholder="masukan alamat pariwisata...."  name="message" rows="3" ></textarea>
                @error('message')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
              </div>

              <hr class="my-4">
  
              <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
   
          </form>
      </div>
      <div class="col-sm-4">
        @include('frontend.event_terbaru')
      </div>
    </div>
  </div>
  @endsection