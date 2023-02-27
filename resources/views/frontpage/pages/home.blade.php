@extends('frontpage.layouts.index')
@section('content')

<!-- Home Design -->
<section class="home-one home5-overlay home5_bgi5 parallax" data-stellar-background-ratio="1.5">
    <div class="container">
        <div class="row posr">
            <div class="col-lg-7">
                <div class="home_content home5">
                    <div class="home-text home5">
                        <h2 class="fz55">{{__('Find Your Dream Home')}}</h2>
                        <p class="discounts_para fz18 color-white">{{__('We’re reimagining how you buy, sell and rent. It’s now easier to get into a place you love. So let’s do this, together.')}}</p>
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

@if(isset($citiesByProperties))
<!-- Property cities -->
<section id="feature-property" class="feature-property">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>{{__('Find Properties in These Cities')}}</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            @php
            $wideCityDesign = true;
            $wideCityDesignStatus = 0;
            @endphp
            @foreach($citiesByProperties as $city)
            @if($wideCityDesign)
            <div class="col-lg-4 col-xl-4"  onclick="window.location = `{{route('home.filter', ['city_id' => $city->id])}}`">
                <div class="properti_city home5">
                    <div class="thumb"><img style="height: 350px; object-fit: cover;" class="img-fluid w100" src="{{ ($city->image()) != null? ($city->image()?->getUrl()) : url('assets/frontpage/images/categories/city361x350.png')}}" alt="city361x350.png"></div>
                    <div class="overlay">
                        <div class="details">
                            <div class="left">
                                <h4>{{$city->name}}</h4>
                            </div>
                            <p>{{__(':num properties' ,['num' => $city->properties_count])}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-8 col-xl-8"  onclick="window.location = `{{route('home.filter', ['city_id' => $city->id])}}`">
                <div class="properti_city home5">
                    <div class="thumb"><img style="height: 350px; object-fit: cover;" class="img-fluid w100" src="{{ ($city->image()) != null? ($city->image()?->getUrl()) : url('assets/frontpage/images/categories/categories-default748x350.png')}}" alt="categories-default748x350.png"></div>
                    <div class="overlay">
                        <div class="details">
                            <div class="left">
                                <h4>{{$city->name}}</h4>
                            </div>
                            <p>{{__(':num properties' ,['num' => count($city->properties_count)])}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @php
            if($wideCityDesignStatus == 0){
            $wideCityDesign = !$wideCityDesign;
            }
            if($wideCityDesignStatus == 2){
            $wideCityDesign = !$wideCityDesign;
            $wideCityDesignStatus = 0;
            }
            $wideCityDesignStatus++;
            @endphp
            @endforeach
        </div>
    </div>
</section>
@endif
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
            <div class="col-lg-4 col-xl-4"  onclick="window.location = `{{route('home.filter', ['category_id' => $category->id])}}`">
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
            <div class="col-lg-8 col-xl-8"  onclick="window.location = `{{route('home.filter', ['category_id' => $category->id])}}`">
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

<!-- Our Testimonials -->
<!-- <section id="our-testimonials" class="our-testimonial home5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2 class="color-white">Testimonials</h2>
                    <p class="color-white">Here could be a nice sub title</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="testimonial_grid_slider">
                    <div class="item">
                        <div class="testimonial_grid">
                            <div class="thumb">
                                <img src="{{url('frontpage')}}/images/testimonial/1.jpg" alt="1.jpg">
                            </div>
                            <div class="details">
                                <h4>Augusta Silva</h4>
                                <p>Sales Manager</p>
                                <p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial_grid">
                            <div class="thumb">
                                <img src="{{url('frontpage')}}/images/testimonial/1.jpg" alt="1.jpg">
                            </div>
                            <div class="details">
                                <h4>Augusta Silva</h4>
                                <p>Sales Manager</p>
                                <p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial_grid">
                            <div class="thumb">
                                <img src="{{url('frontpage')}}/images/testimonial/1.jpg" alt="1.jpg">
                            </div>
                            <div class="details">
                                <h4>Augusta Silva</h4>
                                <p>Sales Manager</p>
                                <p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial_grid">
                            <div class="thumb">
                                <img src="{{url('frontpage')}}/images/testimonial/1.jpg" alt="1.jpg">
                            </div>
                            <div class="details">
                                <h4>Augusta Silva</h4>
                                <p>Sales Manager</p>
                                <p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial_grid">
                            <div class="thumb">
                                <img src="{{url('frontpage')}}/images/testimonial/1.jpg" alt="1.jpg">
                            </div>
                            <div class="details">
                                <h4>Augusta Silva</h4>
                                <p>Sales Manager</p>
                                <p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Our Blog -->
<!-- <section class="our-blog bg-ptrn2 pb30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>Articles & Tips</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="for_blog feat_property">
                    <div class="thumb">
                        <img class="img-whp" src="{{url('frontpage')}}/images/blog/bh1.jpg" alt="bh1.jpg">
                    </div>
                    <div class="details">
                        <div class="tc_content">
                            <p class="text-thm">Business</p>
                            <h4>Skills That You Can Learn In The Real Estate Market</h4>
                        </div>
                        <div class="fp_footer">
                            <ul class="fp_meta float-left mb0">
                                <li class="list-inline-item"><a href="{{url('frontpage')}}/#"><img src="{{url('frontpage')}}/images/property/pposter1.png" alt="pposter1.png"></a></li>
                                <li class="list-inline-item"><a href="{{url('frontpage')}}/#">Ali Tufan</a></li>
                            </ul>
                            <a class="fp_pdate float-right" href="{{url('frontpage')}}/#">7 August 2019</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="for_blog feat_property">
                    <div class="thumb">
                        <img class="img-whp" src="{{url('frontpage')}}/images/blog/bh2.jpg" alt="bh2.jpg">
                    </div>
                    <div class="details">
                        <div class="tc_content">
                            <p class="text-thm">Business</p>
                            <h4>Bedroom Colors You’ll Never <br> Regret</h4>
                        </div>
                        <div class="fp_footer">
                            <ul class="fp_meta float-left mb0">
                                <li class="list-inline-item"><a href="{{url('frontpage')}}/#"><img src="{{url('frontpage')}}/images/property/pposter1.png" alt="pposter1.png"></a></li>
                                <li class="list-inline-item"><a href="{{url('frontpage')}}/#">Ali Tufan</a></li>
                            </ul>
                            <a class="fp_pdate float-right" href="{{url('frontpage')}}/#">7 August 2019</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="for_blog feat_property">
                    <div class="thumb">
                        <img class="img-whp" src="{{url('frontpage')}}/images/blog/bh3.jpg" alt="bh3.jpg">
                    </div>
                    <div class="details">
                        <div class="tc_content">
                            <p class="text-thm">Business</p>
                            <h4>5 Essential Steps for Buying an Investment</h4>
                        </div>
                        <div class="fp_footer">
                            <ul class="fp_meta float-left mb0">
                                <li class="list-inline-item"><a href="{{url('frontpage')}}/#"><img src="{{url('frontpage')}}/images/property/pposter1.png" alt="pposter1.png"></a></li>
                                <li class="list-inline-item"><a href="{{url('frontpage')}}/#">Ali Tufan</a></li>
                            </ul>
                            <a class="fp_pdate float-right" href="{{url('frontpage')}}/#">7 August 2019</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Our Partners -->
<!-- <section id="our-partners" class="our-partners">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>Our Partners</h2>
                    <p>We only work with the best companies around the globe</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg">
                <div class="our_partner">
                    <img class="img-fluid" src="{{url('frontpage')}}/images/partners/1.png" alt="1.png">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg">
                <div class="our_partner">
                    <img class="img-fluid" src="{{url('frontpage')}}/images/partners/2.png" alt="2.png">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg">
                <div class="our_partner">
                    <img class="img-fluid" src="{{url('frontpage')}}/images/partners/3.png" alt="3.png">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg">
                <div class="our_partner">
                    <img class="img-fluid" src="{{url('frontpage')}}/images/partners/4.png" alt="4.png">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg">
                <div class="our_partner">
                    <img class="img-fluid" src="{{url('frontpage')}}/images/partners/5.png" alt="5.png">
                </div>
            </div>
        </div>
    </div>
</section> -->


<!-- Start Partners -->
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
                    <a class="btn" href="{{route('home.filter')}}">{{__('Brows Properties')}}</a>
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
</style>

@endpush
