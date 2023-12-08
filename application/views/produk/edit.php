<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Edit produk</title>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Edit Produk <?php echo $data->nama_produk ?></h2>
      </div>

      <div class="col-lg-12">

        <div class="d-flex justify-content-between ">
          <h4>Edit Produk</h4>
          <a class="btn btn-warning" href="<?php echo base_url(); ?>"> <i class="fas fa-angle-left"></i> Back</a>
        </div>

        <?php
          $id = $data->id_produk;
        ?>
        <form method="post" action="<?php echo base_url('produk/update/' . $id); ?>">

          <div class="form-group">
            <label>Produk</label>
            <input class="form-control" type="text" name="produk" value="<?php echo $data->nama_produk; ?>">
          </div>

          <div class="form-group">
              <label class="col-md-2 control-label"> Kategori</label>
                  <select class="form-control" name="category" required>
                          <option  value="">---Pilih Category---</option>                    
                      <?php foreach($get_category as $row) { 
                         if($data->kategori_id == $row->id_kategori){
                          $selected = "selected";
                        }else{
                          $selected = "";
                        }?>
                               <option value="<?php echo $row->id_kategori;?>"<?php echo $selected?>><?php echo $row->nama_kategori;?></option>
                      <?php } ?>
                  </select>    
          </div>    


          <div class="form-group">
            <label>Harga</label>
            <input class="form-control" type="text" id="harga" name="harga" value="<?php echo number_format( $data->harga, 0, ",", "."); ?>" required>
          </div>

          <div class="form-group">
              <label class="col-md-2 control-label"> Status</label>
                  <select class="form-control" name="status" required>
                          <option  value="">---Pilih Status---</option>                    
                      <?php foreach($get_status as $status) { 
                         if($data->status_id == $status->id_status){
                          $selected = "selected";
                        }else{
                          $selected = "";
                        }?>?>
                          <option value="<?php echo $status->id_status;?>"<?php echo $selected?>><?php echo $status->nama_status;?></option>
                      <?php } ?>
                  </select>    
          </div>    

          
          <div class="form-group">
            <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Submit </button>
          </div>

        </form>


      </div>
    </div>
  </div>
  <script type="text/javascript">
		
		var rupiah = document.getElementById('harga');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
		}
	</script>



  <?php $this->load->view('includes/footer'); ?>

</body>

</html>