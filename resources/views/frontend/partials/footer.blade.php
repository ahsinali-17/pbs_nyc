<!-- Footer ============================================= -->
<footer class="bg-section" id="footer">
    <div class="container-fullwidth">
        <!-- Footer Widgets ============================================= -->
        <div class="footer-widgets-wrap row clearfix pb-3 pb-lg-0">
            <div class="col-lg-2">
                <div class="widget clearfix">
                    <img alt="Footer Logo" src="{{asset('images/logo@2x.png')}}"
                         style="position: relative; opacity: 0.85; max-height: 80px; margin-bottom: 20px;">
                    <p>Get ahead of it.</p>
                    <div class="line" style="margin: 30px 0;"></div>
                    <p class="ls1 t300" style="opacity: 0.6; font-size: 13px;">Copyright &copy; {{now()->year}} PBS</p>
                    <button class="btn btn-sm btn-secondary">Patent Pending</button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="quick-contact-widget widget form-widget clearfix ">
                    <h4 class="ls1 t400 uppercase">Contact Us</h4>
                    <div class="form-result"></div>
                    <form action="{{route('contactwithquickemail')}}" class="quick-contact-form"
                          id="quick-contact-form2" method="post" name="quick-contact-form">

                        <div class="form-process"></div>
                        <input class="required sm-form-control input-block-level not-dark"
                               id="quick-contact-form-name2" name="quick-contact-form-name2"
                               placeholder="Full Name" type="text"
                               value=""/>
                        <input class="required sm-form-control email input-block-level not-dark"
                               id="quick-contact-form-email2" name="quick-contact-form-email2"
                               placeholder="Email Address"
                               type="email"
                               value=""/>
                        <input class="required sm-form-control input-block-level not-dark"
                               id="quick-contact-form-phone2" name="quick-contact-form-phone2"
                               placeholder="Phone Number (+1-555-2221)" type="text"
                               value=""/>
                        <textarea class="required sm-form-control input-block-level not-dark short-textarea"
                                  cols="30" id="quick-contact-form-message2" name="quick-contact-form-message2"
                                  placeholder="Details"
                                  rows="5"></textarea>
                        <input name="prefix" type="hidden" value="quick-contact-form-">
                        <button class="button button-3d button-rounded btn-block nomargin"
                                id="quick-contact-form-submit2" name="quick-contact-form-submit2"
                                type="submit" value="submit">Send Email
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget clearfix">
                    <h4 class="ls1 t400 uppercase">Services<strong> & </strong>Resources</h4>
                    {{--asd--}}
                    <div class="row">
                        <div class="col-6 bottommargin-sm widget_links widget_real_estate_popular">
                            <ul>
                                <li><a href="{{route('alerts')}}">
                                        <div><i class="icon-user-clock"></i> Alerts</div>
                                    </a></li>
                                <li><a href="{{route('generalcontracting')}}">
                                        <div><i class="icon-line-paper"></i> General Contracting</div>
                                    </a></li>
                                <li><a href="{{route('network')}}">
                                        <div><i class="icon-connectdevelop"></i> Network</div>
                                    </a></li>
{{--                                <li><a href="#">--}}
{{--                                        <div><i class="icon-ruler-combined"></i> Planning tool (coming soon)</div>--}}
{{--                                    </a></li>--}}
{{--                                <li><a href="#">--}}
{{--                                        <div><i class="icon-user-clock"></i> Development tool (coming soon)</div>--}}
{{--                                    </a></li>--}}
                                <li><a href="{{route('frontend.blog.show')}}">
                                        <div><i class="icon-rss"></i> Blog</div>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="col-6 bottommargin-sm widget_links widget_real_estate_popular">
                            <ul>
                                <li><a href="{{route('nycdobcode')}}">
                                        <div><i class="icon-book"></i> NYC DOB Code</div>
                                    </a></li>
                                <li><a href="{{route('nycfdnycode')}}">
                                        <div><i class="icon-book-reader"></i> NYC FDNY Code</div>
                                    </a></li>
                                <li><a href="{{route('nycdepcode')}}">
                                        <div><i class="icon-book-open"></i> DOB Service Updates</div>
                                    </a></li>
                                <li><a href="{{route('memberportal')}}">
                                        <div><i class="icon-people-carry"></i> Member Portal
                                        </div>
                                    </a></li>
                                <li><a href="{{route('violationcorrection')}}">
                                        <div><i class="icon-phone-square"></i> Violation Correction</div>
                                    </a></li>
                                <li><a href="{{route('filingrepresentation')}}">
                                        <div><i class="icon-user-clock"></i> Filing Representation</div>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget subscribe-widget subscribe-form clearfix" data-loader="button">
                    <h4 class="ls1 t400 uppercase">Newsletter</h4>
                    <div class="widget-subscribe-form-result"></div>
                    <form action="{{route('subscribe')}}" class="nobottommargin" method="post">
                        <input class="required sm-form-control input-block-level not-dark email mb-2"
                               id="widget-subscribe-form-email"
                               name="widget-subscribe-form-email" placeholder="Enter your Email" type="email">
                        <button class="button button-3d button-rounded btn-block nomargin"
                                style="margin-top: 15px;" type="submit">Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- .footer-widgets-wrap end -->
    </div>
</footer>
<!-- #footer end -->
