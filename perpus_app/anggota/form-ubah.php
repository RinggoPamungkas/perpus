<?php
include '../config/layout.php';
include '../config/databases.php';
include '../object/anggota.php';

$database = new Database();
$db = $database->getConnection();

$anggota = new Anggota($db);

//get ID
$anggota->ID = $_GET["ID"];;

$anggota->readOne();
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-black">Ubah Anggota Baru</h2>
      <form action="proses-ubah.php" method="POST">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="w-full">
                  <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">NIK</label>
                  <input type="text" value="<?= $anggota->NIK ?>" name="nik" id="nik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan NIK" required="">
              </div>
              <div class="w-full">
                  <label for="namalengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nama Lengkap</label>
                  <input type="text" value="<?= $anggota->NamaLengkap ?>" name="namalengkap" id="namalengkap" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Nama Lengkap" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Alamat</label>
                  <textarea id="alamat" value="<?= $anggota->Alamat ?>" name="alamat" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Alamat"></textarea>
              </div>
              <div class="sm:col-span-2">
                  <label for="notelp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nomer Telepon</label>
                  <input type="text" value="<?= $anggota->NoTelp ?>" name="notelp" id="notelp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan No Telepon" required="">
              </div>
              <div>
                  <input type="hidden" name="ID" value="<?= $anggota->ID?>" >
              </div>
            <div class="sm:col-span-2">
                <button type="submit" class="text-white bg-blue-700
                    hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600
                    dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                <button type="button" onclick="history.back()"
                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4
                    focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200
                    text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-
                    gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white
                    dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                </div> 
          </div>
      </form>
    </div>
</div>

</body>
</html>