 <header class="nk-header has-mask">
            <div class="nk-mask bg-gradient-a"></div>
            <div class="nk-mask bg-pattern-dot bg-blend-top"></div>
            <div class="nk-header-main nk-menu-main will-shrink is-transparent ignore-mask">
    <div class="container">
        <div class="nk-header-wrap">
            <div class="nk-header-logo">
                <a href="index.html" class="logo-link">
                    <div class="logo-wrap">
                        <img class="logo-img logo-light" src="{{ asset('frontend/images/logo.png') }}" srcset="{{ asset('frontend/images/logo2x.png 2x') }}" alt="">
                        <img class="logo-img logo-dark" src="{{ asset('frontend/images/logo-dark.png') }}" srcset="{{ asset('frontend/images/logo-dark2x.png 2x') }}" alt="">
                    </div>
                </a>
            </div><!-- .nk-header-logo -->
            <div class="nk-header-toggle">
                <button class="dark-mode-toggle">
                    <em class="off icon ni ni-sun-fill"></em>
                    <em class="on icon ni ni-moon-fill"></em>
                </button>
                <button class="btn btn-light btn-icon header-menu-toggle">
                    <em class="icon ni ni-menu"></em>
                </button>
            </div>
            <nav class="nk-header-menu nk-menu">
                <ul class="nk-menu-list mx-auto">
                        <li class="nk-menu-item">
                        <a href="usecase.html" class="nk-menu-link">
                            <span class="nk-menu-text">Home</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="usecase.html" class="nk-menu-link">
                            <span class="nk-menu-text">Use Cases</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="features.html" class="nk-menu-link">
                            <span class="nk-menu-text">Features</span>
                        </a>
                    </li>
                
                    <li class="nk-menu-item">
                        <a href="pricing.html" class="nk-menu-link">
                            <span class="nk-menu-text">Pricing</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="usecase.html" class="nk-menu-link">
                            <span class="nk-menu-text">Contact</span>
                        </a>
                    </li>

                </ul><!-- .nk-menu-list -->
                <div class="mx-2 d-none d-lg-block">
                    <button class="dark-mode-toggle">
                        <em class="off icon ni ni-sun-fill"></em>
                        <em class="on icon ni ni-moon-fill"></em>
                    </button>
                </div>
                <ul class="nk-menu-buttons flex-lg-row-reverse">
                    <li><a href="#" class="btn btn-primary">Start Writing</a></li>
                    <li><a class="link link-dark" href="login.html">Login </a></li>
                </ul><!-- .nk-menu-buttons -->
            </nav><!-- .nk-header-menu -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container -->
</div><!-- .nk-header-main -->
         @include('home.layout.slider')   
         
        </header><!-- .nk-header -->