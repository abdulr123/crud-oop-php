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
}
