@extends('dashboard.layouts.index')
@section('title', __('users'))

@section('content')
@php
$breadcrumbItems = [
[
'url' => route('admin'),
'title' => __('home')
],
[
'url' => route('users'),
'title' => __('users')
],
[
'title' => isset($user)? __('update') :__('create')
],
];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<!-- Multi Column with Form Separator -->
<div class="card mb-4">
    <form class="card-body" action="@if(isset($user)) {{route('users.update', [$user->id])}} @else {{route('users.create')}} @endif" method="POST">
        @csrf
        @if(isset($user))
        <input type="hidden" name="id" value="{{$user->id}}">
        @endif
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label required" for="multicol-name">{{__('name')}}</label>
                <input required type="text" value="{{old('name') ?? (isset($user)? $user->name : '')}}" name="name" id="multicol-name" class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label required" for="multicol-surname">{{__('surname')}}</label>
                <input required type="text" value="{{old('surname') ?? (isset($user)? $user->surname : '')}}" name="surname" id="multicol-surname" class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label required" for="multicol-username">{{__('username')}}</label>
                <input required type="text" name="username" value="{{old('username') ?? (isset($user)? $user->username : '')}}" id="multicol-username" class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label required" for="multicol-email">{{__('email')}}</label>
                <div class="input-group input-group-merge">
                    <input required type="text" name="email" value="{{old('email') ?? (isset($user)? $user->email : '')}}" id="multicol-email" class="form-control" aria-describedby="multicol-email2" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-password-toggle">
                    <label class="form-label {{isset($user)? '':'required'}}" for="multicol-password">{{__('password')}}</label>
                    <div class="input-group input-group-merge">
                        <input autocomplete="new-password" {{isset($user)? '':'required'}} name="password" type="password" id="multicol-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multicol-password2" />
                        <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="ti ti-eye-off"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-password-toggle">
                    <label class="form-label {{isset($user)? '':'required'}}" for="multicol-confirm-password">{{__('confirm password')}}</label>
                    <div class="input-group input-group-merge">
                        <input autocomplete="new-password" {{isset($user)? '':'required'}} type="password" name="password_confirmation" id="multicol-confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multicol-confirm-password2" />
                        <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"><i class="ti ti-eye-off"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label class="col-3 col-sm-3 col-form-label mx-0">{{__("status")}}</label>
                    <div class="col-9 col-sm-9">
                        <select required name="status" class="form-select" aria-label="">
                            <option value="1" {{old('status') != null? (old('status') == 1 ? "selected": "") :  (isset($user)? ($user->status  == 1 ? 'selected' : "") :'')}}>{{__("active")}}</option>
                            <option value="0" {{old('status') != null? (old('status') == 0 ? "selected": "") :  (isset($user)? ($user->status  == 0 ? 'selected' : "") :'')}}>{{__("inactive")}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-start">
                <button type="button" onclick="$(this).parents('form').append('<input type=\'hidden\' name=\'toList\' value=\'1\'>').submit()" class="mx-1 btn btn-primary">{{isset($user)? __('update'):__('add')}}</button>
                <button type="submit" class="mx-1 btn btn-primary">{{__('save')}}</button>
            </div>
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-end">
                <button type="reset" class="mx-1 btn btn-label-secondary">{{__('reset')}}</button>
                <a href="{{route('users')}}" class="mx-1 btn btn-label-secondary">{{__('cancel')}}</a>
            </div>
        </div>
    </form>
</div>


@endsection