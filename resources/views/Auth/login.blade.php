<x-authlayout>
<title>Login</title>
@vite('resources/css/login.css')

<div class="col" id="form-side">
                <form action="auth_handler.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label small text fw-bold text-muted">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="name@mail.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text fw-bold text-muted">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••••••" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check small">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label text" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="small text-decoration-none text-muted">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-teal w-100 fw-bold mb-3 login-btn">Login</button>
                    <div class="text-center">
                        <span class="small text-muted">Not a member yet?</span>
                        <a href="/register" class="small fw-bold text-decoration-none text" >Sign up</a>
                    </div>
                </form>

            </div>

</x-authlayout>