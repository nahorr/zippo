@extends('app')
@section('content')
<section>
    <div class="container d-flex flex-column mt-5 mb-5">
        <div class="row align-items-center justify-content-center mb-5">
            <div class="card shadow zindex-100 mb-0">
                <div class="card-body px-md-5">
                    <div class="mb-5">
                        <p class="text-muted mb-0">Please verify your email address to continue!</p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        @endif
                    </div>
                    <span class="clearfix"></span>
                    <form action="{{route('verification.send')}}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <button type="submit" class="btn btn-block btn-primary">Resend Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection