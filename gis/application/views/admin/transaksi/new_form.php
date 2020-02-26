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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/transaksi/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php echo site_url('admin/transaksi/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="drian">Kode Drian*</label>
								<select class="form-control <?php echo form_error('drian') ? 'is-invalid':'' ?>" name="drian" required="">
									<option hidden="">-- PILIH --</option>
									<?php foreach ($lokasi as $g) { 
										$this->db->select("*");
										$this->db->from("transaksi");
										$this->db->where("drian",$g->drian);
										$exist = $this->db->get()->row();
										if (empty($exist)) { ?>
											<option><?= $g->drian." - ".$g->nama; ?></option>
									<?php }} ?>
								</select>
							</div>
							<div class="form-group">
								<label for="penyewa">User*</label>
								<input class="form-control" type="text" name="penyewa" value="<?php echo $this->session->userdata('ses_nama');?>">
							</div>
							<div class="form-group">
								<label for="no_rek">No Rekening*</label>
								<input class="form-control" type="text" name="no_rek" required="">
							</div>
							<div class="form-group">
								<label for="biaya">Biaya*</label>
								<input class="form-control" type="text" name="biaya" required="">
							</div>
							<div class="form-group">
								<label for="ditetapkan">Ditetapkan*</label>
								<input class="form-control" type="text" name="ditetapkan" value="<?php echo date('d-m-Y');?>" >
							</div>
							<div class="form-group">
								<label for="gambar">Bukti Pembayaran*</label>
								<input class="form-control" type="file" name="gambar" required="">
							</div>
							<button class="btn btn-success" type="submit">Save</button>
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>