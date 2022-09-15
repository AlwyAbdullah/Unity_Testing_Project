<?php 

$con = mysqli_connect("localhost", "root", "", "unity");

if (mysqli_connect_errno()){
    echo "1"; // Connection Failed
    exit();
}

$nim = $_POST['nim'];
$totalTest = $_POST['total_test'];
$testPassed = $_POST['test_passed'];
$testFailed = $_POST['test_failed'];
$namaClass = $_POST['namaClass'];
$date = date("Y-m-d h:i:s");

$insert = "INSERT INTO testresult (nim_users, total_test, test_passed, test_failed, nama_class, tanggal_test) VALUES ('" . $nim ."', '" . $totalTest ."', '". $testPassed ."', '" . $testFailed . "', '" . $namaClass . "', '" . $date . "');";

if (!$con) {
    die("Connection Failed. " . mysqli_connect_error());
}

mysqli_query($con, $insert);
?>


<div class="signup-form">
    <h2 class="form-title">Register</h2>
    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <form method="POST" class="register-form" id="register-form" action="<?= base_url('register/save'); ?>">
        <div class="form-group">
            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
            <input type="text" name="nama" id="nama" placeholder="Your Name" required />
        </div>
        <div class="form-group">
            <label for="email"><i class="zmdi zmdi-email"></i></label>
            <input type="email" name="email" id="email" placeholder="Your Email" required />
        </div>
        <div class="form-group">
            <label for="nim"><i class="zmdi zmdi-format-list-numbered"></i></label>
            <input type="nim" name="nim" id="nim" placeholder="Your NIM" required />
        </div>
        <div class="form-group">
            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
            <input type="password" name="password" id="password" placeholder="Password" required />
        </div>
        <div class="form-group">
            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
        </div>
        <div class="form-group form-button">
            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
        </div>
    </form>
</div>