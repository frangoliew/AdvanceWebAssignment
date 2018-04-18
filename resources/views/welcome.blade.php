<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html>
<head>
    <title>Photo Album</title>
    <script src="js/jquery-3.2.1.min.js"></script>
     <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

</head>
<body>

@guest
  <h1 align="center"> Welcome To Photo Album</h1>
  <h2 align="center"> Please register or login </h2>
@else
  {{ redirect()->route('home') }}
@endguest




</body>
</html>
@endsection
