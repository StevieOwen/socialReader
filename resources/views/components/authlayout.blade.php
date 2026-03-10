<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/auth.css')
</head>
<body>
    <div class="container text-center main-container">
       
        <div class="row second-container" >
            <div class="col" id="welcome-side">
                <h1 class="display-5 fw-bold mb-3 logo">Logo</h1>
                <h6 class="fw-bold mb-3" style="font-size:1.5rem">Create an Account</h6>
                <p class="fs-5 mb-4" style="font-family: 'Lora', serif;">Connect with fellow readers, share your library, and discuss every chapter in real-time.</p>
                <hr class="w-25 mb-4" style="border: 2px solid var(--primary-teal); opacity: 1;">
                <p class="small fst-italic opacity-75">"The more that you read, the more things you will know."</p>
            </div>

            {{$slot}}
        </div>
    </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>   
</body>
</html>