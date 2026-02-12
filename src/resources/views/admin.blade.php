@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('auth')
    <form action="/logout" method="get" class="auth-form">
        <button type="submit" class="auth-form__button">
            Logout
        </button>
    </form>
@endsection

@section('content')
<h2 class="">confirm</h2>
@endsection