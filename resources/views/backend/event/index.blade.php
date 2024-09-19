@extends('backend.layout.main')
@section('bread')
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active text-themecolor">Event</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('container')

 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3>Data Event</h3>
</div>
    <a href="/event/create" class="btn btn-themecolor ">add</a>
    <div class="table-responsive">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul Event</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Tempat Acara</th>
                    <th>Deskripsi</th>
                    <th>Poster</th>
                    <th>Aksi</th>
                </tr>
    
            </thead>
    
            <tbody>
                @foreach ($events as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->event_time}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->description}}</td>
                    <td><img src="/images/<?php echo $item->file;?>" width="200" alt=""></td>
                    
                    <td>
                        <a href="/event/{{$item->id}}/edit" class="btn btn-success btn-small"><i class="fa  fa-pencil"></i></a>
                        <form action="/event/{{$item->id}}" method="POST" class="d-inline">
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
