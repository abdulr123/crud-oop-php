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
        
        <div class="mb-3">
          <a href="tambahdata.php" class='btn btn-success'><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        

        <?php
      if (empty($_GET['alert'])) {
          echo '';
      } elseif ($_GET['alert'] == 1) { ?>
        <script>
          Swal.fire(
            'Gagal!',
            'Terjadi kesalahan',
            'error'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 2) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data mahasiswa berhasil disimpan',
            'success'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 3) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data mahasiswa berhasil diubah',
            'success'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 4) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data mahasiswa berhasil dihapus',
            'success'
          );
        </script>
      <?php } ?>


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
foreach ($result as $data) {
    $tanggal = $data['tgl_lahir'];
    $tgl = explode('-', $tanggal);
    $tanggal_lahir = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
    ?>
    
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data['npm']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $tanggal_lahir; ?></>
        <td><?php echo $data['jenis_kelamin']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td> 
            <a href="update.php?id=<?php echo $data['id']; ?>" class='btn btn-info'><i class="fas fa-edit"></i></a>

            <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger" onclick="return hapusDataMahasiswa()"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
    <?php ++$no; ?>
<?php } ?>

            </tbody>
          
          </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>


<?php include 'template/footer.php'; ?>
