<button class="btnLogin-popup" hidden></button>
<div class="d-flex justify-content-center">
    <div class="wrapper">
        <span class="icon-close">
            <i class="fa-solid fa-xmark"></i>
        </span>
        <div class="form-box login">
            <h4>Login Doctor</h4>
            <form action="#">
                <div class="input-box">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" required>
                    <label for="">Username</label>
                </div>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" required>
                    <label for="">Password</label>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">Recordarme
                        <a hidden href="#">Forgot Password</a>
                    </label>
                </div>
                <button type="submit" class="btn-login-admin">Login</button>
                <div class="login-register">
                    <p> Eres el Administrador?
                        <a href="#" class="register-link">Ingresa aquí</a>
                    </p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Administrador</h2>
            <form action="/Integrador/controllers/C_iniciarSesionAdmin.php" method="POST">
                <div class="input-box">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" name="user" required>
                    <label for="">Username</label>
                </div>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">Recordarme
                        <a hidden href="#">Forgot Password</a>
                    </label>
                </div>
                <button type="submit" class="btn-login-admin">Login</button>
                <div class="login-register">
                    <p> Eres doctor?
                        <a href="#" class="login-link">Ingresa aquí</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>