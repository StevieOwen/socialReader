<x-authlayout>
@vite('resources/css/registration.css')
@vite('resources/css/emaiVerification.css')
<div class="col" id="form-side">
    <form id="emailVerificationForm" action="" method="POST">
     @csrf
        <div class="mb-3">
            <label class="form-label small text fw-bold text-muted">Verify your Email</label>
            <input type="text" name="token" class="form-control" placeholder="Enter the verification code sent to your email" required>
        </div>
        
        <button type="submit" class="btn btn-teal w-100 fw-bold mb-3 register-btn">Verify</button>
    </form>

</div>

</x-authlayout>