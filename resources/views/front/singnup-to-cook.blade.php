@extends('front.layouts.app')



@push('style')
<link rel="stylesheet" href="{{ asset('/front/css/signup-to-cook.css') }}">




@endpush

@section('content')


<!-- ============================================ How_it_works =====================================================-->


<section class="How_it_works">
    <div class="container-fluid">
        <div class="row align-items-end">
            <div class="text-center container">
                <h2> How it works </h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                <img src="{{ asset('front/images/cook-price-dish.GIF') }}" alt="">
                <h4><span>Your Dishes, Your Prices</span></h4>
                <p>Total flexibility and control over <br> your menu.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                <img src="{{ asset('front/images/cook-calendar.GIF') }}" alt="">
                <h4><span>Set Your Own Schedule</span></h4>
                <p>You choose which days and times <br> your menu is active.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                <img src="{{ asset('front/images/how_it_work_1.GIF') }}" alt="">
                <h4><span>Easy, Curbside Pickups</span></h4>
                <p>Seamless coordination with your <br>customers using our App.</p>
            </div>
        </div>
    </div>
</section>


<!-- ======================================== DishDivvy_Benefits =====================================================-->


<section class="DishDivvy_Benefits" style="background-color: #f9f9f9">

    <div class="container">


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>DishDivvy Benefits</h2>
            </div>

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-self-start">
                <div class="DB1">
                    <h4 style="padding-left: 30px;">Powerful Business Tools</h4>
                    <p style="padding-left: 30px;"><span>Spend less time on the boring business tasks, and more time on the fun stuff… cooking!</span></p>
                    <ul type="none">
                        <li>
                            <div class="row">
                                <h5><svg width="2em" height="1.25em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg><span>Your own dedicated webpage</span></h5>

                                <p><span> Showcasing your profile, your story, and of course, your delicious menu. Share your unique webpage with your community to drive sales and traffic to your kitchen! <a href="https://shop.dishdivvy.com/cook/-M-khe-_jsjMLbLYBZua">(see example here)</a> </span></p>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <h5><svg width="2em" height="1.25em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg><span>Menu builder & management</span></h5>
                                <p><span> Our Dish Uploader Wizard makes it super easy to add new dishes to your menu, which will automatically display on your website and our marketplace. </span></p>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <h5><svg width="2em" height="1.25em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg><span>Smart dish scheduler</span></h5>

                                <p><span> Use our smart calendar to schedule your dishes around your personal schedule, with the flexibility to set different pickup times and portion inventories on any day. </span></p>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <h5><svg width="2em" height="1.25em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg><span>In-App chat with customers</span></h5>

                                <p><span> Protect your personal information by using our secure, in-app chat to communicate with customers on active orders. Eliminate the back and forth time you spend now, texting and calling customers by having an easy, seamless chat that is connected to your orders. </span></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 align-self-center">
                <div class="DB2">
                    <div class="row">
                        <iframe allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" frameborder="0" height="325px" src="https://www.youtube.com/embed/KeEQtKnyVGE" width="100%"></iframe>
                        <div style="width: 100%;">

                            <a class="btn btn-block " style="padding-left: 0;padding-right: 0 ;margin-top:8px" href="#">Launch Your Home Kitchen</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================================  START SECTION Transparent fees, Direct payments ============================================-->

<section class="TD">

    <div class="text-center">
        <h2>Transparent fees, Direct payments</h2>
    </div>
    <div class="container">

        <div class="row justify-content-center">

            <!--DIV No fee to join DishDivvy -->

            <div class="col-lg-5 col-md-5">

                <div class="NftjDD">
                    <img style="float: left;" src="{{ asset('front/images/icon-04.png') }}" alt="icon-04">


                    <div class="NftjDD1">
                        <h5>No fee to join DishDivvy</h5>
                        <p><span> There is absolutely no fees to join DishDivvy. In fact, our team will guide you through the onboarding process and help you build your menu, at no charge. </span></p>
                    </div>
                </div>
            </div>


            <!--=============================== DIV We only make money if you make money ===============================-->

            <div class="col-lg-5 col-md-5">
                <div class="Wommiymm">
                    <img src="{{ asset('front/images/icon-03.png') }}" alt="icon-03">


                    <div class="Wommiymm1">
                        <h5>We only make money if you make money</h5>
                        <p><span> DishDivvy takes a 15% marketing fee on every transaction, which includes credit card transaction fees. There are no fees to host your menu.</span></p>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>
            <!--=========================== Start DIV Easy direct deposit setup ====================== -->

            <div class="col-lg-5 col-md-5">

                <div class="Edds">

                    <img src="{{ asset('front/images/icon-01.png') }}" alt="icon-01">


                    <div class="Edds1">
                        <h5>Easy direct deposit setup</h5>
                        <p>Easily connect your bank account to your DishDivvy cook account, and accept direct deposit payments for every dish that you sell. Track your earnings all in one place.</p>
                    </div>

                </div>
            </div>

            <!--============================DIV Get paid on every order ==============================================-->

            <div class="col-lg-5 col-md-5">
                <div class="Gpoeo">
                    <img src="{{ asset('front/images/icon-02.png') }}" alt="icon-02">


                    <div class="Gpoeo1">
                        <h5>Get paid on every order</h5>
                        <p>A direct deposit payment is sent your way for every order you hand off. These rolling payouts allow you to keep your business going with continuous cash flow.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!--========================================= END  Easy direct deposit setup ========================================== -->

