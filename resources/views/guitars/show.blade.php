@extends('layout')

@section('content')
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

    <div>
      <h3 class="white-text">
        {{ $guitar['name'] }}
      </h3>
      <h4 style="display: inline;"><a class="white-text" href="{{ route('guitars.edit', ['guitar' => $guitar['id']]) }}">
          Edit&nbsp;&nbsp;</a>
      </h4>
      <form action="{{ route('guitars.destroy', ['guitar' => $guitar['id']]) }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="all: unset; color: red; cursor: pointer;">Delete</button>
      </form>
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
