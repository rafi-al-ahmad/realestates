<div class="for_blog feat_property" onclick="window.location = `{{route('home.blog.article', [$article->id])}}`">
    <div class="thumb">
        <img width="340px" height="230px" class="img-whp lazy" data-src="{{ $article->photo != null ? (Storage::url($article->photo)) : url('assets/frontpage/images/blog/1.jpg')}}" alt="1.jpg">
        <!-- <div class="blog_tag">Construction</div> -->
    </div>
    <div class="details">
        <div class="tc_content">
            <h4>{{$article->title}}</h4>
            <ul class="bpg_meta">
                <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
                <li class="list-inline-item"><a href="#">{{$article->date?->toFormattedDateString()}}</a></li>
            </ul>
            <p style="min-height: 75px; -webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">{{$article->banner}}</p>
        </div>
        <div class="fp_footer">
            <ul class="fp_meta float-left mb0">
                <li class="list-inline-item"><a href="#"><img width="40px" height="40px" class="lazy" data-src="{{ $article->agent?->photo != null ? (Storage::url($article->agent?->photo)) : url('assets/frontpage/images/agents/av-man.png')}}" alt="av-man.png"></a></li>
                <li class="list-inline-item"><a href="#">{{$article->agent?->name .' '. $article->agent?->surname}}</a></li>
            </ul>
            <a class=" float-right text-thm my-2" href="{{route('home.blog.article', [$article->id])}}">{{__('Read More')}} <span class="flaticon-next"></span></a>
        </div>
    </div>
</div>
