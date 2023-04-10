@extends('frontpage.layouts.index')
@section('title', 'Properties')

@section('content')


<!-- Listing Grid View -->
<section class="our-listing bgc-f7 pb30-991">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="listing_sidebar dn db-991">
                    <div class="sidebar_content_details style3">
                        <div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0 p-0" style="max-height: 960px; padding-bottom: 300px !important;">
                            <x-frontpage.ui.properties-list-filter :buildingAge="$buildingAge" :features="$features" :propertyType="$propertyType" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="breadcrumb_content style2 mb0-991">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active text-thm" aria-current="page">{{__('properties')}}</li>
                    </ol>
                    <h2 class="breadcrumb_title">{{__('properties')}}</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="listing_list_style mb20-xsd tal-991">
                    <ul class="mb0">
                        <li style="visibility: hidden;" class=""></li>
                    </ul>
                </div>
                <div class="dn db-991 mt30 mb0">
                    <div id="main2">
                        <span id="open2" class="flaticon-filter-results-button filter_open_btn style2"> {{__('Show Filter')}}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="sidebar_listing_grid1 dn-991">

                    <x-frontpage.ui.properties-list-filter :buildingAge="$buildingAge" :features="$features" :propertyType="$propertyType" />
                    <x-frontpage.ui.featured-properties :properties="$featuredProperties" />

                    <x-frontpage.ui.sidebar-categories :categories="$categories" />
                </div>
            </div>
            <div class="col-md-12 col-lg-8">

                <form method="get" id="sortForm">
                    @csrf
                    @foreach(request()->all() as $key => $value)
                    @if(!is_array($value) && $value)
                    <input type="hidden" name="{{$key}}" value="{{$value}}">
                    @endif
                    @endforeach
                    <div class="row">
                        <div class="grid_list_search_result">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
                                <div class="left_area tac-xsd">
                                    <p>{{__(':results Search results', ['results' => $properties->total()])}}</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-7">
                                <div class="right_area text-right tac-xsd">
                                    <ul>
                                        <li class="list-inline-item">
                                            <span class="shrtby">{{__('Sort by:')}}</span>
                                            <select class="selectpicker show-tick" name="sortBy" onchange="$('#sortForm').submit()">
                                                <option value="0" class="w-100">--</option>
                                                <option value="1" {{request()->sortBy == 1 ? 'selected' : ''}} class="w-100">{{__('price (low price first)')}}</option>
                                                <option value="2" {{request()->sortBy == 2 ? 'selected' : ''}} class="w-100">{{__('price (heigh price first)')}}</option>
                                                <option value="3" {{request()->sortBy == 3 ? 'selected' : ''}} class="w-100">{{__('date (newer first)')}}</option>
                                                <option value="4" {{request()->sortBy == 4 ? 'selected' : ''}} class="w-100">{{__('date (older first)')}}</option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    @foreach($properties->items() as $property)
                    <div class="col-md-6 col-lg-6">
                        <div class="feat_property home7 style4" onclick="window.location = `{{route('home.property', [$property->id])}}`">
                            <div class="thumb">
                                <div class="fp_single_item_slider">
                                    @if($property->media?->toArray())
                                    @php $i=0 @endphp
                                    @foreach($property->media as $image)
                                    <div class="item">
                                        <img style="height: 230px" class="img-whp lazy" data-src="{{ url($image->getUrl())}}">
                                    </div>
                                    @php if($i++ >=3) break; @endphp
                                    @endforeach
                                    @else
                                    <div class="item">
                                        <img style="height: 230px" class="img-whp lazy" data-src="{{url('assets/frontpage/images/properties/480x300.jpg')}}">
                                    </div>
                                    @endif
                                </div>
                                <div class="thmb_cntnt style2">
                                    <ul class="tag mb0">
                                        <li class="list-inline-item color-whitef4">{{$property->propertyType?->title}}</li>
                                        @if($property->is_featured == 1)
                                        <li class="list-inline-item"><a href="#">{{__('featured')}}</a></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="thmb_cntnt style3 color-whitef4">
                                    ₺{{number_format($property->price_tl, 2, ',', '.')}}
                                </div>
                            </div>
                            <div class="details">
                                <div class="tc_content">
                                    <p class="text-thm">{{$property->housingType->title}}</p>
                                    <h4>{{$property->title}}</h4>
                                    <p><span class="flaticon-placeholder">{{$property->address?->address}}</span></p>
                                    <ul class="prop_details mb0">
                                        <li class="list-inline-item"><a href="">{{__('Beds')}}: {{ $property->bedrooms_no}}</a></li>
                                        <li class="list-inline-item"><a href="">{{__('Baths')}}: {{ $property->bathrooms_no}}</a></li>
                                        <li class="list-inline-item"><a href="">{{__('Square')}} m<sup>2</sup>: {{$property->gross_area}}</a></li>
                                    </ul>
                                </div>
                                <div class="fp_footer">
                                    <ul class="fp_meta float-left mb0">
                                        <li class="list-inline-item"><a href=""><img style="height: 40px; width: 40px; object-fit: cover;" src="{{ $property->agent->photo != null ? (Storage::url($property->agent->photo)) : url('assets/frontpage/images/agents/av-man.png')}}" alt=""></a></li>
                                        <li class="list-inline-item"><a href="">{{$property->agent->name}} {{$property->agent->surname}}</a></li>
                                    </ul>
                                    <div class="fp_pdate float-right">{{$property->created_at?->diffForHumans()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-lg-12 mt20">
                        <x-frontpage.ui.paginator :pagination="$properties" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('style')
<style>
    header.header-nav.menu_style_home_one .ace-responsive-menu li a {
        color: #777777;
    }

    header.header-nav.menu_style_home_one a.navbar_brand span,
    header.header-nav.menu_style_home_three a.navbar_brand span,
    header.header-nav.menu_style_home_five a.navbar_brand span {
        color: #777777;
    }
</style>
@endpush
