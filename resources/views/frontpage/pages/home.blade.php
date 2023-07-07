@extends('frontpage.layouts.index')
@section('title', 'Home')
@push('seo')
<!-- Primary Meta Tags -->
<title>Home | Beynil</title>
<meta name="title" content="Home | Beynil">
<meta name="description" content="Beynil is a reliable and prestigious real estate agency established to meet the needs of people such as houses, land, shops, offices, and also to provide consultancy to those who want to evaluate their real estate profitably.">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{url('/')}}">
<meta property="og:title" content="Home | Beynil">
<meta property="og:description" content="Beynil is a reliable and prestigious real estate agency established to meet the needs of people such as houses, land, shops, offices, and also to provide consultancy to those who want to evaluate their real estate profitably.">
<meta property="og:image" content="{{url('assets/frontpage/images/logo/logo-image.jpg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{url('/')}}">
<meta property="twitter:title" content="Home | Beynil">
<meta property="twitter:description" content="Beynil is a reliable and prestigious real estate agency established to meet the needs of people such as houses, land, shops, offices, and also to provide consultancy to those who want to evaluate their real estate profitably.">
<meta property="twitter:image" content="{{url('assets/frontpage/images/logo/logo-image.jpg')}}">
@endpush
@section('content')

<!-- Home Design -->
<section class="home-one home5-overlay home5_bgi5 parallax" data-stellar-background-ratio="1.5">
    <div class="container">
        <div class="row posr">
            <div class="col-lg-7">
                <div class="home_content home5">
                    <div class="home-text home5">
                        <h2 class="fz55">{{__('Invest and move to Bursa')}}</h2>
                        <p class="discounts_para fz18 color-white">{{__('Live, work and experience amazing life in Turkey. Investing in Turkey provides significant advantages so let us explain more about them.')}}</p>
                        <h4>{{__('What are you looking for?')}}</h4>
                        <ul class="mb0">
                            <li class="list-inline-item">
                                <div class="icon_home5">
                                    <div class="icon"><span class="flaticon-house"></span></div>
                                    <p>Modern Villa</p>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="icon_home5">
                                    <div class="icon"><span class="flaticon-house-1"></span></div>
                                    <p>Family House</p>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="icon_home5">
                                    <div class="icon"><span class="flaticon-house-2"></span></div>
                                    <p>Town House</p>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="icon_home5">
                                    <div class="icon"><span class="flaticon-building"></span></div>
                                    <p>Apartment</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="home_content home5 style2">
                    <div class="home1-advnc-search home5">
                        <form class="home5_advanced_search_form" action="{{route('home.filter')}}" method="GET">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="keyword" class="form-control" id="exampleInputName1" placeholder="{{__('Enter keyword...')}}">
                            </div>
                            <div class="form-group">
                                <div class="search_option_two">
                                    <div class="candidate_revew_select">
                                        <select class="selectpicker w100 show-tick" name="property_type">
                                            @foreach($propertyType as $type)
                                            <option value="{{$type->id}}" {{old('property_type') != null? (old('property_type') == $type->id ? "selected": "") :  (isset($property)? ($property->property_type_id  == $type->id ? 'selected' : "") :'')}}>{{__($type->title)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="search_option_two">
                                    <div class="candidate_revew_select">
                                        <select class="selectpicker w100 show-tick" name="housing_type">
                                            @foreach($housingType as $type)
                                            <option value="{{$type->id}}" {{old('housing_type') != null? (old('housing_type') == $type->id ? "selected": "") :  (isset($property)? ($property->housing_type_id  == $type->id ? 'selected' : "") :'')}}>{{__($type->title)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group df">
                                <input type="text" name="address" class="form-control" id="exampleInputEmail" placeholder="{{__('Country, City or district..')}}">
                                <label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
                            </div>
                            <div class="form-group d-flex">
                                <input type="number" name="min_price" class="form-control mr-1" id="min-price" placeholder="{{__('min price')}}">
                                <input type="number" name="max_price" class="form-control ml-1" id="max-price" placeholder="{{__('max price')}}">
                            </div>
                            <div class="form-group custome_fields_520">
                                <div class="navbered">
                                    <div class="mega-dropdown home5">
                                        <span id="show_advbtn" class="dropbtn">{{__('Advanced')}} <i class="flaticon-more pl10 flr-520"></i></span>
                                        <div class="dropdown-content h-auto">
                                            <div class="row p15">
                                                <div class="col-lg-12">
                                                    <h4 class="text-thm3">{{__('features')}}</h4>
                                                </div>
                                                @foreach($features as $group => $featureGroup)
                                                @if($group != 0)
                                                <div class="col-12 mt-3">
                                                    <h6>
                                                        {{strtoupper($group)}}
                                                    </h6>
                                                </div>
                                                @endif
                                                @foreach($featureGroup as $feature)
                                                <div class="col-xxs-6 col-sm-6 col-lg-6 col-xl-6">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="features[]" value="{{$feature->id}}" class="custom-control-input" id="feature-{{$feature->id}}">
                                                        <label class="custom-control-label" for="feature-{{$feature->id}}">{{$feature->title}}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endforeach
                                            </div>
                                            <div class="row p15 pt0-xsd mt-2">
                                                <div class="col-xl-12">
                                                    <ul class="apeartment_area_list home5 mt-0">
                                                        <li class="list-inline-item mb10">
                                                            <div class="candidate_revew_select">
                                                                <select name="bathrooms" class="selectpicker w100 show-tick">
                                                                    <option>{{__('Bathrooms')}}</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item mb10">
                                                            <div class="candidate_revew_select">
                                                                <select name="bedrooms" class="selectpicker w100 show-tick">
                                                                    <option>{{__('Bedrooms')}}</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item mb10">
                                                            <div class="candidate_revew_select">
                                                                <select name="living_rooms" class="selectpicker w100 show-tick">
                                                                    <option>{{__('Living Rooms')}}</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item mb10">
                                                            <div class="candidate_revew_select">
                                                                <select name="age" class="selectpicker w100 show-tick">
                                                                    <option>{{__('age')}}</option>
                                                                    @foreach($buildingAge as $age)
                                                                    <option value="{{$age->id}}" {{old('building_age') != null? (old('building_age') == $age->id ? "selected": "") :  (isset($property)? ($property->building_age_id  == $age->id ? 'selected' : "") :'')}}>{{__($age->title)}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="mega_dropdown_content_closer">
                                                        <h5 class="text-thm text-center mt15"><span id="hide_advbtn" class="curp">{{__('Hide')}}</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search_option_button home5">
                                <button type="submit" class="btn w-100 btn-block">{{__('Search')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get to Know Us More -->
<section id="" class="mt-md-0 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="position-relative h700 d-none-sm ">
                    <div class="position-absolute  w-35 h-50 top-left">
                        <img class="fit-cover  w-100 h-100 lazy" data-src="{{url('assets/frontpage/images/home/10.jpg')}}"></img>
                    </div>
                    <div class="position-absolute w-75 h-75 middle">
                        <img class="fit-cover w-100 h-100 lazy" data-src="{{url('assets/frontpage/images/home/11.jpg')}}"></img>
                    </div>
                    <div class="position-absolute w-35 h-50 bottom-right">
                        <img class="fit-cover w-100 h-100 lazy" data-src="{{url('assets/frontpage/images/home/12.jpg')}}"></img>
                    </div>
                    <div class="position-absolute w-100 h-25 bottom-right">
                        <div class="bg-white w-50 p-3 d-flex">
                            <div class="w-25 d-flex p-2">
                                <i class="fa-solid font-size-2 m-auto fa-circle-play" style="color: #013e6b "></i>
                            </div>
                            <div class="w-75 px-2 d-flex flex-column justify-content-around">
                                <h5 class="mb-0" style="color: #013e6b ">View House Tour</h5>
                                <a class="color-blue" style="font-size: .8rem;" href="https://www.youtube.com/watch?v=LNEh6MFRTz4">
                                    Watch video
                                    <i class="px-3 fa-solid fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex px-md-4 mt-sm-5 mt-md-0">
                <div class="main-title px-md-2 my-auto">
                    <h1 class="font-size-3 ">{{__('Get to Know Us More')}}</h1>
                    <p class="align-self-stretch mt-2 lh-25">{{__('Beynil Investment and Real Estate was established in order to follow up with all new real estate market information in Turkey, and allow you to smoothly start business, living in Turkey, and experience the amazing lifestyle that Turkey has to offer you.')}}</p>
                    <a href="{{route('home.aboutUs')}}" class="btn btn-lg btn-blue mt-4">{{__('Read More')}}</a>

                </div>
            </div>
        </div>
    </div>
</section>

@if(isset($citiesByProperties) && $citiesByProperties?->toArray())
<!-- Property cities -->
<section id="property-city" class="property-city">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                    <h2>{{__('Find Properties in These Cities')}}</h2>
                    <p>{{__("High-rise apartments, Penthouses for sale, Holiday Homes, Resort Properties and so much more to offer.")}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($citiesByProperties as $city)
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3" onclick="window.location = `{{route('home.filter', ['city_id' => $city->id])}}`">
                <div class="properti_city ">
                    <div class="thumb"><img style="height: 350px; object-fit: cover;" class="img-fluid w100 lazy" data-src="{{ ($city->image()) != null? ($city->image()?->getUrl()) : url('assets/frontpage/images/categories/city361x350.png')}}" alt="city361x350.png"></div>
                    <div class="overlay">
                        <div class="details">
                            <h4>{{$city->name}}</h4>
                            <p>{{__(':num properties' ,['num' => $city->properties_count])}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section id="" class="bg-blue">
    <div class="container">
        <div class="row px-3">
            <div class="col-xl-4 pr-4">
                <h2 class="color-whitef0 pb-1 fw400">{{__('Invest in Bursa, and here is WHY')}}</h2>
                <p class="color-white">{{__('With a long history of industry, sectoral diversity, close proximity to the market, international experience, dynamic young population, qualified labor force, Bursa always offers an ideal investment environment for domestic and foreign investors as the power of the Turkish economy.')}}</p>
                <div class="">
                    <div class="bg-light bg-white-34 pl-5 pl-2 py-3 br-15 row my-4">
                        <div class="col p-1">
                            <img width="48" height="49" class="lazy" data-src="{{url('assets/frontpage/images/home/intersection-1.png')}}"></img>
                        </div>
                        <div class="col mw-245">
                            <h4 class="color-whitef0 font-23px mb-0 fw400 ">{{__('Advanced Infrastructure')}}</h4>
                        </div>
                    </div>
                    <div class="bg-light bg-white-34 pl-5 pl-2 py-3 br-15 row my-4">
                        <div class="col p-1">
                            <img width="48" height="49" class="lazy" data-src="{{url('assets/frontpage/images/home/intersection-2.png')}}"></img>
                        </div>
                        <div class="col mw-245">
                            <h4 class="color-whitef0 font-23px mb-0 fw400 ">{{__('Attractive Investment Climate')}}</h4>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body py-4">
                        <form class="contact_form" id="contact_form" name="contact_form" action="{{route('home.contact')}}" method="post" novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="page" value="home-first">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label color-black fw900" for="subject">{{__('Inquiry Type')}}</label>
                                        <select name="subject" id="subject" required name="language" class="form-control form-select" aria-label="">
                                            <option value="">{{__('--')}}</option>
                                            <option value="I want to buy Apartment">{{__('I want to buy Apartment')}}</option>
                                            <option value="I want to buy House">{{__('I want to buy House')}}</option>
                                            <option value="I want to buy Plot">{{__('I want to buy Plot')}}</option>
                                            <option value="I want to buy Villa">{{__('I want to buy Villa')}}</option>
                                            <option value="I want to obtain Citizenship">{{__('I want to obtain Citizenship')}}</option>
                                            <option value="How to Purchase Property">{{__('How to Purchase Property')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label color-black fw900" for="subject">{{__('Information')}}</label>
                                        <input id="name" name="name" class="form-control" required type="text" placeholder="{{__('Name')}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="email" name="email" class="form-control required email" required type="email" placeholder="{{__('Email')}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="phone" name="phone" class="form-control required phone" required type="phone" placeholder="{{__('Phone')}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea id="message" name="message" class="form-control required" rows="3" required placeholder="{{__('Your Message')}}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mb0">
                                        <button type="submit" class="btn btn-lg btn-thm w-100">{{__('Send Message')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="bg-light bg-white-34 pl-5 pl-2 py-3 br-15 row my-4">
                    <div class="col p-1">
                        <img width="48" height="49" class="lazy" data-src="{{url('assets/frontpage/images/home/intersection-3.png')}}"></img>
                    </div>
                    <div class="col mw-245">
                        <h4 class="color-whitef0 font-23px mb-0 fw400 ">{{__('Strategic Geographic Location')}}</h4>
                    </div>
                </div>
                <div class="bg-light bg-white-34 pl-5 pl-2 py-3 br-15 row my-4">
                    <div class="col p-1">
                        <img width="48" height="49" class="lazy" data-src="{{url('assets/frontpage/images/home/intersection-4.png')}}"></img>
                    </div>
                    <div class="col mw-245">
                        <h4 class="color-whitef0 font-23px mb-0 fw400 ">{{__('Dynamic Entrepreneurs')}}</h4>
                    </div>
                </div>
                <h2 class="color-whitef0 pb-1 fw400">{{__('Why you should Move to Bursa')}}</h2>
                <p class="color-white">{{__('Bursa offers a relatively affordable cost of living compared to other cities in Turkey, making it an attractive option for those looking to save money or stretch their budget further. Bursa is a bustling city with a thriving economy and plenty of opportunities for entertainment, dining, and shopping.')}}</p>
            </div>
        </div>
    </div>
</section>

<section id="" class="mt-5">
    <div class="container ">
        <h3 class="font-size-2  font-size-lg-3 font-size-xl-4 pb-5 font-weight-bolder text-center text-capitalized plr-xl-6">{{__('Live, work and experience amazing life in Turkey.')}}</h3>
        <div class="row px-3">
            <div class="col-xl-6 d-flex flex-column justify-content-center order-2 order-xl-1 py-4">
                <h1 class=" my-4">{{__('Citizenship by Investment Overview')}}</h1>
                <h4 class="color-black66  my-4" style="line-height: inherit;">{{__('The Türkiye Citizenship by Investment Program allows investors to access both the European and Asian markets by making an investment into Türkiye’s economy.')}}</h4>
                <a href="{{route('home.citizenship')}}" class="  my-4 text-capitalized" style="color: #005fff">
                    {{__('learn more')}}
                    <i class="fa-solid fa-arrow-right px-2"></i>
                </a>
            </div>
            <div class="col-xl-6  order-xl-2 order-1 ">
                <img style="height: 350px; object-fit: contain;" class="img-fluid h-100 br-15 w100 lazy" data-src="{{ url('assets/frontpage/images/home/1.png')}}" alt="category361x350.png">
            </div>
        </div>
    </div>
</section>
@if(isset($categories) && $categories?->toArray())
<!-- Property categories -->
<section id="feature-property" class="feature-property">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>{{__('Find Properties in These Categories')}}</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            @php
            $wideCategoryDesign = true;
            $wideCategoryDesignStatus = 0;
            @endphp
            @foreach($categories as $category)
            @if($wideCategoryDesign)
            <div class="col-lg-4 col-xl-4" onclick="window.location = `{{route('home.filter', ['category_id' => $category->id])}}`">
                <div class="properti_city home5">
                    <div class="thumb"><img style="height: 350px; object-fit: cover;" class="img-fluid w100 lazy" data-src="{{ ($category->image()) != null? ($category->image()?->getUrl()) : url('assets/frontpage/images/categories/category361x350.png')}}" alt="category361x350.png"></div>
                    <div class="overlay">
                        <div class="details">
                            <div class="left">
                                <h4>{{$category->title}}</h4>
                            </div>
                            <p>{{__(':num properties' ,['num' => count($category->properties?->toArray() ?? [])])}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-8 col-xl-8" onclick="window.location = `{{route('home.filter', ['category_id' => $category->id])}}`">
                <div class="properti_city home5">
                    <div class="thumb"><img style="height: 350px; object-fit: cover;" class="img-fluid w100 lazy" data-src="{{ ($category->image()) != null? ($category->image()?->getUrl()) : url('assets/frontpage/images/categories/categories-default748x350.png')}}" alt="categories-default748x350.png"></div>
                    <div class="overlay">
                        <div class="details">
                            <div class="left">
                                <h4>{{$category->title}}</h4>
                            </div>
                            <p>{{__(':num properties' ,['num' => count($category->properties?->toArray() ?? [])])}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @php
            if($wideCategoryDesignStatus == 0){
            $wideCategoryDesign = !$wideCategoryDesign;
            }
            if($wideCategoryDesignStatus == 2){
            $wideCategoryDesign = !$wideCategoryDesign;
            $wideCategoryDesignStatus = 0;
            }
            $wideCategoryDesignStatus++;
            @endphp
            @endforeach
        </div>
    </div>
</section>
@endif

@if(isset($featuredProperties) && $featuredProperties?->toArray())
<!-- Feature Properties -->
<section id="property-city" class="property-city pb30 bg-ptrn1">
    <div class="container ovh">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center mb40">
                    <h2>{{__('Featured Properties')}}</h2>
                    <p>{{__('Handpicked properties by our team.')}}</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class=" feature_property_slider">
                    @foreach($featuredProperties as $property)
                    <div class="item">
                        <div class="feat_property" onclick="window.location = `{{route('home.property', [$property->id])}}`">
                            <div class="thumb">
                                <img style="height: 230px" class="img-whp lazy" data-src="{{isset($property->media[0])? url($property->media[0]->getUrl()) : url('frontpage/images/property/fp1.jpg')}}">
                                <div class="thmb_cntnt">
                                    <ul class="tag mb0">
                                        <li class="list-inline-item"><a href="">{{$property->propertyType->title}}</a></li>
                                        <li class="list-inline-item"><a href="">{{__('Featured')}}</a></li>
                                    </ul>
                                    <a class="fp_price" href="">₺{{number_format($property->price_tl, 2, ',', '.')}}<small></small></a>
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
                                        <li class="list-inline-item"><a href=""><img style="height: 40px; width: 40px; object-fit: cover;" class="lazy" data-src="{{ $property->agent?->photo != null ? (Storage::url($property->agent?->photo)) : url('assets/frontpage/images/agents/av-man.png')}}" alt=""></a></li>
                                        <li class="list-inline-item"><a href="">{{$property->agent?->name}} {{$property->agent?->surname}}</a></li>
                                    </ul>
                                    <div class="fp_pdate float-right">{{$property->created_at?->diffForHumans()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Why Chose Us -->
<section id="why-chose" class="whychose_us pb30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>{{__('Why Choose Us')}}</h2>
                    <p>{{__('We provide full service at every step.')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="why_chose_us style2">
                    <div class="icon">
                        <span class="flaticon-high-five"></span>
                    </div>
                    <div class="details">
                        <h4>{{__('Trusted By Thousands')}}</h4>
                        <p>{{__('The reason behind our success lies behind our dedicated team of expert agents, that are carefully engaging with all requirements in order to give the very best property solution to our dear customer.')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="why_chose_us style2">
                    <div class="icon">
                        <span class="flaticon-home-1"></span>
                    </div>
                    <div class="details">
                        <h4>{{__('Wide Range Of Properties')}}</h4>
                        <p>{{__('Beynil is a reliable and prestigious real estate agency established to meet the needs of people offering wide range of properties in the categories of apartments, villas, plots, shops, offices and many more.')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="why_chose_us style2">
                    <div class="icon">
                        <span class="flaticon-profit"></span>
                    </div>
                    <div class="details">
                        <h4>{{__('Investment Consulting')}}</h4>
                        <p>{{__('Beynil is for all of their prospects offering wide range of investment consulting, evaluation of their real estate profitability, guide into obtaining Turkish citizenship and many more on demand.')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@if(isset($articles) && $articles?->toArray())
<!-- Our Blog -->
<section class="our-blog bgc-f7 pb30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>{{__('Articles & Tips')}}</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
            </div>
        </div>
        <div class="row justify-content-around">
            @foreach($articles as $article)
            <div class="col-md-6 col-lg-4 col-xl-4">
                <x-frontpage.ui.home-article-card :article="$article" />
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if(isset($agents) && $agents?->toArray())
<!-- Our Team -->
<x-frontpage.ui.our-team :agents="$agents" />
@endif

<!-- Our Testimonials -->
<section id="our-testimonials" class="our-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2 class="color-white">{{__('Testimonials')}}</h2>
                    <!-- <p class="color-white">Here could be a nice sub title</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="testimonial_grid_slider">
                    <div class="item">
                        <div class="testimonial_grid">
                            <div class="thumb">
                                <img class="lazy" data-src="{{url('dashboard/assets/img/avatars/1.png')}}" alt="1.jpg">
                            </div>
                            <div class="details">
                                <h4>Meryam Mousalli</h4>
                                <!-- <p>Sales Manager</p> -->
                                <p class="mt25">I recommend this real estate agency. very professional and available agent I am very satisfied</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial_grid">
                            <div class="thumb">
                                <img class="lazy" data-src="{{url('dashboard/assets/img/avatars/1.png')}}" alt="1.jpg">
                            </div>
                            <div class="details">
                                <h4>djouhar aktas</h4>
                                <!-- <p>Agence très sérieuse</p> -->
                                <p class="mt25">Agence très sérieuse ! Ils ont su nous orienter dans nos choix, leurs disponibilité est remarquable ! Nous avons été accompagné par Afaf une francophone très sérieuse et dévouée pour son métier ! N’hésites pas à les solliciter, car il y a beaucoup d’arnaque en Turquie.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial_grid">
                            <div class="thumb">
                                <img class="lazy" data-src="{{url('dashboard/assets/img/avatars/1.png')}}" alt="1.jpg">
                            </div>
                            <div class="details">
                                <h4>Chorbette</h4>
                                <!-- <p>Sales Manager</p> -->
                                <p class="mt25">Agence très sérieuse et qui a prend vraiment en considération nos souhaits. Un accompagnement de A à Z est proposé concernant toutes les démarches administratives. Le plus du personnel francophone ce qui est très appréciable. Je recommande vraiment cette agence pour son efficacité et sa bienveillance devant toutes nos sollicitations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- partners -->
<x-frontpage.ui.partners />

<section class="start-partners home5 pt80 pb80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <div class="contact p-5" style="background: #033f6b;">
                    <div class="section_header py-3">
                        <h1 class="text-white">{{__("Contact Us To get all the assistant you need")}}</h1>
                        <p class="text-white">{{__("By purchasing property in Bursa, Turkey, you primarily invest money in your well-being. Coming to your cozy apartment with a view of the sea or a country house with a wonderful garden, you will enjoy the tranquility of your place.")}}</p>
                    </div>
                    <form class="contact_form" action="{{route('home.contact')}}" method="post">
                        @csrf
                        <input type="hidden" name="page" value="home-second">
                        <div class="form-container pt-4 py-3">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="{{__('Name')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="{{__('Email')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="phone" name="phone" class="form-control" placeholder="{{__('Phone')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <select name="subject" required name="language" class="form-control form-select" aria-label="">
                                            <option value="">{{__('Subject')}}</option>
                                            <option value="I want to buy Apartment">{{__('I want to buy Apartment')}}</option>
                                            <option value="I want to buy House">{{__('I want to buy House')}}</option>
                                            <option value="I want to buy Plot">{{__('I want to buy Plot')}}</option>
                                            <option value="I want to buy Villa">{{__('I want to buy Villa')}}</option>
                                            <option value="I want to obtain Citizenship">{{__('I want to obtain Citizenship')}}</option>
                                            <option value="How to Purchase Property">{{__('How to Purchase Property')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" rows="6" class="form-control" placeholder="Text..." required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="parner_reg_btn home5 text-left tac-smd">
                                        <button class="btn">{{__('Get in touch')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 contact">
                <div class="contact_side_image" data-aos="overlay-right">
                    <img src="{{url('assets/frontpage/images/home/contact.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="start-partners home5 pt50 pb50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="start_partner tac-smd">
                    <h2>{{__('Interested to Buy, Rent a Property?')}}</h2>
                    <p>{{__('Check our property listing, we are offering you the very best properties')}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="parner_reg_btn home5 text-right tac-smd">
                    <a class="btn" href="{{route('home.filter')}}">{{__('Browse Properties')}}</a>
                </div>
            </div>
        </div>
    </div>
</section> -->


@endsection
@push('style')
<style>
    .parner_reg_btn.home5 button.btn {
        background-color: #dfc588;
        color: #fff;
    }

    .contact .contact_side_image {
        display: inline-block;
        margin-left: -50px;
    }

    .parner_reg_btn button.btn {
        border-radius: 8px;
        background-color: rgb(255, 120, 124);
        -webkit-box-shadow: 0px 1px 4px 0px rgba(255, 90, 95, 0.3);
        -moz-box-shadow: 0px 1px 4px 0px rgba(255, 90, 95, 0.3);
        -o-box-shadow: 0px 1px 4px 0px rgba(255, 90, 95, 0.3);
        box-shadow: 0px 1px 4px 0px rgba(255, 90, 95, 0.3);
        height: 60px;
        line-height: 50px;
        width: 200px;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .parner_reg_btn.home5 button.btn:hover,
    .parner_reg_btn.home5 button.btn:active,
    .parner_reg_btn.home5 button.btn:focus {
        background-color: #232733;
        border: 1px solid #ffffff;
        color: #ffffff;
    }

    .owl-dots {
        max-height: 25px;
    }

    .btn-blue {
        background-color: #013e6b !important;
        border-color: #013e6b !important;
        color: #ffffff !important;
    }

    .bg-blue {
        color: #ffffff !important;
        background-color: #013e6b !important;
    }

    .font-blue {
        color: #013e6b !important;
    }

    .font-size-3 {
        font-size: 3rem !important;
    }

    .font-size-4 {
        font-size: 4rem !important;
    }

    .font-size-5 {
        font-size: 5rem !important;
    }

    .font-sans-serif {
        font-family: sans-serif !important;
    }

    .bg-white-34 {
        background-color: rgb(255 255 255 / 34%) !important
    }



    .br-8 {
        border-radius: 8px !important
    }

    .br-15 {
        border-radius: 15px !important
    }

    .br-25 {
        border-radius: 25px !important
    }

    .font-x-large {
        font-size: x-large !important
    }

    .font-23px {
        font-size: 23px !important
    }

    .mw-245 {
        min-width: 245px !important;
    }

    .fit-cover {
        object-fit: cover !important;
    }

    @media only screen and (min-width: 1199px) {
        .mt-xl-242 {
            margin-top: 242px !important;
        }

        .plr-xl-6 {
            padding-left: 6rem !important;
            padding-right: 6rem !important;
        }

        .font-size-xl-4 {
            font-size: 4rem !important;
        }

        .font-size-xl-4 {
            font-size: 4rem !important;
        }
    }

    @media only screen and (min-width: 979px) {
        .font-size-lg-3 {
            font-size: 3rem !important;
        }
    }

    @media only screen and (max-width: 767px) {
        .d-none-sm {
            display: none !important;
        }
    }

    .search_option_button.home5 .btn {
        background-image: -moz-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
        background-image: -webkit-linear-gradient(0deg, rgb(216 185 119) 0%, rgb(217 186 120) 100%);
        background-image: -ms-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
        border: 1px solid rgb(223 193 132);
        color: #ffffff;
    }

    .h700 {
        height: 700px !important;
    }

    .w-35 {
        width: 35% !important;
    }

    .middle {
        top: 12%;
        left: 12%;
        right: 12%;
        bottom: 12%;
    }

    .top-left {
        top: 0%;
        left: 0%;
    }

    .bottom-right {
        right: 0;
        bottom: 0;
    }

    .our-testimonial {
        background-color: #013d6a;
    }

    .our-testimonial:before {
        background-image: unset;
    }
</style>

@endpush
