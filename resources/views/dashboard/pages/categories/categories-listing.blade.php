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
'title' => __('categories')
],
];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<x-dashboard.datatable.responsive-datatable :dataTable="$dataTable" />

<div class="offcanvas offcanvas-end" style="width: 500px" tabindex="-1" id="offcanvasAddCategory" aria-labelledby="offcanvasAddCategoryLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddCategoryLabel" class="offcanvas-title">{{__('add category')}}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class=" pt-0" method="POST" action="{{route('categories.create')}}">
            @csrf
            <div class="mb-3">
                <label class="form-label required" for="add-category-title">{{__('title')}}</label>
                <div action="#" class="title-repeater" data-min-limit="1" data-max-limit="{{count(config('app.supported_locales'))}}">
                    <div data-repeater-list="title">
                        <div class="row mb-3" data-repeater-item>
                            <div class="col-6">
                                <input required type="text" name="translation" placeholder="{{__('translation')}}" class="form-control" />
                            </div>
                            <div class="col-4">
                                <select required name="language" class="form-select" aria-label="">
                                    <option value="">{{__("language")}}</option>
                                    @foreach(config('app.supported_locales') as $key => $locale)
                                    <option value="{{$locale}}" {{old('title.'.$key.'.language') == $locale ? "selected": "" }}>{{strtoupper($locale)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-danger w-100" data-repeater-delete>
                                    <span>X</span>
                                </button>
                            </div>
                        </div>
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
                <label class="form-label" for="add-category-image">{{__('image')}}</label>
                <input type="file" accept="image/*" id="add-category-image" class="form-control" name="image" />
            </div>
            <div class="mb-3">
                <label class="form-label">{{__("parent")}}</label>
                <select name="parent_id" class="form-select" aria-label="">
                    <option value=""></option>
                    @foreach($parentCategories as $parent)
                    <option value="{{$parent->id}}">{{$parent->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-category-slug">{{__('slug')}}</label>
                <input type="text" id="add-category-slug" class="form-control" name="slug" />
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
