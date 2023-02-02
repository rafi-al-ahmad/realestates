@extends('dashboard.layouts.index')
@section('title', __('agents'))

@section('content')
@php
$breadcrumbItems = [
        [
            'title' => __('home'),
            'url' => route('admin')
        ],
        [
            'title' => __('agents')
        ],
    ];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<x-dashboard.datatable.responsive-datatable 
:dataTable="$dataTable" 
/>
@endsection