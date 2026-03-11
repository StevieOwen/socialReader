<x-authlayout>
@vite('resources/css/registration.css')
@vite('resources/css/emailVerification.css')
<div class="col" id="form-side">
    <form id="emailVerificationForm" action="" method="POST">
     @csrf
        <div class="mb-3">
            <label class="form-label small text fw-bold text-muted">Verify your Email</label>
            <input type="text" name="token" id="token" class="form-control" placeholder="Enter the verification code sent to your email" required>
        </div>
        
        <button type="submit" class="btn btn-teal w-100 fw-bold mb-3 verify-btn">Verify</button>
        <button type="submit" class="btn btn-teal w-100 d-none fw-bold mb-3 resendCode-btn">Resend code</button>
        <div id="spinner" class="spinner-border spinner-border-sm d-none" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </form>

    <div class="alert alert-primary" style="display:none" role="alert">
     
    </div>

</div>
@vite('resources/js/emailVerification.js')
</x-authlayout>