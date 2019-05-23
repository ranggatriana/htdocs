<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("admin/_partials/navbar.php") ?>
  <div id="wrapper">

    <?php $this->load->view("admin/_partials/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <!-- Card  -->
        <div class="card mb-3">
          <div class="card-header">

            <a href="<?php echo site_url('admin/barang/') ?>"><i class="fas fa-arrow-left"></i>
              Back</a>
          </div>
          <div class="card-body">
            
            <form action="<?php base_url('admin/barang/edit')?>" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                 type="text" name="nama_barang" placeholder="" value="<?php echo $tabel_barang->nama_barang ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_barang') ?>
                </div>
              </div>
              <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
              </div>

             
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