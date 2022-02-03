@extends("template.template")

@section("title")
    Home
@endsection

@section("styles")
    {{-- No custom styles for this page --}}
@endsection

@section("main")
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="container text-center text-md-left" data-aos="fade-up">
            <h1>Welcome to MyBook</h1>
            <h2>We provide a space for independent writers to promote their books</h2>
            <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
    
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="section-title" data-aos="fade-up">
                <h2>About us</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7" data-aos="fade-right">
                        <img src="{{ asset("img/reading.jpg") }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-xl-6 col-lg-5 pt-5 pt-lg-0">
                        <h3 data-aos="fade-up">Our goal</h3>
                        <p data-aos="fade-up">
                            Our goal is to promote the talent of independent writers and their works. <br>
                            
                        </p>
                        <div class="icon-box" data-aos="fade-up">
                            <i class="bx bx-book-open"></i>
                            <h4>I want to create an account</h4>
                            <p><a href="{{ route('register') }}">Join us for free.</a></p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-book"></i>
                            <h4>I want to access my account</h4>
                            <p><a href="{{ route('login') }}">If you already have an account you can login here.</a></p>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Genres Section ======= -->
        <section id="genres" class="services section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Genres</h2>
                    <p>Our writers offer a wide variety of works in different genres.</p>
                </div>

                <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
                    <div class="icon-box icon-box-pink">
                        <div class="icon"><i class="bx bx-ghost"></i></div>
                        <h4 class="title"><a href="">Horror</a></h4>
                        <p class="description">Do you want to be scared? We have the newest and scariest stories from our authors. </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box icon-box-cyan">
                        <div class="icon"><i class="bx bxs-magic-wand"></i></div>
                        <h4 class="title"><a href="">Fantasy</a></h4>
                        <p class="description">Travel to new worlds and join our heroes in a thousands of adventures.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box icon-box-green">
                        <div class="icon"><i class="bx bx-sad"></i></div>
                        <h4 class="title"><a href="">Drama</a></h4>
                        <p class="description">Get to know the deepest feelings of our characters and join them in their different experiences.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box icon-box-blue">
                        <div class="icon"><i class="bx bxs-ship"></i></div>
                        <h4 class="title"><a href="">History</a></h4>
                        <p class="description">Lots of stories in different historical events are at your fingertips. </p>
                    </div>
                </div>

                </div>

            </div>
        </section>
        <!-- End Genres Section -->

        <!-- ======= Developer Section ======= -->
        <section id="developer" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Developer</h2>
                </div>

                <div class="row">

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="member">
                            <img src="{{ asset("img/developer.png") }}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Iván C. Córdoba</h4>
                                    <span>Programmer</span>
                                </div>
                                <div class="social">
                                    <a href="https://www.instagram.com/ivan25cc/" target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a href="http://www.linkedin.com/in/ivan-chinchilla-cordoba" target="_blank"><i class="bi bi-linkedin"></i></a>
                                    <a href="https://github.com/Ivan25e/" target="_blank"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-6 col-lg-8 col-md-12" data-aos="fade-up">
                        <div class="section-title" data-aos="fade-up">
                            <p>I am an information systems engineer. My goal with this site is to provide a space that serves to promote the works of independent writers around the world.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Developer Section -->
    </main>
@endsection

@section("scripts")
    {{-- No custom scripts for this page --}}
@endsection