<section class="our-team bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>{{__('Our Team')}}</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="team_slider">
                    @foreach($agents as $agent)
                    <div class="item">
                        <a href="{{route('home.agents')}}">
                            <div class="team_member">
                                <div class="thumb">
                                    <img height="250px" width="242px" class="fit-cover" src="{{ $agent->photo != null ? (Storage::url($agent->photo)) : url('assets/frontpage/images/agents/av-man.png')}}" alt="{{$agent->name}}">
                                </div>
                                <div class="details">
                                    <h4>{{$agent->name}} {{$agent->surname}}</h4>
                                    <!-- <p>Broker</p> -->
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
