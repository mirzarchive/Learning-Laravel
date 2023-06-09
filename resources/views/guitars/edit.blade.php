@extends('layout')

@section('title', 'Create Guitars')

@section('content')

  <div class="content-center max-w-6xl mx-auto sm:px-6 lg:px-8">
    <form class="form bg-white p-6 border-1" action="{{ route('guitars.update', ['guitar' => $guitar->id]) }}"
      method="POST">
      @csrf
      @method('PUT')
      <div>
        <label class="text-sm" for="name">Guitar Name</label>
        <input class="text-lg border-1" type="text" name="name" value="{{ $guitar->name }}" id="name">
        @error('name')
          <div class="form-error">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div>
        <label class="text-sm" for="brand">Brand</label>
        <input class="text-lg border-1" type="text" name="brand" value="{{ $guitar->brand }}" id="brand">
        @error('brand')
          <div class="form-error">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div>
        <label class="text-sm" for="year">Year Made</label>
        <input class="text-lg border-1" type="text" name="year" value="{{ $guitar->year_made }}" id="year">
        @error('year')
          <div class="form-error">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div>
        <button class="border-1" type="submit">Submit</button>
      </div>
    </form>
  </div>

@endsection
