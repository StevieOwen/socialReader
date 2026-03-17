<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Social Reader</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Lora:wght@500&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Homemade+Apple&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Carattere&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Carattere&family=Kranky&display=swap" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/home.css')
</head>
<body>

<nav class="container-flex text-center">
  <div class="row align-items-center" >
    <div class="col">
      <h5>Social Reader</h5>
    </div>
    <div class="col-auto top-nav-cont">
     <ul class="top-navbar mb-0">
        <li ><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d='M12 12.75c3.942 0 7.987 2.563 8.249 7.712a.75.75 0 0 1-.71.787c-2.08.106-11.713.171-15.077 0a.75.75 0 0 1-.711-.787C4.013 15.314 8.058 12.75 12 12.75m0-9a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5'/></svg></li>
        <li id="logout-btn"> Logout<svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d='M6.5 3.75c-.526 0-1.25.63-1.25 1.821V18.43c0 1.192.724 1.821 1.25 1.821h6.996a.75.75 0 1 1 0 1.5H6.5c-1.683 0-2.75-1.673-2.75-3.321V5.57c0-1.648 1.067-3.321 2.75-3.321h7a.75.75 0 0 1 0 1.5z'/><path d='M16.53 7.97a.75.75 0 0 0-1.06 0v3.276H9.5a.75.75 0 0 0 0 1.5h5.97v3.284a.75.75 0 0 0 1.06 0l3.5-3.5a.75.75 0 0 0 .22-.532v-.002a.75.75 0 0 0-.269-.575z'/></svg></li>
     </ul>
    </div>
  </div>
</nav>

