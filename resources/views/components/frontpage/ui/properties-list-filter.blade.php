<div class="sidebar_listing_list">
    <div class="sidebar_advanced_search_widget">
    <h4 class="mb25 d-md-none">{{__('Advanced Search')}} <a class="filter_closed_btn float-right" href="#"><small>{{__('Hide Filter')}}</small> <span class="flaticon-close"></span></a></h4>
        <form method="get" id="filter-form">
            @foreach(request()->all() as $key => $value)
            <input type="hidden" name="{{$key}}" value="{{$value}}">
            @endforeach
            <ul class="sasw_list mb0">
                <li class="search_area">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" id="keyword" placeholder="{{__('keyword')}}">
                        <label for="keyword"><span class="flaticon-magnifying-glass"></span></label>
                    </div>
                </li>
                <li class="search_area">
                    <div class="form-group">
                        <input type="text" class="form-control" id="location" placeholder="{{__('Location')}}">
                        <label for="location"><span class="flaticon-maps-and-flags"></span></label>
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select class="selectpicker w100 show-tick">
                                <option>{{__('Property Type')}}</option>
                                @foreach($propertyType as $type)
                                <option value="{{$type->id}}" {{old('property_type') != null? (old('property_type') == $type->id ? "selected": "") :  (isset($property)? ($property->property_type_id  == $type->id ? 'selected' : "") :'')}}>{{__($type->title)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </li>
                <li class="min_area list-inline-item">
                    <div class="form-group">
                        <input type="text" class="form-control" name="min_price" id="exampleInputName2" placeholder="{{__('min price')}}">
                    </div>
                </li>
                <li class="max_area list-inline-item">
                    <div class="form-group">
                        <input type="text" class="form-control" name="max_price" id="exampleInputName3" placeholder="{{__('max price')}}">
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select class="selectpicker w100 show-tick">
                                <option>{{__('Bathrooms')}}</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select class="selectpicker w100 show-tick">
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
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select class="selectpicker w100 show-tick">
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
                    </div>
                </li>
                <li>
                    <div class="search_option_two">
                        <div class="candidate_revew_select">
                            <select class="selectpicker w100 show-tick">
                                <option>{{__('age')}}</option>
                                @foreach($buildingAge as $age)
                                <option value="{{$age->id}}" {{old('building_age') != null? (old('building_age') == $age->id ? "selected": "") :  (isset($property)? ($property->building_age_id  == $age->id ? 'selected' : "") :'')}}>{{__($age->title)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </li>
                <li class="min_area list-inline-item">
                    <div class="form-group">
                        <input type="text" class="form-control" name="min_area" id="exampleInputName2" placeholder="{{__('Min Area')}}">
                    </div>
                </li>
                <li class="max_area list-inline-item">
                    <div class="form-group">
                        <input type="text" class="form-control" name="max_area" id="exampleInputName3" placeholder="{{__('Max Area')}}">
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
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="features[]" value="{{$feature->id}}" class="custom-control-input" id="feature-{{$feature->id}}">
                                                    <label class="custom-control-label" for="feature-{{$feature->id}}">{{$feature->title}}</label>
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
                        <button type="submit" class="btn btn-block btn-thm">{{__('Search')}}</button>
                    </div>
                </li>
            </ul>
            @csrf
        </form>
    </div>
</div>
