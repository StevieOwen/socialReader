@extends('layouts.app')

@section('content')

@vite('resources/css/home.css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="dashboard">

    <div class="dashboard-container">

    <!-- Top Header -->
    <header class="topbar">
         <div class="logo">
            <span class="logo-icon">📖</span>
            <span class="logo-text">
                Read<span class="highlight">Ly</span>
            </span>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search books, authors..." />
        </div>

        <div class="user-actions">
            <div class="user-profile">
                <img src="https://i.pravatar.cc/40" class="avatar">
                <span class="user-name">Stevie Owen</span>
            </div>

            <button class="icon-btn" title="Settings">
                ⚙️
            </button>

            <button class="icon-btn logout" id="logout-btn" title="Logout">
                ⎋
            </button>
        </div>
        
    </header>

    <!-- Open Book Layout -->
    <div class="book-layout">

        <!-- LEFT PAGE (Sidebar) -->
        <aside class="left-page">
            <div class="profile">
                <img src="https://i.pravatar.cc/80" class="avatar-lg">
                <h3 class="user-name">Stevie Owen</h3>
            </div>

            <nav class="nav">
                <a class="menu-item active">📖 My Library</a>
                <a class="menu-item">👥 Social Groups</a>
                <a class="menu-item">💬 My Chats</a>
            </nav>

            <div class="bookshelf"></div>
        </aside>
            <!-- RIGHT PAGE (Main Content) -->
        <main class="right-page" >

            <h1 class="headline">Keep the Story going …</h1>

            <button class="add-book-btn">+ Add Book</button>

            <section class="library">
                <h2>Your Library</h2>

                <div class="book-grid">

                    <!-- Book Card -->
                    {{-- <div class="book-card">
                        <img src="https://covers.openlibrary.org/b/id/8231996-L.jpg">
                        <div class="book-info">
                            <h3>L'alchimiste</h3>
                            <p>Paolo Coelho</p>

                            <div class="progress-bar">
                                <div style="width: 65%"></div>
                            </div>

                            <span>Page 123 of 197</span>

                            <button class="read-btn">Continue Reading</button>
                        </div>
                    </div> --}}

                    <!-- Another Book -->
                    {{-- <div class="book-card">
                        <img src="https://covers.openlibrary.org/b/id/10521258-L.jpg">
                        <div class="book-info">
                            <h3>Ketala</h3>
                            <p>Fatou Diome</p>

                            <div class="progress-bar">
                                <div style="width: 22%"></div>
                            </div>

                            <span>Page 56 of 255</span>

                            <button class="read-btn">Continue Reading</button>
                        </div>
                    </div> --}}

                </div>
            </section>
        </main>        
        
    </div>

   
</div>
@vite('resources/js/home.js')
@endsection