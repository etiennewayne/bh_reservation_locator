@extends('layouts.no-navbar')



@section('content')

    <bhouse-room prop-data-id='{{ $id }}' prop-route-back="{{url()->previous()}}"></bhouse-room>


@endsection

