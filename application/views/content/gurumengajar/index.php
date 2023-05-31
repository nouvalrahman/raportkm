<div class="content-wrapper">
    <!-- content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span>Guru Mengajar</h4>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5>Data Guru Mengajar</h5>
                    </div>
                    <div class="col">
                        <div class="float-end">
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#tambah_modal">Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <?= $this->session->flashdata('message') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif ($this->session->flashdata('message_error')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <?= $this->session->flashdata('message_error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="card-body">
                <div class="table-responsive text-nowrap py-2 px-2">
                    <table class="table table-striped dt-responsive nowrap datatables py-1 px-1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Tahun Pelajaran</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($gurumengajar as $gm): ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $gm['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $gm['mata_pelajaran'] ?>
                                    </td>
                                    <td>
                                        <?= $gm['kelas'] ?>
                                    </td>
                                    <td>
                                        <?= $gm['tahunpelajaran'] ?>
                                    </td>
                                    <td>
                                        <?= $gm['semester'] ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#ubah_modal<?= $gm['id'] ?>">Ubah</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus_modal<?= $gm['id'] ?>">Hapus</a>
                                    </td>
                                </tr>
                                <!-- Modal Ubah -->
                                <div class="modal fade" id="ubah_modal<?= $gm['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('User/ubah') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Ubah User</h5>
                                                    <!-- <button type="button" class="btn-close" data-bd-dismiss="modal"
                                                        aria-label="Close"></button> -->
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="type" class="form-label">Kode Guru</label>
                                                            <input type="hidden" id="id" name="id" class="form-control"
                                                                placeholder="Masukkan ID" value="<?= $gm['id'] ?>" />
                                                            <input type="text" id="username" name="username"
                                                                class="form-control" placeholder="Masukkan nama"
                                                                value="<?= $gm['username'] ?>" />
                                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="type" class="form-label">Nama</label>
                                                            <input type="hidden" id="id" name="id" class="form-control"
                                                                placeholder="Masukkan ID" value="<?= $gm['id'] ?>" />
                                                            <input type="text" id="nama" name="nama" class="form-control"
                                                                placeholder="Masukkan nama" value="<?= $gm['nama'] ?>" />
                                                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="type" class="form-label">Password</label>
                                                            <input type="text" id="password" name="password"
                                                                class="form-control" placeholder="Masukkan password"
                                                                value="<?= $gm['password'] ?>" />
                                                            <small class="text-muted">Password harus terdiri dari 3 huruf
                                                            </small>
                                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="type" class="form-label">Role</label>
                                                            <select name="role_id" id="role_id"
                                                                class="form-control select2">
                                                                <option value="1">Administrator</option>
                                                                <option value="2">Guru</option>
                                                            </select>
                                                            <?= form_error('role_id', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning">Ubah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End modal ubah -->

                                <!-- modal hapus -->
                                <div class="modal fade" id="hapus_modal<?= $gm['id'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('User/hapus') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Data User</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        data-bs-target="Close"></button> -->
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda Yakin Ingin Menghapus Data <br><b>
                                                            <?= $gm['nama'] ?> ?
                                                        </b> </p>
                                                    <p>Data Yang Dihapus Tidak Dapat dikembalikan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        placeholder="Enter ID" value="<?= $gm['id'] ?>" />
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal"> Close</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end modal hapus -->
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="tambah_modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('Gurumengajar/tambah') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exatpleModalLabel1">Tambah Guru Mengajar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">Judul Tapel</label>
                                        <input type="text" id="tahunpelajaran" name="tahunpelajaran"
                                            class="form-control" placeholder="Enter Tahun Pelajaran" />
                                        <small class="text-muted">Ex. Guru, Tenaga Kependidikan</small> 
                                        <?= form_error('tahunpelajaran', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">Pilih Guru</label>
                                        <select name="userid" id="userid" class="form-select">
                                            <?php foreach ($guru as $g): ?>
                                                <option value="<?= $g['id'] ?>" ?><?= $g['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <!-- <small class="text-muted">Ex. master/sekolah</small> -->
                                        <?= form_error('userid', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                                <!--                                 
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="desc" class="form-label">Deskripsi</label>
                                        <input type="text" id="desc" name="desc" class="form-control" placeholder="Enter Deskripsi" />
                                    </div>
                                </div> -->

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal Tambah -->

        </div>
    </div>
</div>