@extends('app')
@section('content')
<form action="{{route('login')}}" method="POST">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>  
        @enderror
      <label for="floatingInput" class="text-dark">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
      <label for="floatingPassword" class="text-dark">Password</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>  
        @enderror
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
        
@endsection