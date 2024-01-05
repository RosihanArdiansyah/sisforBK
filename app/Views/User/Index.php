
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
		<div style="display: flex; justify-content: flex-end;">
				<button type="button" id="jadwalCreateBtn" class="btn btn-primary" style="margin: 10px;">Buat Jadwal Konseling</button>
		</div>
		<div class="card-body">
			<h4 class="card-title" style="margin-bottom: 20px; position: absolute; top: 16px; left: 16px;">Jadwal Konseling</h4>
				<table id="jadwalTable" class="table table-striped table-bordered dataTable" style="padding: 10px;">
					<thead class="table-dark">
						<tr>
							<th>NO</th>
							<th>Jadwal</th>
							<th>Waktu</th>
							<th>Guru BK</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($jadwal as $index => $jwd): ?>
							<tr>
									<td><?= $index+1; ?></td>
									<?php setlocale(LC_TIME, 'id_ID'); ?>
									<td><?= strftime('%A, %d %B %Y', strtotime($jwd['jadwal'])); ?></td>
									<td><?= date('H:i', strtotime($jwd['waktu'])); ?></td>
									<td><?= $jwd['user_fullName']; ?></td>
									<td>
											<?php if ($jwd['status'] == 2): ?>
													<span class="badge bg-info">ditolak</span>
											<?php elseif ($jwd['status'] == 1): ?>
													<span class="badge bg-success">diterima</span>
											<?php else: ?>
													<span class="badge bg-warning text-dark">menunggu konfirmasi</span>
											<?php endif; ?>
									</td>
									<td>
										<?php if ($jwd['status'] == 0): ?>
											<button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" title="ubah jadwal konseling" onClick="editJadwal(<?= $jwd['ID']; ?>)"><i class="far fa-edit"></i></button>
											<button type="button" class="btn btn-danger btn-sm" onClick="deleteJadwal(<?= $jwd['ID']; ?>)"><i class="far fa-trash-alt"></i></button>
										<?php endif; ?>
									</td>
									<!-- Add more table cells for other user properties -->
							</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
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

						// open create jadwal form
						$('#jadwalCreateBtn').click(function() {
							$('#statusForm').hide();
							$('#createJadwalModal').modal('show');
						});

						// submit create jadwal
						$('#createJadwalForm').submit(function(e) {
							e.preventDefault();

							var jadwalId = $('#addJadwalId').val();
							var ajaxUrl = jadwalId === '' ? '<?= base_url('userCreateJadwal'); ?>' : '<?= base_url('userUpdateJadwal'); ?>';
							var successMessage = jadwalId === '' ? 'Jadwal berhasil dibuat!' : 'Jadwal berhasil diperbarui!';
							var errorMessage = jadwalId === '' ? 'Jadwal tidak dapat dibuat!' : 'Jadwal tidak dapat diperbarui!';

							$.ajax({
								url: ajaxUrl,
								method: 'POST',
								data: $('#createJadwalForm').serialize(),
								success: function(data) {
									$('#createJadwalModal').modal('hide');
									$('#createJadwalForm').trigger('reset');
									Swal.fire({
										icon: 'success',
										title: jadwalId === '' ? 'Jadwal Created' : 'Jadwal Updated',
										text: successMessage,
									}).then(function () {
										window.location.href = '<?= base_url('user'); ?>';
									});
								},
								error: function(error) {
									Swal.fire({
										icon: 'error',
										title: 'Error',
										text: errorMessage,
									});
								}
							});
						});

			});

		</script>

		<!-- function edit jadwal -->
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
										$('#addJadwalId').val(jadwalData[0].ID);
										$('#userID').val(jadwalData[0].guruBK);
										$('#permasalahan').val(jadwalData[0].permasalahan);
										$('#jadwal').val(jadwalData[0].jadwal);
										$('#waktu').val(jadwalData[0].waktu);
										if (jadwalData[0].ID) {
												$('#status').val(jadwalData[0].status);
												$('#statusForm').show();
										} else {
												$('#statusForm').hide();
										}
										// Add similar lines for other input fields

										// Show the editUserModal
										$('#createJadwalModal').modal('show');
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

		<!-- function delete jadwal -->
		<script>
				// Define the editUser function to handle the edit action
				function deleteJadwal(id) {
						Swal.fire({
								title: 'Apakah Anda yakin?',
								text: "Anda tidak akan dapat mengembalikan ini!",
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Ya!'
						}).then((result) => {
								if (result.isConfirmed) {
										$.ajax({
												type: 'DELETE',
												url: '<?= base_url('deleteJadwal/'); ?>' + id,
												success: function(data) {
														Swal.fire({
																icon: 'success',
																title: 'Jadwal Deleted',
																text: 'Jadwal berhasil dihapus!',
														}).then(function () {
																window.location.href = '<?= base_url('admin'); ?>';
																console.log(data);
														});
												},
												error: function(error) {
														Swal.fire({
																icon: 'error',
																title: 'Error',
																text: 'Jadwal tidak dapat dihapus!',
														});
												}
										});
								} else {
										Swal.fire({
												icon: 'error',
												title: 'Batal',
												text: 'Batal menghapus jadwal',
										});
								}
						});
				}
		</script>
		

		  <!-- create jadwal -->
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
									<input type="hidden" id="addJadwalId" name="addJadwalId">
									<label for="guruBK">Nama Guru</label>
									<select class="form-control" id="guruBK" name="guruBK" required>
											<!-- Fetch and loop through all users to populate the options -->
											<option value="">Pilih Guru</option>
											<?php foreach ($users as $user): ?>
													<option value="<?= $user['ID']; ?>"><?= $user['fullName']; ?></option>
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
								<div class="form-group" id="statusForm">
									<label for="status">Status</label>
									<select class="form-control" id="status" name="status">
										<option value="">Ditunda</option>
										<option value="0">Ditolak</option>
										<option value="1">Diterima</option>
									</select>
								</div>
							</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" id="createJadwalButton">Create Jadwal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		

