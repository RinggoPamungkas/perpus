<?php
if($_GET["ID"]) {
    include '../config/databases.php';
    include '../object/anggota.php';

    $database = new Database();
    $db = $database->getConnection();

    $anggota = new Anggota($db);
    $anggota->ID = $_GET["ID"];

    $anggota->delete();
}

header("Location: http://localhost/perpus_app/anggota/index.php");
?>