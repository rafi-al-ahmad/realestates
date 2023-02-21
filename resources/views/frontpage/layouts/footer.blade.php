
        <!-- Our Footer -->
        <section class="footer_one home5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="footer_about_widget home5 pl-0">
                        <img class="logo1 img-fluid" style="height: 60px;" src="{{url('/')}}/assets/frontpage/images/logo/beynil-logo-white.png" alt="header-logo.png">
                        <p style="line-height: 1.3;" class="pt-2">{{__('Beynil.com is a reliable and prestigious real estate agency established to meet the needs of people such as houses, land, shops, offices, and also to provide consultancy to those who want to evaluate their real estate profitably.')}}</p>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pt-3 pr0  pt-3">
                        <div class="footer_about_widget home5 pl-0">
                            <h4>{{__('About Us')}}</h4>
                            <p >{{__('We’re reimagining how you buy, sell and rent. It’s now easier to get into a place you love. So let’s do this, together.')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pt-3 ">
                        <div class="footer_contact_widget home5">
                            <h4>{{__('Contact Us')}}</h4>
                            <ul class="list-unstyled">
                                <li><a href="">info@beynil.com</a></li>
                                <li><a href="">İzmir Yolu Cd No:76, Bursa</a></li>
                                <li><a href="">Turkey, 16130</a></li>
                                <li><a href="">+902244522006</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 px-md-0 pt-3">
                        <div class="footer_social_widget home5">
                            <h4>Follow Us</h4>
                            <ul class="mb30">
                                <li class="list-inline-item"><a href="https://www.facebook.com/beynil.realestate"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com/beynil.yatirim/"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.youtube.com/@beynilyatrm9003"><i class="fa fa-youtube"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.linkedin.com/company/beynil/?viewAsMember=true"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <!-- <h4>Subscribe</h4>
                            <form class="footer_mailchimp_form home5">
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                        <input type="email" class="form-control mb-2" id="inlineFormInput" placeholder="Your email">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Footer Bottom Area -->
        <section class="footer_middle_area home5 pt30 pb30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="footer_menu_widget home5">
                            <ul>
                                <li class="list-inline-item"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                                <li class="list-inline-item"><a href="{{route('home.filter')}}">{{__('Listing')}}</a></li>
                                <li class="list-inline-item"><a href="">{{__('Contact')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="copyright-widget home5 text-right">
                            <p>© {{\Carbon\Carbon::now()->format('Y')}} <a class="color-white" target="blank" href="https://oneitsol.com">One IT Solution</a>. Made with love.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a class="scrollToHome" href="{{url('frontpage')}}/#"><i class="flaticon-arrows"></i></a>
