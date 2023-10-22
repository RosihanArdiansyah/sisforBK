
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
			<button type="button" class="btn btn-success position-absolute top-0 end-0" style="margin: 10px;">Tambah Data Pelanggaran</button>
			<div class="card-body">
				<h4 class="card-title">Data Pelanggaran</h4>
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
		});
		</script>
