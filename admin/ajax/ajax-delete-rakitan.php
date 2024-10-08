<?php
//include '../../function.php';

$data = $_POST['data'];
$idpc = $_POST['idpc'] ?? "";
$idkomponen = $_POST['idkomponen'] ?? "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idpc']) && isset($_POST['idkomponen'])) {
    // $idpc = htmlspecialchars($_POST['idpc']);
    //$idkomponen = htmlspecialchars($_POST['idkomponen']);

    // Perform the deletion
    if (deleteRakitan($idpc, $idkomponen)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}

function deleteRakitan($idpc, $idkomponen)
{

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "sipekerba";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Implement your delete logic with SQL DELETE statement
    // Assuming you have a table named 'rakitan' with columns 'idpc' and 'idkomponen'
    $sql = "DELETE FROM rakitan WHERE idpc = '$idpc' AND idkomponen = '$idkomponen'";
    echo 'data : ' + $sql;
    // Execute the SQL query (use your database connection variable, e.g., $conn)
    if (mysqli_query($conn, $sql)) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}
