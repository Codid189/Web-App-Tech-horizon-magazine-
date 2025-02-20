<nav class="top-navbar">
    <div class="navbar-container">
        <div class="logo-section">
            <img src="{{ asset('images/HTLogo.png') }}" alt="Logo" class="logo-img">
            <span class="logo-text">HorizonTech</span>
        </div>
        
        <button class="toggle-btn" onclick="toggleMobileMenu()">☰</button>
        
        <div class="nav-menu horizontal">
            <div class="menu-section horizontal">
                <span class="menu-label">Main Menu</span>
                <a href="{{ route('home') }}" class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <svg class="menu-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 3L4 9v12h16V9l-8-6z"/>
                    </svg>
                    <span class="menu-text">Home</span>
                </a>

                <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg class="menu-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M13 9V3h8v6h-8zM3 13V3h8v10H3zm10 8V11h8v10h-8zM3 21v-6h8v6H3z"/>
                    </svg>
                    <span class="menu-text">Profile</span>
                </a>
            </div>

            <div class="menu-section horizontal">
                <span class="menu-label">Content</span>
                <a href="{{ route('get_themes') }}" class="menu-item {{ request()->routeIs('get_themes') ? 'active' : '' }}">
                    <svg class="menu-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                    </svg>
                    <span class="menu-text">Themes</span>
                </a>

                <a href="{{ route('article_creation') }}" class="menu-item {{ request()->routeIs('article_creation') ? 'active' : '' }}">
                    <svg class="menu-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                    </svg>
                    <span class="menu-text">Add Article</span>
                </a>

                <a href="{{ route('get_articles') }}" class="menu-item {{ request()->routeIs('get_articles') ? 'active' : '' }}">
                    <svg class="menu-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zM6 20V4h7v5h5v11H6z"/>
                    </svg>
                    <span class="menu-text">My Articles</span>
                </a>

                <a href="{{ route('get_history') }}" class="menu-item {{ request()->routeIs('get_history') ? 'active' : '' }}">
                    <svg class="menu-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M13 3a9 9 0 00-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0013 21a9 9 0 000-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/>
                    </svg>
                    <span class="menu-text">More</span>
                </a>
            </div>

            <div class="menu-section horizontal">
                <a href="{{ route('logout') }}" class="menu-item menu-item-danger">
                    <svg class="menu-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                    </svg>
                    <span class="menu-text">Logout</span>
                </a>
            </div>
        </div>
    </div>
</nav>