@extends('dashboard.layouts.index')
@section('title', __('definitions'))

@section('content')
@php
$breadcrumbItems = [
[
'title' => __('home'),
'url' => route('admin')
],
[
'title' => __('definitions')
],
];

$navListIndex = 0;
$tableListIndex = 0;
$defaultTapIndex = 0;
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />

<!-- Nav tabs -->
<ul class="nav nav-tabs nav-fill my-3" id="myTab" role="tablist">
    @foreach(\App\Models\Definition::types as $type)
    <li class="nav-item">
        <a class="nav-link py-3 {{$navListIndex == $defaultTapIndex? 'active':''}}" id="{{$type}}-fill" data-bs-toggle="tab" href="#{{$type}}" role="tab" aria-controls="{{$type}}" aria-selected="{{$navListIndex == $defaultTapIndex? 'true':'false'}}">{{__($type)}}</a>
    </li>
    @php $navListIndex++ @endphp
    @endforeach
</ul>

<!-- Tab panes -->
<div class="tab-content p-0 ">
    @foreach(\App\Models\Definition::types as $type)
    <div class="tab-pane {{$tableListIndex == $defaultTapIndex? 'active show':''}}" id="{{$type}}" role="tabpanel" aria-labelledby="{{$type}}-fill">
        <x-dashboard.datatable.responsive-datatable :dataTable="$datatableArray[$type]" />
    </div>
    @php $tableListIndex++ @endphp
    @endforeach
</div>

@endsection
