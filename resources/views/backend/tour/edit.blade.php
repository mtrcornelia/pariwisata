@extends('backend.layout.main')
@section('bread')
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="/category">Pariwisata</a></li>
                <li class="breadcrumb-item active text-themecolor" >Edit Pariwisata</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
@endsection
@section('container')
<div class="container">
   
    <form action="{{ route('tour.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Form fields for tour details -->
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6"></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="tour_name">Nama Pariwisata</label>
            <input type="text" class="form-control" id="tour_name" name="tour_name" value="{{ $tour->tour_name }}" required>
            </div>
            
            <div class="col-lg-6">
                <label for="category_id">Kategori</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $tour->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $tour->location }}">
            </div>
            <div class="col-lg-6">
                <label for="cover">Sampul</label> 
              <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" multiple>
              <input type="hidden" id="deletecover" name="deletecover" value="0">
              @if($tour->cover)
                  <div class="mb-2">
                      
                      <br>
                      <a href="{{ asset('images/tours' . $tour->cover) }}" target="_blank">{{ $tour->cover }}</a>
                      
                  </div>
              @endif
              @error('cover')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
              @enderror
            </div>
        </div>
        
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

            <div class="col-lg-6">
                <label for="created_date">Tanggal Pembuatan</label>
                <input type="date" class="form-control" id="created_date" name="created_date" value="{{ $tour->created_date }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $tour->address }}" required>
            </div>   
            <div class="col-lg-6">
                <label for="description">Descripsi</label>
                <textarea class="form-control" id="description" name="description" required>{{ $tour->description }}</textarea>
            </div>
        </div>
       <hr>
        <div class="row">
            <div class="col-6 ">
                <label for="facilities">Fasilitas:</label>
                @foreach ($facilities as $facility)
                    <div>
                        <input type="checkbox" name="facilities[]" value="{{ $facility->id }}" id="facility{{ $facility->id }}">
                        <label for="facility{{ $facility->id }}">{{ $facility->facility_name }}</label>
                    </div>
                @endforeach
            </div>
            
        </div>
        <hr>
        
        <div class="form-group">
            <label for="images">Gallery</label>
            <input type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images[]" multiple>
            <div class="mt-3 row">
                @if($tour->gallery)
                    @foreach($tour->gallery as $image)
                        {{-- <div class="image-preview mb-2"> --}}
                            <div class="image-preview form-check col-md-3 mb-5">
                                <input type="checkbox" class="form-check-input" id="gallery_delete{{$image->id}}" name="gallery_delete[]" value="{{$image->id}}">
                                <label class="form-check-label " for="gallery_delete{{$image->id}}"><i class="fa fa-trash"></i><br><img src="{{ asset('images/' . $image->image_path) }}" width="200" alt=""></label>
                              </div>
                    @endforeach
                @endif
            </div>
            @error('images')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
       
        <div class="row mt-5 text-center">
            <button type="submit" class="btn btn-primary text-center ">Update Tour</button>
        </div>
        
    </form>
</div>
@endsection
