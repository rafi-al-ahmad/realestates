@extends('dashboard.layouts.index')
@section('title', __('users'))

@section('content')
@php
$breadcrumbItems = [
        [
            'title' => __('home'),
            'url' => route('admin')
        ],
        [
            'title' => __('users')
        ],
    ];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<x-dashboard.datatable.responsive-datatable 
:dataTable="$dataTable" 
/>
@endsection