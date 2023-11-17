
<div class="container">	

	<div class="card text-dark bg-warning main-content" style="margin-top:16px;">
					<!-- Your main content for index.php goes here -->
		<div class="card-body">	
			<h1>Selamat Datang</h1>
			<h4><?= $username; ?></h4>
		</div>
	</div>

	<div class="card sub-content" style="margin-top:16px; max-height: 70%; overflow-y: auto">
		<!-- Button in the top right corner -->
		<button type="button" id="jadwalCreateBtn" class="btn btn-success position-absolute top-0 end-0" style="margin: 10px;">Buat Jadwal Konseling</button>
		<div class="card-body">
		<h4 class="card-title" style="margin-bottom: 20px;">Jadwal Konseling</h4>
				<table id="jadwalTable" class="table table-striped table-bordered dataTable" style="padding: 10px;">
					<thead class="table-dark">
						<tr>
							<th>NO</th>
							<th>Jadwal</th>
							<th>Waktu</th>
							<th>Nama Lengkap</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($jadwal as $jwd): ?>
							<tr>
									<td><?= $jwd['ID']; ?></td>
									<td><?= $jwd['jadwal']; ?></td>
									<td><?= date('H:i', strtotime($jwd['waktu'])); ?></td>
									<td><?= $jwd['user_fullName']; ?></td>
									<td>
											<?php if ($jwd['status'] == 0): ?>
													<span class="badge bg-danger">ditolak</span>
											<?php elseif ($jwd['status'] == 1): ?>
													<span class="badge bg-success">diterima</span>
											<?php else: ?>
													<span class="badge bg-warning text-dark">menunggu konfirmasi</span>
											<?php endif; ?>
									</td>
									<td>
										<button type="button" class="btn btn-primary" onClick="editJadwal(<?= $jwd['ID']; ?>)"><i class="far fa-edit"></i></button>
									</td>
									<!-- Add more table cells for other user properties -->
							</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
		</div>
	</div>


		<!-- modal -->
		<div class="modal fade" id="createJadwalModal" tabindex="-1" role="dialog" aria-labelledby="createJadwalModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="createJadwalModalLabel">Buat Jadwal Konseling</h5>
						<button type="button" class="btn btn-secondary btn-danger" id="jadwalCloseBtn" style="float: right">Close</button>
					</div>
					<form id="createJadwalForm">
						<div class="modal-body">
							<div class="form-group">
								<label for="userID">Nama Siswa</label>
								<select class="form-control" id="userID" name="userID" required>
										<!-- Fetch and loop through all users to populate the options -->
										<option value="">Pilih Siswa</option>
										<?php foreach ($users as $user): ?>
												<option value="<?= $user['ID']; ?>"><?= $user['fullName']; ?>- <?= $user['kls']; ?></option>
										<?php endforeach; ?>
								</select>      
							</div>
							<div class="form-group">
								<label for="permasalahan">Permasalahan</label>
								<textarea  class="form-control" id="permasalahan" name="permasalahan"></textarea>          
							</div>
							<div class="form-group">
								<label for="jadwal">Tanggal:</label>
								<input class="form-control" id="jadwal" type="date" name="jadwal" required>            
							</div>
							<div class="form-group">
								<label for="waktu">Waktu:</label>
								<input class="form-control" id="waktu" type="time" name="waktu" required>           
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" id="createJadwalButton">Create Jadwal</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Add this modal for editing user information -->
		<div class="modal fade" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="editJadwalModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="editJadwalModalLabel">Edit Jadwal Konseling</h5>
										<button type="button" class="btn btn-secondary btn-danger" id="jadwalEditCloseBtn" style="float: right">Close</button>
								</div>
								<form id="editJadwalForm">
									<div class="modal-body">
											<div class="form-group">
												<input type="hidden" class="form-control" id="editJadwalId" name="editJadwalId">
												<label for="editUserID">Nama Siswa</label>
												<select class="form-control" id="editUserID" name="editUserID" required>
														<!-- Fetch and loop through all users to populate the options -->
														<option value="">Pilih Siswa</option>
														<?php foreach ($users as $user): ?>
																<option value="<?= $user['ID']; ?>"><?= $user['fullName']; ?>- <?= $user['kls']; ?></option>
														<?php endforeach; ?>
												</select>      
											</div>
											<div class="form-group">
												<label for="editPermasalahan">Permasalahan</label>
												<textarea  class="form-control" id="editPermasalahan" name="editPermasalahan"></textarea>          
											</div>
											<div class="form-group">
												<label for="editJadwal">Tanggal:</label>
												<input class="form-control" id="editJadwal" type="date" name="editJadwal" required>            
											</div>
											<div class="form-group">
												<label for="editWaktu">Waktu:</label>
												<input class="form-control" id="editWaktu" type="time" name="editWaktu" required>           
											</div>
											<div class="form-group">
													<label for="editStatus">Status</label>
													<select class="form-control" id="editStatus" name="editStatus" required>
														<option value="0">Ditolak</option>
														<option value="1">Diterima</option>
													</select>
												</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" id="editJadwalButton">Buat Jadwal Konseling</button>
									</div>
								</form>
						</div>
				</div>
		</div>
		
		<script>
			$(document).ready(function() {
				var currentUrl = window.location.pathname;

				// Get all the sidebar links
				var $sidebarLinks = $(".sidebar-wrap .nav-link");

				// Loop through each link and check if it matches the current URL
				$sidebarLinks.each(function() {
					var linkUrl = $(this).attr('href');
					if (currentUrl === linkUrl) {
						$(this).addClass("active");
					}
				});

				// Create a DataTable object
				var dataTable = $('#jadwalTable').DataTable({
							// Add a search filter
							search: {
								smart: true,
								columns: ['ID', 'jadwal', 'waktu', 'user_fullName', 'status']
							},
							
						});

						// Handle the search event
						$('#jadwalTable_filter input').on('keyup', function() {
							dataTable.search(this.value).draw();
						});

						$('#jadwalCreateBtn').click(function() {
							$('#createJadwalModal').modal('show');
						});

						$('#createJadwalForm').submit(function(e) {
							e.preventDefault();

							$.ajax({
								url: '<?= base_url('createJadwal'); ?>',
								method: 'POST',
								data: $('#createJadwalForm').serialize(),
								success: function(data) {
									$('#createJadwalModal').modal('hide');
									$('#createJadwalForm').trigger('reset');
									Swal.fire({
											icon: 'success',
											title: 'Jadwal Created',
											text: 'Jadwal berhasil dibuat!',
									}).then(function () {
											window.location.href = '<?= base_url('admin'); ?>';
									});
								},
								error: function(error) {
									Swal.fire({
										icon: 'error',
										title: 'Error',
										text: 'Jadwal tidak dapat dibuat!',
									});
								}
							});
						});

						$('#editJadwalForm').submit(function(e) {
							e.preventDefault();
							var formData = $(this).serialize();
							console.log(formData);

							$.ajax({
									url: '<?= base_url('updateJadwal'); ?>', // Change the URL to your controller method for updating user data
									method: 'POST',
									data: formData,
									success: function(data) {
											console.log(data);
											$('#editJadwalModal').modal('hide');
											$('#editJadwalForm').trigger('reset');
											Swal.fire({
													icon: 'success',
													title: 'Jadwal Updated',
													text: 'Jadwal berhasil diperbarui!',
											}).then(function () {
													// You may want to reload or update the table data here
													window.location.href = '<?= base_url('admin'); ?>';
													// For example: window.location.reload();
											});
									},
									error: function(error) {
											Swal.fire({
													icon: 'error',
													title: 'Error',
													text: 'Jadwal tidak dapat diperbarui!',
											});
									}
							});
					});
			});

		</script>

		<script>
				// Define the editUser function to handle the edit action
				function editJadwal(id) {
						$.ajax({
								url: '<?= base_url('showJadwal'); ?>'+id, // Change the URL to your controller method
								method: 'GET',
								success: function(data) {
										// Parse the JSON response
										var jadwalData = JSON.parse(data);
										console.log(jadwalData[0].ID);

										// Populate the modal fields with user data
										$('#editJadwalId').val(jadwalData[0].ID);
										$('#editUserID').val(jadwalData[0].userID);
										$('#editPermasalahan').val(jadwalData[0].permasalahan);
										$('#editJadwal').val(jadwalData[0].jadwal);
										$('#editWaktu').val(jadwalData[0].waktu);
										$('#editStatus').val(jadwalData[0].status);
										// Add similar lines for other input fields

										// Show the editUserModal
										$('#editJadwalModal').modal('show');
									},
								error: function(error) {
										Swal.fire({
												icon: 'error',
												title: 'Error',
												text: 'Jadwal tidak dapat diedit!',
										});
								}
						});
						
				}
		</script>

		
