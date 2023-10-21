
<div class="container">
	<div class="main-content" style="margin-top:16px;">
					<!-- Your main content for index.php goes here -->
		<h1>Data Konseling</h1>
		<h4>Halaman yang berisikan tabel konseling</h4>
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
