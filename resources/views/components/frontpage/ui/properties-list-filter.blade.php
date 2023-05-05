
<div class="sidebar_listing_list">
    <div class="sidebar_advanced_search_widget">
        <h4 class="mb25 d-md-none">{{__('Advanced Search')}} <a class="filter_closed_btn float-right" href="#"><small>{{__('Hide Filter')}}</small> <span class="flaticon-close"></span></a></h4>
        <form method="get" action="{{route('home.filter')}}" id="filter-form">
            @foreach(request()->all() as $key => $value)
            @if(!is_array($value) && $value)
            <input type="hidden" name="{{$key}}" value="{{$value}}">
            @endif
            @endforeach
            <ul class="sasw_list mb0">
                <li class="search_area">
                    <div class="form-group">
                        <input type="text" name="keyword" value="{{request()->keyword}}" class="form-control" id="keyword" placeholder="{{__('keyword')}}">
                        <label for="keyword"><span class="flaticon-magnifying-glass"></span></label>
                    </div>
                </li>
                <li class="search_area">
                    <div class="form-group">
                        <input type="text" name="address" value="{{request()->address}}" class="form-control" id="location" placeholder="{{__('Location')}}">
                        <label for="location"><span class="flaticon-maps-and-flags"></span></label>
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select name="property_type" class="selectpicker w100 show-tick">
                                <option value="">{{__('Property Type')}}</option>
                                @foreach($propertyType as $type)
                                <option value="{{$type->id}}" {{old('property_type') != null? (old('property_type') == $type->id ? "selected": "") :  (request()->property_type  == $type->id ? 'selected' : "")}}>{{__($type->title)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </li>
                <li class="min_area list-inline-item">
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{request()->min_price}}" name="min_price" id="exampleInputName2" placeholder="{{__('min price')}}">
                    </div>
                </li>
                <li class="max_area list-inline-item">
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{request()->max_price}}" name="max_price" id="exampleInputName3" placeholder="{{__('max price')}}">
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select name="bathrooms" class="selectpicker w100 show-tick">
                                <option value="">{{__('Bathrooms')}}</option>
                                @for($i = 1; $i < 8; $i++)
                                <option value="{{$i}}" {{request()->bathrooms == $i? 'selected':''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select name="bedrooms" class="selectpicker w100 show-tick">
                                <option value="">{{__('Bedrooms')}}</option>
                                @for($i = 1; $i < 8; $i++)
                                <option value="{{$i}}" {{request()->bedrooms == $i? 'selected':''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select name="living_rooms" class="selectpicker w100 show-tick">
                                <option value="">{{__('Living Rooms')}}</option>
                                @for($i = 1; $i < 8; $i++)
                                <option value="{{$i}}" {{request()->living_rooms == $i? 'selected':''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select name="age" value="{{request()->age}}" class="selectpicker w100 show-tick">
                                <option value="">{{__('age')}}</option>
                                @foreach($buildingAge as $age)
                                <option value="{{$age->id}}" {{old('building_age') != null? (old('building_age') == $age->id ? "selected": "") :  (request()->age  == $age->id ? 'selected' : "")}}>{{__($age->title)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </li>
                <li class="min_area list-inline-item">
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{request()->min_area}}" name="min_area" id="exampleInputName2" placeholder="{{__('Min Area')}}">
                    </div>
                </li>
                <li class="max_area list-inline-item">
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{request()->max_area}}" name="max_area" id="exampleInputName3" placeholder="{{__('Max Area')}}">
                    </div>
                </li>
                <li>
                    <div id="accordion" class="panel-group">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#panelBodyRating" class="accordion-toggle link" data-toggle="collapse" data-parent="#accordion"><i class="flaticon-more"></i> {{__('Advanced features')}}</a>
                                </h4>
                            </div>
                            <div id="panelBodyRating" class="panel-collapse collapse">
                                <div class="panel-body row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            @foreach($features as $group => $featureGroup)
                                            @if($group != 0)
                                            <div class="col-12 mt-3">
                                                <h6>
                                                    {{strtoupper($group)}}
                                                </h6>
                                            </div>
                                            @endif
                                            @foreach($featureGroup as $feature)
                                            <div class="col-12 col-lg-6 col-xl-6">
                                                <!-- <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="features[]" value="{{$feature->id}}" class="input" id="f-{{$feature->id}}" {{old('features') != null? (in_array($feature->id, old('features')) ? "checked": "") :  (isset(request()->features)? (in_array($feature->id, request()->features) ? 'checked' : "") :'')}}>
                                                    <label class="label" for="f-{{$feature->id}}">{{$feature->title}}</label>
                                                </div> -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="f-{{$feature->id}}" value="{{$feature->id}}" {{old('features') != null? (in_array($feature->id, old('features')) ? "checked": "") :  (isset(request()->features)? (in_array($feature->id, request()->features) ? 'checked' : "") :'')}}>
                                                    <label class="form-check-label" for="f-{{$feature->id}}">{{$feature->title}}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="search_option_button">
                        <button type="submit" class="w-100 btn btn-block btn-thm">{{__('Search')}}</button>
                    </div>
                </li>
            </ul>
            @csrf
        </form>
    </div>
</div>
