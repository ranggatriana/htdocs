<!DOCTYPE html>

<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

  <?php $this->load->view("admin/_partials/navbar.php")?>
  <div id="wrapper">
    
    <?php $this->load->view("admin/_partials/sidebar.php")?>

    <div id ="content-wrapper">
      
      <div class="container-fluid">
        
        <?php $this->load->view("admin/_partials/breadcrumb.php")?>

        <?php if($this->session->flashdata('success')):?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success');?>
          </div>
        <?php endif; ?>

        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo site_url('admin/barang/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">
            
            <form action="<?php base_url('admin/barang/add')?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input class="form-control <?php form_error ('nama_barang')? 'is-invalid':'' ?>"
                  type="text" name="nama_barang" placeholder= "Nama Barang" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_barang') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="harga_barang">Harga</label>
                <input class="form-control <?php form_error ('nama_barang')? 'is-invalid':'' ?>"
                  type="number" name="harga_barang" placeholder= "Harga Barang" />
                <div class="invalid-feedback">
                  <?php echo form_error('harga_barang') ?>
                </div>
              </div>

               <div class="form-group">
                <label for="id_kategori">Kategori</label>

                <select class="form-control <?php form_error ('nama_kategori')? 'is-invalid':'' ?>" 
                name="id_kategori" onchange="cek_database_kategori()" id="id_kategori">
                                    <option class="form-control" value='' selected>----------Pilih----------</option>
                                    <?php
                                     include "koneksi.php";
                                    $panen = mysqli_query($koneksi,"SELECT * FROM kategori");
                                     while ($row = mysqli_fetch_array($panen)) {
                                    echo "<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
                                     }
                                    ?>
                                 </select>

                <div class="invalid-feedback">
                  <?php echo form_error('id_kategori') ?>
                </div>
              </div>

                <div class="form-group">
                <label for="stok">Stok</label>
                <input class="form-control <?php form_error ('stok')? 'is-invalid':'' ?>"
                  type="number" name="stok" placeholder= "Stok" />
                <div class="invalid-feedback">
                  <?php echo form_error('id_kategori') ?>
                </div>

                <div class="form-group">
                <label for="name">Gambar</label>
                <input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
                 type="file" name="gambar" />
                <div class="invalid-feedback">
                  <?php echo form_error('gambar') ?>
                </div>

              </div>
              </div>

              <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
            </form>

          </div>
          
        </div>
      </div>
      <?php $this->load->view("admin/_partials/footer.php") ?>
    </div>

  </div>
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>

</body>
</html>