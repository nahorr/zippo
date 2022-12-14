@extends('app')
@section('content')
  <main class="px-3">

    <h1>Cover your page.</h1>
    <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
    <p class="lead">
      @auth
        <a href="{{route('home')}}" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Dashboard</a>
      @else
        <a href="{{route('login')}}" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Login</a>
        <a href="{{route('register')}}" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Sign up</a>
      @endauth
    </p>
  </main>
@endsection