@extends('layout')

@section('title', 'Create Guitars')

@section('content')

  <div class="content-center max-w-6xl mx-auto sm:px-6 lg:px-8">
    <form class="form bg-white p-6 border-1" action="{{ route('guitars.store') }}" method="POST">
      @csrf
      <div>
        <label class="text-sm" for="name">Guitar Name</label>
        <input class="text-lg border-1" type="text" name="name" value="{{ old('name') }}" id="name">
        @error('name')
          <div class="form-error">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div>
        <label class="text-sm" for="brand">Brand</label>
        <input class="text-lg border-1" type="text" name="brand" value="{{ old('brand') }}" id="brand">
        @error('brand')
          <div class="form-error">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div>
        <label class="text-sm" for="year">Year Made</label>
        <input class="text-lg border-1" type="text" name="year" value="{{ old('year') }}" id="year">
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
