@extends('layout.master')

@section('content')
    <h1>Hello from index screen</h1>

    <p> {{$mystring}}  </p>
    <p>the date is: {{$mydate}}</p>
    <p>{{$general}}</p>
@endsection

@section('headerdata')

    <style>
        h1{
            color: red;
        }
    </style>
@endsection
