@extends('layouts.app')

@section('content')

@vite('resources/css/book.css')
<div class="reader-container" >

    <!-- LEFT TOOLS -->
    <aside class="reader-left">
        <div class="tool"><a href="/home">📚 Library</a></div>
        <div class="tool">📖 Contents</div>
        <div class="tool">🔍 Search</div>
        <div class="tool">🌙 Mode</div>

        {{-- <div class="progress">
            <span id="page_level">Page 1 / 1</span>
            <div class="progress-bar">
                <div id="progress_fill"></div>
            </div>
        </div> --}}
    </aside>

    <!-- MAIN READING AREA -->
    <main class="reader-main" >

        {{-- <div class="reader-canvas" >
            <div id="pdf-container" ></div>
        </div> --}}
       <div id="pdf-viewer-container" class="hidden border rounded-lg overflow-hidden" style="width:100%; height:100%;">
            <embed id="pdf-preview" src="" type="application/pdf" width="100%" height="100%" />
        </div>
    </main>

   
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
@vite('resources/js/book.js')
@endsection