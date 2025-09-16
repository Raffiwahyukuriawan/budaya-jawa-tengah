<div class="py-6 px-6 text-center">
	<p class="mb-0 fs-4">Design and Developed by <a href="#"
			class="pe-1 text-primary text-decoration-underline">Wrappixel.com</a> Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
</div>
</div>
</div>
</div>
</div>

<!-- Load SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	<?php if ($this->session->flashdata('success')): ?>
		Swal.fire({
			title: "Berhasil!",
			text: "<?= $this->session->flashdata('success'); ?>",
			icon: "success"
		});
	<?php elseif ($this->session->flashdata('error')): ?>
		Swal.fire({
			title: "Gagal!",
			text: "<?= $this->session->flashdata('error'); ?>",
			icon: "error"
		});
	<?php endif; ?>
</script>



<script src="<?= base_url('flexy-bootstrap-lite/') ?>assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('flexy-bootstrap-lite/') ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('flexy-bootstrap-lite/') ?>assets/js/sidebarmenu.js"></script>
<script src="<?= base_url('flexy-bootstrap-lite/') ?>assets/js/app.min.js"></script>
<script src="<?= base_url('flexy-bootstrap-lite/') ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="<?= base_url('flexy-bootstrap-lite/') ?>assets/libs/simplebar/dist/simplebar.js"></script>
<script src="<?= base_url('flexy-bootstrap-lite/') ?>assets/js/dashboard.js"></script>
<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>