@extends('dashboard.layouts.index')
@section('title', __('properties'))

@section('content')
@php
$breadcrumbItems = [
[
'url' => route('admin'),
'title' => __('home')
],
[
'url' => route('properties'),
'title' => __('properties')
],
[
'title' => isset($property)? __('update') :__('create')
],
];
@endphp
<x-dashboard.ui.breadcrumb :items="$breadcrumbItems" />
<!-- Multi Column with Form Separator -->

<div class="dcard mb-4">
    <form class="" action="@if(isset($property)) {{route('properties.update', [$property->id])}} @else {{route('properties.create')}} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($property))
        <input type="hidden" name="id" value="{{$property->id}}">
        @endif
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-8">
                        <div action="#" class="translation-repeater" data-min-limit="1" data-max-limit="{{count(config('app.supported_locales'))+2}}">
                            <div data-repeater-list="translations">
                                @if(null != (old("translations", isset($property)?($property?->getTranslations('title')):null)))
                                @foreach(old("translations", isset($property)?($property?->getTranslations('title')):null) as $key => $translation)

                                <div class="mb-5 border-bottom" data-repeater-item>
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="mb-3">
                                                <label for="title" class="form-label required">{{__('title')}}</label>
                                                <input required type="text" value="{{old('translations.'.$key.'.title') != null ? old('translations.'.$key.'.title') : (isset($property)? ($property?->getTranslations('title')[$key]) : null)}}" id="title" name="title" placeholder="{{__('translation')}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="language" class="form-label required">{{__('language')}}</label>
                                                <select required name="language" class="form-select" aria-label="">
                                                    <option value="">--{{__("select")}}--</option>
                                                    @foreach(config('app.supported_locales') as $locale)
                                                    <option value="{{$locale}}" {{old('translations.'.$key.'.language') == $locale || $key  == $locale  ? "selected": "" }}>{{strtoupper($locale)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="description" class="form-label required">{{__('description')}}</label>
                                                <textarea required class="form-control" name="description" id="description" rows="3">{{old('translations.'.$key.'.description') != null ? old('translations.'.$key.'.description') : (isset($property)? ($property?->getTranslations('description')[$key]) : null)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="ad-meta-title">{{__('meta title')}}</label>
                                            <input type="text" id="ad-meta-title" value="{{old('translations.'.$key.'.meta_title') != null ? old('translations.'.$key.'.meta_title') : (isset($property)? ($property?->getTranslations('meta_title')[$key]) : null)}}" name="meta_title" placeholder="{{__('meta title')}}" class="form-control" />
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="meta_description" class="form-label">{{__('meta description')}}</label>
                                                <textarea class="form-control" name="meta_description" id="meta_description" rows="2">{{old('translations.'.$key.'.meta_description') != null ? old('translations.'.$key.'.meta_desc') : (isset($property)? ($property?->getTranslations('meta_desc')[$key]) : null)}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="button" class="btn btn-outline-danger w-100 d-none" data-repeater-delete>
                                            <span>{{__('delete translation')}}</span>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="mb-5 border-bottom" data-repeater-item>
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="mb-3">
                                                <label for="title" class="form-label required">{{__('title')}}</label>
                                                <input required type="text" value="" id="title" name="title" placeholder="{{__('translation')}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="language" class="form-label required">{{__('language')}}</label>
                                                <select required name="language" class="form-select" aria-label="">
                                                    <option value="">--{{__("select")}}--</option>
                                                    @foreach(config('app.supported_locales') as $key => $locale)
                                                    <option value="{{$locale}}" {{old('title.'.$key.'.language') == $locale ? "selected": "" }}>{{strtoupper($locale)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="description" class="form-label required">{{__('description')}}</label>
                                                <textarea required class="form-control" name="description" id="description" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="ad-meta-title">{{__('meta title')}}</label>
                                            <input type="text" id="ad-meta-title" name="meta_title" placeholder="{{__('meta title')}}" class="form-control" />
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="meta_description" class="form-label">{{__('meta description')}}</label>
                                                <textarea class="form-control" name="meta_description" id="meta_description" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="button" class="btn btn-outline-danger w-100 d-none" data-repeater-delete>
                                            <span>{{__('delete translation')}}</span>
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
                    <div class="col-md-4 border-start d-flex flex-column">
                        <div>
                            <div class="from-group mb-3">
                                <label class="form-label required">{{__("status")}}</label>
                                <div class="">
                                    <select required name="status" class="form-select" aria-label="">
                                        <option value="1" {{old('status') != null? (old('status') == 1 ? "selected": "") :  (isset($property)? ($property->status  == 1 ? 'selected' : "") :'')}}>{{__("active")}}</option>
                                        <option value="0" {{old('status') != null? (old('status') == 0 ? "selected": "") :  (isset($property)? ($property->status  == 0 ? 'selected' : "") :'')}}>{{__("inactive")}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="from-group mb-3">
                                <label class="form-label ">{{__("property type")}}</label>
                                <select  name="property_type" class="form-select" aria-label="">
                                    <option value="">--</option>
                                    @foreach($propertyType as $type)
                                    <option value="{{$type->id}}" {{old('property_type') != null? (old('property_type') == $type->id ? "selected": "") :  (isset($property)? ($property->property_type_id  == $type->id ? 'selected' : "") :'')}}>{{__($type->title)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="from-group mb-3">
                                <label class="form-label required">{{__("agent")}}</label>
                                <select required name="agent_id" class="form-select" aria-label="">
                                    <option value="">--</option>
                                    @foreach($agents as $agent)
                                    <option value="{{$agent->id}}" {{old('agent_id') != null? (old('agent_id') == $agent->id ? "selected": "") :  (isset($property)? ($property->agent_id  == $agent->id ? 'selected' : "") :'')}}>{{$agent->name}} {{$agent->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="from-group mb-3">
                                <label class="form-label required">{{__("category")}}</label>
                                <select required name="category_id" class="form-select" aria-label="">
                                    <option value="">--</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{old('category_id') != null? (old('category_id') == $category->id ? "selected": "") :  (isset($property)? ($property->category_id  == $category->id ? 'selected' : "") :'')}}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label required" for="price_tl">{{__('price')}}</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">₺</span>
                                    <input required type="text" value="{{old('price_tl') ?? (isset($property)? $property->price_tl : '')}}" name="price_tl" id="price_tl" class="form-control" />
                                    <span class="input-group-text">TL</span>
                                </div>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">$</span>
                                    <input required type="text" value="{{old('price_usd') ?? (isset($property)? $property->price_usd : '')}}" name="price_usd" id="price_usd" class="form-control" />
                                    <span class="input-group-text">USD</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-check-input" type="checkbox" name="is_furnished" value="1" id="property-is_furnished" {{old('is_furnished', (isset($property) ? $property->is_furnished : null)) == 1? "checked" :""}} />
                                <label class="form-check-label mx-2" for="property-is_furnished">{{__('furnished')}}</label>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="property-is_featured" {{old('is_featured', (isset($property) ? $property->is_featured : null)) == 1? "checked" :""}} />
                                <label class="form-check-label mx-2" for="property-is_featured">{{__('featured')}}</label>
                            </div>
                            <div class="form-group mb-3">
                                <label class="d-block">{{__('credit eligibility')}}:</label>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="credit_eligibility" id="credit_eligibility1" value="1" {{old('credit_eligibility', (isset($property) ? $property->credit_eligibility : null)) == 1? "checked" :""}} />
                                    <label class="form-check-label" for="credit_eligibility1">{{__('Suitable')}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="credit_eligibility" id="credit_eligibility0" value="0" {{old('credit_eligibility', (isset($property) ? $property->credit_eligibility : null)) == 0? "checked" :""}} />
                                    <label class="form-check-label" for="credit_eligibility0">{{__('Not Suitable')}}</label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="d-block">{{__('interchange')}}:</label>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="interchange" id="interchange1" value="1" {{old('interchange', (isset($property) ? $property->interchange : null)) == 1? "checked" :""}} />
                                    <label class="form-check-label" for="interchange1">{{__('yes')}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="interchange" id="interchange0" value="0" {{old('interchange', (isset($property) ? $property->interchange : null)) == 0? "checked" :""}} />
                                    <label class="form-check-label" for="interchange0">{{__('no')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-auto">
                            <div class="pt-3 col-md-6 d-flex justify-content-around justify-content-sm-start">
                                <button type="button" onclick="$(this).parents('form').append('<input type=\'hidden\' name=\'toList\' value=\'1\'>').submit()" class="mx-1 btn btn-primary">{{isset($property)? __('update'):__('add')}}</button>
                                <button type="submit" class="mx-1 btn btn-primary">{{__('save')}}</button>
                            </div>
                            <div class="pt-3 col-md-6 d-flex justify-content-around justify-content-sm-end">
                                <button type="reset" class="mx-1 btn btn-label-secondary">{{__('reset')}}</button>
                                <a href="{{route('properties')}}" class="mx-1 btn btn-label-secondary">{{__('cancel')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label ">{{__("housing type")}}</label>
                        <select  name="housing_type" class="form-select" aria-label="">
                            <option value="">--</option>
                            @foreach($housingType as $type)
                            <option value="{{$type->id}}" {{old('housing_type') != null? (old('housing_type') == $type->id ? "selected": "") :  (isset($property)? ($property->housing_type_id  == $type->id ? 'selected' : "") :'')}}>{{__($type->title)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label ">{{__("heating type")}}</label>
                        <select  name="heating_type" class="form-select" aria-label="">
                            <option value="">--</option>
                            @foreach($heatingType as $type)
                            <option value="{{$type->id}}" {{old('heating_type') != null? (old('heating_type') == $type->id ? "selected": "") :  (isset($property)? ($property->heating_type_id  == $type->id ? 'selected' : "") :'')}}>{{__($type->title)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label ">{{__("building age")}}</label>
                        <select  name="building_age" class="form-select" aria-label="">
                            <option value="">--</option>
                            @foreach($buildingAge as $age)
                            <option value="{{$age->id}}" {{old('building_age') != null? (old('building_age') == $age->id ? "selected": "") :  (isset($property)? ($property->building_age_id  == $age->id ? 'selected' : "") :'')}}>{{__($age->title)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label ">{{__("user status")}}</label>
                        <select  name="user_status" class="form-select" aria-label="">
                            <option value="">--</option>
                            @foreach($userStatus as $status)
                            <option value="{{$status->id}}" {{old('user_status') != null? (old('user_status') == $status->id ? "selected": "") :  (isset($property)? ($property->user_status_id  == $status->id ? 'selected' : "") :'')}}>{{__($status->title)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="rent_deposit">{{__('rent deposit')}}</label>
                        <input type="number" value="{{old('rent_deposit') ?? (isset($property)? $property->rent_deposit : '')}}" name="rent_deposit" id="rent_deposit" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="property-rental_income">{{__('rental income')}}</label>
                        <input type="number" value="{{old('rental_income') ?? (isset($property)? $property->rental_income : '')}}" name="rental_income" id="property-rental_income" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="property-dues">{{__('dues')}}</label>
                        <input type="number" value="{{old('dues') ?? (isset($property)? $property->dues : '')}}" name="dues" id="property-dues" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label " for="property-net_area">{{__('net area')}}</label>
                        <input  type="number" value="{{old('net_area') ?? (isset($property)? $property->net_area : '')}}" name="net_area" id="property-net_area" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label " for="property-gross_area">{{__('gross area')}}</label>
                        <input type="number"  value="{{old('gross_area') ?? (isset($property)? $property->gross_area : '')}}" name="gross_area" id="property-gross_area" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label " for="property-living_rooms_no">{{__('living rooms no')}}</label>
                        <input  type="number" value="{{old('living_rooms_no') ?? (isset($property)? $property->living_rooms_no : '')}}" name="living_rooms_no" id="property-living_rooms_no" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label " for="property-bedrooms_no">{{__('bedrooms no')}}</label>
                        <input  type="number" value="{{old('bedrooms_no') ?? (isset($property)? $property->bedrooms_no : '')}}" name="bedrooms_no" id="property-bedrooms_no" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label " for="property-bathrooms_no">{{__('bathrooms no')}}</label>
                        <input  type="number" value="{{old('bathrooms_no') ?? (isset($property)? $property->bathrooms_no : '')}}" name="bathrooms_no" id="property-bathrooms_no" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label " for="property-building_floors">{{__('building floors')}}</label>
                        <input  type="number" value="{{old('building_floors') ?? (isset($property)? $property->building_floors : '')}}" name="building_floors" id="property-building_floors" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label " for="property-floor_number">{{__('floor number')}}</label>
                        <input  type="number" value="{{old('floor_number') ?? (isset($property)? $property->floor_number : '')}}" name="floor_number" id="property-floor_number" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label required">{{__("city")}}</label>
                        <select required name="city_id" class="form-select" aria-label="">
                            <option value="">--</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}" {{old('city_id') != null? (old('city_id') == $city->id ? "selected": "") :  (isset($property)? ($property->city_id  == $city->id ? 'selected' : "") :'')}}>{{__($city->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h4>{{__('features')}}</h4>
                <div class="row mt-4">
                    @foreach($features as $group => $featureGroup)
                    @if($group != 0)
                    <hr class="mt-2">
                    <h6>
                        {{strtoupper($group)}}
                    </h6>
                    @endif
                    @foreach($featureGroup as $feature)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" name="features[]" value="{{$feature->id}}" id="property-feature-{{$feature->id}}" {{in_array($feature->id, ((old('features') != null) ? old('features') : (isset($property)? $property->features?->pluck('id')->toArray() : [])))? "checked" :""}} />
                            <label class="form-check-label mx-2 text-capitalize" for="property-feature-{{$feature->id}}">{{$feature->title}}</label>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h4>{{__('address')}}</h4>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div id="map" style="height: 400px; width: 100%;"></div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label required" for="property-country">{{__('country')}}</label>
                        <input required type="text" value="{{old('country') ?? (isset($property)? $property->address?->country : '')}}" name="country" id="property-country" class="form-control" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label required" for="property-province">{{__('province')}}</label>
                        <input required type="text" value="{{old('province') ?? (isset($property)? $property->address?->province : '')}}" name="province" id="property-province" class="form-control" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label required" for="property-city">{{__('city')}}</label>
                        <input required type="text" value="{{old('city') ?? (isset($property)? $property->address?->city : '')}}" name="city" id="property-city" class="form-control" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label required" for="property-district">{{__('district')}}</label>
                        <input required type="text" value="{{old('district') ?? (isset($property)? $property->address?->district : '')}}" name="district" id="property-district" class="form-control" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label required" for="property-postal_code">{{__('postal code')}}</label>
                        <input required type="text" value="{{old('postal_code') ?? (isset($property)? $property->address?->postal_code : '')}}" name="postal_code" id="property-postal_code" class="form-control" />
                    </div>
                    <div class="col-md-9 mb-3">
                        <label class="form-label required" for="property-map_address">{{__('address')}}</label>
                        <textarea required class="form-control" name="address" id="property-map_address" rows="1">{{old('address') ?? (isset($property)? $property->address?->address : '')}}</textarea>
                        <input type="hidden" value="{{(old('geodata') != null? json_encode(old('geodata')) : null ) ?? (isset($property)? json_encode($property->address?->geo ): '')}}" name="geodata" id="property-geodata" class="form-control" />
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h4>{{__('photos')}}</h4>
                <div action="/upload" class="dropzone needsclick" id="dropzone-multi">
                    <div class="dz-message needsclick">
                        {{__('Drop files here to upload')}}
                        <span class="note needsclick">{{__('You can also click to open file browser')}}</span>
                    </div>
                    <div class="fallback">
                        <input name="photos" type="file" accept="image/*" />
                    </div>
                </div>
            </div>
            @if(isset($property))
            <div class="card-body">
                @if($property->media?->toArray())
                @foreach($property->media as $image)
                <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                    <div class="dz-details">
                        <div class="dz-thumbnail">
                            <img data-dz-thumbnail="" alt="" src="{{ url($image->getUrl())}}" />
                        </div>
                    </div>
                    <a class="dz-remove" href="{{route('media.delete', [$image->id])}}" data-dz-remove="">{{__('Remove file')}}</a>
                </div>
                @endforeach
                @endif
            </div>
            @endif
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="pt-4 pt-sm-0 col-sm-6 d-flex justify-content-around justify-content-sm-start">
                        <button type="button" onclick="$(this).parents('form').append('<input type=\'hidden\' name=\'toList\' value=\'1\'>').submit()" class="mx-1 btn btn-primary">{{isset($property)? __('update'):__('add')}}</button>
                        <button type="submit" id="submit-button" class="mx-1 btn btn-primary">{{__('save')}}</button>
                    </div>
                    <div class="pt-4 pt-sm-0 col-sm-6 d-flex justify-content-around justify-content-sm-end">
                        <button type="reset" class="mx-1 btn btn-label-secondary">{{__('reset')}}</button>
                        <a href="{{route('properties')}}" class="mx-1 btn btn-label-secondary">{{__('cancel')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div id="initial-coordinations" data-has-address="{{isset($property->address)}}" data-lat="{{(isset($property)? $property->address?->latitude : '')}}" data-lng="{{(isset($property)? $property->address?->longitude : '')}}"></div>
@endsection


@push('scripts')
<script src="{{url('dashboard')}}/assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
<script src="{{url('dashboard')}}/assets/vendor/libs/dropzone/dropzone.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX8XoECKD0-gnAaah67gR4akbUodB_8Ww&callback=initMap&v=weekly" defer></script>
<script>
    const previewTemplate = `<x-dashboard.ui.dropzone-preview-template />`;
    const dropzone = new Dropzone('#dropzone-multi', {
        previewTemplate: previewTemplate,
        parallelUploads: 1,
        maxFilesize: 2,
        addRemoveLinks: true,
        acceptedFiles: "image/*",
        dictFallbackMessage: "{{__('Your browser does not support drag\'n\'drop file uploads.')}}",
        dictDefaultMessage: "{{__('Drop files here to upload')}}",
        dictFallbackText: "{{__('Please use the fallback form below to upload your files like in the olden days.')}}",
        dictFileTooBig: "{{__('File is too big (\{\{filesize\}\}MiB). Max filesize: \{\{maxFilesize\}\}MiB.')}}",
        dictInvalidFileType: "{{__('You can\'t upload files of this type.')}}",
        dictResponseError: "{{__('Server responded with \{\{statusCode\}\} code.')}}",
        dictCancelUpload: "{{__('Cancel upload')}}",
        dictCancelUploadConfirmation: "{{__('Are you sure you want to cancel this upload?')}}",
        dictRemoveFile: "{{__('Remove file')}}",
        dictMaxFilesExceeded: "{{__('You can not upload any more files.')}}",
    });
    dropzone.on("addedfiles", () => {
        // Input node with selected files. It will be removed from document shortly in order to
        // give user ability to choose another set of files.
        var input = dropzone.hiddenFileInput;
        // Append it to form after stack become empty, because if you append it earlier
        // it will be removed from its parent node by Dropzone.js.
        setTimeout(() => {
            // myForm - is form node that you want to submit.
            $('form').append(input);
            // Set some unique name in order to submit data.
            input.name = "photos[]";
        }, 0);
    });


    $('.translation-repeater, .repeater-default').repeater({
        initEmpty: false,
        show: function() {
            var maxLimitCount = $(this).parents(".translation-repeater").data("max-limit");
            var itemCount = $(this).parents(".translation-repeater").find("div[data-repeater-item]").length;

            if (maxLimitCount) {
                if (itemCount <= maxLimitCount) {
                    $(this).slideDown();
                    if (itemCount == maxLimitCount) {
                        hideRepeaterButton()
                        showRepeaterDeleteButton()
                    }
                } else {
                    $(this).remove();
                }
            } else {
                $(this).slideDown();
            }

            if (itemCount >= maxLimitCount) {
                $(".translation-repeater input[data-repeater-create]").hide("slow");
            }

            if (itemCount > 1) {
                showRepeaterDeleteButton();
            }

        },
        hide: function(deleteElement) {
            var maxLimitCount = $(this).parents(".translation-repeater").data("max-limit");
            var minLimitCount = $(this).parents(".translation-repeater").data("min-limit");
            var itemCount = $(this).parents(".translation-repeater").find("div[data-repeater-item]").length;

            if (minLimitCount < itemCount && confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);

            }
            if (itemCount <= maxLimitCount) {
                // $(".translation-repeater input[data-repeater-create]").show("slow");
                showRepeaterButton();
            }

            if (itemCount <= 2) {
                hideRepeaterDeleteButton();
            }
        }
    });

    if ($(".translation-repeater").find("div[data-repeater-item]").length <= 1) {
        hideRepeaterDeleteButton();
    } else {
        showRepeaterDeleteButton();
    }


    function hideRepeaterButton() {
        $("#title-add-repeater-button").slideUp("", () => $("#title-add-repeater-button").addClass('d-none'));
    }

    function showRepeaterButton() {
        if ($("#title-add-repeater-button").hasClass('d-none')) {
            $("#title-add-repeater-button").removeClass('d-none');
            $("#title-add-repeater-button").slideDown("slow");
        }
    }

    function hideRepeaterDeleteButton() {
        $("button[data-repeater-delete]").slideUp("", () => $("button[data-repeater-delete]").addClass('d-none'));
    }

    function showRepeaterDeleteButton() {
        if ($("button[data-repeater-delete]").hasClass('d-none')) {
            $("button[data-repeater-delete]").removeClass('d-none');
            $("button[data-repeater-delete]").slideDown("fast");
        }
    }

    // Initialize and add the map
    function initMap() {
        geocoder = new google.maps.Geocoder();
        const initialMarkerPosition = $("#initial-coordinations").data('has-address') == true ? {
            lat: parseFloat($("#initial-coordinations").data('lat')),
            lng: parseFloat($("#initial-coordinations").data('lng'))
        } : null
        // The location of Uluru
        const uluru = {
            lat: 38.96574162457226,
            lng: 35.425172145301794
        };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: initialMarkerPosition != null ? 14 : 6,
            center: initialMarkerPosition != null ? initialMarkerPosition : uluru,
        });
        // The marker, positioned at Uluru
        marker = new google.maps.Marker({
            position: initialMarkerPosition,
            map: map,
        });


        map.addListener("click", (mapsMouseEvent) => {
            console.log(JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2));
            var newCord = mapsMouseEvent.latLng.toJSON();
            if (map.getZoom() < 10) {
                map.setZoom(10);
            }
            map.setCenter(mapsMouseEvent.latLng.toJSON());
            marker.setPosition(newCord);

            geocode({
                location: mapsMouseEvent.latLng
            });
        });

        function clear() {
            marker.setMap(null);
        }

        function geocode(request) {
            clear();
            geocoder
                .geocode(request)
                .then((result) => {
                    const {
                        results
                    } = result;

                    marker.setPosition(results[0].geometry.location);

                    marker.setMap(map);
                    // console.log(JSON.stringify(result, null, 2));
                    console.log((result));
                    setLocationData(results);
                    return results;
                })
                .catch((e) => {
                    alert("Geocode was not successful for the following reason: " + e);
                });
        }
    }
    window.initMap = initMap;


    function setLocationData(data) {
        var address = data[0];
        var formattedAddress = data[0].formatted_address;
        $('#map_address').val(formattedAddress);
        $('#property-map_address').val(formattedAddress);
        var country = $('#property-country');
        var province = $('#property-province');
        var city = $('#property-city');
        var district = $('#property-district');
        var postalCode = $('#property-postal_code');
        var geodata = $('#property-geodata');
        geodata.val(JSON.stringify(data, null, 2));


        data[0].address_components.forEach(address_component => {
            // console.log(address_component);
            if (address_component.types.includes('country')) {
                country.val(address_component.long_name);
            }
            if (address_component.types.includes('administrative_area_level_1')) {
                province.val(address_component.long_name);
            }
            if (address_component.types.includes('administrative_area_level_2')) {
                city.val(address_component.long_name);
            }
            if (address_component.types.includes('administrative_area_level_3')) {
                district.val(address_component.long_name);
            }
            if (address_component.types.includes('administrative_area_level_4')) {
                district.val(address_component.long_name);
            }
            if (address_component.types.includes('postal_code')) {
                postalCode.val(address_component.long_name);
            }
        });
    }
</script>
@endpush
@push('scripts')
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/dropzone/dropzone.css" />
@endpush
