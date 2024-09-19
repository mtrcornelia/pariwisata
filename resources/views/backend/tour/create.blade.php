@extends('backend.layout.main')
@section('bread')
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="/category">Pariwisata</a></li>
                <li class="breadcrumb-item active text-themecolor" >Tambah Pariwisata</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('title','Gallery') 
   

    @section('container')
  <form action="/tour" method="POST" enctype="multipart/form-data">
    @csrf
     {{-- baris 1 start  --}}
    <div class="row">
        <div class="col-lg-6 mb-3">  
          <label  class="form-label">Nama Pariwisata</label>
          <input type="text" class="form-control @error('tour_name')is-invalid @enderror" id="tour_name " value="{{old('tour_name')}}" placeholder="masukan nama pariwisata...." name="tour_name">
          @error('tour_name')
              <div class="invalid-feedback">
              {{$message}}
              </div>
          @enderror  
        </div>   

        <div class="col-lg-6 mb-3">  
          <label class="form-label">Kategori</label>
          <select type="text" class="form-control" aria-label="Default select example"  name="category_id" aria-label="Default select example">
              @foreach($categories as $categorie)
              @if (old('category_id')==$categorie->id)
              <option value="{{$categorie->id}}" selected>{{$categorie->category_name}}</option>
              @else
                <option value="{{$categorie->id}}">{{$categorie->category_name}}</option>
              @endif
              @endforeach
            </select>
        </div>  
    </div>
     {{-- baris 1 end  --}}

    {{-- baris 2 start  --}}
    <div class="row">
      <div class="col-lg-6 mb-3">  
        <label  class="form-label">lokasi (opsional)</label>
        <input type="text" class="form-control @error('location')is-invalid @enderror" id="location " value="{{old('location')}}" placeholder="masukan titik lokasi...." name="location">
        @error('location')
            <div class="invalid-feedback">
            {{$message}}
            </div>
        @enderror  
      </div>   

      <div class="col-lg-6 mb-3">  
        <label  class="form-label">Sampul (masukan 1 foto untuk sampul)</label>
        <input type="file" class="form-control @error('cover')is-invalid @enderror" id="cover " value="{{old('cover')}}" name="cover" multiple>
        @error('cover')
            <div class="invalid-feedback">
            {{$message}}
            </div>
        @enderror  
      </div>   

    </div>
     {{-- baris 2 end  --}}

     {{-- baris 3 start  --}}
     <div class="row">
      <div class="col-lg-6 mb-3">  
        <label  class="form-label">Penulis</label>
        <input type="text" class="form-control @error('created_by')is-invalid @enderror" id="created_by " value="{{old('created_by')}}" placeholder="{{auth()->user()->name}}" readonly name="created_by">
        @error('created_by')
            <div class="invalid-feedback">
            {{$message}}
            </div>
        @enderror  
      </div>   

      <div class="col-lg-6 mb-3">  
        <label  class="form-label">Tanggal Pembuatan</label>
        <input type="date" class="form-control @error('created_date')is-invalid @enderror" id="created_date " value="{{old('created_date')}}" name="created_date">
        @error('created_date')
            <div class="invalid-feedback">
            {{$message}}
            </div>
        @enderror  
      </div>   

    </div>
     {{-- baris 3 end  --}}

     {{-- baris 4 start  --}}
     <div class="row">
        <div class="col-lg-6 mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control @error('address') is-invalid @enderror" placeholder="masukan alamat pariwisata...."  name="address" rows="3" ></textarea>
          @error('address')
              <div class="invalid-feedback">
              {{$message}}
              </div>
          @enderror
        </div>
        <div class="col-lg-6 mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea class="form-control @error('description') is-invalid @enderror" placeholder="masukan deskripsi pariwisata...."  name="description" rows="3" ></textarea>
          @error('description')
              <div class="invalid-feedback">
              {{$message}}
              </div>
          @enderror
        </div>
     </div>
     {{-- baris 3 end  --}}
     <hr>
     {{-- baris 4 --}}
     <div class="row mb-3">
      <div class="col-6 mt-3">
        <label for="images">Gallery Images (masukan beberapa foto pariwisata)</label>
        <input type="file" class="form-control" id="images"  name="images[]" multiple required>
      </div>

      <div class="col-6 ">
        <label for="facilities">Facilities:</label>
        @foreach ($facilities as $facility)
            <div>
                <input type="checkbox" name="facilities[]" value="{{ $facility->id }}" id="facility{{ $facility->id }}">
                <label for="facility{{ $facility->id }}">{{ $facility->facility_name }}</label>
            </div>
        @endforeach
       </div>
     </div>
     {{-- baris 4 --}}

    <div class="mb-3 mb-3">
      <button type="submit" name="submit" class="btn btn-primary">Create</button> 
    </div>
  </form>

@endsection
