<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("super/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("super/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("super/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("super/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('super/lokasi/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('super/Lokasi/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $lokasi->id?>" />

							<div class="form-group">
								<label for="drian">Kode Drian*</label>
								<input class="form-control <?php echo form_error('drian') ? 'is-invalid':'' ?>"
								 type="text" name="drian" placeholder="Kode Drian" value="<?php echo $lokasi->drian ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('drian') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nama">Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Gedung" value="<?php echo $lokasi->nama ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat">ALAMAT</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" min="0" placeholder="Alamat" value="<?php echo $lokasi->alamat ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="telp">No.Telepon</label>
								<input class="form-control <?php echo form_error('telp') ? 'is-invalid':'' ?>"
								 type="text" name="telp" min="0" placeholder="No.Telpon" value="<?php echo $lokasi->telp ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('telp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="latitude">Latitude</label>
								<input class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>"
								 type="text" name="latitude" min="0" placeholder="Latitude" value="<?php echo $lokasi->latitude ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('latitude') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="longitude">Longitude</label>
								<input class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>"
								 type="text" name="longitude" min="0" placeholder="Longitude" value="<?php echo $lokasi->longitude?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('longitude') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="gambar">Photo</label>
								<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
								 type="file" name="gambar" />
								<input type="hidden" name="old_image" value="<?php echo $lokasi->gambar ?>" />
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
				<?php $this->load->view("super/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("super/_partials/scrolltop.php") ?>

		<?php $this->load->view("super/_partials/js.php") ?>

</body>

</html>