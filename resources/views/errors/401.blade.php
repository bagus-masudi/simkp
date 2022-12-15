@extends('errors::minimal')

@push('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
