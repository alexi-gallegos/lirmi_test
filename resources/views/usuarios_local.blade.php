@extends('layout.master')

@section('title', 'Usuarios Local')

@section('content')
    <users
        :use-local-api="true"
    ></users>
@endsection