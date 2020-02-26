<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/lokasi/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable2" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kode Drian</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>No.Telepon</th>
										<th>Latitude</th>
										<th>Longitudinal</th>
										<th>Gambar</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($lokasi as $lokasi): ?>
									<tr>
										<td width="120">
											<?php echo $lokasi->drian ?>
										</td>
										<td width="120">
											<?php echo $lokasi->nama ?>
										</td>
										<td width="240">
											<?php echo $lokasi->alamat ?>
										</td>
										<td>
											<?php echo $lokasi->telp ?>
										</td>										
										<td>
											<?php echo $lokasi->latitude ?>
										</td>										
										<td>
											<?php echo $lokasi->longitude ?>
										</td>																				
										
										<td width="120">
											<img src="<?php echo base_url(); ?>assets/upload/<?php echo $lokasi->gambar ?>" style="width: 75%" >
										</td>
										<td width="120">
											<a href="<?php echo site_url('admin/lokasi/edit/'.$lokasi->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/lokasi/delete/'.$lokasi->id) ?>')"
											 href="#" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
	<script>
		$(document).ready(function() {
			var t = $("#dataTable2").DataTable({
				'paging' : true,
				'lengthChange' :false,
				'searching' : false,
				'ordering' : true,
				'info' : true,
				'autoWidth' : false,
				'dom'	: 'Bfrtip',
				'buttons':[
					'print'
				]

			})
		})
	</script>
	<script>
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deletemodal').modal();
		}
	</script>

</body>

</html>