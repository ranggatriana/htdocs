<!DOCTYPE html>
<html lang="en">

  <head>
    <?php $this->load->view("admin/_partials/head.php") ?>
  </head>

  <body id="page-top">

   <?php $this->load->view("admin/_partials/navbar.php")?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view("admin/_partials/sidebar.php")?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
          
         
          <!-- DataTables Example -->
          <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo site_url('admin/barang/add') ?>"><i class="fas fa-plus"></i> Tambah Barang</a>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>                    
                    <tr>
                      
                      <th>Nama Barang</th>
                      <th>Harga Barang</th>
                      <th>Kategori</th>
                      <th>Stok</th>
                      <th>Tindakan</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach ($view_barang as $barang):?>
                    <tr>

                      <td>
                        <?php echo $barang->nama_barang ?>
                      </td>
                      <td>
                        <?php echo $barang->harga_barang ?>
                      </td>
                      <td>
                        <?php echo $barang->nama_kategori ?>
                      </td>
                      <td>
                        <?php echo $barang->stok ?>
                      </td>
                       <td width="250">
                        <a href="<?php echo site_url('admin/barang/edit/'.$barang->id_barang) ?>"
                         class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                        <a onclick="deleteConfirm('<?php echo site_url('admin/barang/delete/'.$barang->id_barang) ?>')"
                         href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                       </td>
                      
                    </tr>
                  <?php endforeach?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php $this->load->view("admin/_partials/footer.php")?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_partials/scrolltop.php")?>

    <!-- Logout Modal-->
    <?php $this->load->view("admin/_partials/modal.php")?>

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("admin/_partials/js.php")?>

    <script>
    function deleteConfirm(url){
      $('#btn-delete').attr('href',url);
      $('#deleteModal').modal();
    }
    </script>
  </body>

</html>
