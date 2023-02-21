@extends('frontpage.layouts.index')
@section('content')


	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
						    <li class="breadcrumb-item active" aria-current="page">{{__('Contact')}}</li>
						</ol>
						<h4 class="breadcrumb_title">{{__('Contact Us')}}</h4>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Contact -->
	<section class="our-contact pb0 bgc-f7">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-xl-8">
					<div class="form_grid">
						<h4 class="mb5">{{__('Send Us An Email')}}</h4>
						<p>{{__('Thank you for visiting our page, and we hope that you liked property listing that we are offering you. In the case that you have different inquiry or more questions don’t  hesitate to contact us.')}}</p>
			            <form class="contact_form" id="contact_form" name="contact_form" action="#" method="post" novalidate="novalidate">
							<div class="row">
				                <div class="col-md-6">
				                    <div class="form-group">
										<input id="form_name" name="form_name" class="form-control" required="required" type="text" placeholder="Name">
									</div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                    	<input id="form_email" name="form_email" class="form-control required email" required="required" type="email" placeholder="Email">
				                    </div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                    	<input id="form_phone" name="form_phone" class="form-control required phone" required="required" type="phone" placeholder="Phone">
				                    </div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
					                    <input id="form_subject" name="form_subject" class="form-control required" required="required" type="text" placeholder="Subject">
									</div>
				                </div>
				                <div class="col-sm-12">
		                            <div class="form-group">
		                                <textarea id="form_message" name="form_message" class="form-control required" rows="8" required="required" placeholder="Your Message"></textarea>
		                            </div>
				                    <div class="form-group mb0">
					                    <button type="button" class="btn btn-lg btn-thm">Send Message</button>
				                    </div>
				                </div>
			                </div>
			            </form>
					</div>
				</div>
				<div class="col-lg-5 col-xl-4">
					<div class="contact_localtion">
						<h4>{{__('Contact Us')}}</h4>
						<p>{{__('We’re reimagining how you buy, sell and rent. It’s now easier to get into a place you love. So let’s do this, together.')}}</p>
						<div class="content_list">
							<h5>{{__('Address')}}</h5>
							<p>İzmir Yolu Cd No:76, Bursa <br>Turkey, 16130</p>
						</div>
						<div class="content_list">
							<h5>{{__('Phone')}}</h5>
							<p>+90 224 452 20 06</p>
						</div>
						<div class="content_list">
							<h5>{{__('Mail')}}</h5>
							<p>info@beynil.com</p>
						</div>
						<h5>{{__('Follow Us')}}</h5>
						<ul class="contact_form_social_area">
							<li class="list-inline-item"><a href="https://www.facebook.com/beynil.realestate"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="https://www.instagram.com/beynil.yatirim/"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="https://www.youtube.com/@beynilyatrm9003"><i class="fa fa-youtube"></i></a></li>
							<li class="list-inline-item"><a href="https://www.linkedin.com/company/beynil/?viewAsMember=true"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mb50 mt50">
			<div class="row">
				<div class="col-lg-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6093.663088125113!2d28.996048!3d40.21281!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14ca152c488722bb%3A0x832d9532fe20361b!2zQmV5bmlsIFlhdMSxcsSxbSB2ZSBEYW7EscWfbWFubMSxaw!5e0!3m2!1str!2str!4v1676541715018!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
					<div class="parner_reg_btn text-right tac-smd">
                    <a class="btn btn-thm2" href="{{route('home.filter')}}">{{__('Brows Properties')}}</a>
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
