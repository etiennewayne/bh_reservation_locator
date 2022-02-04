@extends('layouts.main-navbar')

@section('content')
    <my-payment prop-data='@json($data)'></my-payment>
@endsection

