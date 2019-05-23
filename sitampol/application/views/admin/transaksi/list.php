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
              Laporan Transaksi
              </div>
           <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

                      <th>Tanggal Transaksi</th>
                      <th>Nama Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>Harga Barang</th>
                      <th>Jumlah Barang</th>
                                            
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach ($view_transaksi as $transaksi):?>
                    <tr>
                      <td>
                        <?php echo $transaksi->tanggal_transaksi ?>
                      </td>
                      <td>
                        <?php echo $transaksi->nama_pelanggan?>
                      </td>
                      <td>
                        <?php echo $transaksi->nama_barang?>;
                      </td>
                      <td>
                        <?php echo $transaksi->harga_barang?>
                      </td>
                      <td>
                        <?php echo $transaksi->jumlah_barang?>
                      </td>
                      
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
