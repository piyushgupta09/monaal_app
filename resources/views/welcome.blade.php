@extends('layouts.app')

@section('body')
<div class="text-center">
    <p class="display-3">
        This is welcome page
    </p>
    <a href="{{ route('login') }}" class="btn btn-dark">Login</a>
    <br><br>
    <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
</div>
@endsection