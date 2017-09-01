
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog @yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/tether.min.css') }}">
    <link href="{{ asset('css/bootstrap.css') }}"  rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/summernote.css')}}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{asset('js/summernote.js')}}"></script>


  </head>

  <body>



    @include('partials.header')



    <div class="container">

      <div class="row">

        @yield('mainContent')

        @include('partials.sidebar')

      </div><!-- /.row -->

    </div><!-- /.container -->

    @include('partials.footer')


  </body>
</html>
