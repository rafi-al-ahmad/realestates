@extends('frontpage.layouts.index')
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
                                <button type="submit" class="btn btn-block">{{__('Search')}}</button>
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
                        <img class="fit-cover  w-100 h-100" src="{{url('assets/frontpage/images/home/10.jpg')}}"></img>
                    </div>
                    <div class="position-absolute w-75 h-75 middle">
                        <img class="fit-cover w-100 h-100" src="{{url('assets/frontpage/images/home/11.jpg')}}"></img>
                    </div>
                    <div class="position-absolute w-35 h-50 bottom-right">
                        <img class="fit-cover w-100 h-100" src="{{url('assets/frontpage/images/home/12.jpg')}}"></img>
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

@if(isset($citiesByProperties))
<!-- Property cities -->
<section id="property-city" class="property-city">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                    <h2>{{__('Find Properties in These Cities')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($citiesByProperties as $city)
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3" onclick="window.location = `{{route('home.filter', ['city_id' => $city->id])}}`">
                <div class="properti_city ">
                    <div class="thumb"><img style="height: 350px; object-fit: cover;" class="img-fluid w100" src="{{ ($city->image()) != null? ($city->image()?->getUrl()) : url('assets/frontpage/images/categories/city361x350.png')}}" alt="city361x350.png"></div>
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
                <h2 class="color-whitef0 pb-1 fw400">Invest in Bursa, and here is WHY</h2>
                <p class="color-white">With a long history of industry, sectoral diversity, close proximity to the market, international experience, dynamic young population, qualified labor force, Bursa always offers an ideal investment environment for domestic and foreign investors as the power of the Turkish economy.</p>
                <div class="">
                    <div class="bg-light bg-white-34 pl-5 pl-2 py-3 br-15 row my-4">
                        <div class="col p-1">
                            <img width="48" height="49" src="{{url('assets/frontpage/images/home/intersection-1.png')}}"></img>
                        </div>
                        <div class="col mw-245">
                            <h4 class="color-whitef0 font-23px mb-0 fw400 ">Advanced Infrastructure</h4>
                        </div>
                    </div>
                    <div class="bg-light bg-white-34 pl-5 pl-2 py-3 br-15 row my-4">
                        <div class="col p-1">
                            <img width="48" height="49" src="{{url('assets/frontpage/images/home/intersection-2.png')}}"></img>
                        </div>
                        <div class="col mw-245">
                            <h4 class="color-whitef0 font-23px mb-0 fw400 ">Attractive Investment Climate</h4>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-4">
                <div class="card br-25">
                    <img src="{{url('assets/frontpage/images/home/b1.png')}}" class="card-img-top br-25 m-3" style="width: unset;">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-1 text-muted">Investment</h6>
                        <h2 class="card-title">Invest in Bursa</h2>
                        <div class="d-flex">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="19" height="19" fill="url(#pattern0)" />
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_39_31" transform="scale(0.00390625)" />
                                    </pattern>
                                    <image id="image0_39_31" width="256" height="256" xlink:href="data:image/png;base64,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" />
                                </defs>
                            </svg>
                            <h5 class="mx-1">Bursa, Turkiey</h5>
                        </div>
                        <p class="card-text">Among the all beautiful cities of Turkey, we want to single out one particular one for investment and living opportunities - Bursa, known as "Green Bursa"</p>
                        <div class="search_option_button home5">
                            <a href="{{route('home.citizenship')}}" class="btn btn-block">{{__('Read More')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="mt-xl-242">
                    <div class="bg-light bg-white-34 pl-5 pl-2 py-3 br-15 row my-4">
                        <div class="col p-1">
                            <img width="48" height="49" src="{{url('assets/frontpage/images/home/intersection-3.png')}}"></img>
                        </div>
                        <div class="col mw-245">
                            <h4 class="color-whitef0 font-23px mb-0 fw400 ">Strategic Geographic Location</h4>
                        </div>
                    </div>
                    <div class="bg-light bg-white-34 pl-5 pl-2 py-3 br-15 row my-4">
                        <div class="col p-1">
                            <img width="48" height="49" src="{{url('assets/frontpage/images/home/intersection-4.png')}}"></img>
                        </div>
                        <div class="col mw-245">
                            <h4 class="color-whitef0 font-23px mb-0 fw400 ">Dynamic Entrepreneurs</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="" class="mt-5">
    <div class="container ">
        <h3 class="font-size-2  font-size-lg-3 font-size-xl-4 pb-5 font-weight-bolder text-center text-capitalized plr-xl-6">Live, work and experience amazing life in Turkey.</h3>
        <div class="row px-3">
            <div class="col-xl-6 py-4">
                <h1 class=" my-4">{{__('Citizenship by Investment Overview')}}</h1>
                <h4 class="color-black66  my-4" style="line-height: inherit;">The Türkiye Citizenship by Investment Program allows investors to access both the European and Asian markets by making an investment into Türkiye’s economy.</h4>
                <a href="{{route('home.citizenship')}}" class="  my-4 text-capitalized" style="color: #005fff">
                    {{__('learn more')}}
                    <i class="fa-solid fa-arrow-right px-2"></i>
                </a>
            </div>
            <div class="col-xl-6">

            </div>
        </div>
    </div>
</section>

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
                    <div class="thumb"><img style="height: 350px; object-fit: cover;" class="img-fluid w100" src="{{ ($category->image()) != null? ($category->image()?->getUrl()) : url('assets/frontpage/images/categories/category361x350.png')}}" alt="category361x350.png"></div>
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
                    <div class="thumb"><img style="height: 350px; object-fit: cover;" class="img-fluid w100" src="{{ ($category->image()) != null? ($category->image()?->getUrl()) : url('assets/frontpage/images/categories/categories-default748x350.png')}}" alt="categories-default748x350.png"></div>
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
                                <img style="height: 230px" class="img-whp" src="{{isset($property->media[0])? url($property->media[0]->getUrl()) : url('frontpage/images/property/fp1.jpg')}}">
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
                                        <li class="list-inline-item"><a href=""><img style="height: 40px; width: 40px; object-fit: cover;" src="{{ $property->agent->photo != null ? (Storage::url($property->agent->photo)) : url('assets/frontpage/images/agents/av-man.png')}}" alt=""></a></li>
                                        <li class="list-inline-item"><a href="">{{$property->agent->name}} {{$property->agent->surname}}</a></li>
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


@if(isset($articles))
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


@if(isset($agents))
<!-- Our Team -->
<x-frontpage.ui.our-team :agents="$agents" />
@endif

<!-- Our Testimonials -->
<section id="our-testimonials" class="our-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2 class="color-white">Testimonials</h2>
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
                                <img src="{{url('dashboard/assets/img/avatars/1.png')}}" alt="1.jpg">
                            </div>
                            <div class="details">
                                <h4>Meryam Mousalli</h4>
                                <!-- <p>Sales Manager</p> -->
                                <p class="mt25">I recommend this real estate agency. very professional and available agent I am very satisfied</p>
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

<section class="start-partners home5 pt50 pb50">
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
</section>

@endsection
@push('style')
<style>
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
