<!DOCTYPE html>
<html>
<head>
    <title>First Page</title>
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
@yield('headerdata')
<body>
<h1>hello from master</h1>
@include('nav')

@yield('content')




<script src="{{asset('js/app.js')}}" ></script>
</body>
</html>
