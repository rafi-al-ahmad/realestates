@extends('frontpage.layouts.index')
@section('content')

<div class="single_page_listing_style" style="width: 96.6%;">
    <div class="container-fluid p0">
        <div class="row">
            <div class="col-sm-6 col-lg-6 p0">
                <div class="row m0">
                    <div class="col-lg-12 p0">
                        <div class="spls_style_one pr1 1px">
                            <img class="img-fluid w100 lazy" data-src="{{isset($property->media[0]) ? $property->media[0]?->getUrl() : url('assets/frontpage/images/properties/959x600.jpg')}}" alt="959x600.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 p0">
                <div class="row m0">
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="spls_style_one">
                            <a class="popup-img" href="{{isset($property->media[1]) ? $property->media[1]?->getUrl() : url('assets/frontpage/images/properties/480x300.jpg')}}"><img class="img-fluid w100 lazy" data-src="{{isset($property->media[1]) ? $property->media[1]?->getUrl() : url('assets/frontpage/images/properties/480x300.jpg')}}" alt="ls2.jpg"></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="spls_style_one">
                            <a class="popup-img" href="{{isset($property->media[2]) ? $property->media[2]?->getUrl() : url('assets/frontpage/images/properties/480x300.jpg')}}"><img class="img-fluid w100 lazy" data-src="{{isset($property->media[2]) ? $property->media[2]?->getUrl() : url('assets/frontpage/images/properties/480x300.jpg')}}" alt="ls3.jpg"></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="spls_style_one">
                            <a class="popup-img" href="{{isset($property->media[3]) ? $property->media[3]?->getUrl() : url('assets/frontpage/images/properties/480x300.jpg')}}"><img class="img-fluid w100 lazy" data-src="{{isset($property->media[3]) ? $property->media[3]?->getUrl() : url('assets/frontpage/images/properties/480x300.jpg')}}" alt="ls4.jpg"></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="spls_style_one">
                            <a class="popup-img" href="{{isset($property->media[4]) ? $property->media[4]?->getUrl() : url('assets/frontpage/images/properties/480x300.jpg')}}"><img class="img-fluid w100 lazy" data-src="{{isset($property->media[4]) ? $property->media[4]?->getUrl() : url('assets/frontpage/images/properties/480x300.jpg')}}" alt="ls5.jpg"></a>
                        </div>
                    </div>
                    @for($i = 5; $i < count($property->media); $i++)
                        <a class="popup-img" href="{{isset($property->media[$i]) ? $property->media[$i]?->getUrl() : url('assets/frontpage/images/properties/480x300.jpg')}}"></a>
                        @endfor
                </div>
            </div>
        </div>
    </div>
</div>
<section class="p0">
    <div class="container">
        <div class="row listing_single_row">
            <div class="col-sm-6 col-lg-7 col-xl-8">
                <div class="single_property_title">
                    <a href="{{isset($property->media[0]) ? $property->media[0]?->getUrl() : url('assets/frontpage/images/properties/959x600.jpg')}}" class="upload_btn popup-img"><span class="flaticon-photo-camera"></span> {{__('View Photos')}}</a>
                </div>
            </div>
            <!-- <div class="col-sm-6 col-lg-5 col-xl-4">
                <div class="single_property_social_share">
                    <div class="spss style2 mt10 text-right tal-400">
                        <ul class="mb0">
                            <li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="flaticon-share"></span></a></li>
                            <li class="list-inline-item"><a href="#"><span class="flaticon-printer"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- Agent Single Grid View -->
