@extends('layout')

@section('title', 'Guitars')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    @if (count($guitars) > 0)
        @foreach ($guitars as $guitar)
        <div>
            <h3>
                {{ $guitar['name'] }}
                <ul>
                        <li>
                            Made by: {{ $guitar['brand'] }}
                        </li>
                    </ul>
                </h3>
            </div>
        @endforeach
    @else
        <h2>Theres no Guitars to show</h2>
    @endif

    <div>
        User Input: {{ $userInput }}
    </div>

</div>

@endsection
