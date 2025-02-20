<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/abonne.css') }}">
    <title>Article View</title>
</head>
<body>
    <div class="dashboard-container">
        @auth
            @if(Auth::user()->rule == 'Subscriber')
                @include('subscriber.sidebar')
            @elseif(Auth::user()->rule == 'Admin')
                @include('admin.sidebar')
            @elseif(Auth::user()->rule == 'Responsable')
                @include('responsable.sidebar')
            @endif
        @else
            <div class="sidebar" id="sidebar">
                <div class="logo-section">
                    <img src="{{ asset('images/HTLogo.png') }}" alt="Logo" class="logo-img">
                </div>
                <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
                <nav class="nav-menu">
                    <div class="nav-item">
                        <a class="sidebarlink" href="{{ route('home') }}">
                            <svg class="nav-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                            <span class="nav-text">Accueil</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="sidebarlink" href="{{ route('login') }}">
                            <svg class="nav-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                            <span class="nav-text">Login</span>
                        </a>
                    </div>
                </nav>
            </div>
        @endauth

        <div class="main-content">
            <div class="header">
                <a href="{{ route('articles') }}" class="back-link">
                    <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </a>
                <h1>{{ $article->title }}</h1>
            </div>
            <div class="article-container">
                <br>
                <div id="articleContent" class="article-content">
                    <p>{!! nl2br(e($article->content)) !!}</p>
                </div>

                @auth
                <div class="rating-section statistic-item">
                    <h3>Rating</h3>
                    <form id="ratingForm" method="POST" action="{{ route('add_review') }}" class="rating-form">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <input type="hidden" name="rate" id="ratingInput" value="{{ $rate }}">
                        <div class="stars-container">
                            <div class="stars" id="ratingStars">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star-rating {{ $i <= $rate ? 'active' : '' }}" data-rating="{{ $i }}">★</span>
                                @endfor
                            </div>
                        </div>
                        <button type="submit" class="save-btn">Rate</button>
                    </form>
                </div>
                    <br>
                    <div class="comments-section statistic-item">
                        <h3>Chat</h3>
                        <form class="comment-form" action="{{ route('add_commentaire_article') }}" method="POST">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <textarea name="content" id="commentInput" placeholder="Write your comment..." required></textarea>
                            <button type="submit" class="save-btn">Add Chat</button>
                        </form>
                        <div id="commentsList" class="comments-list">
                            @foreach($commentaires as $comment)
                                <div class="comment" id="comment-{{ $comment->id }}">
                                    <div class="comment-header">
                                        <div class="comment-info">
                                            <span class="comment-author">{{ $comment->user->name }}</span>
                                            <span class="comment-date">{{ $comment->created_at->format('Y-m-d') }}</span>
                                        </div>
                                        @if(Auth::user()->rule == 'Responsable')
                                            <button type="button" class="delete-comment-btn" data-comment-id="{{ $comment->id }}" title="Delete Comment">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1z"/>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                    <p class="comment-content">{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="login-prompt statistic-item">
                        <p>Please <a href="{{ route('login') }}">login</a> to rate and comment on this article.</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Main.javascript.js') }}"></script>
</body>
</html>