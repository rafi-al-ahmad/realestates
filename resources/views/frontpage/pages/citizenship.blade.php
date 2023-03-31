@extends('frontpage.layouts.index')
@section('content')

<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="breadcrumb_content">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Citizenship by Investment')}}</li>
                    </ol>
                    <h1 class="breadcrumb_title">{{__('How to get Citizenship in Turkiye')}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Text Content -->
<section class="about-section">
    <div class="container">
        <img class="logo1 img-fluid lazy" style="height: 82px;" data-src="{{url('/assets/frontpage/images/logo/logo.png')}}" alt="logo.png">
        <div class="row mt-4">
            <div class="col-lg-12 col-xl-12">
                <div class="about_content">
                    <p class="font20 mb-3">{{__('We are a company that assists our foreign customers outside of the Turkey in obtaining Turkish Citizenship through Real Estate management. We carefully listen to all your needs, preferences than select and offer properties that are suitable for your budgets accordingly.')}}</p>
                    <p class="font20 mb-3">{{__('Once a decision is made, we collaborate with relevant authorities to ensure that the property does not have any encumbrances such as liens or debts, and we are providing you with full set of accompanying documentation for smooth purchase and sale, where we carefully follow every step.')}}</p>
                    <p class="font20 mb-3">{{__('We prioritize our customer satisfaction and always stand by our customers to provide high-quality services in every aspect of such process.')}}</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Design -->
<section class=" bg-blue-light-lg py-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-h-480 col-lg-6 section-pb section-pt py-5 d-flex flex-column justify-content-around bg-blue">
                <div class=""></div>
                <h2 class="section-content-header text-light">{{__('Citizenship by Investment Overview')}}</h2>
                <p class="lead section-content-text text-light text-lead">{{__('The Türkiye Citizenship by Investment Program allows investors to access both the European and Asian markets by making an investment into Türkiye’s economy.')}}</p>

                <div class="search_option_button home5">
                    <a href="{{route('home.contact')}}" class="btn br-0 px-5 py-2">{{__('Contact Us')}}</a>
                </div>
                <div class=""></div>
            </div>
            <div class="col-md-12 col-lg-6 section-pt p-5" style="background-color: #F5F5F5">
                <div class="row my-5 ml-4">
                    <div class="col-3">
                        <img width="76px" class="lazy" data-src="{{url('assets/frontpage/images/citizenship/4.png')}}" alt="">
                    </div>
                    <div class="col-9">
                        <div class="media-content">
                            <h3 class="media-heading">{{__('Investment')}} </h3>
                            <p class="main-text">{{__('Minimum contribution of USD 400,000')}}</p>
                        </div>
                    </div>
                </div>
                <div class="row my-5 ml-4">
                    <div class="col-3">
                        <img width="76px" class="lazy" data-src="{{url('assets/frontpage/images/citizenship/2.png')}}" alt="">
                    </div>
                    <div class="col-9">
                        <div class="media-content">
                            <h3 class="media-heading">{{__('Processing time')}} </h3>
                            <p class="main-text">{{__('Approximately 120 days from submission of the application to approval')}}</p>
                        </div>
                    </div>
                </div>
                <div class="row my-5 ml-4">
                    <div class="col-3">
                        <img width="76px" class="lazy" data-src="{{url('assets/frontpage/images/citizenship/3.png')}}" alt="">
                    </div>
                    <div class="col-9">
                        <div class="media-content">
                            <h3 class="media-heading">{{__('Key benefit')}} </h3>
                            <p class="main-text">{{__('The right of free movement to Türkiye, Hong Kong, Japan, and Singapore, among others')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<!-- Design -->
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <h2 class="section-content-header">{{__('Türkiye Citizenship by Investment')}}</h2>
                <p class=" pt-5">The Türkiye Citizenship by Investment Program (previously named the Turkey Citizenship by Investment Program) was launched in January 2017 to attract foreign direct investment to and boost growth in the country’s real estate sector. The program allows applicants to choose from a number of different types of economic contributions to Turkish society, thereby developing the country’s economy.</p>
                <p>Among the all beautiful cities of Turkey, we want to single out one particular one for investment and living opportunities - Bursa. Known as "Green Bursa", this province with over 3 million people stands on the lower slopes of Uludag (Mount Olympos of Mysia, 2543 meters / 8343 feet) in the Marmara region of Anatolia. The title "Green" of Bursa comes from its gardens and parks, and of course from its being in the middle of an important fruit growing region.</p>

                <h2 class="section-content-header pt-5">{{__('Benefits of the Türkiye Citizenship by Investment Program')}}</h2>
                <ul class="py-3 px-4" style="list-style: disc">
                    <li>{{__('Visa-free or visa-on-arrival access to 111 destinations including Hong Kong, Japan, and Singapore')}}</li>
                    <li>{{__('Citizenship of a country that enjoys a mild Mediterranean climate, beautiful scenery, and a high standard of living')}}</li>
                    <li>{{__('Full citizenship granted to the applicant and included family members')}}</li>
                    <li>{{__('Eligibility for an E-2 Investor Visa in the USA for a five-year renewable period')}}</li>
                    <li>{{__('Access to a transcontinental Eurasian country that is a stable economic, financial, and political hub between Europe, Western Asia, and the Middle Easts')}}</li>
                </ul>

                <h2 class="section-content-header mt-5 pt-5">{{__('Requirements of Türkiye Citizenship by investment')}}</h2>
                <p class="pt-4">{{__('To qualify for citizenship, the main applicant should fulfil one of the following investment requirements:')}}</p>
                <ul class="pt-3 px-4" style="list-style: disc">
                    <li>{{__('Acquire at least USD 400,000 worth of real estate')}}</li>
                    <li>{{__('Invest a minimum of USD 500,000 fixed capital contribution')}}</li>
                    <li>{{__('Commit at least USD 500,000 or equivalent foreign currency or Turkish lira into government bonds')}}</li>
                    <li>{{__('Commit at least USD 500,000 or equivalent foreign currency or Turkish lira into real estate investment fund share or venture capital investment fund share')}}</li>
                    <li>{{__('Commit at least USD 500,000 or equivalent foreign currency or Turkish lira into a private pension system for a minimum holding period of three years')}}</li>
                    <li>{{__('Create jobs for at least 50 people, as attested by the Ministry of Family, Labour and Social Services')}}</li>
                </ul>
                <p>{{__('The main applicant may include their spouse, dependent children below the age of 18, and children of any age who are living with disabilities in their application.')}}</p>


                <h2 class="section-content-header mt-5 pt-5">{{__('Procedures and time frame of the Türkiye Citizenship by Investment Program')}}</h2>
                <p class="pt-3">{{__('After applicants have chosen the qualifying investment option, a residence permit application shall be made on the family’s behalf. The main applicant is then required to open a bank account in Türkiye.')}}</p>
                <p>{{__('Once all application documents have been prepared (including applicable certifications and translations), the investment can be completed and the documents submitted to the government. Once the application has been received by the government, the review process will begin and an interview may be requested. Applications are typically approved within 120 days, following which the citizenship documents are issued. The passport application can then be submitted.')}}</p>
                <p>{{__('Please note that Turkish gift and inheritance taxes apply to worldwide assets held by Turkish citizens. We recommend that you seek appropriate professional advice in this regard.')}}</p>
            </div>


            <div class="col-md-12 col-lg-6 p-0 d-none-lg">
                <img height="100%" class="lazy" style="object-fit: cover;" data-src="{{url('assets/frontpage/images/citizenship/5.jpg')}}" alt="">
            </div>
        </div>

    </div>
    <img height="100%" class="my-4 lazy" style="object-fit: cover;" data-src="{{url('assets/frontpage/images/citizenship/7.jpg')}}" alt="">
    <div class="container">
        <h2 class="section-content-header">{{__('Step by Step Citizenship Procedure:')}}</h2>
        <ul class="px-4" style="list-style: decimal">
            <li class="color-black33 font-weight-bolder">{{__('Obtaining the Title Deed Document of the Real Estate Document for what is required')}}</li>
            <ul class="" style="list-style: disc">
                <li>{{__('Identity document/passport (translated document in Turkish Language)')}}</li>
                <li>{{__('Real estate valuation report')}}</li>
                <li>{{__('Compulsory Earthquake insurance policy for buildings')}}</li>
                <li>{{__('Bio-metric photo ')}}</li>
                <li>{{__('Real Estate Fair Value Certificate of the Real Estate')}}</li>
                <li>{{__('Tax Number')}}</li>
                <li>{{__('Bank-Approved Remittance Receipts ')}}</li>
                <li>{{__('Commitment not to sell the Real Estate')}}</li>
            </ul>
            <i>{{__('Note: The purpose of obtaining Turkish Citizenship should be stated in the deed.')}}</i>
            <li class="color-black33 font-weight-bolder">{{__('Obtaining the Certificate of Conformity')}}</li>
            <p>{{__('After taking a commitment not to sell the Real Estate purchased for 3 years. The department of foreign affairs issues the certificate of conformity.')}}</p>
            <p>{{__('Afterwards, the cover letter is sent to the General Directorate of Migration Management and the General Directorate of Population and Citizenship Affairs. The applicants are informed via email about every step carefully.')}}</p>
            <li class="color-black33 font-weight-bolder">{{__('Residence Permit Application and Citizenship Application')}}</li>
            <p>{{__('After receiving the certificate of conformity, a residence permit application must be made to the provincial Directorate of Migration Management and then a citizenship application to the provincial Directorate of population and Citizenship Affairs.The Citizenship Applications are finalized in 3-5 months on average')}}</p>
        </ul>
    </div>

    </div>
</section>


<!-- Contact us  -->
<section class="overflow-hidden">
    <div class="bg-light bg-light-85-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class=" d-flex flex-column justify-content-around h450">
                        <div class=""></div>
                        <h2 class="section-content-header">{{__('contact us today')}}</h2>
                        <p class="lead section-content-text text-lead">{{__('Should you have any questions, or if you would like a detailed breakdown of the exact costs for your family, kindly contact us and we will be delighted to help you.')}}</p>

                        <div class="search_option_button home5">
                            <a href="{{route('home.contact')}}" class="btn br-0 px-5 py-2">{{__('Contact Us')}}</a>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="position-relative d-none-lg ">
        <img class="fit-cover  position-absolute contactImage lazy" data-src="{{url('assets/frontpage/images/citizenship/6.jpg')}}" alt="">
    </div>
</section>
<section class=" ">

</section>

<!-- Start Partners -->
<section class="start-partners home5 pt50 pb50 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="start_partner tac-smd">
                    <h2>{{__('Interested to Buy, Rent a Property?')}}</h2>
                    <p>{{__('Check our property listing, we are offering you the very best properties')}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="parner_reg_btn home5 text-right tac-smd">
                    <a class="btn" href="{{route('home.filter')}}">{{__('Browse Properties')}}</a>
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
    .owl-dots {
        max-height: 25px;
    }

    .dd_content2 {
        width: 350px !important;
        max-width: unset;
        height: unset;
    }

    .inner_page_breadcrumb {
        background-image: url("{{url('assets/frontpage/images/citizenship/1.jpg')}}");
    }

    .font20 {
        font-size: 20px;
    }

    .font20 {
        font-size: 15px;
    }

    .br-0 {
        border-radius: 0 !important;
    }

    .min-vh-50 {
        min-height: 50vh !important;
    }

    .mr200 {
        margin-right: 200px !important;
    }

    @media (max-width: 768px) {
        .d-md-none {
            display: none !important;
        }
    }

    @media (min-width: 992px) {
        .bg-blue-light-lg {
            background: linear-gradient(to right, #013e6b 0%, #013e6b 50%, #F5F5F5 0%, #F5F5F5 50%) !important;
        }

        .bg-light-85-lg {
            background: linear-gradient(to right, #F5F5F5 0%, #F5F5F5 85%, #fff 0%, #fff 15%) !important;
        }
    }

    .bg-light-85 {
        background: linear-gradient(to right, #F5F5F5 0%, #F5F5F5 85%, #fff 0%, #fff 15%) !important;
    }

    .h-480 {
        height: 480px !important;
    }

    .m-h-480 {
        min-height: 480px !important;
    }

    .w-35 {
        width: 35% !important;
    }

    .contactImage {
        top: -380px;
        left: 45%;
        height: 450px;
        width: 850px;
    }

    .lh-18 {
        line-height: 18px;
    }

    @media only screen and (max-width: 520px) {
        .inner_page_breadcrumb .breadcrumb_content {
            margin-top: 150px;
        }

        .contactImage {
            top: -380px;
            left: 60%;
            height: 450px;
            width: 850px;
        }
    }

    @media only screen and (max-width: 992px) {
        .d-none-lg {
            display: none !important;
        }
    }
</style>

@endpush
