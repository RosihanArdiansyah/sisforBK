<div class="container">
	
	<div class="card text-dark bg-warning main-content" style="margin-top:16px;">
					<!-- Your main content for index.php goes here -->
		<div class="card-body">	
			<h2>Data Konseling</h>
			<h4>Halaman yang berisikan tabel konseling</h4>
		</div>
	</div>

	<div class="card sub-content" style="margin-top:16px; max-height: 70%; overflow-y: auto">
		<!-- Button in the top right corner -->
		<!-- <button type="button" class="btn btn-success position-absolute top-0 end-0" style="margin: 10px;">Tambah Data Konseling</button> -->
		<div class="card-body">
			<h4 class="card-title">Hasil Konseling</h4>
			<table id="konselingTable" class="table table-striped table-bordered dataTable" style="padding: 10px;">
				<thead class="table-dark">
					<tr>
						<th>ID</th>
						<th>Guru BK</th>
						<th>Permasalahan</th>
						<th>Waktu</th>
						<th>Pelanggaran</th>
						<th>Action</th>
					</tr>
				</thead>
					<tbody>
						<?php foreach ($konselingData as $index => $konseling): ?>
							<tr>
								<td><?= $index+1; ?></td>
								<td><?= $konseling['userName']; ?></td>
								<td><?= $konseling['permasalahan']; ?></td>
								<td><?= strftime('%A, %d %B %Y', strtotime($konseling['jadwal'])); ?></td>
								<td><?= $konseling['namaPelanggaran']; ?></td>
								<td>
										<button type="button" class="btn btn-primary" data-toggle="tooltip" title="ubah laporan konseling" onClick="buatLaporan(<?= $konseling['ID']; ?>)"><i class="far fa-edit"></i></button>
								</td>
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
		var dataTable = $('#konselingTable').DataTable({
			// Add a search filter
			search: {
				smart: true,
				columns: ['ID', 'username','permasalahan','waktu','namaPelanggaran']
			},
		});

		// Handle the search event
		$('#konselingTable_filter input').on('keyup', function() {
			dataTable.search(this.value).draw();
		});

		
	});
	</script>

	