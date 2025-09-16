<div class="col-md-12">
    <div class="card-body card">
        <div class="header mb-3">
            <!-- Button trigger modal tambah Soal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
                <i class="fa-solid fa-plus"></i> Tambah Soal
            </button>
        </div>

        <!-- Modal Tambah Soal -->
        <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="<?= site_url('quiz/add_question/' . $quiz->id) ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Soal untuk Quiz: <?= $quiz->judul ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Pertanyaan</label>
                                <textarea class="form-control" name="pertanyaan" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Pilihan A</label>
                                <input type="text" class="form-control" name="pilihan_a" required>
                            </div>
                            <div class="mb-3">
                                <label>Pilihan B</label>
                                <input type="text" class="form-control" name="pilihan_b" required>
                            </div>
                            <div class="mb-3">
                                <label>Pilihan C</label>
                                <input type="text" class="form-control" name="pilihan_c" required>
                            </div>
                            <div class="mb-3">
                                <label>Pilihan D</label>
                                <input type="text" class="form-control" name="pilihan_d" required>
                            </div>
                            <div class="mb-3">
                                <label>Jawaban Benar</label>
                                <select name="jawaban_benar" class="form-control" required>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
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

        <!-- Table Questions -->
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pertanyaan</th>
                        <th>Pilihan A</th>
                        <th>Pilihan B</th>
                        <th>Pilihan C</th>
                        <th>Pilihan D</th>
                        <th>Jawaban Benar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($questions as $q): ?>
                        <tr>
                            <td><?= $q->id ?></td>
                            <td><?= $q->pertanyaan ?></td>
                            <td><?= $q->pilihan_a ?></td>
                            <td><?= $q->pilihan_b ?></td>
                            <td><?= $q->pilihan_c ?></td>
                            <td><?= $q->pilihan_d ?></td>
                            <td><b><?= $q->jawaban_benar ?></b></td>
                            <td>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editQuestionModal<?= $q->id ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <!-- Tombol Hapus -->
                                <a href="<?= site_url('quiz/delete_question/' . $q->id . '/' . $quiz->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus soal ini?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Edit Question -->
                        <div class="modal fade" id="editQuestionModal<?= $q->id ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="post" action="<?= site_url('quiz/edit_question/' . $q->id) ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Soal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="quiz_id" value="<?= $quiz->id ?>">
                                            <div class="mb-3">
                                                <label>Pertanyaan</label>
                                                <textarea class="form-control" name="pertanyaan" rows="3" required><?= $q->pertanyaan ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Pilihan A</label>
                                                <input type="text" class="form-control" name="pilihan_a" value="<?= $q->pilihan_a ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Pilihan B</label>
                                                <input type="text" class="form-control" name="pilihan_b" value="<?= $q->pilihan_b ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Pilihan C</label>
                                                <input type="text" class="form-control" name="pilihan_c" value="<?= $q->pilihan_c ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Pilihan D</label>
                                                <input type="text" class="form-control" name="pilihan_d" value="<?= $q->pilihan_d ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Jawaban Benar</label>
                                                <select name="jawaban_benar" class="form-control" required>
                                                    <option value="A" <?= $q->jawaban_benar == 'A' ? 'selected' : '' ?>>A</option>
                                                    <option value="B" <?= $q->jawaban_benar == 'B' ? 'selected' : '' ?>>B</option>
                                                    <option value="C" <?= $q->jawaban_benar == 'C' ? 'selected' : '' ?>>C</option>
                                                    <option value="D" <?= $q->jawaban_benar == 'D' ? 'selected' : '' ?>>D</option>
                                                </select>
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
