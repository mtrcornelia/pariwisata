@extends('backend.layout.main')
 
@section('title','Gallery') 
@section('bread')
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item active">Edit Kategori</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
@endsection   

    @section('container')
<div class="row">
  <div class="col-lg-6">
        <form action="/facility/{{$facilitys->id}}" method="POST">
        @method('PUT')
@csrf
      <div class="mb-3">
        <label  class="form-label">Fasilitas</label>
        <input type="text" class="form-control @error('facility_name')is-invalid @enderror" id="facility_name " value="{{old('facility_name',$facilitys->facility_name)}}"  name="facility_name">
        @error('facility_name')
            <div class="invalid-feedback">
             {{$message}}
            </div>
        @enderror
      </div>


      <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-primary">Update</button> 
      </div>


    </form>
  </div>
</div>

@endsection
