<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        @include('responsable.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
            </div>
            <div class="statistic">
                <div class="statistic-item">
                    <i>
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11zm-8-8v2h8v-2h-8zm0 4v2h8v-2h-8z"/>
                        </svg>
                    </i>
                    <h2>Published articles</h2>
                    <p>{{$articles_count}}</p>
                </div>
                <div class="statistic-item">
                    <i>
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-1.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05C16.19 13.89 17 15 17 16.5V19h6v-1.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </i>
                    <h2>Subscribers</h2>
                    <p>{{$subs_count}}</p>
                </div>
                <div class="statistic-item">
                    <i>
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm-2 16h-2v-2h2v2zm0-4h-2v-4h2v4zm-1-9V3.5L18.5 11H13c-.55 0-1-.45-1-1z"/>
                        </svg>
                    </i>
                    <h2> Pending articles</h2>
                    <p>{{$pending_articles_count}}</p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/Main.javascript.js')}}"></script>
</body>
</html>