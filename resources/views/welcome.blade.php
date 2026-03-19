{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/login">Login</a>
    <a href="/register">Register</a>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ReadLy</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    @vite('resources/css/landing.css')
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">
        <span class="logo-icon">📖</span>
        <span class="logo-text">
            Read<span class="highlight">Ly</span>
        </span>
    </div>
    <div class="nav-links">
        {{-- <a href="#">Features</a> --}}
        <a href="/login">Login</a>
        <a href="/register" class="btn-primary">Get Started</a>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-text">
        <h1>Where Reading Becomes a Shared Experience</h1>
        <p>
            Upload books, read in real-time, and discuss ideas page by page
            with readers around the world.
        </p>

        <div class="hero-buttons">
            <a href="/register" class="btn-primary">Get Started</a>
            <a href="#" class="btn-secondary">Explore Demo</a>
        </div>
    </div>

    <div class="hero-visual">
        <div class="book-mockup">
            <div class="page left">
                <p class="highlight">
                    And, when you want something, all the universe conspires...
                </p>
                <p>The boy remembered his flock...</p>
            </div>

            <div class="page right">
                <div class="comment">
                    <strong>Chloe</strong>
                    <p>Such a beautiful passage.</p>
                </div>
                <div class="comment">
                    <strong>Raj</strong>
                    <p>This is my favorite line so far.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SOCIAL PROOF -->
<section class="social-proof">
    Used by international students across 20+ countries
</section>

<!-- FEATURES -->
<section class="features">
    <div class="feature-card">
        <h3>Personal Library</h3>
        <p>Organize and track your reading journey.</p>
    </div>

    <div class="feature-card">
        <h3>Page-Based Discussions</h3>
        <p>Comment directly on passages and share insights.</p>
    </div>

    <div class="feature-card">
        <h3>Global Reading</h3>
        <p>Connect with readers from different cultures.</p>
    </div>
</section>

<!-- DEMO SECTION -->
<section class="demo">
    <div class="demo-text">
        <h2>See Social Reading in Action</h2>
        <ul>
            <li>✔ Highlight sentences</li>
            <li>✔ Add and view notes</li>
            <li>✔ Join discussions</li>
        </ul>
    </div>

    <div class="demo-visual">
        <div class="mini-book">
            <p class="highlight">Highlight text to start a discussion</p>
            <button class="floating-comment">+ Comment</button>
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="how">
    <h2>How It Works</h2>

    <div class="steps">
        <div class="step">
            <h4>Upload your book</h4>
            <p>Start by uploading a PDF file</p>
        </div>

        <div class="step">
            <h4>Start reading</h4>
            <p>Read in a clean, distraction-free interface</p>
        </div>

        <div class="step">
            <h4>Share thoughts</h4>
            <p>Discuss ideas with other readers</p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <h2>Start your reading journey today</h2>
    <a href="/register" class="btn-primary">Create Free Account</a>
</section>

</body>
</html>