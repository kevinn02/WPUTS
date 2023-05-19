<?php
    require('koneksi.php');

    // Tambah Data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $prodi = $_POST['prodi'];
        $gender = $_POST['gender'];
        $tanggal_lahir = $_POST['tanggal_lahir'];

        //Menambah Data Baru
        $sql = "INSERT INTO data_mahasiswa(
                nim, 
                nama, 
                jurusan, 
                prodi, 
                gender, 
                tanggal_lahir
                )
                VALUES(
                '$nim', 
                '$nama', 
                '$jurusan', 
                '$prodi', 
                '$gender', 
                '$tanggal_lahir'
                )";

        if(mysqli_query($mysqli, $sql)){
            // Allert
            echo "<div></div>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Berhasil!','Data Mahasiswa Berhasil Di Tambahkan!','success')</script>";
        }

        mysqli_close($mysqli);
    }
?>

<!-- Main Tambah -->
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
    <header class="shadow-sm">
        <nav class="w-full py-5 bg-zinc-50">
            <div class="flex justify-center w-full">
                <a href="#" class="font-bold text-xl font-poppins tracking-wide text-zinc-700">Dashboard Data Mahasiswa</a>
            </div>
        </nav>
    </header>
    <main class="w-full flex justify-center py-14">
        <div class="w-[750px] h-auto bg-zinc-50 shadow-sm rounded-md p-7">
            <div class="w-full text-center mb-4">
                <h3 class="font-semibold text-2xl font-poppins tracking-wide text-zinc-600">Tambah Data Mahasiswa</h3>
            </div>
            <form action="tambah.php" method="POST" class="w-full">
                <table class="w-full">
                    <tr>
                        <td class="w-[140px] py-2"><label class="font-normal text-base font-poppins tracking-wider text-zinc-900" for="nim">NIM</label></td>
                        <td class="py-2">:</td>
                        <td class="py-2"><input required placeholder="Masukan NIM ..." type="number" id="nim" name="nim" class="rounded-md shadow-sm w-full outline-none px-2 py-1 font-normal text-base font-poppins tracking-wide text-zinc-700"></td>
                    </tr>
                    <tr>
                        <td class="w-[140px] py-2"><label class="font-normal text-base font-poppins tracking-wider text-zinc-900" for="nama">Nama</label></td>
                        <td class="py-2">:</td>
                        <td class="py-2"><input required placeholder="Masukan Nama ..." type="text" id="nama" name="nama" class="rounded-md shadow-sm w-full outline-none px-2 py-1 font-normal text-base font-poppins tracking-wide text-zinc-700"></td>
                    </tr>
                    <tr>
                        <td class="w-[140px] py-2"><label class="font-normal text-base font-poppins tracking-wider text-zinc-900" for="jurusan">Jurusan</label></td>
                        <td class="py-2">:</td>
                        <td class="py-2">
                            <select required id="jurusan" name="jurusan" class="rounded-md shadow-sm w-full outline-none px-2 py-1 font-normal text-base font-poppins tracking-wide text-zinc-700">
                                <option selected disabled hidden></option>
                                <option value="TI-MTI">TI-MTI</option>
                                <option value="TI-KAB">TI-KAB</option>
                                <option value="Sistem Komputer">Sistem Komputer</option>
                                <option value="Bisnis Digital">Bisnis Digital</option>
                                <option value="DKV">DKV</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-[140px] py-2"><label class="font-normal text-base font-poppins tracking-wider text-zinc-900" for="prodi">Prodi</label></td>
                        <td class="py-2">:</td>
                        <td class="py-2">
                            <select id="prodi" name="prodi" class="rounded-md shadow-sm w-full outline-none px-2 py-1 font-normal text-base font-poppins tracking-wide text-zinc-700">
                                <option selected disabled hidden></option>
                                <option value="TI">TI</option>
                                <option value="SK">SK</option>
                                <option value="DKV">DKV</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-[140px] py-2"><label class="font-normal text-base font-poppins tracking-wider text-zinc-900" for="gender">Gender</label></td>
                        <td class="py-2">:</td>
                        <td class="py-2">
                            <select id="gender" name="gender" class="rounded-md shadow-sm w-full outline-none px-2 py-1 font-normal text-base font-poppins tracking-wide text-zinc-700">
                                <option selected disabled hidden></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-[140px] py-2"><label class="font-normal text-base font-poppins tracking-wider text-zinc-900" for="tanggal_lahir">Tanggal Lahir</label></td>
                        <td class="py-2">:</td>
                        <td class="py-2"><input required type="date" id="tanggal_lahir" name="tanggal_lahir" class="rounded-md shadow-sm w-full outline-none px-2 py-1 font-normal text-base font-poppins tracking-wide text-zinc-700"></td>
                    </tr>
                </table>
                <div class="w-full text-center mt-4">
                    <button type="submit" class="py-2 px-5 bg-green-600 rounded-md shadow-sm font-semibold text-sm font-poppins tracking-wider text-zinc-50">Submit</button>
                </div>
            </form>
        </div>
    </main>
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
            <p class="font-normal text-base font-poppins tracking-wide text-zinc-500">Data Mahasiwa</p>
        </div>
        <div class="w-[1000px] bg-zinc-400 h-[1px]"></div>
        <div>
            <p class="font-normal text-xs font-poppins tracking-wide text-zinc-500">Est. 2023 ©Dashboard</p>
        </div>
    </footer>
</body>
</html>