<?php
if ($_POST) {
    include '../config/databases.php';
    include '../object/anggota.php';

    $database = new Database();
    $db = $database->getConnection();

    $anggota = new Anggota($db);

    // Set properties from the form data
    $anggota->NIK = $_POST['nik'];
    $anggota->NamaLengkap = $_POST['namalengkap'];
    $anggota->Alamat = $_POST['alamat'];
    $anggota->NoTelp = $_POST['notelp'];
    $anggota->ID = $_POST['ID'];

    // Call the update function
    $anggota->update();

    // Redirect to the index page after updating
    header("Location: http://localhost/perpus_app/anggota/index.php");
    exit();
}
?>
