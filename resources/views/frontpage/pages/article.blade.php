@extends('frontpage.layouts.index')
@section('content')

<!-- Main Blog Post Content -->
<section class="blog_post_container bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="breadcrumb_content style2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active text-thm" aria-current="page">{{__('Blog')}}</li>
                    </ol>
                    <h2 class="breadcrumb_title">{{__('Blog')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="main_blog_post_content">
                    <div class="mbp_thumb_post">
                        <!-- <div class="blog_sp_tag"><a href="#">Construction</a></div> -->
                        <h3 class="blog_sp_title">{{$article->title}}</h3>
                        <ul class="blog_sp_post_meta">
                            <li class="list-inline-item"><a href="#"><img width="40px" height="40px" class=" lazy" data-src="{{ $article->agent?->photo != null ? (Storage::url($article->agent?->photo)) : url('assets/frontpage/images/agents/av-man.png')}}" alt="av-man.png"></a></li>
                            <li class="list-inline-item"><a href="#">{{$article->agent?->name .' '. $article->agent?->surname}}</a></li>
                            <li class="list-inline-item"><span class="flaticon-calendar"></span></li>
                            <li class="list-inline-item"><a href="#">{{$article->date?->toFormattedDateString()}}</a></li>

                        </ul>
                        <div class="thumb">
                            <img class="img-fluid lazy" data-src="{{ $article->photo != null ? (Storage::url($article->photo)) : url('assets/frontpage/images/blog/1.jpg')}}" alt="1.jpg">
                        </div>
                        <div class="details">
                            <?php echo $article->content ?>
                        </div>
                    </div>
                </div>
                @if($recentArticles?->toArray())
                <div class="row">
                    <div class="col-lg-12 mb20 mt-5">
                        <h4>{{__('Read More')}}</h4>
                    </div>
                    @foreach($recentArticles as $article)
                    <div class="col-md-6 col-lg-6">
                        <x-frontpage.ui.article-card :article="$article" />
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-lg-4">
                <x-frontpage.ui.properties-list-filter :buildingAge="$buildingAge" :features="$features" :propertyType="$propertyType" />

                <x-frontpage.ui.sidebar-categories :categories="$categories" />

                <x-frontpage.ui.featured-properties :properties="$featuredProperties" />

            </div>
        </div>
    </div>
</section>



@endsection
@push('scripts')
@endpush
@push('style')
<style>

</style>
@endpush
