@extends('frontpage.layouts.index')
@section('content')

<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="breadcrumb_content">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('About Us')}}</li>
                    </ol>
                    <h1 class="breadcrumb_title">{{__('About Us')}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Text Content -->
<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2 class="mt0">Our Mission Is To Find You A Dream Place in Bursa</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-xl-7">
                <div class="about_content">
                    <p>Beynil Investment and Real Estate was established in order to follow up with all new real estate market information in Turkey, and allow you to smoothly start business, living in Turkey, and experience the amazing lifestyle that Turkey has to offer you. </p>
                    <p>That alone dear business partners, customers, and investors, </p>
                    <p>Turkey has been one of the most important centers of world trade for centuries with strong economic and strategic geographical location. Turkey continues its steady growth and offers powerful opportunities. Our experienced agent will lead you through all processes, and cover all from property finding, investment and legal procedures.</p>
                    <p>Among the all beautiful cities of Turkey, we want to single out one particular one for investment and living opportunities - Bursa. Known as "Green Bursa", this province with over 3 million people stands on the lower slopes of Uludag (Mount Olympos of Mysia, 2543 meters / 8343 feet) in the Marmara region of Anatolia. The title "Green" of Bursa comes from its gardens and parks, and of course from its being in the middle of an important fruit growing region.</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-5">
                <div class="about_thumb">
                    <img class="img-fluid w100" src="{{URL('frontpage')}}/images/about/1.jpg" alt="1.jpg">
                    <a class="popup-iframe popup-youtube color-white" href="https://www.youtube.com/watch?v=R7xbhKIiw4Y"><i class="flaticon-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Design -->
<section class="home-three bg-img-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="text-light">
                    <h1 class="text-light">Why to Invest in Bursa?</h1>
                    <ul class="ml-3 pb-3" style="list-style: disc">
                        <li>Advanced infrastructure, dynamic entrepreneurs, the high quality of work and attractive investment climate</li>
                        <li>Sectoral clusters</li>
                        <li>Around 700 foreign companies from approximately 70 countries</li>
                        <li>Proximity to global &amp; national markets</li>
                        <li>18 organized industrial zones, 1 free trade zone and 7 sea ports</li>
                        <li>Strategic geographic location providing logistics connections</li>
                        <li>The 4th most economically developed province in Turkey</li>
                        <li>2 universities and 1 foundation vocational school offering world-class education</li>
                        <li>Ranks 3rd with its R&amp;D centres in Turkey</li>
                        <li>Globally competitive sectors of industry: Textile, automotive, agro-food, machinery metal and furniture sectors and rising sectors of railway systems, aerospace and defence sectors</li>
                        <li>High tourism potential in winter and nature sports tourism as well as convention, thermal, health and culture tourism</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-1">
                <div class="home3_home_content">
                    <a class="popup_video_btn popup-iframe popup-youtube" href="https://www.youtube.com/watch?v=LNEh6MFRTz4"><i class="flaticon-play"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <form action="{{route('home.filter')}}" method="get">
                <div class="col-lg-12">
                    <div class="home_adv_srch_opt home3">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            @php
                            $isFirsItem = true;
                            @endphp
                            @foreach($propertyType as $type)
                            <li class="nav-item">
                                <a class="nav-link {{$isFirsItem? 'active':''}}" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" onclick="choosePropertyType(this);">{{__($type->title)}}</a>
                                <input type="checkbox" value="{{$type->id}}" name="property_type" class="d-none" {{old('property_type') != null? (old('property_type') == $type->id ? "selected": "") :  (isset($property)? ($property->property_type_id  == $type->id ? 'selected' : "") :'')}}>
                            </li>
                            @php
                            $isFirsItem = false;
                            @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content home1_adsrchfrm" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="home1-advnc-search home3">
                                    <ul class="h1ads_1st_list mb0">
                                        <li class="list-inline-item">
                                            <div class="form-group">
                                                <input type="text" name="keyword" class="form-control" id="keyword" placeholder="{{__('keyword')}}">
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select name="housing_type" class="selectpicker w100 show-tick">
                                                        <option value="">{{__('Housing Type')}}</option>
                                                        @foreach($housingType as $type)
                                                        <option value="{{$type->id}}" {{old('housing_type') != null? (old('housing_type') == $type->id ? "selected": "") :  (isset($property)? ($property->housing_type_id  == $type->id ? 'selected' : "") :'')}}>{{__($type->title)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="form-group">
                                                <input type="text" name="address" class="form-control" id="location" placeholder="{{__('Location')}}">
                                                <label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
                                            </div>
                                        </li>
                                        <!--  -->
                                        <li class="list-inline-item">
                                            <div class="small_dropdown2 home3">
                                                <div id="prncgs" class="btn dd_btn">
                                                    <span>{{__('Price')}}</span>
                                                    <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                                                </div>
                                                <div class="dd_content2">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="min_price" id="exampleInputName2" placeholder="{{__('min price')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="max_price" id="exampleInputName3" placeholder="{{__('max price')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="custome_fields_520 list-inline-item">
                                            <div class="navbered">
                                                <div class="mega-dropdown home3">
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
                                                                <div class="custom-control custom-checkbox" style="line-height: 1.642 !important">
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
                                                                                <option value="">{{__('Bathrooms')}}</option>
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
                                                                                <option value="">{{__('Bedrooms')}}</option>
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
                                                                                <option value="">{{__('Living Rooms')}}</option>
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
                                                                                <option value="">{{__('age')}}</option>
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
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="search_option_button">
                                                <button type="submit" class="btn btn-thm3">{{__('Search')}}</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<!-- Why Chose Us -->
<section id="why-chose" class="whychose_us pb30 mt-5">
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

@if(isset($agents))
<!-- Our Team -->
<x-frontpage.ui.our-team :agents="$agents" />
@endif

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

<!-- partners -->
<x-frontpage.ui.partners />

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
                    <a class="btn" href="{{route('home.filter')}}">{{__('Browse Properties')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    function choosePropertyType(choisnElement) {
        $("input[name=property_type]").attr('checked', false);
        $(choisnElement).parent().children('input:checkbox').attr('checked', true);
    }
</script>
@endpush
@push('style')
<style>
    .owl-dots {
        max-height: 25px;
    }

    .dd_content2 {
        width: 350px !important;
        max-width: unset;
        height: unset;
    }


    @media only screen and (min-width: 767px) {
        .bg-img-3 {
            background-attachment: scroll;
            background-image: url("{{url('frontpage/images/background/3.jpg')}}");
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 8px;
            height: 600px;
        }
    }

    .home-three:before {
        background-color: rgb(3 62 106);
    }

    .home_adv_srch_opt .nav-pills li.nav-item a.nav-link.active {
        background-color: #dcbd7d;
        border-color: #dcbd7d;
    }

    .home_adv_srch_opt .nav-pills li.nav-item a.nav-link.active:before {
        background-color: #dcbd7d;
    }

    .home3_home_content a.popup_video_btn {
        background: rgb(220 189 125);
    }

    .home3_home_content a.popup_video_btn:after {
        background-color: rgb(220 189 125 / 50%);
    }

    .home1-advnc-search.home3 ul li .search_option_button button {
        background-color: #033e69;
    }

    .about_thumb a:after {
        background-color: rgb(220 189 125 / 20%);
    }

    .about_thumb a {
        background: #dcbd7d;
    }

</style>

@endpush
