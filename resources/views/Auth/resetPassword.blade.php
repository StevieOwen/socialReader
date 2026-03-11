<x-authlayout>
@vite('resources/css/login.css')
@vite('resources/css/resetPassword.css')
<div class="col" id="form-side">
@csrf

     <form id="checkEmail" action="">
         <header>
        <h6>We wil help you recover your password </h6>
        </header>
        <div class="mb-3 email-cont">
            <label class="form-label small text fw-bold text-muted">Email Address</label>
            <input type="email" name="cust_email"  class="form-control" placeholder="name@mail.com" required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="/login" id="reset-pwd" class="small text-decoration-none text-muted">Remember you password? Go back to login</a>
        </div>

         <button type="submit" class="btn btn-teal w-100 fw-bold mb-3 verify-btn">Verify</button>

         <div class="alert alert-primary" style="display:none" role="alert">
     
        </div>

       <div class="text-center">
            <span class="small text-muted">Not a member yet?</span>
            <a href="/register" class="small fw-bold text-decoration-none text" >Sign up</a>
        </div>

        
    </form>

    <form id='resetForm' class='d-none' action="auth_handler.php" method="POST">
       
        <h5 id='action'>Create a new password</h5>
        <div class="mb-3">
            <label class="form-label small text fw-bold text-muted">Password</label>
            <input type="password" name="cust_password" class="form-control" placeholder="••••••••••••" r>
        </div>
       
        <button type="submit" class="btn btn-teal w-100 fw-bold mb-3 reset-btn">Reset Password</button>

        <div class="alert alert-primary" style="display:none" role="alert">

        </div>
        
    </form>
   
   
</div>
@vite('resources/js/resetPassword.js')
</x-authlayout>