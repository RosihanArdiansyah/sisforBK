
<div class="container">	

		<div class="card text-dark bg-warning main-content" style="margin-top:16px;">
					<!-- Your main content for index.php goes here -->
			<div class="card-body">	
				<h2>Data User</h2>
				<h4>halaman yang berisikan tabel pengguna aplikasi</h4>
			</div>
		</div>

		<div class="card sub-content" style="margin-top:16px; max-height: 70%; overflow-y: auto">
		<!-- Button in the top right corner -->
			<button type="button" id="userCreateBtn" class="btn btn-success position-absolute top-0 end-0" style="margin: 10px;">Tambah Data Pengguna</button>
			<div class="card-body">
				<h4 class="card-title" style="margin-bottom: 20px;">Data Pengguna</h4>
				<table id="userTable" class="table table-striped table-bordered dataTable" style="padding: 10px;">
					<thead class="table-dark">
						<tr>
							<th>NO</th>
							<th>Username</th>
							<th>NIS/NIP</th>
							<th>Nama Lengkap</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($users as $user): ?>
							<tr>
									<td><?= $user['ID']; ?></td>
									<td><?= $user['username']; ?></td>
									<td><?= $user['NIS']; ?></td>
									<td><?= $user['fullName']; ?></td>
									<td>
											<?php if ($user['Role'] == 0): ?>
													siswa
											<?php else: ?>
													guru
											<?php endif; ?>
									</td>
									<td>
										<button type="button" class="btn btn-primary" onClick="editUser(<?= $user['ID']; ?>)"><i class="far fa-edit"></i></button>
									</td>
									<!-- Add more table cells for other user properties -->
							</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>

		</div>


		<!-- modal -->
		<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="createUserModalLabel">Create User</h5>
						<button type="button" class="btn btn-secondary btn-danger" id="userCloseBtn" style="float: right">Close</button>
					</div>
					<form id="createUserForm">
						<div class="modal-body">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
							</div>
							<div class="form-group">
								<label for="fullName">Full Name</label>
								<input placeholder="Masukkan nama lengkap" type="text" class="form-control" id="fullName" name="fullName">
							</div>
							<div class="form-group">
								<label for="TTL">TTL</label>
								<input type="date" placeholder="Masukkan tanggal lahir" class="form-control" id="TTL" name="TTL">
							</div>
							<div class="form-group">
								<label for="NIS">NIS/NIP</label>
								<input type="text" class="form-control" placeholder="Masukkan NIS/ NIP" id="NIS" name="NIS">
							</div>
							<div class="form-group">
								<label for="Bapak">Bapak</label>
								<input type="text" placeholder="Masukkan nama bapak" class="form-control" id="Bapak" name="Bapak">
							</div>
							<div class="form-group">
								<label for="Ibu">Ibu</label>
								<input type="text" class="form-control" placeholder="Masukkan nama ibu" id="Ibu" name="Ibu">
							</div>
							<div class="form-group">
								<label for="Kelas">Kelas</label>
								<select class="form-control" id="Kelas" name="Kelas" required>
									<option value="null">--Pilih Kelas--</option>
										<?php foreach ($kelas as $kls): ?>
												<option value="<?= $kls['ID']; ?>"><?= $kls['kelas']; ?></option>
										<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="Role">Status</label>
								<select class="form-control" id="Role" name="Role" required>
									<option value="">--Pilih Status Pengguna--</option>
									<option value="0">Siswa</option>
									<option value="1">Guru</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" id="createUserButton">Create User</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Add this modal for editing user information -->
		<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
										<button type="button" class="btn btn-secondary btn-danger" id="userEditCloseBtn" style="float: right">Close</button>
								</div>
								<form id="editUserForm">
									<div class="modal-body">
											<div class="form-group">
												<input type="hidden" class="form-control" id="editUserId" name="editUserId">
												<label for="editUsername">Username</label>
												<input type="text" class="form-control" id="editUsername" name="editUsername" placeholder="Masukkan username" required>
											</div>
											<div class="form-group">
												<label for="editFullName">Full Name</label>
													<input placeholder="Masukkan nama lengkap" type="text" class="form-control" id="editFullName" name="editFullName">
												</div>
												<div class="form-group">
													<label for="editTTL">TTL</label>
													<input type="date" placeholder="Masukkan tanggal lahir" class="form-control" id="editTTL" name="editTTL">
												</div>
												<div class="form-group">
													<label for="editNIS">NIS/NIP</label>
													<input type="text" class="form-control" placeholder="Masukkan NIS/ NIP" id="editNIS" name="editNIS">
												</div>
												<div class="form-group">
													<label for="editBapak">Bapak</label>
													<input type="text" placeholder="Masukkan nama bapak" class="form-control" id="editBapak" name="editBapak">
												</div>
												<div class="form-group">
													<label for="editIbu">Ibu</label>
													<input type="text" class="form-control" placeholder="Masukkan nama ibu" id="editIbu" name="editIbu">
												</div>
												<div class="form-group">
													<label for="editKelas">Kelas</label>
													<select class="form-control" id="editKelas" name="editKelas" required>
														<option value="null">--Pilih Kelas--</option>
														<?php foreach ($kelas as $kls): ?>
																<option value="<?= $kls['ID']; ?>"><?= $kls['kelas']; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<div class="form-group">
													<label for="editRole">Status</label>
													<select class="form-control" id="editRole" name="editRole" required>
														<option value="">--Pilih Status Pengguna--</option>
														<option value="0">Siswa</option>
														<option value="1">Guru</option>
													</select>
												</div>
											</div>
										<div class="modal-footer">
												<button type="submit" class="btn btn-primary" id="editUserButton">Edit User</button>
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
				var dataTable = $('#userTable').DataTable({
					pageLength: 5,
					lengthMenu: [5, 10, 25, 30],
					// Add a search filter
					search: {
						smart: true,
						columns: ['ID', 'username', 'fullName', 'NIS']
					},
					// Add a select filter for role
					select: {
						columns: ['Role'],
						options: {
							1: 'Guru',
							0: 'Siswa'
						}
					}
				});

				// Handle the search event
				$('#userTable_filter input').on('keyup', function() {
					dataTable.search(this.value).draw();
				});

				// Handle the select filter event
				$('#userTable_filter select').on('change', function() {
					dataTable.column(0).search(this.value).draw();
				});

				$('#userCreateBtn').click(function() {
					$('#createUserModal').modal('show');
				});

				$('#createUserForm').submit(function(e) {
					e.preventDefault();

					$.ajax({
						url: '<?= base_url('createUser'); ?>',
						method: 'POST',
						data: $('#createUserForm').serialize(),
						success: function(data) {
							$('#createUserModal').modal('hide');
							$('#createUserForm').trigger('reset');
							Swal.fire({
									icon: 'success',
									title: 'User Created',
									text: 'User berhasil dibuat!',
							}).then(function () {
									window.location.href = '<?= base_url('admin/dataUser'); ?>';
							});
						},
						error: function(error) {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: 'User tidak dapat dibuat!',
							});
						}
					});
				});

				// Add an event listener for the edit form submission
				$('#editUserForm').submit(function(e) {
						e.preventDefault();
						var formData = $(this).serialize();
						console.log(formData);

						$.ajax({
								url: '<?= base_url('updateUser'); ?>', // Change the URL to your controller method for updating user data
								method: 'POST',
								data: formData,
								success: function(data) {
										console.log(data);
										$('#editUserModal').modal('hide');
										$('#editUserForm').trigger('reset');
										Swal.fire({
												icon: 'success',
												title: 'User Updated',
												text: 'User berhasil diperbarui!',
										}).then(function () {
												// You may want to reload or update the table data here
												window.location.href = '<?= base_url('admin/dataUser'); ?>';
												// For example: window.location.reload();
										});
								},
								error: function(error) {
										Swal.fire({
												icon: 'error',
												title: 'Error',
												text: 'User tidak dapat diperbarui!',
										});
								}
						});
				});

		});

		</script>

		<script>
				// Define the editUser function to handle the edit action
				function editUser(id) {
						
						$.ajax({
								url: '<?= base_url('/admin/dataUser/'); ?>'+id, // Change the URL to your controller method
								method: 'GET',
								success: function(data) {
										// Parse the JSON response
										var userData = JSON.parse(data);
										console.log(userData[0]);

										// Populate the modal fields with user data
										$('#editUserId').val(userData[0].ID);
										$('#editUsername').val(userData[0].username);
										$('#editFullName').val(userData[0].fullName);
										$('#editTTL').val(userData[0].TTL);
										$('#editNIS').val(userData[0].NIS);
										$('#editBapak').val(userData[0].Bapak);
										$('#editIbu').val(userData[0].Ibu);
										$('#editKelas').val(userData[0].Kelas);
										$('#editRole').val(userData[0].Role);
										// Add similar lines for other input fields

										// Show the editUserModal
										$('#editUserModal').modal('show');
									},
								error: function(error) {
										Swal.fire({
												icon: 'error',
												title: 'Error',
												text: 'User tidak dapat diedit!',
										});
								}
						});
				}

				
		</script>

		
