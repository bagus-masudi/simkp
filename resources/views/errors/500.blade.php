@extends('errors::minimal')

@push('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
