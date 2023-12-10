<div class="container">

	<div class="card text-dark bg-warning main-content" style="margin-top:16px;">
					<!-- Your main content for index.php goes here -->
		<div class="card-body">	
			<h1>Profil</h1>
			<h4>halaman yang berisikan profil pengguna</h4>
		</div>
	</div>

	<style>
	  .profile {
	    margin-top: 16px;
	  }

	  .profile-item {
	    margin-bottom: 8px;
	    font-size: 18px;
	  }
	</style>

	<div class="card sub-content" style="margin-top:16px; max-height: 70%; overflow-y: auto">
		<div class="card-body">
			<h4 class="card-title">Profil</h4>
				<?php foreach ($users as $user): ?>
					<div class="profile">
							<div class="profile-item">
									<label style="width: 120px"><strong>Username:</strong></label>
									<span style="margin-left: 8px; display: inline-block;"><?php echo $user['username']; ?></span>
							</div>
							<div class="profile-item">
									<label style="width: 120px"><strong>Full Name:</strong></label>
									<span style="margin-left: 8px; display: inline-block;"><?php echo $user['fullName']; ?></span>
							</div>
							<div class="profile-item">
								<label style="width: 120px"><strong>Kelas:</strong></label>
								<?php if ($user['Kelas'] !== null && $user['Kelas'] !== "0"): ?>
									<span style="margin-left: 8px; display: inline-block;"><?php echo $user['kls']; ?></span>
								<?php endif; ?>
							</div>
							<div class="profile-item">
								<label style="width: 120px"><strong>NIS/NIP:</strong></label>
								<?php if ($user['NIS'] !== null && $user['NIS'] !== "0"): ?>
									<span style="margin-left: 8px; display: inline-block;"><?php echo $user['NIS']; ?></span>
								<?php endif; ?>
							</div>
							<div class="profile-item">
								<label style="width: 120px"><strong>Role:</strong></label>
								<span style="margin-left: 8px; display: inline-block;">
									<?php 
										if ($user['Role'] == 1) {
												echo "Guru";
										} else {
												echo "Siswa";
										}
									?>
								</span>
							</div>
					</div>
					<!-- Button in the top right corner -->
					<button type="button" class="btn btn-primary position-absolute top-0 end-0" style="margin: 10px;" onClick="editUser(<?= $user['ID']; ?>)">Ubah Profil</button>
				<?php endforeach; ?>
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
							<label for="editPassword">Password</label>
							<input placeholder="Opsional, jika ingin mengganti password" type="password" class="form-control" id="editPassword" name="editPassword">
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
							<?php if ($user['Role'] != 1): ?>
							<select class="form-control" id="editKelas" name="editKelas" required>
								<option value="null">--Pilih Kelas--</option>
								<?php foreach ($kelas as $kls): ?>
									<option value="<?= $kls['ID']; ?>"><?= $kls['kelas']; ?></option>
								<?php endforeach; ?>
							</select>
							<?php else: ?>
							<select class="form-control" id="editKelas" name="editKelas">
								<option value="null">--Pilih Kelas--</option>
								<?php foreach ($kelas as $kls): ?>
									<option value="<?= $kls['ID']; ?>"><?= $kls['kelas']; ?></option>
								<?php endforeach; ?>
							</select>
							<?php endif; ?>
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
									window.location.href = '<?= base_url('user/profile'); ?>';
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
