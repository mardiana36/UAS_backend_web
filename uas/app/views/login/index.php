<section style="min-height: 100vh;">
    <div class="login-form-bg h-100" id="containerLogin">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="container h-100" id="containerL">
            <div class="row justify-content-center h-100" style="align-items: center; min-height: 100vh;">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5" id="rowLogin">
                                <a class="text-center" id="headLogin" href="">
                                    <h2>Booking</h2>
                                </a>
                                <form class="mt-5 mb-5" id="login">
                                    <div class="form-group">
                                        <input type="email" name="usernameOrEmail" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group" id="contentPassword">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                        <i class="icon-lock" id="icon-Password1"></i>
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="index.php?action=regis" class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="app/views/assets/js/login.js"></script>