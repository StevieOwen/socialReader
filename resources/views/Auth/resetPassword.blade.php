<x-authlayout>
@vite('resources/css/login.css')
<form id='loginForm' action="auth_handler.php" method="POST">
    <div class="mb-3">
        <label class="form-label small text fw-bold text-muted">Email Address</label>
        <input type="email" name="cust_email" class="form-control" placeholder="name@mail.com" required>
    </div>
    <div class="mb-3 d-none">
        <label class="form-label small text fw-bold text-muted">Password</label>
        <input type="password" name="cust_password" class="form-control" placeholder="••••••••••••" required>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="#" id="reset-pwd" class="small text-decoration-none text-muted">Remember you password? Go back t login</a>
    </div>
    <button type="submit" class="btn btn-teal w-100 fw-bold mb-3 login-btn">Verify</button>
    <div class="alert alert-primary" style="display:none" role="alert">

    </div>
    <div class="text-center">
        <span class="small text-muted">Not a member yet?</span>
        <a href="/register" class="small fw-bold text-decoration-none text" >Sign up</a>
    </div>
</form>
</x-authlayout>