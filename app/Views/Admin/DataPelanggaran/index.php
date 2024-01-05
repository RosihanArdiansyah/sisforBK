
<div class="container">
	
		<div class="card text-dark bg-warning main-content" style="margin-top:16px;">
					<!-- Your main content for index.php goes here -->
			<div class="card-body">	
				<h1>Data Pelanggaran</h1>
				<h4>Halaman yang berisikan data pelanggaran</h4>
			</div>
		</div>

		<div class="card sub-content" style="margin-top:16px; max-height: 70%; overflow-y: auto">
		<!-- Button in the top right corner -->
			<button type="button" class="btn btn-success position-absolute top-0 end-0" id="ruleCreateBtn" style="margin: 10px;">Tambah Data Pelanggaran</button>
			<div class="card-body">
				<h4 class="card-title">Data Pelanggaran</h4>
				<table id="ruleTable" class="table table-striped table-bordered dataTable" style="padding: 10px;">
					<thead class="table-dark">
						<tr>
							<th>NO</th>
							<th>Jenis Pelanggaran</th>
							<th>Poin</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($rules as $index => $rule): ?>
							<tr>
									<td><?= $index+1; ?></td>
									<td  style="width: 70%;"><?= $rule['namaPelanggaran']; ?></td>
									<td><?= $rule['poin']; ?></td>
									<td>
										<button type="button" class="btn btn-primary" onClick="editRule(<?= $rule['ID']; ?>)"><i class="far fa-edit"></i></button>
										<button type="button" class="btn btn-danger" onClick="deleteRule(<?= $rule['ID']; ?>)"><i class="far fa-trash-alt"></i></button>
									</td>
									<!-- Add more table cells for other user properties -->
							</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- modal create rule-->
		<div class="modal fade" id="createRuleModal" tabindex="-1" role="dialog" aria-labelledby="createRuleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="createRuleModalLabel">Buat Pelanggaran</h5>
						<button type="button" class="btn btn-secondary btn-danger" id="ruleCloseBtn" style="float: right">Close</button>
					</div>
					<form id="createRuleForm">
						<div class="modal-body">
								<div class="form-group">
										<label for="namaPelanggaran">Nama Pelanggaran</label>
										<input type="text" class="form-control" id="namaPelanggaran" name="namaPelanggaran" required>
								</div>
								<!-- <div class="form-group">
										<label for="poin">Poin</label>
										<select class="form-control" id="poin" name="poin" required>
												<option value="">-- Pilih Poin --</option>
												<?php for ($i = 1; $i <= 100; $i++) { ?>
														<?php if ($i <= 10) { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?> - Ringan</option>
														<?php } else if ($i < 50) { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?> - Sedang</option>
														<?php } else { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?> - Berat</option>
														<?php } ?>
												<?php } ?>
										</select>
								</div> -->
								<div class="form-group">
										<label for="poin">Poin</label>
										<input type="number" class="form-control" id="poin" name="poin" required>
								</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" id="createRuleButton">Create Rule</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- modal edit rule -->
		<div class="modal fade" id="editRuleModal" tabindex="-1" role="dialog" aria-labelledby="editRuleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editRuleModalLabel">Edit Pelanggaran</h5>
						<button type="button" class="btn btn-secondary btn-danger" id="ruleEditCloseBtn" style="float: right">Close</button>
					</div>
					<form id="editRuleForm">
						<div class="modal-body">
								<div class="form-group">
										<input type="hidden" class="form-control" id="editRuleID" name="editRuleID" readonly>
										<label for="editNamaPelanggaran">Nama Pelanggaran</label>
										<input type="text" class="form-control" id="editNamaPelanggaran" name="editNamaPelanggaran" required>
								</div>
								<!-- <div class="form-group">
										<label for="editPoin">Poin</label>
										<select class="form-control" id="editPoin" name="editPoin" required>
												<option value="">-- Pilih Poin --</option>
												<?php for ($i = 1; $i <= 100; $i++) { ?>
														<?php if ($i <= 10) { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?> - Ringan</option>
														<?php } else if ($i < 50) { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?> - Sedang</option>
														<?php } else { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?> - Berat</option>
														<?php } ?>
												<?php } ?>
										</select>
								</div> -->
								<div class="form-group">
										<label for="editPoin">Poin</label>
										<input type="number" class="form-control" id="editPoin" name="editPoin" required>
								</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" id="editRuleButton">Edit Rule</button>
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
				var dataTable = $('#ruleTable').DataTable({
					pageLength: 5,
					lengthMenu: [5, 10, 25, 30],
					// Add a search filter
					search: {
						smart: true,
						columns: ['ID', 'namaPelaggaran', 'poin']
					},
				});

				// Handle the search event
				$('#ruleTable_filter input').on('keyup', function() {
					dataTable.search(this.value).draw();
				});

				// open form create rule
				$('#ruleCreateBtn').click(function() {
					$('#createRuleModal').modal('show');
				});

				// submit create rule
				$('#createRuleForm').submit(function(e) {
					e.preventDefault();

					$.ajax({
						url: '<?= base_url('createRule'); ?>',
						method: 'POST',
						data: $('#createRuleForm').serialize(),
						success: function(data) {
							$('#createRuleModal').modal('hide');
							$('#createRuleForm').trigger('reset');
							Swal.fire({
									icon: 'success',
									title: 'Rule Created',
									text: 'Aturan berhasil dibuat!',
							}).then(function () {
									window.location.href = '<?= base_url('admin/dataRules'); ?>';
							});
						},
						error: function(error) {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: 'Aturan tidak dapat dibuat!',
							});
						}
					});
				});

				// submit edit rule
				$('#editRuleForm').submit(function(e) {
					e.preventDefault();
					var formData = $(this).serialize();
					console.log(formData);

					$.ajax({
							url: '<?= base_url('updateRule'); ?>', // Change the URL to your controller method for updating user data
							method: 'POST',
							data: formData,
							success: function(data) {
									console.log(data);
									$('#editRuleModal').modal('hide');
									$('#editRuleForm').trigger('reset');
									Swal.fire({
											icon: 'success',
											title: 'Rule Updated',
											text: 'Aturan berhasil diperbarui!',
									}).then(function () {
											// You may want to reload or update the table data here
											window.location.href = '<?= base_url('admin/dataRules'); ?>';
											// For example: window.location.reload();
									});
							},
							error: function(error) {
									Swal.fire({
											icon: 'error',
											title: 'Error',
											text: 'Aturan tidak dapat diperbarui!',
									});
							}
					});
				});
		});
		</script>

		<!-- fungsi untuk edit rule -->
		<script>
				// Define the editUser function to handle the edit action
				function editRule(id) {
						$.ajax({
								url: '<?= base_url('showRule'); ?>'+id, // Change the URL to your controller method
								method: 'GET',
								success: function(data) {
										// Parse the JSON response
										var ruleData = JSON.parse(data);
										console.log(ruleData[0].ID);

										// Populate the modal fields with user data
										$('#editRuleID').val(ruleData[0].ID);
										$('#editNamaPelanggaran').val(ruleData[0].namaPelanggaran);
										$('#editPoin').val(ruleData[0].poin);
										
										// Add similar lines for other input fields

										// Show the editUserModal
										$('#editRuleModal').modal('show');
									},
								error: function(error) {
										Swal.fire({
												icon: 'error',
												title: 'Error',
												text: 'Aturan tidak dapat diedit!',
										});
								}
						});
						
				}
		</script>

<script>
				// Define the deleteUser function to handle the delete action
				function deleteRule(id) {
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
												url:  '<?= base_url('deleteRule/'); ?>' + id, // Refactored endpoint
												success: function(data) {
														Swal.fire({
																icon: 'success',
																title: 'Rule Deleted',
																text: 'Aturan berhasil dihapus!', // Changed message to reflect user deletion
														}).then(function () {
																location.reload();
														});
												},
												error: function(error) {
														Swal.fire({
																icon: 'error',
																title: 'Error',
																text: 'Aturan tidak dapat dihapus!', // Changed message to reflect user deletion error
														});
												}
										});
								} else {
										Swal.fire({
												icon: 'error',
												title: 'Batal',
												text: 'Batal menghapus aturan', // Changed message to canceled user deletion
										});
								}
						});
				}
		</script>