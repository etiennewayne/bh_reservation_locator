@extends('layouts.landowner-app')

@section('content')
    <landowner-dashboard prop-is-approve="{{ $is_approve }}"></landowner-dashboard>
@endsection

