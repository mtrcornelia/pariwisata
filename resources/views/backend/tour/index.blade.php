@extends('backend.layout.main')
@section('bread')
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active text-themecolor">Pariwisata</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('container')

 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3>Data Pariwisata</h3>
</div>
    <a href="/tour/create" class="btn btn-themecolor ">add</a>
    <div class="table-responsive">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Kategori Wisata</th>
                    <th>Nama Wisata</th>
                    <th>Alamat</th>
                    {{-- <th>Penulis</th> --}}
                    <th>Tanggal Pembuatan</th>
                    <th>Sampul</th>
                    {{-- <th>Deskripsi</th> --}}
                    <th>Aksi</th>
                </tr>
    
            </thead>
    
            <tbody>
                @foreach ($tours as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->category->category_name}}</td>
                    <td>{{$item->tour_name}}</td>
                    <td>{{$item->address}}</td>
                    {{-- <td>{{$item->created_by}}</td> --}}
                    <td>{{$item->created_date}}</td>
                    <td><img src="/images/<?php echo $item->cover;?>" width="200" alt=""></td>
                    {{-- <td>{{$item->description}}</td> --}}
                    <td>
                        <a href="/tour/{{$item->id}}/edit" class="btn btn-success btn-small"><i class="fa  fa-pencil"></i></a>
                        <form action="/tour/{{$item->id}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-small" type="submit" onclick="return confirm('yakin akan menghapus data?')"><i class="fa  fa-trash-o"></i></button>
                        </form>
                        
                    </td>
                </tr> 
                @endforeach
                
            </tbody>
        </table>
    </div>
    
 
@endsection