<section class="our-agent-single bgc-f7 pb30-991">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mt50">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="listing_single_description2 mt30-767 mb30-767">
                            <div class="single_property_title">
                                <h2>{{$property->title}}</h2>
                                <p>{{$property->address?->address}}</p>
                            </div>
                            <div class="single_property_social_share style2 ml-4">
                                <div class="price">
                                    <h2>₺{{number_format($property->price_tl, 2, ',', '.')}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="listing_single_description style2">
                            <div class="lsd_list">
                                <ul class="mb0">
                                    <li class="list-inline-item"><a href="">{{$property->propertyType->title}}</a></li>
                                    <li class="list-inline-item"><a href="">{{__('Beds')}}: {{ $property->bedrooms_no}}</a></li>
                                    <li class="list-inline-item"><a href="">{{__('Baths')}}: {{ $property->bathrooms_no}}</a></li>
                                    <li class="list-inline-item"><a href="">{{__('Square')}} m<sup>2</sup>: {{$property->gross_area}}</a></li>
                                </ul>
                            </div>
                            <h4 class="mb30">{{__('Description')}}</h4>
                            <p class="mb25">{{$property->description}}</p>
                            <!-- <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <p class="mt10 mb10">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
                                    <p class="mt10 mb10">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
                                </div>
                            </div>
                            <p class="overlay_close">
                                <a class="text-thm fz14" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Show More <span class="flaticon-download-1 fz12"></span>
                                </a>
                            </p> -->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="additional_details">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb15">{{__('Property Details')}}</h4>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <ul class="list-inline-item">
                                        <li>
                                            <p>{{__('Property ID')}} :</p>
                                        </li>
                                        <li>
                                            <p>{{__('Price')}} :</p>
                                        </li>
                                        <li>
                                            <p>{{__('Property Size')}} :</p>
                                        </li>
                                        <li>
                                            <p>{{__('building age')}} :</p>
                                        </li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li>
                                            <p><span>{{$property->id}}</span></p>
                                        </li>
                                        <li>
                                            <p><span>₺{{number_format($property->price_tl, 2, ',', '.')}}</span></p>
                                        </li>
                                        <li>
                                            <p><span>{{$property->gross_area}}</span></p>
                                        </li>
                                        <li>
                                            <p><span>{{$property->buildingAge?->title}}</span></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <ul class="list-inline-item">
                                        <li>
                                            <p>{{__('Bedrooms')}} :</p>
                                        </li>
                                        <li>
                                            <p>{{__('Bathrooms')}} :</p>
                                        </li>
                                        <li>
                                            <p>{{__('Living Rooms')}} :</p>
                                        </li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li>
                                            <p><span>{{$property->bedrooms_no}}</span></p>
                                        </li>
                                        <li>
                                            <p><span>{{$property->bathrooms_no}}</span></p>
                                        </li>
                                        <li>
                                            <p><span>{{$property->living_rooms_no}}</span></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <ul class="list-inline-item">
                                        <li>
                                            <p>{{__('housing type')}} :</p>
                                        </li>
                                        <li>
                                            <p>{{__('Property Status')}} :</p>
                                        </li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li>
                                            <p><span>{{$property->housingType?->title}}</span></p>
                                        </li>
                                        <li>
                                            <p><span>{{$property->propertyType?->title}}</span></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="additional_details">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb15">{{__('Additional details')}}</h4>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <ul class="list-inline-item">
                                        <li>
                                            <p>Deposit :</p>
                                        </li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li>
                                            <p><span>{{$property->rent_deposit}}</span></p>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="col-md-6 col-lg-6">
                                    <ul class="list-inline-item">
                                        <li>
                                            <p>Last remodel year :</p>
                                        </li>
                                        <li>
                                            <p>Amenities :</p>
                                        </li>
                                        <li>
                                            <p>Equipment :</p>
                                        </li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li>
                                            <p><span>1987</span></p>
                                        </li>
                                        <li>
                                            <p><span>Clubhouse</span></p>
                                        </li>
                                        <li>
                                            <p><span>Grill - Gas</span></p>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-12">
                        <div class="property_attachment_area">
                            <h4 class="mb30">Property Attachments</h4>
                            <div class="iba_container style2">
                                <div class="icon_box_area style2">
                                    <div class="score"><span class="flaticon-document text-thm fz30"></span></div>
                                    <div class="details">
                                        <h5><span class="flaticon-download text-thm pr10"></span> Demo Word Document</h5>
                                    </div>
                                </div>
                                <div class="icon_box_area style2">
                                    <div class="score"><span class="flaticon-pdf text-thm fz30"></span></div>
                                    <div class="details">
                                        <h5><span class="flaticon-download text-thm pr10"></span> Demo pdf Document</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="application_statics mt30">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb-4">{{__('Features')}}</h4>
                                </div>
                                @foreach($features as $group => $featureGroup)
                                @if($group != 0)
                                <div class="col-12">
                                    <hr class="mt-2">
                                    <h6>
                                        {{strtoupper($group)}}
                                    </h6>
                                </div>
                                @endif
                                @foreach($featureGroup as $feature)

                                <ul class="order_list list-inline-item mx-0 col-sm-6 col-md-6 col-lg-4">
                                    <li><a><span class="flaticon-tick"></span>{{$feature->title}}</a></li>
                                </ul>
                                @endforeach
                                @endforeach
                                <!-- <ul class="order_list list-inline-item col-sm-6 col-md-6 col-lg-4">
                                    @foreach($property->features as $feature)
                                        <li><a><span class="flaticon-tick"></span>{{$feature->title}}</a></li>
                                    @endforeach
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="application_statics mt30">
                            <h4 class="mb30">{{__('Location')}} <small class="float-right">{{$property->address?->address}}</small></h4>
                            <div class="property_video p0">
                                <div class="thumb">
                                    <div class="col-12 mb-3">
                                        <div id="map" style="height: 400px; width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4 mt50">
                <div class="sidebar_listing_list">
                    <div class="sidebar_advanced_search_widget">
                        <div class="sl_creator">
                            <h4 class="mb25">{{__('Listed By')}}</h4>
                            <div class="media">
                                <img class="mr-3 lazy" style="height: 90px; width: 90px;" data-src="{{$property->agent->photo != null ? (Storage::url($property->agent->photo)) : url('assets/frontpage/images/agents/av-man.png')}}" alt="{{__('agent image')}}">
                                <div class="media-body">
                                    <h5 class="mt-0 mb0">{{$property->agent?->name}} {{$property->agent?->surname}}</h5>
                                    <p class="mb0">{{$property->agent?->mobile_phone}}</p>
                                    <p class="mb0">{{$property->agent?->email}}</p>
                                    <a class="text-thm" href="{{route('home.filter', ['agent_id' => $property->agent?->id ])}}">{{__('View My Listing')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-frontpage.ui.properties-list-filter :buildingAge="$buildingAge" :features="$features" :propertyType="$propertyType" />

                <x-frontpage.ui.featured-properties :properties="$featuredProperties" />

                <x-frontpage.ui.sidebar-categories :categories="$categories" />

            </div>
        </div>
    </div>
</section>
<div id="initial-coordinations" data-has-address="{{isset($property->address)}}" data-lat="{{(isset($property)? $property->address?->latitude : '')}}" data-lng="{{(isset($property)? $property->address?->longitude : '')}}"></div>


@endsection
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX8XoECKD0-gnAaah67gR4akbUodB_8Ww&callback=initMap&v=weekly" defer></script>
<script>
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


        function clear() {
            marker.setMap(null);
        }
    }
    window.initMap = initMap;
</script>
@endpush
@push('style')
<style>
    header.header-nav.menu_style_home_one .ace-responsive-menu li a {
        color: #484848;
    }

    header.header-nav.menu_style_home_one a.navbar_brand span,
    header.header-nav.menu_style_home_three a.navbar_brand span,
    header.header-nav.menu_style_home_five a.navbar_brand span {
        color: #484848;
    }

    .single_property_social_share.style2 {
        position: initial;
    }
</style>
@endpush
