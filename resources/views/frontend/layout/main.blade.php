<!DOCTYPE html>

<html>
  <head>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo.ico">
    <title>Pariwisata Tanah Datar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    
    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Belgrano|Courgette&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    
    <!--Bootshape-->
    <link href="/css/bootshape.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>
  <body>
    <!-- Navigation bar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">SIPARITA</a>
        </div>
        <nav role="navigation" class="collapse navbar-collapse navbar-right">
          <ul class="navbar-nav nav">
            <li class="active"><a href="/">Home</a></li>
            <li class="dropdown">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">Pariwisata <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  @foreach($categories as $category)
                      <li><a href="{{ route('frontend-category.show', $category->id) }}">{{ $category->category_name }}</a></li>
                  @endforeach
                  <li class="divider"></li>
                  <li><a href="{{ route('frontend-all.show') }}">Semua Pariwisata</a></li>
              </ul>
            </li>
            <li><a href="/event-frontend">event</a></li>
            <li><a href="/login">login</a></li>
            <li><a href="/contact">Contacts</a></li>
          </ul>
        </nav>
      </div>
    </div><!-- End Navigation bar -->

    <!-- Slide gallery -->
   
    
    <!-- Thumbnails -->
    @yield('container')
   <!-- End Thumbnails -->
    <!-- Content -->
    
    <!-- Footer -->
    <div class="footer text-center">
        <p>&copy; 2024 . Proudly created by <a href="">mtrcornelia.com</a></p>
    </div><!-- End Footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootshape.js"></script>
    <script>
      function deleteCoverFunction() {
          document.getElementById('deleteCover').value = 1;
          console.log('Delete Cover button clicked');
      }
  </script>
  </body>
</html>
