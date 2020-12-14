@extends('front.layouts.app')

@push('style')
<link rel="stylesheet" href="{{ asset('/front/css/safetyandtrust.css') }}">
@endpush

@section('content')

<section>
    <div class="container-fluid bg-img">
        <div class="row justify-content-center">
            <div class="row  justify-content-center"><h1><strong>Network built on Safety & Trust</strong></h1></div>
            <h3 class="text-center">Connecting vetted & certified home cooks with community members seeking homemade meals</h3>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <h3 style="color: #535353; text-align: center;"><strong>Ensuring a Great Experience</strong></h3>
            <p class="text-muted text-center">At DishDivvy, we strive to create memorable and positive food experiences for all of our users. Your health and well being are paramount to us <br> and we are committed to providing a safe and trusted marketplace for customers.  In order to be accepted to the DishDivvy network, each cook <br> must provide proof of food safety training and submit a copy of a current Food Handler Card from an accredited and verified institution from their <br> respective state.</p>
        </div>
    </div>
</section>




<section style="margin:30px 0  0">
    <div class="container">
        <div class="row">
            <div class="col" style=" align-self: center;">
                <div class="spa-line"></div>
            </div>
            <div class="col-6 content1 text-center" >
                <h2 class="tittle"><span style="padding: 0" class="tittle-text">DishDivvy Quality & Training Standards</span></h2>

            </div>
            <div class="col" style=" align-self: center;">
                <div class="spa-line"></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 sm1">
                <h5 style="text-align: left; margin-top: 15px;"><span style="color: #f4774f;"><strong>DishDivvy Home Kitchen Inspection</strong></span><br>
                    <span style="color: #535353;">Review quality processes, expectations, training on-site with each cook.</span></h5>
                    <p>Every cook is verified by one of our Cook Support team members and goes through a multi-step vetting processes, which includes: a face-to-face interview, in-home inspection, live cooking demonstration and taste test of sample dishes.</p>

                    <p>During the cooking demonstration, one of our Safety and Trust team members observes and reviews the cook’s meal preparation and cooking process from start to finish, to ensure compliance with general food safety guidelines. We are continually committed to providing quality meals to community members through clean, safe, and responsible methods.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sm-img1">
                <img src="{{asset('/front/images/cook-safety1-300x300.jpg')}}" alt="cook-safety1">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sm-img2">
                <img src="{{asset('/front/images/cook-safety2-300x300.jpg')}}" alt="cook-safety1">
            </div>

            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <h5 style="text-align: left; margin-top: 15px;"><span style="color: #f4774f;"><strong>Generous Helpings, Always.</strong></span><br>
                    <span style="color: #535353;">We never skimp out on portions.</span>
                </h5>
                <p>Every cook is verified by one of our Cook Support team members and goes through a multi-step vetting processes, which includes: a face-to-face interview, in-home inspection, live cooking demonstration and taste test of sample dishes.</p>

                <p>During the cooking demonstration, one of our Safety and Trust team members observes and reviews the cook’s meal preparation and cooking process from start to finish, to ensure compliance with general food safety guidelines. We are continually committed to providing quality meals to community members through clean, safe, and responsible methods.</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 sm1">
                <h5 style="text-align: left; margin-top: 15px;"><span style="color: #f4774f;"><strong>DishDivvy Home Kitchen Inspection</strong></span><br>
                    <span style="color: #535353;">Review quality processes, expectations, training on-site with each cook.</span></h5>
                    <p>We hold our cooks to a very high standard, and we ask you to do the same. Customer reviews are incredibly important for our service and we value your input. Your reviews help improve our processes and provide valuable and useful feedback to the cooks. We encourage you to leave a personal review of the cook and evaluate every meal on several standards, such as quality of the meal, portion size and overall satisfaction with the service. This allows our cooks to adjust their meals or process accordingly, and provide an even better experience on your next order. Of course we also love when you brag about us – so keep those love letters coming too!</p>

                    <p>We are confident you will enjoy every step of your experience with DishDivvy and fill up your tummies with delicious, authentic home cooked meals.  Of course, please don’t hesitate to reach out to us if you have questions about your order or the DishDivvy process… we are always ready to chat! <br>  Email us at: <a href="mailto:hello@otbokhly.com"><span style="font-weight: 400;">hello@otbokhly.com</span></a></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sm-img3">
                    <img src="{{asset('/front/images/cook-safety3-300x300.jpg')}}" alt="cook-safety1">
                </div>
            </div>
        </div>
    </div>
</section>



<section>
    <div class="container-fluid bg-img1">
            <div class="row align-items-center sm-img4 justify-content-center" >
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center">
                    <img src="{{asset('/front/images/cook-wiki-120x120.png')}}" width="186" height="188"  alt="cook-wiki">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h4><strong>Ongoing Training & Knowledge Base</strong></h4>
                    <p>We are constantly adding best practices, training modules, and ongoing education to our growing knowledge base, in order to help our cooks cultivate and grow their businesses. With these helpful tools and resources, our cooks are able to improve their process, learn new techniques and standards, and meet customers’ expectations in all facets of the DishDivvy experience.</p>
                </div>
            </div>
    </div>
</section>
@endsection

@push('script')
<script>
    $(document).ready(function(){
    // Add arrow icon for collapse element which is open by default
    $(".collapse.show").each(function(){
        $(this).prev(".card-header").find(".fa").addClass("fa-angle-right").removeClass("fa-angle-down");
    });

    // Toggle arrow right to down icon on show hide of collapse element
    $(".collapse").on('show.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
    }).on('hide.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-angle-down").addClass("fa-angle-right");
    });
});
</script>

@endpush
