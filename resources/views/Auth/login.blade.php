<x-authlayout>
<title>Login</title>
@vite('resources/css/login.css')

<div class="col" id="form-side">
@csrf
                <form id='loginForm' action="/login" method="POST">
                    <div class="mb-3">
                        <label class="form-label small text fw-bold text-muted">Email Address</label>
                        <input type="email" name="cust_email" class="form-control" placeholder="name@mail.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text fw-bold text-muted">Password</label>
                        <div class="password-wrapper">
                        <input type="password" id="pwd" name="cust_password" class="form-control" placeholder="••••••••••••" required>
                            <svg id="pwd-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path d="M256 160C256 124.7 284.7 96 320 96C351.7 96 378 119 383.1 149.3C386 166.7 402.5 178.5 420 175.6C437.5 172.7 449.2 156.2 446.3 138.7C436.1 78.1 383.5 32 320 32C249.3 32 192 89.3 192 160L192 224C156.7 224 128 252.7 128 288L128 512C128 547.3 156.7 576 192 576L448 576C483.3 576 512 547.3 512 512L512 288C512 252.7 483.3 224 448 224L256 224L256 160z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check small">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label text" for="remember">Remember me</label>
                        </div>
                        <a href="/resetPassword" id="reset-pwd" class="small text-decoration-none text-muted">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-teal w-100 fw-bold mb-3 login-btn">Login</button>
                    <div class="alert alert-primary" style="display:none" role="alert">
     
                    </div>
                    <div class="text-center">
                        <span class="small text-muted">Not a member yet?</span>
                        <a href="/register" class="small fw-bold text-decoration-none text" >Sign up</a>
                    </div>
                </form>

</div>
@vite('resources/js/login.js')
</x-authlayout>