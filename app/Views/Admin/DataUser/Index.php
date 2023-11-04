
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
			<button type="button" class="btn btn-success position-absolute top-0 end-0" style="margin: 10px;">Tambah Data Pengguna</button>
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
				var dataTable = $('#userTable').DataTable({
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
		});

		</script>
