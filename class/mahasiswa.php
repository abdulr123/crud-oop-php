<?php

class Mahasiswa
{
    public function tampilData()
    {
        // memanggil file database.php
        include 'class/koneksi.php';

        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk mengambil semua data mahasiswa
        $sql = 'SELECT * FROM mahasiswa ORDER BY npm ASC';

        $result = $mysqli->query($sql);

        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }

        // menutup koneksi database
        $mysqli->close();

        // nilai kembalian dalam bentuk array
        return $hasil;
    }

    public function tambahData($npm, $nama, $tanggal_lahir, $jenis_kelamin, $alamat)
    {
        // memanggil file database.php
        include 'class/koneksi.php';

        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // mem-bypass karakter spesial dalam query SQL, sehingga jika attacker mnyertakan karakter seperti ‘ ! ^ ] ” dan lain sebagainya, maka fungsi ini tidak akan membaca karakter tersebut.
        $npm = $mysqli->real_escape_string($npm);
        $nama = $mysqli->real_escape_string($nama);
        $alamat = $mysqli->real_escape_string($alamat);

        // sql statement untuk insert data siswa
        $sql = "INSERT INTO mahasiswa (npm,nama,tgl_lahir,alamat,jenis_kelamin) 
                VALUES ('$npm','$nama','$tanggal_lahir','$alamat','$jenis_kelamin')";

        $result = $mysqli->query($sql);

        // cek hasil query
        if ($result) {
            /* jika data berhasil disimpan alihkan ke halaman mahasiswa dan tampilkan pesan = 2 */
            header('Location: mahasiswa.php?alert=2');
        } else {
            /* jika data gagal disimpan alihkan ke halaman mahasiswa dan tampilkan pesan = 1 */
            header('Location: mahasiswa.php?alert=1');
        }

        // menutup koneksi database
        $mysqli->close();
    }

    // Method untuk mengambil data mahasiswa berdasarkan nim
    public function ambilData($id)
    {
        // memanggil file database
        include 'class/koneksi.php';

        // membuat objek dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statment untuk mengambil data mahasiswa berdasarkan nim
        $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";

        $result = $mysqli->query($sql);
        $data = $result->fetch_assoc();

        // menutup koneksi database
        $mysqli->close();

        // nilai kembalian dalam bentuk array
        return $data;
    }

    public function updateData($npm, $nama, $tanggal_lahir, $jenis_kelamin, $alamat)
    {
        // memanggil file database
        include 'koneksi.php';

        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        $nama = $mysqli->real_escape_string($nama);
        $alamat = $mysqli->real_escape_string($alamat);

        // sql statement untuk update data mahasiswa
        $sql = "UPDATE mahasiswa SET nama       = '$nama',
                                    tgl_lahir       = '$tanggal_lahir',
                                    jenis_kelamin   = '$jenis_kelamin',
                                    alamat       = '$alamat'
                              WHERE npm            = '$npm'";

        $result = $mysqli->query($sql);

        // cek hasil query
        if ($result) {
            /* jika data berhasil diubah alihkan ke halaman index.php dan tampilkan pesan = 3 */
            header('Location: mahasiswa.php?alert=3');
        } else {
            /* jika data gagal diubah alihkan ke halaman index.php dan tampilkan pesan = 1 */
            header('Location: mahasiswa.php?alert=1');
        }

        // menutup koneksi database
        $mysqli->close();
    }
}
