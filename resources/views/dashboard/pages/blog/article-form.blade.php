@extends('dashboard.layouts.index')
@section('title', __('blog'))

@section('content')
@php
$breadcrumbItems = [
[
'url' => route('admin'),
'title' => __('home')
],
[
'url' => route('blogs'),
'title' => __('blog')
],
[
'title' => isset($article)? __('update') :__('create')
],
];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<!-- Multi Column with Form Separator -->
<div class="card mb-4">
    <form class="card-body" action="@if(isset($article)) {{route('blogs.update', [$article->id])}} @else {{route('blogs.create')}} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($article))
        <input type="hidden" name="id" value="{{$article->id}}">
        @endif
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label required" for="multicol-title">{{__('title')}}</label>
                <input required type="text" value="{{old('title') ?? (isset($article)? $article->title : '')}}" name="title" id="multicol-title" class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label required" for="multicol-language">{{__('language')}}</label>
                <select required name="language" class="form-select" aria-label="">
                    <option value="">--</option>
                    @foreach(config('app.supported_locales') as $key => $locale)
                    <option value="{{$locale}}" {{old('language') != null? (old('language') == $locale ? "selected": "") :  (isset($article)? ($article->language  == $locale ? 'selected' : "") :'')}}>{{strtoupper($locale)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label required" for="multicol-date">{{__('date')}}</label>
                <input required type="text" name="date" value="{{old('date') ?? (isset($article)? $article->date : now())}}" class="form-control" placeholder="YYYY-MM-DD HH:MM" id="flatpickr-datetime" />
            </div>
            <div class="col-md-6">
                <label class="form-label " style="visibility: hidden">.</label>
                <div class="row">
                    <label class="col-2 col-sm-2 col-form-label pe-0 mx-0">{{__("status")}}</label>
                    <div class="col-5 col-sm-5">
                        <select required name="status" class="form-select" aria-label="">
                            <option value="1" {{old('status') != null? (old('status') == 1 ? "selected": "") :  (isset($article)? ($article->status  == 1 ? 'selected' : "") :'')}}>{{__("active")}}</option>
                            <option value="0" {{old('status') != null? (old('status') == 0 ? "selected": "") :  (isset($article)? ($article->status  == 0 ? 'selected' : "") :'')}}>{{__("inactive")}}</option>
                        </select>
                    </div>
                    <div class="col-5 col-sm-5 form-group m-auto">
                        <input class="form-check-input" type="checkbox" name="featured" value="1" id="article-featured" {{old('featured', (isset($article) ? $article->featured : null)) == 1? "checked" :""}} />
                        <label class="form-check-label mx-2" for="article-featured">{{__('featured')}}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label required">{{__("agent")}}</label>
                <select required name="agent_id" class="form-select" aria-label="">
                    <option value="">--</option>
                    @foreach($agents as $agent)
                    <option value="{{$agent->id}}" {{old('agent_id') != null? (old('agent_id') == $agent->id ? "selected": "") :  (isset($article)? ($article->agent_id  == $agent->id ? 'selected' : "") :'')}}>{{$agent->name}} {{$agent->surname}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">

                <label class="form-label {{isset($article)? '' : 'required'}}" for="photo">{{__('photo')}}</label>
                <div class="input-group">
                    <input {{isset($article)? '' : 'required'}}  type="file" name="photo" class="form-control" id="photo" aria-label="{{__('upload')}}">
                    <button type="button" class="btn btn-outline-primary {{isset($article?->photo)? '' : 'disabled'}}" data-bs-toggle="popover" data-img="{{isset($article)? Storage::url($article->photo) : ''}}"><i class="ti ti-photo"></i></button>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label required" for="multicol-meta-title">{{__('meta title')}}</label>
                <input required type="text" value="{{old('meta_title') ?? (isset($article)? $article->meta_title : '')}}" name="meta_title" id="multicol-meta-title" class="form-control" />
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="meta-description">{{__('meta description')}}</label>
                <textarea class="form-control" name="meta_description" id="meta-description" rows="3">{{old('meta_description') ?? (isset($article)? $article->meta_description : '')}}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label required " for="banner">{{__('banner')}}</label>
                <textarea  required class="form-control" name="banner" id="banner" rows="3">{{old('banner') ?? (isset($article)? $article->banner : '')}}</textarea>
            </div>
            <div class="col-12">
                <x-dashboard.tinymce.editor name="content" :value='(old("content") ?? (isset($article)? $article->content : ""))' />
            </div>
        </div>

        <div class="row mb-4">
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-start">
                <button type="button" onclick="$(this).parents('form').append('<input type=\'hidden\' name=\'toList\' value=\'1\'>').submit()" class="mx-1 btn btn-primary">{{isset($article)? __('update'):__('add')}}</button>
                <button type="submit" class="mx-1 btn btn-primary">{{__('save')}}</button>
            </div>
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-end">
                <button type="reset" class="mx-1 btn btn-label-secondary">{{__('reset')}}</button>
                <a href="{{route('blogs')}}" class="mx-1 btn btn-label-secondary">{{__('cancel')}}</a>
            </div>
        </div>
    </form>
</div>


@endsection
@push('scripts')
<script src="{{url('dashboard')}}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
<x-dashboard.tinymce.config />
<style>
    .popover {
        --bs-popover-max-width: auto;
    }
</style>

<script>
    var flatpickrDateTime = document.querySelector("#flatpickr-datetime");

    flatpickrDateTime.flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i"
    });

    var popover = new bootstrap.Popover(document.querySelector('button[data-bs-toggle=popover]'), {
        html: true,
        trigger: 'hover',
        placement: 'left',
        content: function() {
            return '<img width="300px" src="' + $(this).data('img') + '" />';
        }
    })
</script>
@endpush
@push('style')
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/flatpickr/flatpickr.css" />
@endpush