<main class="container-flex">
  <div class="row main-container" >

    <div class="burger-menu d-none show">
    <span><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d='M3.75 6.5a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 0 1.5h-15a.75.75 0 0 1-.75-.75m0 5.5a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 0 1.5h-15a.75.75 0 0 1-.75-.75m0 5.5a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 0 1.5h-15a.75.75 0 0 1-.75-.75'/></svg></span>
    </div>

    <aside class="col-3 hide">
     <header>
      <span class="profile-img"><img src="" alt="user-profile"></span>
      <span class="user-name"></span>
      <span class="user-bio"></span>
     </header>

    <ul class='side-menu'>
      <li class='menu-item active'><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d='M8.17 2.25h9.23c.667 0 1.336.109 1.803.593.46.478.547 1.14.547 1.757v11.8c0 .543-.072 1.077-.35 1.509a1.65 1.65 0 0 1-.65.583v.908c0 .666-.108 1.335-.591 1.802-.478.462-1.14.548-1.757.548H5.75a1.5 1.5 0 0 1-1.5-1.5V6.017c-.003-.498-.006-1.12.13-1.687.167-.692.552-1.363 1.371-1.78.338-.172.694-.24 1.074-.27.365-.03.81-.03 1.345-.03m-2.42 18h10.652c.547 0 .683-.096.714-.126.025-.024.134-.155.134-.724v-.65h-10a1.5 1.5 0 0 0-1.5 1.5'/></svg>
          <a href="">My Library</a>
      </li>
      <li class="menu-item"><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d='M5.75 7.5A2.25 2.25 0 0 1 9.5 5.823a.75.75 0 0 0 1-1.118 3.75 3.75 0 1 0-5 5.59.75.75 0 0 0 1-1.118A2.24 2.24 0 0 1 5.75 7.5M16 3.75a3.74 3.74 0 0 0-2.5.955.75.75 0 0 0 1 1.118 2.25 2.25 0 0 1 3 3.355.75.75 0 0 0 1 1.117A3.75 3.75 0 0 0 16 3.75'/><path d='M12 6.75a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5m-5.81 7.726a.75.75 0 0 0-.38-1.452c-.97.255-1.836.682-2.474 1.256-.64.575-1.086 1.336-1.086 2.22a.75.75 0 0 0 1.5 0c0-.346.17-.729.59-1.105.42-.378 1.054-.71 1.85-.92m12-1.45a.75.75 0 0 0-.38 1.45c.796.21 1.43.542 1.85.92.42.376.59.76.59 1.105a.75.75 0 0 0 1.5 0c0-.884-.446-1.645-1.086-2.22-.638-.574-1.504-1.001-2.474-1.255M12 15.75c-1.493 0-2.881.362-3.921.986-1.025.615-1.829 1.569-1.829 2.764a.75.75 0 0 0 1.5 0c0-.462.316-1.007 1.1-1.478.77-.462 1.882-.772 3.15-.772s2.38.31 3.15.772c.784.47 1.1 1.017 1.1 1.478a.75.75 0 0 0 1.5 0c0-1.195-.804-2.15-1.829-2.764-1.04-.624-2.428-.986-3.921-.986'/></svg>
          <a href="">Social Groups</a>
      </li>
      <li class="menu-item"><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d='M11.953 2.25c-2.317 0-4.118 0-5.52.15-1.418.153-2.541.47-3.437 1.186-.92.736-1.35 1.693-1.553 2.9-.193 1.152-.193 2.618-.193 4.446v.183c0 1.782 0 3.015.2 3.934.108.495.278.925.545 1.323.264.392.6.722 1.001 1.042.631.505 1.375.81 2.254 1V21a.75.75 0 0 0 1.123.65c.586-.335 1.105-.7 1.58-1.044l.304-.221a22 22 0 0 1 1.036-.73c.844-.548 1.65-.905 2.707-.905h.047c2.317 0 4.118 0 5.52-.15 1.418-.153 2.541-.47 3.437-1.186.4-.32.737-.65 1-1.042.268-.398.438-.828.546-1.323.2-.919.2-2.152.2-3.934v-.183c0-1.828 0-3.294-.193-4.445-.203-1.208-.633-2.165-1.553-2.901-.896-.717-2.019-1.033-3.437-1.185-1.402-.151-3.203-.151-5.52-.151z'/></svg>
          <a href="">My Chats</a>
      </li>
      
    </ul>

    </aside>

    <div class='col-9 main-section' >
      <section id="library_section">
        <header class="section-header">
          <h4>Keep the Story going ... </h4>
          <hr style=" border:1px solid  #000;">
        </header>
      
        <button type="button" id="add-book"> Add Book <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d='M17.4 2.25H8.17c-.534 0-.98 0-1.345.03-.38.03-.736.098-1.074.27-.82.417-1.204 1.088-1.37 1.78-.137.566-.134 1.189-.132 1.687l.001.183v14.05a1.5 1.5 0 0 0 1.5 1.5h10.652c.617 0 1.28-.086 1.756-.548.484-.467.592-1.137.592-1.802v-.908a1.65 1.65 0 0 0 .65-.583c.278-.432.35-.966.35-1.509V4.6c0-.616-.086-1.28-.547-1.757-.467-.484-1.136-.593-1.803-.593m-.998 18H5.75a1.5 1.5 0 0 1 1.5-1.5h10v.65c0 .57-.11.7-.134.724-.031.03-.167.126-.714.126M12.75 7.5v1.75h1.75a.75.75 0 0 1 0 1.5h-1.75v1.75a.75.75 0 0 1-1.5 0v-1.75H9.5a.75.75 0 0 1 0-1.5h1.75V7.5a.75.75 0 0 1 1.5 0'/></svg></button>

        {{-- <div class="card shadow-sm">
            <img src="https://placehold.co/400x600/2c3e50/ffffff?text=1773767166_Kétala" 
                class="card-img-top" 
                alt="Cover">
            
            <div class="card-body">
                <h5 class="card-title">Ketala</h5>
                <p class="small text-muted">Fatou Diome</p>
            </div>
        </div> --}}


        <div id="book-shelf">

            

        </div>
      
      </section>

      <section id="socialGroup_section">
      </section>

      <section id="myChats_section">
      </section>

      <section class="d-none" id="form-add-book">
        <header class="section-header">
          <h4>Expand your library by uploading a PDF or EPUB file. ... </h4>
          <button type="submit" id="view-books" ><svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d='M10.5 11.5V9.522L12 8.428l1.5 1.094V11.5a.25.25 0 0 1-.25.25h-2.5a.25.25 0 0 1-.25-.25'/><path d='M17.4 2.25c.667 0 1.336.109 1.803.593.46.478.547 1.14.547 1.757v11.8c0 .543-.072 1.077-.35 1.509a1.65 1.65 0 0 1-.65.583v.908c0 .666-.108 1.335-.591 1.802-.478.462-1.14.548-1.757.548H5.75a1.5 1.5 0 0 1-1.5-1.5V6.017c-.003-.498-.006-1.12.13-1.687.167-.692.552-1.363 1.371-1.78.338-.172.694-.24 1.074-.27.365-.03.81-.03 1.345-.03zm-.998 18c.547 0 .683-.096.714-.126.025-.024.134-.155.134-.724v-.65h-10a1.5 1.5 0 0 0-1.5 1.5zm-3.96-13.356a.75.75 0 0 0-.884 0l-2.25 1.64A.75.75 0 0 0 9 9.14v2.36c0 .966.784 1.75 1.75 1.75h2.5A1.75 1.75 0 0 0 15 11.5V9.14a.75.75 0 0 0-.308-.606z'/></svg>View added books</button>
          <hr style=" border:1px solid  #000;">
        </header>
        <div class="alert alert-primary d-none"  role="alert"></div>
        
        <form id="bookUpload-form" action="" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
              <label class="form-label small fw-bold">Book Title</label>
              <input type="text" name="book_title" class="form-control" placeholder="e.g. Notes from Underground" required>
          </div>

          <div class="mb-3">
              <label class="form-label small fw-bold">Author</label>
              <input type="text" name="book_author" class="form-control" placeholder="e.g. Fyodor Dostoevsky" required>
          </div>

          <div class="mb-3">
              <label class="form-label small fw-bold">Privacy Settings</label>
              <div class="d-flex gap-3 mt-1">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="private" id="privateYes" value="private" checked>
                      <label class="form-check-label small" for="privateYes">Private (Only Me)</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="private" id="privateNo" value="public">
                      <label class="form-check-label small" for="privateNo">Public (Shared)</label>
                  </div>
              </div>
          </div>

          <div class="mb-4">
              <label class="form-label small fw-bold">Upload File (PDF or EPUB)</label>
              <div class="upload-area p-4 border text-center" style="border-style: dashed !important; border-color: var(--light-daylight) !important; background-color: #fbfcfe; border-radius: 10px;">
                  <input type="file" name="book" class="form-control" accept=".pdf,.epub" required>
                  <div class="mt-2 text-muted small">Maximum file size: 20MB</div>
              </div>
          </div>

          <button type="submit" id="upload-book" class="btn w-100 fw-bold text-white py-2">
            Upload to Library
          </button>
          
          
        </form>
      </section>
    </div>
    


  </div>



</main>



@vite('resources/js/home.js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>