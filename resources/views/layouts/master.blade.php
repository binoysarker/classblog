
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../public/favicon.ico">

    <title>Blog @yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/tether.min.css') }}">
    <link href="{{ asset('css/bootstrap.css') }}"  rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
      {{--ckeditor section--}}
      <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
      <script>
          $(document).ready(function () {

              var options = {
                  filebrowserImageBrowseUrl: '{{url('/laravel-filemanager?type=Images')}}',
                  filebrowserImageUploadUrl: '{{url('/laravel-filemanager/upload?type=Images&_token=')}}',
                  filebrowserBrowseUrl: '{{url('/laravel-filemanager?type=Files')}}',
                  filebrowserUploadUrl: '{{url('/laravel-filemanager/upload?type=Files&_token=')}}'
              };
              $('textarea').ckeditor(options);
              // $('.textarea').ckeditor(); // if class is prefered.
          })
      </script>




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