<!--================================  END SECTION Transparent fees, Direct payments ============================================-->

<!--========================================= START Build a thriving, fulfilling business ======================================== -->

<section class="Btfb">

    <div class="container text-center">

        <h2>Build a thriving, fulfilling business</h2>
        <div class="row" style="justify-content: space-between">

            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <iframe height="320" src="https://www.youtube.com/embed/XuLG0wKb4Bs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%;"></iframe>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="Btfb-img">
                    <img src="{{ asset('front/images/quote-icon.png') }}" alt="quote-icon">
                </div>
                <div>
                    <p>DishDivvy allows me to say, to myself, that I have my own business. And that people are appreciating that. It gives you a very happy feeling inside.</p>
                </div>
                <div class="button1">
                    <a class="btn btn-block "style="padding-left: 0;padding-right: 0 ;margin-top:8px" href="/signup#registerFormContainerScroll">Join Today</a>
                </div>
            </div>
        </div>

    </div>



</section>

<!--========================================= END Build a thriving, fulfilling business ======================================== -->


<!-- =============================================== Start An extra hand in the kitchen ========================================= -->
<section class="Aehik">
    <div class="container-fluid">
        <hr>
        <div class="container">



            <div class="row align-items-start">





                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h2 style="padding-left: 30px;">An extra hand in the kitchen…</h2>
                    <ul type="none">
                        <li>
                            <div class="row">

                                <h5><i class="fa fa-check-circle"></i><span>Software to handle the business stuff</span></h5>
                                <p><span> Spend more time on your passion and craft, and less time dealing with calls, texts, schedules and payments. Our software handles all of that for you! </span></p>


                            </div>

                        </li>
                        <li>
                            <div class="row">

                                <h5><i class="fa fa-check-circle"></i><span>Support via email and text</span></h5>
                                <p><span> Reach out to our Cook Support Team via email or text message anytime, and a representative will get back to you asap! </span></p>

                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <h5><i class="fa fa-check-circle"></i><span>Cook knowledgebase</span></h5>
                                <p><span> Any-time access to our extensive knowledgebase, full of helpful articles and video tutorials on how to grow your home cooking business. </span></p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                    <img src="{{ asset('front/images/Hand-in-Kitchen.GIF') }}">



                </div>
            </div>


        </div>

    </div>
    <hr>
</section>

<!-- ============================================ End An extra hand in the kitchen ================================================ -->

<!--================================================= Start Food is Joy ================================================================-->

<section class="Food_is_Joy">
    <div class="container">
        <div class="FiJ">

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="txt-content">
                        <div class="text-center">
                            <h2>Food is Joy</h2>
                            <div class="main-content">
                                <p>
                                    <span> Especially when it’s made with a <b>whole lotta love.</b> Homemade meals satisfy more than just our appetites: they connect people. One of the biggest joys of a passionate cook is to share their creations, and to see the delight their dish brings to people. DishDivvy allows you to share your signature dishes with people in your community, and get immediate feedback on the impact your food is making in your neighborhood. Bring the joy of homemade meals to your neighbors, and share your culinary talents with your community. </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-block dd-button" href="/signup#registerFormContainerScroll">Become a HomeCook Partner</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">

                </div>
            </div>

        </div>
    </div>
</section>
<!-- ========================================================== END Food is Joy ===================================================== -->

<!--======================================= START Want More Info? ================================================== -->

<section class="WMI">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 offset-sm-0 offset-md-2 col-md-8">
                <div class="row row align-items-start">
                    <div class="col-md-6 col-sm-12 align-self-center">
                        <div class="row d-flex align-items-center text-center">
                            <div class="col-md-12">
                                <h2>Want more info?</h2>
                            </div>
                            <div class="w-100"></div>

                            <!--============================= Start Download DishDivvy Cook Booklet ========================== -->

                            <div class="col-md-12 col-lg-12">
                                <div class="DDCB">
                                    <a class="download-booklet" target="_blank" href="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/static%2FCook%20Sales%20Booklet_low%20res_6_19_2020.pdf?alt=media&amp;token=36c259ec-e5c8-46c6-892a-c759d913a9c7">Download DishDivvy Cook Booklet</a>
                                </div>
                            </div>

                            <!-- ========================== END Download DishDivvy Cook Booklet ========================== -->

                            <div class="w-100"></div>

                            <!-- ============================ Start Also in Espanol ======================================= -->
                            <div class="col-md-12 mt-5">
                                <div class="aiE">
                                    <a class="download-booklet download-booklet-espanol " target="_blank" href="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/static%2Fcook-sales-booklet_spanish.pdf?alt=media&amp;token=f8a95cd9-9d07-418a-971e-a2a3bcf53f93">also in Español</a>
                                </div>
                            </div>
                            <!-- =============================== END Also in Espanol ======================================= -->

                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 align-self-start">
                        <div class="CB">
                            <img src="{{ asset('front/images/cook-booklet.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================================= END Want More Info? ======================================================== -->


<!-- ======================================= START Have more questions? ==================================================  -->
<section class="Hmq">
    <div class="Hmq1">
        <hr>
    </div>

    <div class="text-center">

        <div class="Hmq2">
            <h4>Have more questions? Email support@dishdivvy.com</h4>
        </div>

    </div>

</section>

<!-- ======================================= END Have more questions? ==================================================  -->

@endsection


@push('script')
{{-- <script src="{{ asset('/front/js/signup-to-cook.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

@endpush
