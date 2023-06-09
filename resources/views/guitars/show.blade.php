@extends('layout')

@section('content')
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

    <div>
      <h3 class="white-text">
        {{ $guitar['name'] }}
      </h3>
      <ul>
        <li class="white-text">
          Made by: {{ $guitar['brand'] }}
        </li>
        <li class="white-text">
          Year made: {{ $guitar['year_made'] }}
        </li>
      </ul>
    </div>

  </div>
@endsection
