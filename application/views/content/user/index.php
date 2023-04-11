<div class="content-wrapper">
    <!-- content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span>User</h4>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5>USer</h5>
                    </div>
                    <div class="col">
                        <div class="float-end">
                            <a href="<?= base_url('User/tambah')?>" class="btn btn-sm btn-primary" >Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <?= $this->session->flashdata('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($this->session->flashdata('message_error')) : ?>
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
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Role ID</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($user_join as $us): ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $us['username'] ?>
                                    </td>
                                    <td>
                                        <?= $us['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $us['role'] ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#ubahmodal<?= $us['userid'] ?>">Ubah</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusmodal<?= $us['userid'] ?>">Hapus</a>
                                    </td>
                                </tr>
                                <!-- Modal Ubah -->
                                <div class="modal fade" id="ubahmodal<?= $us['userid'] ?>" tabindex="-1" aria-hidden="true">
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
                                                            <label for="type" class="form-label">Nama</label>
                                                            <input type="hidden" id="id" name="id" class="form-control"
                                                                placeholder="Masukkan ID" value="<?= $us['userid'] ?>" />
                                                            <input type="text" id="menu" name="menu" class="form-control"
                                                                placeholder="Masukkan Menu" value="<?= $us['nama'] ?>" />
                                                            <?= form_error('menu', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="type" class="form-label">Password</label>
                                                            <input type="text" id="icon" name="icon" class="form-control"
                                                                placeholder="Masukkan Icon" value="<?= $us['password'] ?>" />
                                                            <small class="text-muted">Password harus terdiri dari 8 huruf
                                                                </small>
                                                            <?= form_error('icon', '<small class="text-danger">', '</small>') ?>
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
                                <div class="modal fade" id="hapusmodal<?= $us['userid'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('User/hapus') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Data User</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        data-bs-target="Close"></button> -->
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda Yakin Ingin Menghapus Data <b>
                                                            <?= $us['username'] ?> ?
                                                        </b> </p>
                                                    <p>Data Yang Dihapus Tidak Dapat dikembalikan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        placeholder="Enter ID" value="<?= $us['userid'] ?>" />
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

            <!-- modal tambah -->
            <div class="modal fade" id="tambahmodal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('User/tambah') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tambah User</h5>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">User</label>
                                        <input type="text" id="menu" name="menu" class="form-control"
                                            placeholder="Enter User" />
                                        <?= form_error('', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">Password</label>
                                        <input type="text" id="icon" name="icon" class="form-control"
                                            placeholder="Enter Icon" />
                                        <small class="text-muted">Password harus terdiri darri 8 huruf</small>
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
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
        </div>
    </div>
</div>