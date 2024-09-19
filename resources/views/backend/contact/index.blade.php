@extends('backend.layout.main')
@section('bread')
<!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active text-themecolor">Pesan</li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('container')

 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3>Data Pesan</h3>
</div>
    
    <div class="table-responsive">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>pesan</th>
                    
                </tr>
    
            </thead>
    
            <tbody>
                @foreach ($contacts as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->message}}</td>
                    
                </tr> 
                @endforeach
                
            </tbody>
        </table>
    </div>
    
 
@endsection
