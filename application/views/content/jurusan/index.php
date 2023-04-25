<div class="content-wrapper">
    <!-- content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master/</span>Jurusan</h4>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5>Jurusan</h5>
                    </div>
                    <div class="col">
                        <div class="float-end">
                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#tambahmodal">Tambah</a>
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
                                <th>Jurusan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($jurusan as $jr): ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $jr['jurusan'] ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#ubahmodal<?= $jr['id'] ?>">Ubah</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusmodal<?= $jr['id'] ?>">Hapus</a>
                                    </td>
                                </tr>
                                <!-- Modal Ubah -->
                                <div class="modal fade" id="ubahmodal<?= $jr['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('Jurusan/ubah') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Ubah Jurusan</h5>
                                                    <!-- <button type="button" class="btn-close" data-bd-dismiss="modal"
                                                        aria-label="Close"></button> -->
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="type" class="form-label">Jurusan</label>
                                                            <input type="hidden" id="id" name="id" class="form-control"
                                                                placeholder="Masukkan ID" value="<?= $jr['id'] ?>" />
                                                            <input type="text" id="jurusan" name="jurusan" class="form-control"
                                                                placeholder="Masukkan Jurusan"
                                                                value="<?= $jr['jurusan'] ?>" />
                                                            <?= form_error('Jurusan', '<small class="text-danger">', '</small>') ?>
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
                                <div class="modal fade" id="hapusmodal<?= $jr['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('content/jurusan/hapus') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Menu</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        data-bs-target="Close"></button> -->
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda Yakin Ingin Menghapus Data <b>
                                                            <?= $jr['jurusan'] ?> ?
                                                        </b> </p>
                                                    <p>Data Yang Dihapus Tidak Dapat dikembalikan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        placeholder="Enter ID" vlaue="<?= $jr['id'] ?>" />
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
                    <form action="<?= base_url('Jurusan/tambah') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tambah Jurusan</h5>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">Jurusan</label>
                                        <input type="text" id="jurusan" name="jurusan" class="form-control"
                                            placeholder="Enter jurusan" />
                                        <?= form_error('jurusan', '<small class="text-danger">', '</small>') ?>
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