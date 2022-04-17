<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/config/connect.php');
if (isset($_POST['submit'])) {
    // login verisikasi
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $sql = "SELECT * FROM users INNER JOIN roles USING(role_id) WHERE username = :username";
    $statement = $conn->prepare($sql);    
    $statement->execute(array(':username' => $username));
    $user = $statement->fetch(PDO::FETCH_OBJ);
    session_start();
    if ($user) {
        if (password_verify(trim($password), trim($user->password))) {
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['username'] = $user->username;
            $_SESSION['role'] = $user->role_name;
            header('Location: admin/index.php');
        } else {
            $_SESSION['message'] = 'Kombinasi username dan password salah';
        }
    } else {
        $_SESSION['message'] = 'Kombinasi username dan password salah';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<?php $title = 'Login' ?>
<?php include('template/head.inc') ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">TATIB</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <?php if (isset($_SESSION['message'])) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "<?= $_SESSION['message'] ?>",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        <?php unset($_SESSION['message']) ?>
    <?php endif ?>
</body>
</html>