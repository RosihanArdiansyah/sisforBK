
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
		<button type="button" class="btn btn-success position-absolute top-0 end-0" style="margin: 10px;">Buat Jadwal Konseling</button>
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
						</tr>
					</thead>
					<tbody>
					<?php foreach ($jadwal as $jwd): ?>
							<tr>
									<td><?= $jwd['ID']; ?></td>
									<td><?= $jwd['jadwal']; ?></td>
									<td><?= $jwd['waktu']; ?></td>
									<td><?= $jwd['user_fullName']; ?></td>
									<td><?= $jwd['status']; ?></td>
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
	});
	</script>
