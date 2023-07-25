<?php require_once 'blocks/login_header.php'?>

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/" class="h1"><b>Web</b>Forte</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Tizimga kirish uchun formani to'ldiring</p>

            <form method="post">
                <div class="input-group mb-3">
                    <input required type="text" name="login" class="form-control" placeholder="Login">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input required type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
    </div>
    <!-- /.card -->
</div>

<?php require_once 'blocks/login_footer.php'?>


