@extends('front.layouts.app')

@push('style')
<link rel="stylesheet" href="{{ asset('/front/css/faqs.css') }}">
@endpush

@section('content')

<section style="background-image: url('https://www.dishdivvy.com/wp-content/uploads/2017/07/hero-tabletop-600px-ht.jpg?id=157');    background-size: cover;background-repeat: no-repeat; color:#fff ;padding:50px 0;margin-bottom-30px">
    <div class="container-fluid bg-img">
        <div class="row justify-content-center">
            <div class="row  justify-content-center"><h1><strong> Frequently Asked Questions</strong></h1></div>
            <h3 class="text-center">Info about ordering, dishes, cooks, & safety</h3>
        </div>
    </div>
</section>

<section class="px-2 my-5">
    <div class="container" style="padding: 0">
        <div >
            <ul class="nav nav-pills mb-3 justify-content-center mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link show active" id="pills-All-tab" data-toggle="pill" href="#pills-All" role="tab" aria-controls="pills-All" aria-selected="true">All</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-Cooking-tab" data-toggle="pill" href="#pills-Cooking" role="tab" aria-controls="pills-Cooking" aria-selected="false">Cooking</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-Ordering-tab" data-toggle="pill" href="#pills-Ordering" role="tab" aria-controls="pills-Ordering" aria-selected="false">Ordering</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-Safety-tab" data-toggle="pill" href="#pills-Safety" role="tab" aria-controls="pills-Safety" aria-selected="false">Safety</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-All" role="tabpanel" aria-labelledby="pills-All-tab">
                    <div class="accordion1" id="accordion1">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>

                                        </i>
                                        <span>How does the order process work?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>Customers may view available dishes up to a 30-day window, and can order meals in advance for future dates.  You can order multiple dishes form multiple cooks all on the same transaction, so that you can very conveniently plan your entire week of dining in one easy checkout.</p>

                                    <p>You can select your portion size, special dish options (i.e. spice level, meat options, etc), pickup or delivery time and add any special notes to the order.  Once you checkout, your cook will confirm the order and you’re all set.  You can chat directly with the cook via the APP if you need to communicate to your cook.</p>

                                    <p>On the day of your order, you will open the APP and click ‘I’m Outside” when you get to curbside.  Your cook will be alerted, and will bring your order out to you at curbside.  For delivery orders, the delivery driver will arrive at your delivery address at the indicated delivery time on your order receipt. It’s that easy! Getting homemade food with a click of a button (or two!)</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What are your portion sizes?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>

                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>You may select from 2 portion sizes when placing an order:  A Single Portion or Family Portion.  A single portion is a very generous portion, typically enough for an individual plus leftovers for the next day.  A family portion is equivalent to 4 single portions, and typically enough to feed 4-6 people.  Portion descriptions are always provided on the dish details page of each dish, so that you know how much to order for you and your family.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What is your cook vetting process?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>At DishDivvy we strive to create memorable and positive food experiences for all of our users. Cooks must provide proof of food safety training and submit a copy of a current California Food Handler Card from ANSI accredited and verified institution. Every cook is verified by one of our Cook Support Team members and goes through a multi-step vetting processes, which includes a face-to-face interview, on-site kitchen visit/approval, and sample taste test (our favorite part of course!). At DishDivvy, we are committed to doing things responsibly, and most importantly, safely.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What is a California Food Handler Card and why do I need one?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>If you prepare, store or serve food, you must obtain California Food Handler Card within 30 days of starting your operation. If you already have a California Food Protection Manager Certification, you don’t need a California Food Handler Card. An up to date copy of your CA Food Handler Card or other qualifying certification must be uploaded to DishDivvy for accurate and current record keeping purposes. If you do not have a CA Food Handler Card at the time of your application, our cook onboarding specialists will provide information on where and how to obtain certification after completing your training.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What if I have an issue with my order?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>We are committed to providing a joyful and positive experience in all areas of DishDivvy ordering and dining experience.  In the event that there is an issue with your order, or you need assistance from a DishDivvy Customer Support team member, please email us at hello@dishdivvy.com with any questions or concerns.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What is the cancellation policy?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>Diners must notify DishDivvy of cancelled orders at least 48 hours in advance to the cook date of the order. For orders cancelled within this timeframe, we will gladly process a full refund and notify the cook of the cancelled order.  Unfortunately, due to the nature of planning out meals and preparing dishes, we can not accept cancellations made less than 48 hours in advance.</p>

                                    <p>To speak to a DishDivvy customer service specialist, please email us at<a href="mailto:hello@dishdivvy.com">hello@dishdivvy.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSeven">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>My question wasn’t answered. How can I learn more about DishDivvy?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>Please send us an email at hello@dishdivvy.com we would be glad to speak to you! Thanks!</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading8">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>Who are DishDivvy customers?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>Most of our customers are cooks’ neighbors and people in their community- a parent from their PTA group, their buddy from the local gym and friends of friends. All DishDivvy members have to create a profile and agree to our terms and community guidelines, which results in a safe and secure meal experience for all users of the platform.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading9">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>Who are DishDivvy HomeCooks?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>They are individuals who are already sharing their culinary passion and talent with friends and family and love cooking. HomeCooks do not need to have a culinary degree or be a professional chef. Most of our HomeCooks are:</p>

                                    <ul>
                                        <li>Former food industry professionals who  want to avoid the intense demands of the restaurant industry but still want to cook for a living.</li>
                                        <li>Food entrepreneurs, who already run their own catering operations and would like more support as they build their business.</li>
                                        <li>Stay at home parents or grandparents who are incredible cooks, who are seeking a supplemental, side income</li>
                                        <li>Folks who are already sharing their food at farmers’ markets and other community centers</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading10">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What are the regulations for Private HomeCooks?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>On January 1, 2019, AB 626, the Homemade Food Act was written into law in the state of California, and as a result, the California Retail Food Code was amended to reflect the newly passed regulations on microenterprise home kitchen operations.  Counties across California are currently working on launching permitting resolutions and processes for local home kitchen operators.  Email us to stay tuned about news and updates on Ab 626 in your county.</p>

                                    <p>Our Private Cook Marketplace: Through the DishDivvy platform, HomeCooks are making themselves available for hire to buy ingredients and prepare home-made, wholesome meals for Neighbors who are part of the same neighborhood, community, or circle.  The rules and regulations applicable to restaurants are not applicable to such services for hire.  Even so, DishDivvy makes conscious efforts for the safety and well-being of its users through conducting kitchen approvals, requiring strict guidelines, and also working with state- and county-level decision-makers to improve health and food policies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading11">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What about other local laws and regulations?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>Each state, county, and city has its own rules and regulations that may impact your availability for hire as a HomeCook.  For example, your services may be subject to laws that govern running a business.  You may need to register with the respective authorities, get a business license, and/or obtain a permit before you can make your services available for hire.  You may also need to pay taxes or get insurance.</p>

                                    <p>Before you apply to become a HomeCook for DishDivvy, it’s important that you check out the laws applicable to you and make sure you’re in compliance with them.  By opening an account with DishDivvy, you’re agreeing that you are and will remain in compliance with such laws and regulations.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading12">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>Is my order hot and ready to eat when I pick it up?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion1">
                                <div class="card-body">
                                    Yes!  Our cooks prepare your order only after you place it, which means food is sourced, cooked, and packaged same-day and fresh.  When you receive your order, it will be packaged hot and ready to eat.  Of course, you can always refrigerate it and consume later, or even save your left overs for the following day.  If you have a special packaging request you’d like to inform your cook about, you can always leave it in the ‘customer notes’ section at checkout.  After an order is confirmed on the app, you can actually chat directly with your HomeCook, in real-time.  You can use the chat for any special requests or to alert your cook you are running a bit earlier or later than expected.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading13">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>Does DishDivvy provide insurance to its HomeCooks to cover food safety?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>DishDivvy carries an umbrella liability insurance for the users of the services. If you are HomeCook, DishDivvy’s insurance covers ‘product completion’ of the food from the time it leaves the HomeCook’s possession and travels to the end consumer. This coverage does not provide coverage to HomeCooks for the operation of a food facility or preparation of the food within their home, prior to food hand-off. If you are HomeCook, DishDivvy recommends that you carry your own general and food safety liability insurance for any additional insurance coverages needed to safely run your home kitchen operation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading14">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>Need to report a food safety concern?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>At DishDivvy, we take food safety very seriously. If you have experienced a food safety issue with your order, you can File a Food Safety Complaint here. Please note that this form is for validated orders. Each complaint should be specific to a HomeCook and an Order #.</p>

                                    <p>You can also file a complaint with your local enforcement agency. Click here for an extensive list of contact information for local enforcement agencies in CA.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading15">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>How does DishDivvy make money?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>DishDivvy takes a 15% commission fee on each transaction, and cooks keep 85% of the transactional subtotal. DishDivvy’s 15% commission covers services such as credit card processing expenses, limited liability insurance coverage, marketing expenses and operational expenses for running the DishDivvy platform.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading16">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What are the requirements for permitting under AB 626?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse16" class="collapse" aria-labelledby="heading16" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>We have put together an infographic that explains the main points of AB 626 and the requirements for the permitting process.</p>
                                    <p><span style="text-decoration: underline;"><a href="https://www.dishdivvy.com/wp-content/uploads/2019/10/mehko-inforgaphic.pdf"> <strong>CLICK HERE TO VIEW</strong></a></span></p>

                                    <p>For any questions, you can email <span style="text-decoration: underline;"><a href="mailto:support@dishdivvy.com">support@dishdivvy.com</a></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading17">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What happens if a food safety complaint is made against a specific HomeCook?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse17" class="collapse" aria-labelledby="heading17" data-parent="#accordion1">
                                <div class="card-body">
                                    <p>DishDivvy is obligated to submit the name and permit number of a microenterprise home kitchen operation to the local enforcement agency if it receives, through its Internet Web site or mobile application, three or more unrelated individual food safety or hygiene complaints in a calendar year from consumers that have made a purchase through its Internet Web site or mobile application. DishDivvy shall submit this information to the local enforcement agency within two weeks of the third complaint received.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-Cooking" role="tabpanel" aria-labelledby="pills-Cooking-tab">
                    <div class="accordion2" id="accordion2">
                        <div class="card">
                            <div class="card-header" id="heading18">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse18" aria-expanded="true" aria-controls="collapse18">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What is a California Food Handler Card and why do I need one?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse18" class="collapse" aria-labelledby="heading18" data-parent="#accordion2">
                                <div class="card-body">
                                    <p>If you prepare, store or serve food, you must obtain California Food Handler Card within 30 days of starting your operation. If you already have a California Food Protection Manager Certification, you don’t need a California Food Handler Card. An up to date copy of your CA Food Handler Card or other qualifying certification must be uploaded to DishDivvy for accurate and current record keeping purposes. If you do not have a CA Food Handler Card at the time of your application, our cook onboarding specialists will provide information on where and how to obtain certification after completing your training.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading19">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse19" aria-expanded="false" aria-controls="collapse19">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What is the cancellation policy?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse19" class="collapse" aria-labelledby="heading19" data-parent="#accordion2">
                                <div class="card-body">
                                    <p>Diners must notify DishDivvy of cancelled orders at least 48 hours in advance to the cook date of the order. For orders cancelled within this timeframe, we will gladly process a full refund and notify the cook of the cancelled order. &nbsp;Unfortunately, due to the nature of planning out meals and preparing dishes, we can not accept cancellations made less than 48 hours in advance.</p>
                                    <p>To speak to a DishDivvy customer service specialist, please email us at<a href="mailto:hello@dishdivvy.com"> hello@dishdivvy.com</a></p>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading20">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse20" aria-expanded="false" aria-controls="collapse20">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What are the regulations for Private HomeCooks?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse20" class="collapse" aria-labelledby="heading20" data-parent="#accordion2">
                                <div class="card-body">
                                    <p>On January 1, 2019, AB 626, the Homemade Food Act was written into law in the state of California, and as a result, the California Retail Food Code was amended to reflect the newly passed regulations on microenterprise home kitchen operations.  Counties across California are currently working on launching permitting resolutions and processes for local home kitchen operators.  Email us to stay tuned about news and updates on Ab 626 in your county.</p>

                                    <p>Our Private Cook Marketplace: Through the DishDivvy platform, HomeCooks are making themselves available for hire to buy ingredients and prepare home-made, wholesome meals for Neighbors who are part of the same neighborhood, community, or circle.  The rules and regulations applicable to restaurants are not applicable to such services for hire.  Even so, DishDivvy makes conscious efforts for the safety and well-being of its users through conducting kitchen approvals, requiring strict guidelines, and also working with state- and county-level decision-makers to improve health and food policies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading21">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse21" aria-expanded="false" aria-controls="collapse21">
                                        <i></i>
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">

                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What about other local laws and regulations?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse21" class="collapse" aria-labelledby="heading21" data-parent="#accordion2">
                                <div class="card-body">
                                    <p>Each state, county, and city has its own rules and regulations that may impact your availability for hire as a HomeCook.  For example, your services may be subject to laws that govern running a business.  You may need to register with the respective authorities, get a business license, and/or obtain a permit before you can make your services available for hire.  You may also need to pay taxes or get insurance.</p>

                                    <p>Before you apply to become a HomeCook for DishDivvy, it’s important that you check out the laws applicable to you and make sure you’re in compliance with them.  By opening an account with DishDivvy, you’re agreeing that you are and will remain in compliance with such laws and regulations.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading22">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse22" aria-expanded="false" aria-controls="collapse22">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>How does DishDivvy make money?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse22" class="collapse" aria-labelledby="heading22" data-parent="#accordion2">
                                <div class="card-body">
                                    <p>DishDivvy takes a 15% commission fee on each transaction, and cooks keep 85% of the transactional subtotal. DishDivvy’s 15% commission covers services such as credit card processing expenses, limited liability insurance coverage, marketing expenses and operational expenses for running the DishDivvy platform.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading23">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse23" aria-expanded="false" aria-controls="collapse23">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What are the requirements for permitting under AB 626?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse23" class="collapse" aria-labelledby="heading23" data-parent="#accordion2">
                                <div class="card-body">
                                    <p>We have put together an infographic that explains the main points of AB 626 and the requirements for the permitting process.</p>
                                    <p><span style="text-decoration: underline;"><a href="https://www.dishdivvy.com/wp-content/uploads/2019/10/mehko-inforgaphic.pdf"> <strong>CLICK HERE TO VIEW</strong></a></span></p>

                                    <p>For any questions, you can email <span style="text-decoration: underline;"><a href="mailto:support@dishdivvy.com">support@dishdivvy.com</a></span></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-Ordering" role="tabpanel" aria-labelledby="pills-Ordering-tab">
                    <div class="accordion3" id="accordion3">
                        <div class="card">
                            <div class="card-header" id="heading24">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse24" aria-expanded="true" aria-controls="collapse24">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>How does the order process work?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse24" class="collapse" aria-labelledby="heading24" data-parent="#accordion3">
                                <div class="card-body">
                                    <p>Customers may view available dishes up to a 30-day window, and can order meals in advance for future dates.  You can order multiple dishes form multiple cooks all on the same transaction, so that you can very conveniently plan your entire week of dining in one easy checkout.</p>

                                    <p>You can select your portion size, special dish options (i.e. spice level, meat options, etc), pickup or delivery time and add any special notes to the order.  Once you checkout, your cook will confirm the order and you’re all set.  You can chat directly with the cook via the APP if you need to communicate to your cook.</p>

                                    <p>On the day of your order, you will open the APP and click ‘I’m Outside” when you get to curbside.  Your cook will be alerted, and will bring your order out to you at curbside.  For delivery orders, the delivery driver will arrive at your delivery address at the indicated delivery time on your order receipt. It’s that easy! Getting homemade food with a click of a button (or two!)</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading25">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse25" aria-expanded="false" aria-controls="collapse25">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span> What are your portion sizes?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse25" class="collapse" aria-labelledby="heading25" data-parent="#accordion3">
                                <div class="card-body">
                                    <p>You may select from 2 portion sizes when placing an order:  A Single Portion or Family Portion.  A single portion is a very generous portion, typically enough for an individual plus leftovers for the next day.  A family portion is equivalent to 4 single portions, and typically enough to feed 4-6 people.  Portion descriptions are always provided on the dish details page of each dish, so that you know how much to order for you and your family.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading26">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse26" aria-expanded="false" aria-controls="collapse26">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What if I have an issue with my order?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse26" class="collapse" aria-labelledby="heading26" data-parent="#accordion3">
                                <div class="card-body">
                                    <p>We are committed to providing a joyful and positive experience in all areas of DishDivvy ordering and dining experience.  In the event that there is an issue with your order, or you need assistance from a DishDivvy Customer Support team member, please email us at hello@dishdivvy.com with any questions or concerns.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading27">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse27" aria-expanded="false" aria-controls="collapse27">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What is the cancellation policy?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse27" class="collapse" aria-labelledby="heading27" data-parent="#accordion3">
                                <div class="card-body">

                                    <p>Diners must notify DishDivvy of cancelled orders at least 48 hours in advance to the cook date of the order. For orders cancelled within this timeframe, we will gladly process a full refund and notify the cook of the cancelled order. Unfortunately, due to the nature of planning out meals and preparing dishes, we can not accept cancellations made less than 48 hours in advance.</p>
                                    <p>To speak to a DishDivvy customer service specialist, please email us at<a href="mailto:hello@dishdivvy.com"> hello@dishdivvy.com</a></p>


                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading28">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse28" aria-expanded="false" aria-controls="collapse28">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>Is my order hot and ready to eat when I pick it up?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse28" class="collapse" aria-labelledby="heading28" data-parent="#accordion3">
                                <div class="card-body">
                                    <p>Yes!  Our cooks prepare your order only after you place it, which means food is sourced, cooked, and packaged same-day and fresh.  When you receive your order, it will be packaged hot and ready to eat.  Of course, you can always refrigerate it and consume later, or even save your left overs for the following day.  If you have a special packaging request you’d like to inform your cook about, you can always leave it in the ‘customer notes’ section at checkout.  After an order is confirmed on the app, you can actually chat directly with your HomeCook, in real-time.  You can use the chat for any special requests or to alert your cook you are running a bit earlier or later than expected.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-Safety" role="tabpanel" aria-labelledby="pills-Safety-tab">
                    <div class="accordion4" id="accordion4">
                        <div class="card">
                            <div class="card-header" id="heading29">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse29" aria-expanded="true" aria-controls="collapse29">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What is your cook vetting process?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse29" class="collapse" aria-labelledby="heading29" data-parent="#accordion4">
                                <div class="card-body">
                                    <p>At DishDivvy we strive to create memorable and positive food experiences for all of our users. Cooks must provide proof of food safety training and submit a copy of a current California Food Handler Card from ANSI accredited and verified institution. Every cook is verified by one of our Cook Support Team members and goes through a multi-step vetting processes, which includes a face-to-face interview, on-site kitchen visit/approval, and sample taste test (our favorite part of course!). At DishDivvy, we are committed to doing things responsibly, and most importantly, safely.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading30">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse30" aria-expanded="false" aria-controls="collapse30">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What is a California Food Handler Card and why do I need one?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse30" class="collapse" aria-labelledby="heading30" data-parent="#accordion4">
                                <div class="card-body">
                                    <p>If you prepare, store or serve food, you must obtain California Food Handler Card within 30 days of starting your operation. If you already have a California Food Protection Manager Certification, you don’t need a California Food Handler Card. An up to date copy of your CA Food Handler Card or other qualifying certification must be uploaded to DishDivvy for accurate and current record keeping purposes. If you do not have a CA Food Handler Card at the time of your application, our cook onboarding specialists will provide information on where and how to obtain certification after completing your training.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading31">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse31" aria-expanded="false" aria-controls="collapse31">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What are the regulations for Private HomeCooks?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse31" class="collapse" aria-labelledby="heading31" data-parent="#accordion4">
                                <div class="card-body">
                                    <p>On January 1, 2019, <a href="https://leginfo.legislature.ca.gov/faces/billNavClient.xhtml?bill_id=201720180AB626">AB 626, the Homemade Food Act</a> was written into law in the state of California, and as a result, the California Retail Food Code was amended to reflect the newly passed regulations on microenterprise home kitchen operations. Counties across California are currently working on launching permitting resolutions and processes for local home kitchen operators. <a href="mailto:hello@dishdivvy.com">Email us to stay tuned about news and updates on Ab 626 in your county</a>.</p>
                                    <p>Our Private Cook Marketplace: Through the DishDivvy platform, HomeCooks are making themselves available for hire to buy ingredients and prepare home-made, wholesome meals for Neighbors who are part of the same neighborhood, community, or circle. The rules and regulations applicable to restaurants are not applicable to such services for hire. Even so, DishDivvy makes conscious efforts for the safety and well-being of its users through conducting kitchen approvals, requiring strict guidelines, and also working with state- and county-level decision-makers to improve health and food policies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading32">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse32" aria-expanded="false" aria-controls="collapse32">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What about other local laws and regulations?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse32" class="collapse" aria-labelledby="heading32" data-parent="#accordion4">
                                <div class="card-body">
                                    <p>Each state, county, and city has its own rules and regulations that may impact your availability for hire as a HomeCook.  For example, your services may be subject to laws that govern running a business.  You may need to register with the respective authorities, get a business license, and/or obtain a permit before you can make your services available for hire.  You may also need to pay taxes or get insurance.</p>

                                    <p>Before you apply to become a HomeCook for DishDivvy, it’s important that you check out the laws applicable to you and make sure you’re in compliance with them.  By opening an account with DishDivvy, you’re agreeing that you are and will remain in compliance with such laws and regulations.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading33">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse33" aria-expanded="false" aria-controls="collapse33">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>Does DishDivvy provide insurance to its HomeCooks to cover food safety?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse33" class="collapse" aria-labelledby="heading33" data-parent="#accordion4">
                                <div class="card-body">
                                    <p>DishDivvy carries an umbrella liability insurance for the users of the services. If you are HomeCook, DishDivvy’s insurance covers ‘product completion’ of the food from the time it leaves the HomeCook’s possession and travels to the end consumer. This coverage does not provide coverage to HomeCooks for the operation of a food facility or preparation of the food within their home, prior to food hand-off. If you are HomeCook, DishDivvy recommends that you carry your own general and food safety liability insurance for any additional insurance coverages needed to safely run your home kitchen operation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading34">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse34" aria-expanded="false" aria-controls="collapse34">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>Need to report a food safety concern?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse34" class="collapse" aria-labelledby="heading34" data-parent="#accordion4">
                                <div class="card-body">
                                    <p>At DishDivvy, we take food safety very seriously. If you have experienced a food safety issue with your order, you can File a Food Safety Complaint here. Please note that this form is for validated orders. Each complaint should be specific to a HomeCook and an Order #.</p>

                                    <p>You can also file a complaint with your local enforcement agency. Click here for an extensive list of contact information for local enforcement agencies in CA.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading35">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse35" aria-expanded="false" aria-controls="collapse35">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">

                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What are the requirements for permitting under AB 626?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse35" class="collapse" aria-labelledby="heading35" data-parent="#accordion4">
                                <div class="card-body">
                                    <p>We have put together an infographic that explains the main points of AB 626 and the requirements for the permitting process.</p>
                                    <p><span style="text-decoration: underline;"><a href="https://www.dishdivvy.com/wp-content/uploads/2019/10/mehko-inforgaphic.pdf"> <strong>CLICK HERE TO VIEW</strong></a></span></p>

                                    <p>For any questions, you can email <span style="text-decoration: underline;"><a href="mailto:support@dishdivvy.com">support@dishdivvy.com</a></span></p>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading36">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse36" aria-expanded="false" aria-controls="collapse36">
                                        <i>
                                            <svg width="1em" height="1.7em" viewBox="0 0 16 16" class="bi bi-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </i>
                                        <span>What happens if a food safety complaint is made against a specific HomeCook?</span>
                                        <i class="fa fa-angle-right" style="float: right; color: #dcdcdc;"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse36" class="collapse" aria-labelledby="heading36" data-parent="#accordion4">
                                <div class="card-body">
                                    <p>DishDivvy is obligated to submit the name and permit number of a microenterprise home kitchen operation to the local enforcement agency if it receives, through its Internet Web site or mobile application, three or more unrelated individual food safety or hygiene complaints in a calendar year from consumers that have made a purchase through its Internet Web site or mobile application. DishDivvy shall submit this information to the local enforcement agency within two weeks of the third complaint received.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    $('.card-header').click(function(){
        $(this).toggleClass('activeaccordion');
    })
});
</script>
@endpush
