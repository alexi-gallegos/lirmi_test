@extends('layout.master')

@section('title', 'Usuarios')

@section('content')
    <div>
        <users
        :use-local-api="false"
        url="{{ route('usuarios-index') }}"
        ></users>
    </div>
@endsection