    <div class="terms_condition_widget">
        <h4 class="title">{{__('Featured Properties')}}</h4>
        <div class="@if(count($properties) >1) sidebar_feature_property_slider @endif">
            @foreach($properties as $property)
            <div class="item">
                <div class="feat_property home7">
                    <div class="thumb" href="{{route('home.property', [$property->id])}}" onclick="window.location = `{{route('home.property', [$property->id])}}`">
                        <img class="img-whp" src="{{$property->image()?->getUrl()}}">
                        <div class="thmb_cntnt">
                            <ul class="tag mb0">
                                <li class="list-inline-item color-white">{{$property->propertyType->title}}</li>
                                <li class="list-inline-item color-white">{{__('Featured')}}</li>
                            </ul>
                            <a class="fp_price mb-2" href="{{route('home.property', [$property->id])}}">₺{{number_format($property->price_tl, 2, ',', '.')}}<small></small></a>
                            <h4 class="posr color-white">{{$property->title}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
