 @extends('home.home_master')
 @section('home')
 
 <section class="section section-bottom-0 has-shape">
                <div class="nk-shape bg-shape-blur-a mt-8 start-50 top-0 translate-middle-x"></div>
                <div class="container">
                    <div class="section-head">
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-9 col-xl-8 col-xxl-7">
                                <h6 class="overline-title text-primary">Get started for free</h6>
                                <h2 class="title">AI Generate content in seconds</h2>
                                <p class="lead">Give our AI a few descriptions and we'll automatically create blog articles, product descriptions and more for you within just few second.</p>
                            </div>
                        </div>
                    </div><!-- .section-head -->
                    <div class="section-content">
                        <div class="row text-center g-gs">
                            <div class="col-md-6 col-xl-4">
                                <div class="card rounded-4 border-0 shadow-tiny h-100">
                                    <div class="card-body">
                                        <div class="feature">
                                            <div class="feature-media">
                                                <div class="media media-middle media-xl text-bg-primary-soft rounded-4">
                                                    <em class="icon ni ni-book-read"></em>
                                                </div>
                                            </div>
                                            <div class="feature-text">
                                                <h4 class="title">Blog Post &amp; Articles</h4>
                                                <p>Generate optimized blog post and articles to get organic traffic - making you visible to the world. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card rounded-4 border-0 shadow-tiny h-100">
                                    <div class="card-body">
                                        <div class="feature">
                                            <div class="feature-media">
                                                <div class="media media-middle media-xl text-bg-primary-soft rounded-4">
                                                    <em class="icon ni ni-card-view"></em>
                                                </div>
                                            </div>
                                            <div class="feature-text">
                                                <h4 class="title">Product Description</h4>
                                                <p>Create a perfect description for your products to engage your customers to click and buy.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card rounded-4 border-0 shadow-tiny h-100">
                                    <div class="card-body">
                                        <div class="feature">
                                            <div class="feature-media">
                                                <div class="media media-middle media-xl text-bg-primary-soft rounded-4">
                                                    <em class="icon ni ni-facebook-f"></em>
                                                </div>
                                            </div>
                                            <div class="feature-text">
                                                <h4 class="title">Social Media Ads</h4>
                                                <p>Create ads copies for your social media - make an impact with your online marketing campaigns.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card rounded-4 border-0 shadow-tiny h-100">
                                    <div class="card-body">
                                        <div class="feature">
                                            <div class="feature-media">
                                                <div class="media media-middle media-xl text-bg-primary-soft rounded-4">
                                                    <em class="icon ni ni-grid-plus"></em>
                                                </div>
                                            </div>
                                            <div class="feature-text">
                                                <h4 class="title">Product Benefits</h4>
                                                <p>Create a bullet point list of your product benefits that appeal to your customers to purchase.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card rounded-4 border-0 shadow-tiny h-100">
                                    <div class="card-body">
                                        <div class="feature">
                                            <div class="feature-media">
                                                <div class="media media-middle media-xl text-bg-primary-soft rounded-4">
                                                    <em class="icon ni ni-layout2"></em>
                                                </div>
                                            </div>
                                            <div class="feature-text">
                                                <h4 class="title">Landing Page Content</h4>
                                                <p>Write very attractive headlines, slogans or paragraph for your landing page of your website.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card rounded-4 border-0 shadow-tiny h-100">
                                    <div class="card-body">
                                        <div class="feature">
                                            <div class="feature-media">
                                                <div class="media media-middle media-xl text-bg-primary-soft rounded-4">
                                                    <em class="icon ni ni-loader"></em>
                                                </div>
                                            </div>
                                            <div class="feature-text">
                                                <h4 class="title">Suggest Improvements</h4>
                                                <p>Need to improve your existing content? Our AI will rewrite and improve the content for you.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->
            <section class="section has-mask">
                <div class="nk-mask bg-pattern-dot bg-blend-around mt-10p mb-3"></div>
                <div class="container">
                    <div class="section-head">
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-9 col-xl-8 col-xxl-7">
                                <h6 class="overline-title text-primary">How it works</h6>
                                <h2 class="title">Instruct to our AI and generate copy</h2>
                                <p class="lead">Give our AI a few descriptions and we'll automatically create blog articles, product descriptions and more for you within just few second.</p>
                            </div>
                        </div>
                    </div><!-- .section-head -->
                    <div class="section-content">
                        <div class="row g-gs">
                            <div class="col-lg-4">
                                <div class="feature feature-inline">
                                    <div class="feature-text me-auto">
                                        <h4 class="title">Select writing template</h4>
                                        <p>Simply choose a template from available list to write content for blog posts, landing page, website content etc. </p>
                                    </div>
                                    <div class="feature-decoration flex-shrink-0 ms-4">
                                        <img src="{{ asset('frontend/images/number/1.png') }}" alt="">
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-4">
                                <div class="feature feature-inline">
                                    <div class="feature-text me-auto">
                                        <h4 class="title">Describe your topic</h4>
                                        <p>Provide our AI content writer with few sentences on what you want to write, and it will start writing for you. </p>
                                    </div>
                                    <div class="feature-decoration flex-shrink-0 ms-4">
                                        <img src="{{ asset('frontend/images/number/2.png') }}" alt="">
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-4">
                                <div class="feature feature-inline">
                                    <div class="feature-text me-auto">
                                        <h4 class="title">Generate quality content</h4>
                                        <p>Our powerful AI tools will generate content in few second, then you can export it to wherever you need.</p>
                                    </div>
                                    <div class="feature-decoration flex-shrink-0 ms-4">
                                        <img src="{{ asset('frontend/images/number/3.png') }}" alt="">
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                    <div class="section-actions text-center">
                        <ul class="btn-list btn-list-inline gx-gs gy-3">
                            <li><a href="#" class="btn btn-primary btn-lg"><span>Start free trial today</span></a></li>
                            <li><a href="#" class="btn btn-primary btn-soft btn-lg"><em class="icon ni ni-play"></em><span>See action in video</span></a></li>
                        </ul>
                    </div><!-- .section-actions -->
                    <div class="section-content">
                        <div class="row gx-5 gy-6 align-items-center">
                            <div class="col-lg-6 col-xl-6">
                                <div class="block-gfx pe-xl-5 pe-lg-3">
                                    <img class="w-100 rounded-4" src="{{ asset('frontend/images/gfx/feature/a.jpg') }}" alt="">
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6 col-xl-6">
                                <div class="block-text">
                                    <h2 class="title">AI Generate content in seconds</h2>
                                    <p>Generate copy that converts for business bios, facebook ads, product descriptions, emails, landing pages, social ads, and more.</p>
                                    <ul class="list gy-3">
                                        <li><em class="icon ni ni-minus text-primary"></em><span>Create article that are complete in less than 15 seconds.</span></li>
                                        <li><em class="icon ni ni-minus text-primary"></em><span>Save hundreds of hours with our AI article generator.</span></li>
                                        <li><em class="icon ni ni-minus text-primary"></em><span>Improve your copy with the article rewriter.</span></li>
                                    </ul>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->
            <section class="section section-bottom-0 section-top-0">
                <div class="container">
                    <div class="section-head">
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-9 col-xl-7 col-xxl-6">
                                <h6 class="overline-title text-primary">Pricing</h6>
                                <h2 class="title">Start your content writing with AI</h2>
                                <p class="lead px-lg-10 px-xxl-9">With our simple plans, supercharge your content writing to helps your business.</p>
                            </div>
                        </div>
                    </div><!-- .section-head -->
                    <div class="section-content">
                        <div class="row g-gs justify-content-center">
                            <div class="col-lg-4 col-md-6">
                                <div class="pricing">
                                    <div class="pricing-body p-5">
                                        <div class="text-center">
                                            <h5 class="mb-3">Bronze</h5>
                                            <h3 class="h2 mb-4">$9 <span class="caption-text text-muted"> / month</span></h3>
                                            <a href="#" class="btn btn-primary btn-soft btn-block">Start free trial today</a>
                                        </div>
                                        <ul class="list gy-3 pt-4 ps-2">
                                            <li><em class="icon ni ni-check text-success"></em> <span><strong>10,000</strong> Monthly Word Limit</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span><strong>10+</strong> Templates</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>30+ Languages</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Advance Editor Tool</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Regular Technical Support</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Unlimited Logins</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Newest Features</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-4 col-md-6">
                                <div class="pricing pricing-featured bg-primary">
                                    <div class="pricing-body p-5">
                                        <div class="text-center">
                                            <h5 class="mb-3">Silver</h5>
                                            <h3 class="h2 mb-4">$19 <span class="caption-text text-muted"> / month</span></h3>
                                            <a href="#" class="btn btn-primary btn-block">Start free trial today</a>
                                        </div>
                                        <ul class="list gy-3 pt-4 ps-2">
                                            <li><em class="icon ni ni-check text-success"></em> <span><strong>20,000</strong> Monthly Word Limit</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span><strong>10+</strong> Templates</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>50+ Languages</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Advance Editor Tool</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Regular Technical Support</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Unlimited Logins</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Newest Features</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-4 col-md-6">
                                <div class="pricing">
                                    <div class="pricing-body p-5">
                                        <div class="text-center">
                                            <h5 class="mb-3">Diamond</h5>
                                            <h3 class="h2 mb-4">$39 <span class="caption-text text-muted"> / month</span></h3>
                                            <a href="#" class="btn btn-primary btn-soft btn-block">Start free trial today</a>
                                        </div>
                                        <ul class="list gy-3 pt-4 ps-2">
                                            <li><em class="icon ni ni-check text-success"></em> <span><strong>50,000</strong> Monthly Word Limit</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span><strong>15+</strong> Templates</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>70+ Languages</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Advance Editor Tool</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Regular Technical Support</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Unlimited Logins</span></li>
                                            <li><em class="icon ni ni-check text-success"></em> <span>Newest Features</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->
            <section class="section section-bottom-0">
                <div class="container">
                    <div class="section-head">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-8">
                                <h2 class="title">Frequently Asked Questions</h2>
                            </div>
                        </div>
                    </div><!-- .section-head -->
                    <div class="section-content">
                        <div class="row g-gs justify-content-center">
                            <div class="col-xl-9 col-xxl-8">
                                <div class="accordion accordion-flush accordion-plus-minus accordion-icon-accent" id="faq-1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq-1-1"> What is a copy? </button>
                                        </h2>
                                        <div id="faq-1-1" class="accordion-collapse collapse show" data-bs-parent="#faq-1">
                                            <div class="accordion-body"> Yes, you can write long articel for your blog posts, product descriptions or any long article with CopyGen. We're always updating our template and tools, so let us know what are expecting! </div>
                                        </div>
                                    </div><!-- .accordion-item -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-2"> Does CopyGen to write long articles? </button>
                                        </h2>
                                        <div id="faq-1-2" class="accordion-collapse collapse" data-bs-parent="#faq-1">
                                            <div class="accordion-body"> Yes, you can write long articel for your blog posts, product descriptions or any long article with CopyGen. We're always updating our template and tools, so let us know what are expecting! </div>
                                        </div>
                                    </div><!-- .accordion-item -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-3"> Is the generated content original? </button>
                                        </h2>
                                        <div id="faq-1-3" class="accordion-collapse collapse" data-bs-parent="#faq-1">
                                            <div class="accordion-body"> Yes, you can write long articel for your blog posts, product descriptions or any long article with CopyGen. We're always updating our template and tools, so let us know what are expecting! </div>
                                        </div>
                                    </div><!-- .accordion-item -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-4"> Do you have wordpress plugin? </button>
                                        </h2>
                                        <div id="faq-1-4" class="accordion-collapse collapse" data-bs-parent="#faq-1">
                                            <div class="accordion-body"> Yes, you can write long articel for your blog posts, product descriptions or any long article with CopyGen. We're always updating our template and tools, so let us know what are expecting! </div>
                                        </div>
                                    </div><!-- .accordion-item -->
                                </div><!-- .accordion -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->
            <section class="section section-bottom-0">
                <div class="container">
                    <div class="section-wrap bg-primary bg-opacity-10 rounded-4">
                        <div class="section-content bg-pattern-dot-sm p-4 p-sm-6">
                            <div class="row justify-content-center text-center">
                                <div class="col-xl-8 col-xxl-9">
                                    <div class="block-text">
                                        <h6 class="overline-title text-primary">Boost your writing productivity</h6>
                                        <h2 class="title">End writer’s block today</h2>
                                        <p class="lead mt-3">It’s like having access to a team of copywriting experts writing powerful copy for you in 1-click.</p>
                                        <ul class="btn-list btn-list-inline">
                                            <li><a href="#" class="btn btn-lg btn-primary"><span>Start writing for free</span><em class="icon ni ni-arrow-long-right"></em></a></li>
                                        </ul>
                                        <ul class="list list-row gy-0 gx-3">
                                            <li><em class="icon ni ni-check-circle-fill text-success"></em><span>No credit card required</span></li>
                                            <li><em class="icon ni ni-check-circle-fill text-success"></em><span>Cancel anytime</span></li>
                                            <li><em class="icon ni ni-check-circle-fill text-success"></em><span>10+ tools to expolore</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .section-content -->
                    </div><!-- .section-wrap -->
                </div><!-- .container -->
            </section><!-- .section -->

@endsection