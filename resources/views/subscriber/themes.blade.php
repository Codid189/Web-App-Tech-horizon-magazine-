<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Themes</title>
    <link rel="stylesheet" href="{{asset('css/bouth.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
    <div class="dashboard-container">
        @include('subscriber.sidebar')
        
        <div class="main-content">
            <div class="content-wrapper">
                <div class="header">
                    <h1>Themes</h1>
                </div>
                
                <!-- Subscribed Themes Section -->
                <div class="section-header">
                    <h2>My Themes</h2>
                </div>
                <div class="themes-container">
                    @foreach($subed_themes as $theme)
                    <div class="theme-card">
                        <div class="theme-icon">
                            <svg viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                            </svg>
                        </div>
                        <h3>{{ $theme->name }}</h3>
                        <p>{{ $theme->description }}</p>
                        <form action="{{ route('unfollow_themes') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $theme->id }}" name="theme_id">
                            <button type="submit" class="theme-btn theme-btn-danger">Unsubscribe</button>
                        </form>
                    </div>
                    @endforeach
                </div>

                <!-- Available Themes Section -->
                <div class="section-header">
                    <h2>Available Themes</h2>
                </div>
                <div class="themes-container">
                    @foreach($other_themes as $theme)
                    <div class="theme-card">
                        <div class="theme-icon">
                            <svg viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                            </svg>
                        </div>
                        <h3>{{ $theme->name }}</h3>
                        <p>{{ $theme->description }}</p>
                        <form action="{{ route('follow_themes') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $theme->id }}" name="theme_id">
                            <button type="submit" class="theme-btn theme-btn-primary">Subscribe</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/bouth.js')}}"></script>
    <script src="{{asset('js/Main.javascript.js')}}"></script>
</body>
</html>
