<div class="col-md-12">
    <div class="card-body card">
        <div class="header mb-3">
            <!-- Button trigger modal tambah Quiz -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQuizModal">
                <i class="fa-solid fa-plus"></i> Tambah Quiz
            </button>
        </div>

        <!-- Modal Tambah Quiz -->
        <div class="modal fade" id="addQuizModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="<?= site_url('quiz/add') ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Quiz</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Judul Quiz</label>
                                <input type="text" class="form-control" name="judul" required>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Kode Akses</label>
                                <input type="text" class="form-control" name="kode_akses" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Quiz -->
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Kode Akses</th>
                        <th>Dibuat Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($quiz as $q): ?>
                        <tr>
                            <td><?= $q->id ?></td>
                            <td><?= $q->judul ?></td>
                            <td><?= $q->deskripsi ?></td>
                            <td><?= $q->kode_akses ?></td>
                            <td><?= $q->dibuat_oleh ?></td>
                            <td>
                                <!-- Tombol Pertanyaan -->
                                <a href="<?= site_url('quiz/questions/' . $q->id) ?>" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-question"></i> Soal
                                </a>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editQuizModal<?= $q->id ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <!-- Tombol Hapus -->
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $q->id ?>)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit Quiz -->
                        <div class="modal fade" id="editQuizModal<?= $q->id ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="post" action="<?= site_url('quiz/edit/' . $q->id) ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Quiz</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Judul Quiz</label>
                                                <input type="text" class="form-control" name="judul" value="<?= $q->judul ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi" rows="3"><?= $q->deskripsi ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Kode Akses</label>
                                                <input type="text" class="form-control" name="kode_akses" value="<?= $q->kode_akses ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(quizId) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Quiz ini akan dihapus beserta semua soalnya!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke controller delete quiz
                window.location.href = "<?= site_url('quiz/delete/') ?>" + quizId;
            }
        });
    }
</script>
