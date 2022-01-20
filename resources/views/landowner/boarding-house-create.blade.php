@extends('layouts.no-navbar')

@section('extracss')
    <link rel="stylesheet" href="{{ asset('/css/leaflet.css ') }}">
@endsection

@section('extrajs')
    <script src="{{ asset('/js/leaflet.js') }}"></script>
@endsection


@section('content')

    <boarding-house-create></boarding-house-create>

@endsection

