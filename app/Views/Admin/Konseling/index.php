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
						<th>User</th>
						<th>Permasalahan</th>
						<th>Waktu</th>
						<th>Pelanggaran</th>
					</tr>
				</thead>
					<tbody>
						<?php foreach ($konselingData as $konseling): ?>
							<tr>
								<td><?= $konseling['ID']; ?></td>
								<td><?= $konseling['userName']; ?></td>
								<td><?= $konseling['permasalahan']; ?></td>
								<td><?= strftime('%A, %d %B %Y', strtotime($konseling['jadwal'])); ?></td>
								<td><?= $konseling['namaPelanggaran']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
			</table>
		</div>
	</div>

	<!-- modal -->
	<!-- post konseling report -->
	<div class="modal fade" id="editKonselingModal" tabindex="-1" role="dialog" aria-labelledby="addReportModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
					<div class="modal-content">
							<div class="modal-header">
									<h5 class="modal-title" id="addReportModalLabel">Buat Laporan Konseling</h5>
									<button type="button" class="btn btn-secondary btn-danger" id="reportAddCloseBtn" style="float: right">Close</button>
							</div>
							<form id="addReportJadwalForm">
								<div class="modal-body">
										<div class="form-group">
												<input type="hidden" class="form-control" id="addReportJadwalId" name="addReportJadwalId">
												<input type="hidden" class="form-control" id="addReportId" name="addReportId">
												<label for="addReportUserID">Nama Siswa</label>
												<select class="form-control" id="addReportUserID" name="addReportUserID" required>
														<?php foreach ($users as $user): ?>
																<option value="<?= $user['ID']; ?>" disabled><?= $user['fullName']; ?>- <?= $user['kls']; ?></option>
														<?php endforeach; ?>
												</select>
										</div>
										<div class="form-group">
											<label for="addReportPermasalahan">Permasalahan</label>
											<textarea readonly class="form-control" id="addReportPermasalahan" name="addReportPermasalahan"></textarea>          
										</div>
										<div class="form-group">
											<label for="addReportJadwal">Tanggal:</label>
											<input readonly class="form-control" id="addReportJadwal" type="date" name="editJadwal" required>            
										</div>
										<div class="form-group">
											<label for="addReportWaktu">Waktu:</label>
											<input readonly class="form-control" id="addReportWaktu" type="time" name="addReportWaktu" required>           
										</div>
										<div class="form-group">
											<label for="addReportPelanggaran">Pelanggaran</label>
											<select class="form-control" id="addReportPelanggaran" name="addReportPelanggaran" required>
													<option value="">Pilih Pelanggaran</option>
													<?php foreach ($pelanggaran as $rules): ?>
															<option value="<?= $rules['ID']; ?>"><?= $rules['namaPelanggaran']; ?>- <?= $rules['poin']; ?></option>
													<?php endforeach; ?>
											</select>          
										</div>
										<div class="form-group">
											<label for="addReportSanksi">Sanksi</label>
											<textarea required class="form-control" id="addReportSanksi" name="addReportSanksi"></textarea>          
										</div>
										<div class="form-group">
											<label for="addReportTindakan">Tindakan</label>
											<textarea required class="form-control" id="addReportTindakan" name="addReportTindakan"></textarea>          
										</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary" id="addReportButton">Buat Laporan Konseling</button>
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
