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
'title' => __('cities')
],
];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<x-dashboard.datatable.responsive-datatable :dataTable="$dataTable" />

<div class="offcanvas offcanvas-end" style="width: 500px" tabindex="-1" id="offcanvasAddCity" aria-labelledby="offcanvasAddCityLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddCityLabel" class="offcanvas-title">{{__('add city')}}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class=" pt-0" method="POST" action="{{route('cities.create')}}"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label required" for="add-city-title">{{__('name')}}</label>
                <input type="text" id="add-city-title" class="form-control" name="name" />

            </div>
            <div class="mb-3">
                <label class="form-label required">{{__("status")}}</label>
                <select required name="status" class="form-select" aria-label="">
                    <option value="1" {{old('status') == 1 ? "selected": "" }}>{{__("active")}}</option>
                    <option value="0" {{old('status') === 0 ? "selected": "" }}>{{__("inactive")}}</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-city-image">{{__('image')}}</label>
                <input type="file" accept="image/*" id="add-city-image" class="form-control" name="image" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-city-code">{{__('code')}}</label>
                <input type="text" id="add-city-code" class="form-control" name="code" />
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">{{__('Submit')}}</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">{{__('Cancel')}}</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{url('dashboard')}}/assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
<script>
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
