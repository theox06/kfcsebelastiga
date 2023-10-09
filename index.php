<?php
// panggil koneksi database
include "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KFC Cabang T&G WijayaKusuma Plaza Bogor Sebelas 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="mt-3">
            <h3 class="text-center">KFC Cabang T&G WijayaKusuma Plaza Bogor Sebelas 3</h3>
            <h3 class="text-center">Theo Ginting</h3>
        </div>


        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Data Karyawan
            </div>
            <div class="card-body">

                <!-- Button trigger modal Tambah -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <td>No</td>
                        <td>NIK</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>Jabatan</td>
                        <td>Aksi</td>
                    </tr>

                    <?php
                    // menampilkan data
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY id_karyawan ASC");
                    while ($data = mysqli_fetch_array($tampil)):
                        ?>

                        <tr>
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $data['nik'] ?>
                            </td>
                            <td>
                                <?= $data['nama'] ?>
                            </td>
                            <td>
                                <?= $data['alamat'] ?>
                            </td>
                            <td>
                                <?= $data['jabatan'] ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="#" data-bs-toggle="modal"
                                    data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                                <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                    data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                </div>
                </td>
                </tr>


                <!-- Awal Modal Ubah -->
                <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Karyawan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="aksiCrud.php" method="post">
                                <input type="hidden" name="id_karyawan" value="<?= $data['id_karyawan'] ?>" id="">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">NIK</label>
                                        <input type="text" class="form-control" placeholder="Masukkan NIK" name="tnik"
                                            value="<?= $data['nik'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="tnama"
                                            value="<?= $data['nama'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" placeholder="Masukkan Alamat"
                                            name="talamat"><?= $data['alamat'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <select name="tjabatan" class="form-select">
                                            <option value="<?= $data['jabatan'] ?>"><?= $data['jabatan'] ?></option>
                                            <option value="Manajer Cabang">Manajer Cabang</option>
                                            <option value="Asisten Manager">Asisten Manager</option>
                                            <option value="Koki">Koki</option>
                                            <option value="Kasir">Kasir</option>
                                            <option value="Helper">Helper</option>
                                            <option value="Cleaner Service">Cleaner Service</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir modal Ubah -->


                <!-- Awal Modal Hapus -->
                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data Karyawan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="aksiCrud.php" method="post">
                                <input type="hidden" name="id_karyawan" value="<?= $data['id_karyawan'] ?>" id="">
                                <div class="modal-body">
                                    <h5 class="text-center">!!Perhatian!!, Data akan terhapus permanen <br>
                                        <span class="text-danger">
                                            <?= $data['nik'] ?> -
                                            <?= $data['nama'] ?>
                                        </span>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir modal Hapus -->



            <?php endwhile; ?>
            </table>

            <!-- Awal Modal Tambah -->
            <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Karyawan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="aksiCrud.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" class="form-control" placeholder="Masukkan NIK" name="tnik">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="tnama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" placeholder="Masukkan Alamat"
                                        name="talamat"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <select name="tjabatan" class="form-select">
                                        <option value=""></option>
                                        <option value="Manajer Cabang">Manajer Cabang</option>
                                        <option value="Asisten Manager">Asisten Manager</option>
                                        <option value="Koki">Koki</option>
                                        <option value="Kasir">Kasir</option>
                                        <option value="Helper">Helper</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Akhir modal Tambah -->


        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>