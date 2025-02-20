<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    @include('navbar')
    
    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Explore the World of Technology</h1>
            <p class="hero-subtitle">Join our community of tech enthusiasts and professionals</p>
            <div class="hero-actions">
                @guest
                    <a href="{{ route('login') }}" class="btn-primary">Get Started <i class="fas fa-arrow-right"></i></a>
                    <a href="{{ route('register') }}" class="btn-secondary">Create Account</a>
                @endguest
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-primary">Go to Dashboard <i class="fas fa-columns"></i></a>
                    <a href="{{ route('logout') }}" class="btn-secondary">Sign Out</a>
                @endauth
            </div>
        </div>
    </div>

    <section class="themes-section">
        <div class="container">
            <h2 class="section-title">Explore Our Themes</h2>
            <div class="themes-grid">
                <div class="theme-card" style="--theme-color: #4f46e5">
                    <div class="theme-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3>Networking</h3>
                    <p>Explore network infrastructure, protocols, and modern connectivity solutions</p>
                    <a href="#" class="theme-link">Learn More <i class="fas fa-chevron-right"></i></a>
                </div>

                <div class="theme-card" style="--theme-color: #0ea5e9">
                    <div class="theme-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>IT Solutions</h3>
                    <p>Discover the latest in information technology and digital transformation</p>
                    <a href="#" class="theme-link">Learn More <i class="fas fa-chevron-right"></i></a>
                </div>

                <div class="theme-card" style="--theme-color: #10b981">
                    <div class="theme-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Security</h3>
                    <p>Master cybersecurity principles and protect digital assets</p>
                    <a href="#" class="theme-link">Learn More <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
