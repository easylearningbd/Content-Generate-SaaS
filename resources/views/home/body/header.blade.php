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
                        <a href="{{ url('/') }}" class="nk-menu-link">
                            <span class="nk-menu-text">Home</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('usecase') }}" class="nk-menu-link">
                            <span class="nk-menu-text">Use Cases</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('features') }}" class="nk-menu-link">
                            <span class="nk-menu-text">Features</span>
                        </a>
                    </li>
                
                    <li class="nk-menu-item">
                        <a href="{{ route('pricing') }}" class="nk-menu-link">
                            <span class="nk-menu-text">Pricing</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('contact') }}" class="nk-menu-link">
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
   <li>
    @if (auth()->check())
        <a target="/blank" class="link link-dark" href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}">
        {{ auth()->user()->name }} Dashboard    
        </a>
    @else 
    <a class="link link-dark" href="{{ route('login') }}">Login </a>
    @endif 
    </li>
                </ul><!-- .nk-menu-buttons -->
            </nav><!-- .nk-header-menu -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container -->
</div><!-- .nk-header-main -->
         @include('home.layout.slider')   
         
        </header><!-- .nk-header -->

<script type="text/javascript">

document.addEventListener('DOMContentLoaded', () => {
    const toggleButtons = document.querySelectorAll('.dark-mode-toggle');
    const bodyElement = document.body;

    // Function to apply theme and force reflow
    const applyTheme = (isDark) => {
        if (isDark) {
            bodyElement.classList.add('is-dark');
            toggleButtons.forEach(button => button.classList.add('dark-active'));
        } else {
            bodyElement.classList.remove('is-dark');
            toggleButtons.forEach(button => button.classList.remove('dark-active'));
        }
        // Force reflow to apply styles immediately
        bodyElement.style.display = 'none';
        bodyElement.offsetHeight; // Trigger reflow
        bodyElement.style.display = '';
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    };

    // Apply saved theme on load
    const savedTheme = localStorage.getItem('theme');
    applyTheme(savedTheme === 'dark');

    // Toggle theme on button click for each toggle button
    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            console.log('Button clicked'); // Debug: Confirm click event
            const isDark = !bodyElement.classList.contains('is-dark');
            console.log('Toggled to isDark:', isDark, 'Classes before apply:', bodyElement.classList);
            applyTheme(isDark);

            // Reapply styles to ensure dynamic content updates
            if (typeof window.jQuery !== 'undefined') {
                jQuery('[class*="visible-on-"]').each(function() {
                    jQuery(this).toggleClass('d-none', !isDark && jQuery(this).hasClass('visible-on-dark-mode'));
                });
            }

            // Auto-refresh the page 
            window.location.reload();
        });
    });

     
});
</script>

