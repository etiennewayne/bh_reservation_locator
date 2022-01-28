@extends('layouts.no-navbar')

@section('content')

    <boarding-house-bedspace prop-data-id='{{ $room_id }}' prop-route-back="{{url()->previous()}}"></boarding-house-bedspace>

@endsection

