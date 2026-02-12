@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('auth')
    <form action="/register" method="get" class="auth-form">
        <button type="submit" class="auth-form__button">
            register
        </button>
    </form>
@endsection

@section('content')
<h2 class="">login</h2>
@endsection