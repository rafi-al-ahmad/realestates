<div class="for_blog feat_property">
    <div class="thumb">
    <img width="340px" height="230px" class="img-whp" src="{{ $article->photo != null ? (Storage::url($article->photo)) : url('assets/frontpage/images/blog/1.jpg')}}" alt="1.jpg">
    </div>
    <div class="details">
        <div class="tc_content">
            <!-- <p class="text-thm">Business</p> -->
            <h4>{{$article->title}}</h4>
        </div>
        <div class="fp_footer">
            <ul class="fp_meta float-left mb0">
                <li class="list-inline-item"><a href="#"><img  width="40px" height="40px" src="{{ $article->agent?->photo != null ? (Storage::url($article->agent?->photo)) : url('assets/frontpage/images/agents/av-man.png')}}" alt="{{$article->agent->name}}"></a></li>
                <li class="list-inline-item"><a href="#">{{$article->agent?->name .' '. $article->agent?->surname}}</a></li>
            </ul>
            <a class="fp_pdate float-right" href="#">{{$article->date?->toFormattedDateString()}}</a>
        </div>
    </div>
</div>