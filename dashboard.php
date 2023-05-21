<?php
    require_once('koneksi.php');

    // Allert
    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'hapus') {
        echo "<div></div>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Delete!','Data Berhasil Di Delete!','info')</script>";    
    }

    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'update') {
        echo "<div></div>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Update!','Data Berhasil Di Update!','success')</script>";
    }

    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'tambah') {
        echo "<div></div>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Tambah Data!','Data Mahasiswa Berhasil Di Tambahkan!','success')</script>";
    }

    // Read Data
    function read_data()
    {
        global $mysqli;

        $query = "SELECT * FROM data_mahasiswa";
        $result = mysqli_query($mysqli, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }

    $data_tabel = read_data();
?>

<!-- Main Dashboard -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body>
    <div class="flex flex-col justify-between min-h-screen">
        <div>
            <header class="shadow-sm">
                <nav class="w-full py-5 bg-zinc-50">
                    <div class="flex justify-center w-full">
                        <a href="#" class="font-bold text-xl font-poppins tracking-wide text-zinc-700">Dashboard Data Mahasiswa</a>
                    </div>
                </nav>
            </header>
            <main class="w-full flex justify-center py-14">
                <div class="w-auto p-7 bg-zinc-50 shadow-sm rounded-md flex justify-center">
                    <table class="table-fixed border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b-2 border-zinc-700 px-5 py-4 font-semibold text-base font-poppins tracking-wide text-zinc-600">NIM</th>
                                <th class="border-b-2 border-zinc-700 px-5 py-4 font-semibold text-base font-poppins tracking-wide text-zinc-600">Nama</th>
                                <th class="border-b-2 border-zinc-700 px-5 py-4 font-semibold text-base font-poppins tracking-wide text-zinc-600">Jurusan</th>
                                <th class="border-b-2 border-zinc-700 px-5 py-4 font-semibold text-base font-poppins tracking-wide text-zinc-600">Prodi</th>
                                <th class="border-b-2 border-zinc-700 px-5 py-4 font-semibold text-base font-poppins tracking-wide text-zinc-600">Gender</th>
                                <th class="border-b-2 border-zinc-700 px-5 py-4 font-semibold text-base font-poppins tracking-wide text-zinc-600">Tanggal Lahir</th>
                                <th class="border-b-2 border-zinc-700 px-5">
                                    <div class="px-4 py-2 bg-green-600 rounded-md flex justify-center cursor-pointer shadow-sm hover:bg-green-700 duration-150"><a href="tambah.php" class="font-semibold text-base font-poppins tracking-wider text-zinc-50">Tambah</a></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($data_tabel); $i++) {
                            ?>
                                <tr>
                                    <td class="px-5 font-normal text-sm font-poppins tracking-wide text-zinc-600"><?php echo $data_tabel[$i]['nim'] ?></td>
                                    <td class="px-5 font-normal text-sm font-poppins tracking-wide text-zinc-600"><?php echo $data_tabel[$i]['nama'] ?></td>
                                    <td class="px-5 font-normal text-sm font-poppins tracking-wide text-zinc-600"><?php echo $data_tabel[$i]['jurusan'] ?></td>
                                    <td class="px-5 font-normal text-sm font-poppins tracking-wide text-zinc-600"><?php echo $data_tabel[$i]['prodi'] ?></td>
                                    <td class="px-5 font-normal text-sm font-poppins tracking-wide text-zinc-600"><?php echo $data_tabel[$i]['gender'] ?></td>
                                    <td class="px-5 font-normal text-sm font-poppins tracking-wide text-zinc-600"><?php echo $data_tabel[$i]['tanggal_lahir'] ?></td>
                                    <td>
                                        <div class="px-5 py-2 w-full flex gap-2">
                                            <div class="px-4 py-2 bg-blue-600 rounded-md flex justify-center cursor-pointer hover:bg-blue-700 duration-150 shadow-sm"><a href="update.php?id=<?= $data_tabel[$i]['nim']; ?>" class="font-semibold text-sm font-poppins tracking-wider text-zinc-50">Update</a></div>
                                            <div class="px-4 py-2 bg-red-600 rounded-md flex justify-center cursor-pointer hover:bg-red-700 duration-150 shadow-sm"><a href="delete.php?id=<?= $data_tabel[$i]['nim']; ?>" class="font-semibold text-sm font-poppins tracking-wider text-zinc-50">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
        <footer class="w-full flex flex-col justify-center items-center gap-4 pt-10 pb-5 bg-zinc-50">
            <div class="flex gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#71717a" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#71717a" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#71717a" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg>
            </div>
            <div>
                <p class="font-normal text-xl font-poppins tracking-wide text-zinc-500">Data Mahasiwa</p>
            </div>
            <div class="w-[1000px] bg-zinc-400 h-[1px]"></div>
            <div>
                <p class="font-normal text-xs font-poppins tracking-wide text-zinc-500">Est. 2023 ©Dashboard</p>
            </div>
        </footer>
    </div>
</body>
</html>

<?php 
    $_SESSION['alert'] = ' '; 
?>