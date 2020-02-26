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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('super/user/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama</th>
										<th>USERNAME</th>
										<th>PASSWORD</th>
										<th>EMAIL</th>
										<th>AKSES</th>
										<th>Action</th>
										</tr>
								</thead>
								<tbody>
									<?php foreach ($user as $user): ?>
									<tr>
										<td width="120">
											<?php echo $user->nama ?>
										</td>
										<td width="240">
											<?php echo $user->username ?>
										</td>
										<td>
											<?php echo $user->password ?>
										</td>										
										<td>
											<?php echo $user->email ?>
										</td>										
										<td>
											<?php echo $user->akses ?>
										</td>																				
										
										<!--<td width="120">
											<img src="<?php echo base_url('uploads/user/'.$user->gambar) ?>" width="64" />
										</td>-->
										<td width="120">
											<a href="<?php echo site_url('super/user/edit/'.$user->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('super/user/delete/'.$user->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
	<?php $this->load->view("super/_partials/modal.php") ?>

	<?php $this->load->view("super/_partials/js.php") ?>

	<script>
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deletemodal').modal();
		}
	</script>

</body>

</html>