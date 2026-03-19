@extends('layouts.app')

@section('content')
@vite('resources/css/add_book.css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="add-book-container">

    <div class="add-book-card">
        <h1>Add a New Book</h1>
        <p class="subtitle">Upload and share your reading experience</p>

        <form method="POST" id="bookUpload-form" action="#" enctype="multipart/form-data">
            @csrf

            <!-- TITLE -->
            <div class="form-group">
                <label>Book Title</label>
                <input type="text" name="book_title" placeholder="e.g. L'alchimiste" required>
            </div>

            <!-- AUTHOR -->
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="book_author" placeholder="e.g. Paulo Coelho" required>
            </div>

            <!-- PRIVACY -->
            <div class="form-group">
                <label>Visibility</label>

                <div class="radio-group">
                    <label class="radio-card">
                        <input type="radio" name="private" value="priate" checked>
                        <div>
                            <strong>Private</strong>
                            <span>Only you can read this book</span>
                        </div>
                    </label>

                    <label class="radio-card">
                        <input type="radio" name="private" value="public">
                        <div>
                            <strong>Public</strong>
                            <span>Others can read and comment</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- FILE -->
            <div class="form-group">
                <label>Upload PDF</label>

                <div class="file-upload">
                    <input type="file" id="bookInput" name="book" accept=".pdf,.epub" required>
                    <span id="fileNameDisplay">Choose a PDF or EPUB file</span>
                </div>
            </div>
            <div class="alert alert-primary" style="display:none"  role="alert"></div>

            <!-- SUBMIT -->
            <button  class="submit-btn">Add Book</button>
            <div style="margin-top:2rem; text-align:center  ">
                <a href="/home">Go back to Library</a>
            </div>
           
        </form>
    </div>

</div>
@vite('resources/js/add_book.js')
@endsection