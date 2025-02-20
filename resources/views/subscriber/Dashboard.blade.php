<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        @include('subscriber.sidebar')
        
        <div class="main-content">
            <div class="content-wrapper">
                <div class="header">
                    <h1>Dashboard</h1>
                </div>
                <div class="statistic">
                    <div class="statistic-item">
                        <i>
                            <svg class="nav-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                        </i>
                        <h2>Articles</h2>
                        <p>12</p>
                    </div>
                    <div class="statistic-item">
                        <i>
                            <svg class="nav-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </i>
                        <h2>Projects</h2>
                        <p>4</p>
                    </div>
                    <div class="statistic-item">
                        <i>
                            <svg class="nav-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
                            </svg>
                        </i>
                        <h2>Messages</h2>
                        <p>24</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ asset('js/Main.javascript.js') }}
</body>
</html>
