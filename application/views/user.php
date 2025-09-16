<div class="col-md-12">
    <div class="card-body card">
        <div class="header">
            <!-- Button trigger modal tambah -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fa-solid fa-plus"></i> Tambah User
            </button>
        </div>

        <!-- Modal Tambah User -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="<?= site_url('users/create') ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="guru">Guru</option>
                                    <option value="siswa">Siswa</option>
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

        <!-- Table User -->
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td><?= $u->id ?></td>
                            <td><?= $u->username ?></td>
                            <td><?= $u->email ?></td>
                            <td><?= ucfirst($u->role) ?></td>
                            <td><?= $u->created_at ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal<?= $u->id ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <!-- Tombol Hapus -->
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $u->id ?>)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit User -->
                        <div class="modal fade" id="editUserModal<?= $u->id ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="post" action="<?= site_url('users/edit/' . $u->id) ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" value="<?= $u->username ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="<?= $u->email ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak diganti">
                                            </div>
                                            <div class="mb-3">
                                                <label>Role</label>
                                                <select name="role" class="form-control" required>
                                                    <option value="admin" <?= $u->role == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                    <option value="guru" <?= $u->role == 'guru' ? 'selected' : '' ?>>Guru</option>
                                                    <option value="siswa" <?= $u->role == 'siswa' ? 'selected' : '' ?>>Siswa</option>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "User ini akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= site_url('users/delete/') ?>" + userId;
            }
        });
    }
</script>