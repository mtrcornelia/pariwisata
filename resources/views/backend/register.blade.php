<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo.ico">
    <title>Pariwisata Tanah Datar</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">

    

    

<link href="/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main >
    <div class="py-5 text-center">
      <img src="/assets/images/logo.ico" width="90" height="90" alt="homepage" />
      <h2>SIPARITA</h2>
      
    </div>

    <div class="container-fluid col-lg-10"  >
      <div class="row g-5 m-auto ">   
        <div class="col-md-7 col-lg-8 d-flex align-items-center auth px-0 m-auto ">
          
          <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name')is-invalid @enderror" id="name " value="{{old('name')}}" name="name" placeholder="masukan nama !!">
                @error('name')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
              </div>
  
              <div class="col-sm-6">
                <label for="lastName" class="form-label">Email</label>
                <input type="email" class="form-control @error('email')is-invalid @enderror" id="email " value="{{old('email')}}" name="email" placeholder="masukan email !!">
                @error('email')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
              </div>
            
              <div class="col-sm-6">
                <label for="name" class="form-label">Password</label>
                <input type="password" class="form-control @error('password')is-invalid @enderror" id="password " value="{{old('password')}}" name="password" placeholder="masukan password !!">
                @error('password')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
              </div>
  
              <div class="col-sm-6">
                <label for="lastName" class="form-label">Foto</label>
                <input type="file" class="form-control @error('profile_photo')is-invalid @enderror" id="profile_photo " value="{{old('profile_photo')}}" name="profile_photo" placeholder="masukan foto !!">
                @error('profile_photo')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
              </div>
            
             
            
            <hr class="my-4">
  
            <button class="w-100 btn btn-primary btn-lg" type="submit">Buat Akun</button>
          </form>
        </div>
      </div>
    </div>
   
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2022 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="/js/bootstrap.bundle.min.js"></script>

      <script src="/form-validation.js"></script>
  </body>
</html>
