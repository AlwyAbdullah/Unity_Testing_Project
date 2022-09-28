<?php

namespace App\Controllers;

class Upload extends BaseController
{
    public function index()
    {
        $con = mysqli_connect("localhost", "id19589644_root", "Kentang-123-", "id19589644_unity");

        if (mysqli_connect_errno()) {
            echo "1"; // Connection Failed
            exit();
        }

        $nim = $_POST['nim'];
        $totalTest = $_POST['total_test'];
        $testPassed = $_POST['test_passed'];
        $testFailed = $_POST['test_failed'];
        $namaClass = $_POST['namaClass'];
        $date = date("Y-m-d h:i:s");

        $insert = "INSERT INTO testresult (nim_users, total_test, test_passed, test_failed, nama_class, tanggal_test) VALUES ('" . $nim . "', '" . $totalTest . "', '" . $testPassed . "', '" . $testFailed . "', '" . $namaClass . "', '" . $date . "');";

        if (!$con) {
            die("Connection Failed. " . mysqli_connect_error());
        }

        mysqli_query($con, $insert);
    }
}
