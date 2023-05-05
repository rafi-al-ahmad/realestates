@extends('frontpage.layouts.index')
@section('title', 'Contact Us')
@section('content')



<!-- Our Contact -->
<section class="our-contact bgc-f7 py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form_grid text-center">
                    <h1 class="mb5">{{__('Thank you for contacting us')}}</h1>
                    <h4>{{__('we will reach you soon as possible.')}}</h4>
                    <div class="parner_reg_btn text-right tac-smd">
                    <a class="btn btn-thm2" href="{{route('home')}}" style="height: 50px; width: 170px; line-height: 36px;">{{__('Back to Home')}}</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Partners -->
<section class="start-partners bgc-thm pt50 pb50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="start_partner tac-smd">
                    <h2>{{__('Interested to Buy, Rent a Property?')}}</h2>
                    <p>{{__('Check our property listing, we are offering you the very best properties')}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="parner_reg_btn text-right tac-smd d-flex justify-content-end">
                    <a class="btn btn-thm2" href="{{route('home.filter')}}">{{__('Browse Properties')}}</a>
                </div>
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
