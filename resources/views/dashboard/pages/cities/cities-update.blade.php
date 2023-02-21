@extends('dashboard.layouts.index')
@section('title', __('cities'))

@section('content')
@php
$breadcrumbItems = [
[
'url' => route('admin'),
'title' => __('home')
],
[
'url' => route('cities'),
'title' => __('cities')
],
[
'title' => isset($city)? __('update') :__('create')
],
];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<!-- Multi Column with Form Separator -->
<div class="card mb-4">
    <form class="card-body" action="{{route('cities.update', [$city->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$city->id}}">
        <div class="mb-3">
            <label class="form-label required" for="city-name">{{__('name')}}</label>
            <input type="text" id="city-name" value="{{$city->name}}" class="form-control" name="name" />
        </div>
        <div class="mb-3">
            <label class="form-label required">{{__("status")}}</label>
            <select required name="status" class="form-select" aria-label="">
                <option value="1" {{old('status') != null? (old('status') == 1 ? "selected": "") :  (isset($city)? ($city->status  == 1 ? 'selected' : "") :'')}}>{{__("active")}}</option>
                <option value="0" {{old('status') != null? (old('status') == 0 ? "selected": "") :  (isset($city)? ($city->status  == 0 ? 'selected' : "") :'')}}>{{__("inactive")}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="add-city-image">{{__('image')}}</label>
            <input type="file" accept="image/*" id="add-city-image" class="form-control" name="image" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="add-city-code">{{__('code')}}</label>
            <input type="text" id="add-city-code" value="{{$city->code}}" class="form-control" name="code" />
        </div>

        <div class="row">
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-start">
                <button type="button" onclick="$(this).parents('form').append('<input type=\'hidden\' name=\'toList\' value=\'1\'>').submit()" class="mx-1 btn btn-primary">{{__('update')}}</button>
                <button type="submit" class="mx-1 btn btn-primary">{{__('save')}}</button>
            </div>
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-end">
                <button type="reset" class="mx-1 btn btn-label-secondary">{{__('reset')}}</button>
                <a href="{{route('cities')}}" class="mx-1 btn btn-label-secondary">{{__('cancel')}}</a>
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
