@extends('layouts.app')

@section('content')

    {{ auth()->user()->role }}


@endsection

