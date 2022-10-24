@extends('app')
@section('content')
  <main class="px-3">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="mb-3">Enter US ZIP CODE</h2>
    <form method="POST" action="{{route('store.zipcode')}}">
      @csrf

      <div class="form-group mb-3">
        <input type="text" name="zipcode" class="form-control" placeholder="5-digits - eg 90210" required>
      </div>

      <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
    </form>

    @if ($zipcode != null)
      <div class="mt-3">
        <ul class="list-group">
          @if($data->valid_response)
            <li class="list-group-item active" aria-current="true">
              Result for Zip Code: {{$data->zip_code}}
            </li>
            <li class="list-group-item"><span class="text-danger">Country:</span> {{ $data->json_response['country'] }}</li>
            <li class="list-group-item"><span class="text-danger">Country abbreviation:</span> {{ $data->json_response['country abbreviation'] }}</li>
            <li class="list-group-item"><span class="text-danger">Place Name:</span> {{ $data->json_response['places'][0]['place name']}}</li>
            <li class="list-group-item"><span class="text-danger">Longitude:</span> {{ $data->json_response['places'][0]['longitude']}}</li>
            <li class="list-group-item"><span class="text-danger">State:</span> {{ $data->json_response['places'][0]['state']}}</li>
            <li class="list-group-item"><span class="text-danger">Atate Abbreviation:</span> {{ $data->json_response['places'][0]['state abbreviation']}}</li>
            <li class="list-group-item"><span class="text-danger">Latitude:</span> {{ $data->json_response['places'][0]['latitude']}}</li>
          @else
            <li class="list-group-item active" aria-current="true">
              <span class="text-danger"><strong>No Result for Zip Code:</strong></span> {{$data->zip_code}}
            </li>
          @endif
        </ul>
      </div> 
    @endif
    
  </main>
@endsection