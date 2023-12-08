<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Produk Fast Print</title>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Produk Fast Print Test Programmer</h2>
      </div>

      <div class="col-lg-12">

        <?php echo $this->session->flashdata('message'); ?>

        <div class="d-flex justify-content-between mb-3">
          <h4>Manage Produk</h4>
          <a href="<?= base_url('produk/create') ?>" class="btn btn-success"> <i class="fas fa-plus"></i> Add New Post</a>
        </div>

        <table class="table table-bordered table-default">

          <thead class="thead-light">
            <tr>
              <th width="2%">No</th>
              <th width="25%">Nama Produk</th>
              <th width="53%">Nama Kategori</th>
              <th width="20%">Harga</th>
              <th width="40%">Nama Status</th>
              <th width="20%">Action</th>
            </tr>
          </thead>

          <tbody>

            <?php $i = 1; foreach ($data as $produk) { ?>

              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $produk->nama_produk; ?></td>
                <td><?php echo $produk->nama_kategori; ?></td>
                <td><?php echo $produk->harga; ?></td>
                <td><?php echo $produk->nama_status; ?></td>
                <td>
                  <a href="<?= base_url('produk/edit/' . $produk->id_produk) ?>" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit </a>
                  <a href="<?= base_url('produk/delete/' . $produk->id_produk) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"> <i class="fas fa-trash"></i> Delete </a>
                </td>

              </tr>

            <?php $i++; } ?>

          </tbody>

        </table>

      </div>
    </div>
  </div>



  <?php $this->load->view('includes/footer'); ?>

</body>

</html>