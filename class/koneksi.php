<?php

// membuat class database
class Database
{
    // deklarasi parameter koneksi database
    public $dbHost = 'localhost';
    public $dbUser = 'root';
    public $dbPassword = '';
    public $dbName = 'belajaroopb41';

    public function connect()
    {
        // koneksi ke server MySQL
        $mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);

        // cek koneksi tersambung atau tidak
        if ($mysqli->connect_error) {
            echo 'Gagal terkoneksi ke database : ('.$mysqli->connect_error.')';
        }

        // nilai kembalian bila koneksi berhasil
        return $mysqli;
    }
}
