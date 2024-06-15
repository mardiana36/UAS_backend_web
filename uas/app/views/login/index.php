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
                                <form class="mt-5 mb-5" id="login" method="post" action="index.php">
                                    <div class="form-group">
                                        <input type="text" name="usernameOrEmail" class="form-control" placeholder="Username/Email" required>
                                    </div>
                                    <div class="form-group" id="contentPassword">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                        <i class="icon-lock" id="icon-Password1"></i>
                                    </div>
                                    <button class="btn login-form__btn submit w-100 sweet-wrong">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="app/views/assets/plugins/sweetalert/js/sweetalert.min.js"></script>
<script src="app/views/assets/js/login.js"></script>
<script>showSweetAlert('Oops...', 'The email/username or password you entered is incorrect!!!', 'error');</script>