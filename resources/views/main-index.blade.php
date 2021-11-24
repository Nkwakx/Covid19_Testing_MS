@extends('layouts.main')

@section('content')
    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container-fluid">

            <div class="row no-gutters py-3">
                <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start"
                    data-aos="fade-right"></div>
                <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
                    <div class="content d-flex flex-column justify-content-center">
                        <h3 data-aos="fade-up">What Is Coronavirus?</h3>
                        <p data-aos="fade-up">
                            Coronaviruses are a large family of viruses, some of which can infect people. Some cause mostly
                            mild illness, such as the strains responsible for some common colds. Others can potentially also
                            lead to severe diseases.

                            COVID-19 is the disease caused by the new coronavirus that emerged in China in December 2019.

                            At this time, there are no specific vaccines for COVID-19. However, there are many ongoing
                            clinical trials evaluating potential treatments.
                        </p>
                    </div><!-- End .content-->
                </div>
            </div>
        </div>
    </section><!-- End About Us Section -->

    <main id="main">

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-left">
                        <h3>Don't drop the ball now, <span>covid doesn't get tired</span> it's on us!</h3>
                        <p> We need to keep in the loop with this virus so we can protect ourselves and loved ones. It
                            starts with knowing your covid status. Get tested!</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="{{ route('login') }}">Request a test</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="fade-up">
                            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                            <h4 class="title"><a href="">Online Booking</a></h4>
                            <p class="description"></p>Experiencing COVID symptoms? Book a covid test date with us and have
                            it performed in the comfort of your home within 24 hours</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-cash-stack"></i></div>
                            <h4 class="title"><a href="">Payments</a></h4>
                            <p class="description">Pay affordable price for covid testing. Use your medical aid or pay
                                privately</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bi bi-chat-dots"></i></div>
                            <h4 class="title"><a href="">24/7 Online Support</a></h4>
                            <p class="description">Connect to a live support member through chats.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bi bi-binoculars"></i></div>
                            <h4 class="title"><a href="">Medical Laboratories</a></h4>
                            <p class="description">Get excellent service from skilled and well-trained medical lab
                                technicians who ensure provision of accurate results.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bi bi-people"></i></div>
                            <h4 class="title"><a href="">Members</a></h4>
                            <p class="description">You can add an unlimited number of family members as your dependents, but
                                only one main member per household.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="bi bi-file-medical"></i></div>
                            <h4 class="title"><a href="">Mobile Covid-19 Testing</a></h4>
                            <p class="description">If you're worried about your symptoms, ZikClinic offers a qiuck and
                                convenient way to get a test without leaving your home</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->
        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Important ways to <strong>Slow The Spread,</strong> what you should do?</h2>
                    <p>Though COVID-19 is thought to spread mainly from person to person, we are still learning how it
                        spreads.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-right">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                                    <h4>Wash Your Hands For 20sec</h4>
                                    <p>It is recommended to wash your hands with antibacterial soap for at least 20 seconds.
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                                    <h4>Wear a mask if available</h4>
                                    <p>A face mask is a must if you have symptoms of cold, flu, COVID-19 or other viruses
                                        and infections.</p>
                                </a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                                    <h4>Avoid direct contact</h4>
                                    <p>Avoiding any direct contact allows you to increase your protection from the emerged
                                        COVID-19 virus.</p>
                                </a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                                    <h4>Stay at home</h4>
                                    <p>Practice social distancing and don’t leave your your home without any urgent need to
                                        stay safe.</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-7 ml-auto" data-aos="fade-left" data-aos-delay="100">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <figure>
                                    <img src="{{ asset('images/washhands.jpg') }}" alt="" class="img-fluid">
                                </figure>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <figure>
                                    <img src="{{ asset('images/wMussk.jpg') }}" alt="" class="img-fluid">
                                </figure>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <figure>
                                    <img src="{{ asset('images/toused.jpg') }}" alt="" class="img-fluid">
                                </figure>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <figure>
                                    <img src="{{ asset('images/virus.jpg') }}" alt="" class="img-fluid">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
