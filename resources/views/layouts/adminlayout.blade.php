
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/normalize.min.css')}}">


    <link rel="stylesheet" href="css/style.css">

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{--    <script src="{{ asset('js/custom.js') }}"></script>--}}


</head>

<body>
<div class="form">

    <ul class="tab-group">
        <li class="tab active"><a href="{{url('register')}}">Sign Up</a></li>
        <li class="tab"><a href="{{url('login')}}">Log In</a></li>
    </ul>

    <div class="tab-content">

            @yield('userregister')



            {{------------------------}}









            @yield('userlogin')

            {{----------------------------------------------}}





    </div><!-- tab-content -->

</div> <!-- /form -->


</body>
</html>
