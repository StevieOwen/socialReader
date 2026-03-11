<x-authlayout>
@vite('resources/css/registration.css')
<title>Registration</title>
<div class="col" id="form-side">
    <form id="registrationForm" action="/register" method="POST">
      @csrf
        <div class="mb-3">
            <label class="form-label small text fw-bold text-muted">Full Name</label>
            <input type="text" name="cust_fullName" class="form-control" placeholder="John Doe" required>
        </div>
        <div class="mb-3">
            <label class="form-label small text fw-bold text-muted">Email Address</label>
            <input type="email" name="cust_email" class="form-control" placeholder="name@mail.com" required>
        </div>
        <div class="mb-3">
            <label class="form-label small text fw-bold text-muted">Password</label>
            <input type="password" name="cust_password" class="form-control" placeholder="••••••••••••" required>
        </div>
        
        <button type="submit" class="btn btn-teal w-100 fw-bold mb-3 register-btn">Register</button>
        <div id="spinner" class="spinner-border spinner-border-sm d-none" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="text-center">
            <span class="small text-muted">Already have an account?</span>
            <a href="/login" class="small fw-bold text-decoration-none text" >Sign in</a>
        </div>

    </form>

    <div class="alert alert-primary" style="display:none" role="alert">
     
    </div>
    
</div>
@vite('resources/js/registration.js')
</x-authlayout>