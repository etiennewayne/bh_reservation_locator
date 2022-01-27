@extends('layouts.no-navbar')

@section('extracss')
    <link rel="stylesheet" href="{{ asset('/css/leaflet.css ') }}">
@endsection


@section('content')
    
    <bhouse-room prop-data-id='{{ $id }}'></bhouse-room>

    
@endsection

