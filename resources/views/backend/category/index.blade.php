@extends('backend.layout.main')
@section('bread')
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active text-themecolor">Kategori</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('container')

 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3>Data Category</h3>
</div>
    <a href="/category/create" class="btn btn-themecolor ">add</a>
    <div class="table-responsive">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Aksi</th>
                </tr>
    
            </thead>
    
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->category_name}}</td>
                    <td>
                        <a href="/category/{{$item->id}}/edit" class="btn btn-success btn-small">Edit</a>
                        <form action="/category/{{$item->id}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-small" type="submit" onclick="return confirm('yakin akan menghapus data?')">Delete</button>
                        </form>
                    </td>
                </tr> 
                @endforeach
                
            </tbody>
        </table>
    </div>
    
 
@endsection

@endextends
