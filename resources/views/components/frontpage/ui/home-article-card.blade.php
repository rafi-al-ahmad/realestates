<div class="for_blog feat_property" onclick="window.location = `{{route('home.blog.article', [$article->id])}}`">
    <div class="thumb">
        <img width="340px" height="230px" class="img-whp lazy" data-src="{{ $article->photo != null ? (Storage::url($article->photo)) : url('assets/frontpage/images/blog/1.jpg')}}" alt="1.jpg">
    </div>
    <div class="details">
        <div class="tc_content" style="min-height: unset;">
            <h4>{{$article->title}}</h4>
            <p style="min-height: 75px; -webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">{{$article->banner}}</p>

        </div>
        <div class="fp_footer">
            <ul class="fp_meta float-left mb0">
                <li class="list-inline-item"><a href="#"><img width="40px" height="40px" class="lazy" data-src="{{ $article->agent?->photo != null ? (Storage::url($article->agent?->photo)) : url('assets/frontpage/images/agents/av-man.png')}}" alt="{{$article->agent->name}}"></a></li>
                <li class="list-inline-item"><a href="#">{{$article->agent?->name .' '. $article->agent?->surname}}</a></li>
            </ul>
            <a class="fp_pdate float-right" href="#">{{$article->date?->toFormattedDateString()}}</a>
        </div>
    </div>
</div>
