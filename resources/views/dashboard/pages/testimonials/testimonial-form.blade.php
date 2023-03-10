@extends('dashboard.layouts.index')
@section('title', __('definitions'))

@section('content')
@php
$breadcrumbItems = [
[
'url' => route('admin'),
'title' => __('home')
],
[
'url' => route('definitions'),
'title' => __('definitions')
],
[
'title' => isset($definition)? __('update') :__('create')
],
];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<!-- Multi Column with Form Separator -->
<div class="card mb-4">
    <form class="card-body" action="@if(isset($definition)) {{route('definitions.update', [$definition->id])}} @else {{route('definitions.create')}} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($definition))
        <input type="hidden" name="id" value="{{$definition->id}}">
        @endif
        <div class="row g-3">

            <div class="col-md-6">
                <div class="row mt-4 ">
                    <label class="col-12 col-sm-12 col-form-label required">{{__("type")}}</label>
                    <div class="col-12 col-sm-12">
                        <select required name="type" class="form-select" aria-label="">
                            <option value="">--</option>
                            @foreach(\App\Models\Definition::types as $key => $type)
                            <option value="{{$type}}" {{old('type') != null? (old('type') == $type ? "selected": "") :  (isset($definition)? ($definition->type  == $type ? 'selected' : "") :'')}}>{{__($type)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row mt-4 ">
                    <label class="col-12 col-sm-12 col-form-label required">{{__("status")}}</label>
                    <div class="col-12 col-sm-12">
                        <select required name="status" class="form-select" aria-label="">
                            <option value="1" {{old('status') != null? (old('status') == 1 ? "selected": "") :  (isset($definition)? ($definition->status  == 1 ? 'selected' : "") :'')}}>{{__("active")}}</option>
                            <option value="0" {{old('status') != null? (old('status') == 0 ? "selected": "") :  (isset($definition)? ($definition->status  == 0 ? 'selected' : "") :'')}}>{{__("inactive")}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label required" for="add-definition-title">{{__('title')}}</label>
                <div action="#" class="title-repeater" data-min-limit="1" data-max-limit="{{count(config('app.supported_locales'))}}">
                    <div data-repeater-list="title">
                        @if(old("title", isset($definition)?($definition?->getTranslations('title')):null))
                        @foreach(old("title", isset($definition)?($definition?->getTranslations('title')):[]) as $localeKey => $titleTranslation)
                        <div class="row mb-3" data-repeater-item>
                            <div class="col-6">
                                <input required type="text" value="{{$titleTranslation}}" name="translation" placeholder="{{__('translation')}}" class="form-control" />
                            </div>
                            <div class="col-4">
                                <select required name="language" class="form-select" aria-label="">
                                    <option value="">{{__("language")}}</option>
                                    @foreach(config('app.supported_locales') as $locale)
                                    <option value="{{$locale}}" {{$localeKey == $locale ? "selected": "" }}>{{strtoupper($locale)}}</option>
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
                        @else
                        <div class="row mb-3" data-repeater-item>
                            <div class="col-6">
                                <input required type="text" value="" name="translation" placeholder="{{__('translation')}}" class="form-control" />
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
                        @endif
                    </div>
                    <div class="d-flex mt-1 justify-content-center" id="title-add-repeater-button">
                        <button type="button" class="btn btn-outline-primary" data-repeater-create>
                            <i data-feather="plus"></i>
                            <span>{{__('Add Translation')}}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="definition-group">{{__('group')}}</label>
                <input type="text" value="{{old('group') ?? (isset($definition)? $definition->group : '')}}" name="group" id="definition-group" class="form-control" />
            </div>
        </div>

        <div class="row">
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-start">
                <button type="button" onclick="$(this).parents('form').append('<input type=\'hidden\' name=\'toList\' value=\'1\'>').submit()" class="mx-1 btn btn-primary">{{isset($definition)? __('update'):__('add')}}</button>
                <button type="submit" class="mx-1 btn btn-primary">{{__('save')}}</button>
            </div>
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-end">
                <button type="reset" class="mx-1 btn btn-label-secondary">{{__('reset')}}</button>
                <a href="{{route('definitions')}}" class="mx-1 btn btn-label-secondary">{{__('cancel')}}</a>
            </div>
        </div>
    </form>
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
                    if (itemCount == maxLimitCount) {
                        hideRepeaterButton()
                    }
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
            showRepeaterButton()
        }
    });

    function hideRepeaterButton() {
        $("#title-add-repeater-button").slideUp("", () => $("#title-add-repeater-button").addClass('d-none'));
    }

    function showRepeaterButton() {
        if ($("#title-add-repeater-button").hasClass('d-none')) {
            $("#title-add-repeater-button").removeClass('d-none');
            $("#title-add-repeater-button").slideDown("slow");
        }
    }
</script>
@endpush
