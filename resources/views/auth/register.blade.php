@extends('app')
@section('content')

<form action="{{route('register')}}" method="POST">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please Register</h1>

    <div class="form-floating mb-3">
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nnamdi Okeke">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>  
        @enderror
      <label for="floatingInput" class="text-dark">Full Name</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com">
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>  
          @enderror
        <label for="floatingInput" class="text-dark">Email</label>
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
    <div class="form-floating mb-3">
        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
        <label for="floatingPassword" class="text-dark">Confirm Password</label>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>  
          @enderror
      </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
  </form>
                    
@endsection