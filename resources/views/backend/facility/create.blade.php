@extends('backend.layout.main')
@section('bread')
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="/category">Fasilitas</a></li>
                <li class="breadcrumb-item active" >Tambah Fasilitas</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('title','Gallery') 
   

    @section('container')
<div class="row">
  <div class="col-lg-6">
        <form action="/facility" method="POST">
@csrf
      <div class="mb-3">
        <label  class="form-label">Category Name</label>
        <input type="text" class="form-control @error('facility_name')is-invalid @enderror" id="facility_name " value="{{old('facility_name')}}" name="facility_name" placeholder="masukan fasilitas...">
        @error('facility_name')
            <div class="invalid-feedback">
             {{$message}}
            </div>
        @enderror
      </div>


      <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-primary">Create</button> 
      </div>


    </form>
  </div>
</div>

@endsection
