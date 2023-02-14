@extends('dashboard.layouts.index')
@section('title', __('categories'))

@section('content')
@php
$breadcrumbItems = [
[
'url' => route('admin'),
'title' => __('home')
],
[
'url' => route('categories'),
'title' => __('categories')
],
[
'title' => isset($category)? __('update') :__('create')
],
];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<!-- Multi Column with Form Separator -->
<div class="card mb-4">
    <form class="card-body" action="{{route('categories.update', [$category->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="mb-3">
            <label class="form-label required" for="add-category-title">{{__('title')}}</label>
            <div action="#" class="title-repeater" data-min-limit="1" data-max-limit="{{count(config('app.supported_locales'))}}">
                <div data-repeater-list="title">
                    @foreach($category->getTranslations('title') as $lang => $title)
                    <div class="row mb-3" data-repeater-item>
                        <div class="col-6">
                            <input required type="text" value="{{$title}}" name="translation" placeholder="{{__('translation')}}" class="form-control" />
                        </div>
                        <div class="col-4">
                            <select required name="language" class="form-select" aria-label="">
                                <option value="">{{__("language")}}</option>
                                @foreach(config('app.supported_locales') as $key => $locale)
                                <option value="{{$locale}}" {{ $lang == $locale ? "selected": "" }}>{{strtoupper($locale)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-outline-danger w-100" data-repeater-delete>
                                <span>X</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex mt-1 justify-content-center">
                    <button type="button" class="btn btn-outline-primary" data-repeater-create>
                        <i data-feather="plus"></i>
                        <span>{{__('Add Translation')}}</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label required">{{__("status")}}</label>
            <select required name="status" class="form-select" aria-label="">
                <option value="1" {{old('status') == 1 ? "selected": "" }}>{{__("active")}}</option>
                <option value="0" {{old('status') === 0 ? "selected": "" }}>{{__("inactive")}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">{{__("parent")}}</label>
            <select name="parent_id" class="form-select" aria-label="">
                <option value=""></option>
                @foreach($parentCategories as $parent)
                <option value="{{$parent->id}}" {{(old('parent_id') != null) ? (old('parent_id') == $parent->id ? "selected": "") : ($category->parent_id == $parent->id ? "selected": "") }}>{{$parent->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="add-category-image">{{__('image')}}</label>
            <input type="file" accept="image/*" id="add-category-image" class="form-control" name="image" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="add-category-slug">{{__('slug')}}</label>
            <input type="text" id="add-category-slug" class="form-control" name="slug" />
        </div>

        <div class="row">
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-start">
                <button type="button" onclick="$(this).parents('form').append('<input type=\'hidden\' name=\'toList\' value=\'1\'>').submit()" class="mx-1 btn btn-primary">{{__('update')}}</button>
                <button type="submit" class="mx-1 btn btn-primary">{{__('save')}}</button>
            </div>
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-end">
                <button type="reset" class="mx-1 btn btn-label-secondary">{{__('reset')}}</button>
                <a href="{{route('categories')}}" class="mx-1 btn btn-label-secondary">{{__('cancel')}}</a>
            </div>
        </div>
    </form>
</div>


@endsection

@push('scripts')
<script src="{{url('dashboard')}}/assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
<script>
    function updateAgentName() {
        $('#agent-full-name').html($('#agent-name').val() + " " + $('#agent-surname').val());
    }

    function updateAgentImage(e) {
        for (var i = 0; i < e.files.length; i++) {

            var file = e.files[i];
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#agent-image-avatar').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

    $('.title-repeater, .repeater-default').repeater({
        initEmpty: false,
        show: function() {
            var maxLimitCount = $(this).parents(".title-repeater").data("max-limit");
            var itemCount = $(this).parents(".title-repeater").find("div[data-repeater-item]").length;

            if (maxLimitCount) {
                if (itemCount <= maxLimitCount) {
                    $(this).slideDown();
                } else {
                    $(this).remove();
                }
            } else {
                $(this).slideDown();
            }

            if (itemCount >= maxLimitCount) {
                $(".title-repeater input[data-repeater-create]").hide("slow");
            }
        },
        hide: function(deleteElement) {
            var maxLimitCount = $(this).parents(".title-repeater").data("max-limit");
            var minLimitCount = $(this).parents(".title-repeater").data("min-limit");
            var itemCount = $(this).parents(".title-repeater").find("div[data-repeater-item]").length;

            if (minLimitCount < itemCount && confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }

            if (itemCount <= maxLimitCount) {
                $(".title-repeater input[data-repeater-create]").show("slow");
            }
        }
    });
</script>
@endpush
