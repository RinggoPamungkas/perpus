<?php
include '../config/layout.php';
include '../config/databases.php';
include '../object/anggota.php';

$database = new Database();
$db = $database->getConnection();

$anggota = new Anggota($db);

// ambil data anggota
$result = $anggota->readAll();
$num = $result->rowCount();
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="text-4xl font-extrabold dark:text-white">Data Anggota</h2>
        <a href="form-tambah.php" class="block mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlms="http://www.w3.org/2000/svg" viewBox="0 0 20 23" fill="currentColor" class="w-3.5 h-3.5 me-2">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 122.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
            </svg>
            Tambah
        </a>
        

<div class="relative overflow-x-auto mt-3 shadow-md">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Lengkap
                </th>
                <th scope="col" class="px-6 py-3">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3">
                    No. Telepon
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi 
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row)
        ?>
        
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $no ?>
                </th>
                <td class="px-6 py-4">
                    <?= $NamaLengkap ?>
                </td>
                <td class="px-6 py-4">
                    <?= $Alamat ?>
                </td>
                <td class="px-6 py-4">
                    <?= $NoTelp ?>
                </td>
                <td class="px-6 py-4">
                    <div class="inline-flex rounded-md shadow-sm">
                    <a href="form-ubah.php" aria-current="page" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        Ubah
                    </a>
                    <a onclick="confirmDelete(<?=$ID ?>)" href="#" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        Hapus
                    </a>
                    </div>
                </td>
                
            </tr>
            <?php
                $no += 1;
        }
        ?>

        </tbody>
    </table>
</div>

        <?php
            if ($num > 0) {

            }
        ?>
    </div>
</div>

<script>
    function confirmDelete(id) {
        var confirmation = confirm("Anda yakin ingin menghapus data?");

        if(confirmation) {
            window.location.href = "proses-hapus.php?ID=" + id
        }
    }
</script>
</body>
</html>