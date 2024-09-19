@extends('backend.layout.main')
@section('bread')
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="/category">Event</a></li>
                <li class="breadcrumb-item active text-themecolor" >Tambah Event</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('title','Gallery') 
   

    @section('container')
  <form action="/event" method="POST" enctype="multipart/form-data">
    @csrf
     {{-- baris 1 start  --}}
    <div class="row">
        <div class="col-lg-6 mb-3">  
          <label  class="form-label">Judul Event</label>
          <input type="text" class="form-control @error('title')is-invalid @enderror" id="title " value="{{old('title')}}" name="title">
          @error('title')
              <div class="invalid-feedback">
              {{$message}}
              </div>
          @enderror  
        </div>   

        <div class="col-lg-6 mb-3">  
          <label  class="form-label">Sampul</label>
          <input type="file" class="form-control @error('file')is-invalid @enderror" id="file " value="{{old('file')}}" name="file" multiple>
          @error('file')
              <div class="invalid-feedback">
              {{$message}}
              </div>
          @enderror  
        </div>   

    </div>
     {{-- baris 1 end  --}}

    {{-- baris 2 start  --}}
    <div class="row">
      <div class="col-lg-6 mb-3">  
        <label  class="form-label">lokasi(titik location opsional)</label>
        <input type="text" class="form-control @error('location')is-invalid @enderror" id="location " value="{{old('location')}}" name="location">
        @error('location')
            <div class="invalid-feedback">
            {{$message}}
            </div>
        @enderror  
      </div>   

      <div class="col-lg-6 mb-3">  
        <label  class="form-label">Waktu Pelaksanaan</label>
        <input type="date" class="form-control @error('event_time')is-invalid @enderror" id="event_time " value="{{old('event_time')}}" name="event_time" multiple>
        @error('event_time')
            <div class="invalid-feedback">
            {{$message}}
            </div>
        @enderror  
      </div>   

    </div>
     {{-- baris 2 end  --}}

     {{-- baris 4 start  --}}
     <div class="row">
        
        <div class="col-lg-12 mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control @error('address') is-invalid @enderror" placeholder="masukan alamat pariwisata...."  name="address" rows="3" ></textarea>
          @error('address')
              <div class="invalid-feedback">
              {{$message}}
              </div>
          @enderror
        </div>
        <div class="col-lg-12 mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea class="form-control @error('description') is-invalid @enderror"  name="description" rows="3" ></textarea>
          @error('description')
              <div class="invalid-feedback">
              {{$message}}
              </div>
          @enderror
        </div>
     </div>
     {{-- baris 3 end  --}}

    <div class="mb-3">
      <button type="submit" name="submit" class="btn btn-primary">Create</button> 
    </div>
  </form>

@endsection
