@extends('dashboard.layouts.index')
@section('title', __('agents'))

@section('content')
@php
$breadcrumbItems = [
[
'url' => route('admin'),
'title' => __('home')
],
[
'url' => route('agents'),
'title' => __('agents')
],
[
'title' => isset($agent)? __('update') :__('create')
],
];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<!-- Multi Column with Form Separator -->
<div class="card mb-4">
    <form class="card-body" action="@if(isset($agent)) {{route('agents.update', [$agent->id])}} @else {{route('agents.create')}} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($agent))
        <input type="hidden" name="id" value="{{$agent->id}}">
        @endif
        <div class="card-header">
            <div class="user-avatar-section">
                <div class="d-flex align-items-center flex-column">
                    <img class="img-fluid rounded mb-3 pt-1 mt-4 image-square-100-cover" id="agent-image-avatar" src="{{isset($agent?->photo) ? Storage::url($agent?->photo) : url('dashboard/assets/img/avatars/1.png')}}" height="100" width="100" alt="User avatar" />
                    <div class="user-info text-center">
                        <h4 id="agent-full-name" class="mb-2">{{__('Agent Name')}}</h4>
                        <label class="badge bg-primary mt-1 cursor-pointer " for="agent-image">{{__('upload image')}}</label>
                        <input type="file" onchange="updateAgentImage(this);" value="{{old('photo')}}" class="visually-hidden" name="photo" id="agent-image">
                    </div>
                </div>
            </div>
            @if(isset($agent) && false)
            <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-1">
                <div class="d-flex align-items-start me-4 mt-3 gap-2">
                    <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-checkbox ti-sm"></i></span>
                    <div>
                        <p class="mb-0 fw-semibold">1.23k</p>
                        <small>{{__('Total properties')}}</small>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3 gap-2">
                    <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-briefcase ti-sm"></i></span>
                    <div>
                        <p class="mb-0 fw-semibold">568</p>
                        <small>{{__('Active properties')}}</small>
                    </div>
                </div>
            </div>
            @endif
            <hr>

        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label required" for="agent-name">{{__('name')}}</label>
                <input required type="text" value="{{old('name') ?? (isset($agent)? $agent->name : '')}}" name="name" id="agent-name" oninput="updateAgentName()" class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label required" for="agent-surname">{{__('surname')}}</label>
                <input required type="text" value="{{old('surname') ?? (isset($agent)? $agent->surname : '')}}" name="surname" id="agent-surname" oninput="updateAgentName()" class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label required" for="multicol-email">{{__('email')}}</label>
                <div class="input-group input-group-merge">
                    <input required type="text" name="email" value="{{old('email') ?? (isset($agent)? $agent->email : '')}}" id="multicol-email" class="form-control" aria-describedby="multicol-email2" />
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label required" for="multicol-phone">{{__('mobile phone')}}</label>
                <input required type="text" name="phone" value="{{old('phone') ?? (isset($agent)? $agent->mobile_phone : '')}}" id="multicol-phone" class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="multicol-office">{{__('office phone')}}</label>
                <input type="text" name="office" value="{{old('office') ?? (isset($agent)? $agent->office_phone : '')}}" id="multicol-office" class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="multicol-fax">{{__('fax')}}</label>
                <input type="text" name="fax" value="{{old('fax') ?? (isset($agent)? $agent->fax : '')}}" id="multicol-fax" class="form-control" />
            </div>
            <div class="col-md-6">
                <div class="row mt-4 ">
                    <label class="col-3 col-sm-3 col-form-label required">{{__("status")}}</label>
                    <div class="col-9 col-sm-9">
                        <select required name="status" class="form-select" aria-label="">
                            <option value="1" {{old('status') != null? (old('status') == 1 ? "selected": "") :  (isset($agent)? ($agent->status  == 1 ? 'selected' : "") :'')}}>{{__("active")}}</option>
                            <option value="0" {{old('status') != null? (old('status') == 0 ? "selected": "") :  (isset($agent)? ($agent->status  == 0 ? 'selected' : "") :'')}}>{{__("inactive")}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-5">
        <h5>{{__('languages')}}</h5>
        <div action="#" class="language-repeater">
            <div data-repeater-list="languages">
                @if(isset($agent->languages))
                @foreach($agent?->languages as $language)
                <div class="row mb-3" data-repeater-item>
                    <div class="col-10">
                        <input type="text" value="{{$language}}" name="language-name" placeholder="{{__('language name')}}" class="form-control" />
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-outline-danger w-100" data-repeater-delete>
                            <span>{{__('delete')}}</span>
                        </button>
                    </div>
                </div>
                @endforeach
                @else
                <div class="row mb-3" data-repeater-item>
                    <div class="col-10">
                        <input type="text" name="language-name" placeholder="{{__('language name')}}" class="form-control" />
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-outline-danger w-100" data-repeater-delete>
                            <span>{{__('delete')}}</span>
                        </button>
                    </div>
                </div>
                @endif
            </div>
            <div class="d-flex mt-1 justify-content-center">
                <button type="button" class="btn btn-outline-primary" data-repeater-create>
                    <i data-feather="plus"></i>
                    <span>{{__('Add Language')}}</span>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-start">
                <button type="button" onclick="$(this).parents('form').append('<input type=\'hidden\' name=\'toList\' value=\'1\'>').submit()" class="mx-1 btn btn-primary">{{isset($agent)? __('update'):__('add')}}</button>
                <button type="submit" class="mx-1 btn btn-primary">{{__('save')}}</button>
            </div>
            <div class="pt-5 col-md-6 d-flex justify-content-around justify-content-sm-end">
                <button type="reset" class="mx-1 btn btn-label-secondary">{{__('reset')}}</button>
                <a href="{{route('agents')}}" class="mx-1 btn btn-label-secondary">{{__('cancel')}}</a>
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

    $('.language-repeater, .repeater-default').repeater({
        initEmpty: "{{isset($agent->languages)}}" != true,

        show: function() {
            $(this).slideDown();
        },
        hide: function(deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        }
    });
</script>
@endpush
