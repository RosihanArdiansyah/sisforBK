<!-- sidebar -->
<div class="d-flex flex-column flex-shrink-0 sidebar-wrap">
	<a href="/admin" class="text-decoration-none logo-wrap">
		<div class="icon-wrap"><img style="scale: 0.5;" src="<?= base_url('assets/pictures/LOGO SMKN 10 MAKASSAR.png'); ?>" alt="SMKN 10 MAKASSAR Logo">
		</div> <span>E-Konseling</span>
	</a>
	<hr>
	<ul class="nav nav-pills flex-column mb-auto">
		<li class="nav-item">
			<a href="<?=base_url("/admin");?>" class="nav-link">
				<div class="icon-wrap">
					<i class="fas fa-home"></i>
				</div>
				<span> Dashboard</span>
			</a>
		</li>
		<li>
			<a href="<?=base_url("/admin/profile");?>" class="nav-link">
				<div class="icon-wrap">
					<i class="far fa-user"></i>
				</div>
				<span>Profil</span>
			</a>
		</li>
		<li>
			<a href="<?=base_url("/admin/konseling");?>" class="nav-link">
				<div class="icon-wrap">
					<i class="fab fa-first-order"></i>
				</div>
				<span>Konseling</span>
			</a>
		</li>
		<hr>
		<li>
			<a href="<?=base_url("/admin/dataRules");?>" class="nav-link">
				<div class="icon-wrap">
					<i class="fas fa-gavel"></i>
				</div>
				<span>Data Pelanggaran</span>
			</a>
		</li>
		<li>
			<a href="<?=base_url("/admin/dataUser");?>" class="nav-link">
				<div class="icon-wrap">
					<i class="far fa-user"></i>
				</div>
				<span>Data User</span>
			</a>
		</li>
		<li>
			<a href="<?=base_url("/admin/dataGuru");?>" class="nav-link">
				<div class="icon-wrap">
					<i class="far fa-user"></i>
				</div>
				<span>Data Guru</span>
			</a>
		</li>
		<hr>
		<li>
			<a href="<?= site_url('logout') ?>" class="nav-link">
				<div class="icon-wrap">
					<i class="fas fa-sign-out-alt"></i>
				</div>
				<span>Keluar</span>
			</a>
		</li>
	</ul>
	<hr>
</div>

<script>
$(document).ready(function() {
		// Get all the sidebar links
		var $sidebarLinks = $(".sidebar-wrap .nav-link");

		$sidebarLinks.click(function() {
				// Remove the "active" class from all links
				$sidebarLinks.removeClass("active");

				// Add the "active" class to the clicked link
				$(this).addClass("active");
		});
});
</script>
