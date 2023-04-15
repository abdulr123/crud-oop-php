<?php

// memanggil file siswa.php
include 'class/mahasiswa.php';

if (isset($_GET['id'])) {
    // membuat objek mahasiswa
    $dataMahasiswa = new Mahasiswa();

    $npm = $_GET['id'];

    // delete data siswa
    $dataMahasiswa->hapusData($npm);
}
