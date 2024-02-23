@extends('layouts.app')

@section('title', 'App blade title')

@section('header')
    <div>
        <nav>
            <ul style="display: flex; justify-content: center; align-items: center; list-style-type: none;">
                <li>Home</li>
                <li>Gallery</li>
                <li>Reviews</li>
                <li>About</li>
            </ul>
        </nav>
    </div>
@endsection

@section('body')
    <div style="display: flex; justify-content: center; align-items: center;">
        <h1>Body</h1>
    </div>
@endsection

@section('footer')
    <div style="display: flex; justify-content: center; align-items: center;">
        <h1>Footer</h1>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endpush
