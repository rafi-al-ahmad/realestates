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
                <div class="row">
                    @foreach($articles as $article)
                    <div class="col-lg-6">
                        <x-frontpage.ui.article-card :article="$article" />
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <x-frontpage.ui.paginator :pagination="$articles" />
                    </div>
                </div>
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
