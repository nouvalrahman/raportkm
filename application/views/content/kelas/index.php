<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Access /</span>Kelas</h4>


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

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5>Data Kelas</h5>

                    </div>
                    <div class="col">
                        <div class="float-end">
                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#tambahmodal">Tambah</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive text-nowrap py-2 px-2">
                    <table class="table table-striped dt-responsive nowrap datatables py-1 px-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($kelasjoin as $kj): ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $kj['kelas'] ?>
                                    </td>
                                    <td>
                                        <?= $kj['jurusan'] ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#ubahmodal<?= $kj['kelasid'] ?>">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusmodal<?= $kj['kelasid'] ?>">Hapus</a>
                                    </td>
                                </tr>


                                <!-- Modal Ubah -->
                                <div class="modal fade" id="ubahmodal<?= $kj['kelasid'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('Kelas/ubah') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Ubah Kelas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="type" class="form-label">Kelas</label>
                                                            <input type="text" id="kelas" name="kelas" class="form-control"
                                                                value="<?= $kj['kelas'] ?>" placeholder="Enter title" />
                                                            <!-- <small class="text-muted">Ex. Guru, Tenaga Kependidikan</small> -->
                                                            <?= form_error('kelas', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="type" class="form-label">Jurusan</label>
                                                            <select name="jurusanid" id="jurusanid" class="form-select">
                                                                <?php foreach ($jurusanid as $j): ?>
                                                                    <option value="<?= $j['id'] ?>" <?php if ($j['id'] == $kj['jurusanid']) {
                                                                          echo "selected";
                                                                      } ?>><?= $j['jurusan'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                            <?= form_error('jurusanid', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        value="<?= $kj['kelasid'] ?>" placeholder="Enter ID" />
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-warning">Ubah </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Modal Ubah -->

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusmodal<?= $kj['kelasid'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('Kelas/hapus') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Kelas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin menghapus data <b>
                                                            <?= $kj['kelas'] ?> ?
                                                        </b> </p>

                                                    <p>Data yang dihapus tidak dapat dikembalikan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        placeholder="Enter ID" value="<?= $kj['kelasid'] ?>" />
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">Hapus </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Modal Hapus -->

                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahmodal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('Kelas/tambah') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tambah Kelas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="type" class="form-label">Kelas</label>
                                    <input type="text" id="kelas" name="kelas" class="form-control"
                                        placeholder="Enter title" />
                                    <!-- <small class="text-muted">Ex. Guru, Tenaga Kependidikan</small> -->
                                    <?= form_error('kelas', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">Jurusan</label>
                                        <select name="jurusanid" id="jurusanid" class="form-select">
                                            <?php foreach ($jurusanid as $j): ?>
                                                <option value="<?= $j['id'] ?>" ?><?= $j['jurusan'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?= form_error('jurusanid', '<small class="text-danger">', '</small>') ?>
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
        <!--/ Basic Bootstrap Table -->


    </div>
    <!--/ Responsive Table -->
</div>
<!-- / Content -->