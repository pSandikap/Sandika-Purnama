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
						<a href="<?php echo site_url('admin/lokasi/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/lokasi/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="drian">Kode Drian*</label>
								<input class="form-control <?php echo form_error('drian') ? 'is-invalid':'' ?>"
								 type="text" name="drian" placeholder="Kode Drian" value="<?php echo $a = 'kd'.rand(1000,9999); ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('drian') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nama">Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Gedung" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat*</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" min="0" placeholder="Alamat" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="telp">No.Telepon*</label>
								<input class="form-control <?php echo form_error('telp') ? 'is-invalid':'' ?>"
								 type="text" name="telp" min="0" placeholder="No.telp" />
								<div class="invalid-feedback">
									<?php echo form_error('telp') ?>
								</div>
							</div>							

							<div class="form-group">
								<label for="latitude">Latitude*</label>
								<input class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>"
								 type="text" name="latitude" min="0" placeholder="Latitude" />
								<div class="invalid-feedback">
									<?php echo form_error('latitude') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="longitude">Longitude*</label>
								<input class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>"
								 type="text" name="longitude" min="0" placeholder="Longitude" />
								<div class="invalid-feedback">
									<?php echo form_error('longitude') ?>
								</div>
							</div>							
							<div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
								 type="file" name="gambar" />
								<div class="invalid-feedback">
									<?php echo form_error('gambar') ?>
								</div>
							</div>

							

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
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