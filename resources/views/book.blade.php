@extends('layouts.app')

@section('content')

@vite('resources/css/book.css')
<div class="reader-container">

    <!-- LEFT TOOLS -->
    <aside class="reader-left">
        <div class="tool">📚 Library</div>
        <div class="tool">📖 Contents</div>
        <div class="tool">🔍 Search</div>
        <div class="tool">🌙 Mode</div>

        <div class="progress">
            <span>Page 47 / 197</span>
            <div class="progress-bar">
                <div style="width: 25%"></div>
            </div>
        </div>
    </aside>

    <!-- BOOK AREA -->
    <main class="reader-book">
        <div class="book-wrapper">

            <!-- LEFT PAGE -->
            <div class="book-page">
                <div class="page-header">
                    <span>L'alchimiste</span>
                    <span>Page 47</span>
                </div>

                <p>
                    And, when you want something, all the universe conspires in helping you to achieve it.
                    <span class="comment-marker">💬</span>
                </p>

                <p>
                    The boy remembered his flock, and decided he should go back to being a shepherd.
                </p>
            </div>

            <!-- RIGHT PAGE -->
            <div class="book-page right">
                <p>
                    He had learned something important, and now it was time to return.
                    <span class="comment-marker">💬</span>
                </p>
            </div>

        </div>
        <!-- Floating Comment Button -->
        <div id="comment-popup" class="comment-popup">
            <button id="add-comment-btn">+ Comment</button>
        </div>

        <!-- Comment Input Box -->
        <div id="comment-box" class="comment-box">
            <textarea placeholder="Write your thought..."></textarea>
            <div class="comment-actions">
                <button id="save-comment">Save</button>
                <button id="cancel-comment">Cancel</button>
            </div>
        </div>
    </main>

    <!-- RIGHT COMMENTS -->
    <aside class="reader-comments">

        <div class="comments-header">
            💬 Discussion — Page 47
        </div>

        <div class="comment-card">
            <strong>Chloe</strong>
            <span class="meta">3h ago</span>
            <p>Such a beautiful passage.</p>
        </div>

        <div class="comment-card">
            <strong>Raj</strong>
            <span class="meta">2h ago</span>
            <p>This is my favorite line so far.</p>
        </div>

        <div class="comment-card">
            <strong>Mari</strong>
            <span class="meta">1h ago</span>
            <p>What does this symbolize?</p>
        </div>

        <div class="add-comment">
            <textarea placeholder="Write a comment..."></textarea>
            <button>Post</button>
        </div>

    </aside>

</div>
@vite('resources/js/book.js')
@endsection