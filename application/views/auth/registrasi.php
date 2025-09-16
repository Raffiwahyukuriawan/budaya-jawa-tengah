    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
        <link rel="shortcut icon" type="image/png" href="<?= base_url('flexy-bootstrap-lite/') ?>assets/images/logos/favicon.png" />
        <link rel="stylesheet" href="<?= base_url('flexy-bootstrap-lite/') ?>assets/css/styles.min.css" />
    </head>

    <body>
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <div
                class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="row justify-content-center w-100">
                        <div class="col-md-8 col-lg-6 col-xxl-3">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                        <img src="<?= base_url('flexy-bootstrap-lite/') ?>assets/images/logos/logo.svg" alt="">
                                    </a>
                                    <p class="text-center">Your Social Campaigns</p>
                                    <form action="<?= site_url('auth/registrasi') ?>" method="post">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="username" id="username" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-control" name="role" id="role" required>
                                                <option value="">-- Pilih Role --</option>
                                                <option value="admin">Admin</option>
                                                <option value="guru">Guru</option>
                                                <option value="siswa">Siswa</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>

                                        <div class="d-flex align-items-center justify-content-center">
                                            <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                            <a class="text-primary fw-bold ms-2" href="<?= site_url('auth/login') ?>">Sign In</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <!-- solar icons -->
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    </body>

    </html>