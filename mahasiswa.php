<?php include 'template/header.php'; ?>
<?php include 'template/topnavbar.php'; ?>
<?php include 'template/sidebar.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <table class="table table-striped table-hover" id="dataTables-example">
          <!--Judul Tabel-->
          <thead>
            <tr>
              <th>No.</th>
              <th>NPM</th>
              <th>Nama</th>
              <th>Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <!--Isi Data Tabel-->
            <tbody>
<?php
// memanggil file mahasiswa.php
include 'class/mahasiswa.php';
// membuat objek mahasiswa
$dataMahasiswa = new Mahasiswa();
// mengambil seluruh data mahasiswa
$result = $dataMahasiswa->tampilData();
$no = 1;
if (!empty($result)) {
    foreach ($result as $data) {
        echo "  <tr>
                                <td >$no</td>
                                <td >$data[nama]</td>
                                <td >$data[npm]</td>
                                <td >$data[tgl_lahir]</>
                                <td >$data[jenis_kelamin]</td>
                                <td >$data[alamat]</td>
                                <td > HAPUS | EDIT</td>
                                </tr> ";
        ++$no;
    }
}
?>

            </tbody>
          
          </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>


<?php include 'template/footer.php'; ?>