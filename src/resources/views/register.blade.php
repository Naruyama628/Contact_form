@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('auth')
    <!-- Loginボタン -->
    <form action="/login" type="submit" method="get" class="auth-form">
        <button class="auth-form__button">
            Login
        </button>
    </form>
@endsection

@section('content')
<h2 class="">register</h2>
@endsection