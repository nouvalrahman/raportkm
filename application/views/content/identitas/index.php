<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Access /</span>Identitas Sekolah</h4>


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
                        <h5>Identitas Sekolah</h5>

                    </div>
                    <div class="col">
                        <div class="float-end">
                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#tambah_modal">Tambah</a>
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
                                <th>Tanggal Raport </th>
                                <th>Kepala Sekolah</th>
                                <th>Sekolah</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($identitas as $idn): ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $idn['tglraport'] ?>
                                    </td>
                                    <td>
                                        <?= $idn['kepsek'] ?>
                                    </td>
                                    <td>
                                        <?= $idn['sekolah'] ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#ubah_modal<?= $idn['id'] ?>">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus_modal<?= $idn['id'] ?>">Hapus</a>
                                    </td>
                                </tr>


                                <!-- Modal Ubah -->
                                <div class="modal fade" id="ubah_modal<?= $idn['id'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('Identitas/ubah') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Ubah Identitas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="type" class="form-label">Tanggal Raport</label>
                                                            <input type="date" id="tglraport" name="tglraport" class="form-control"
                                                                value="<?= $idn['tglraport'] ?>"  />
                                                            <!-- <small class="text-muted">Ex. Guru, Tenaga Kependidikan</small> -->
                                                            <?= form_error('tglraport', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="type" class="form-label">Kepala Sekolah</label>
                                                            <input type="text" id="kepsek" name="kepsek" class="form-control"
                                                                value="<?= $idn['kepsek'] ?>" placeholder="Enter Kepala Sekolah" />
                                                            <!-- <small class="text-muted">Ex. master/sekolah</small> -->
                                                            <?= form_error('kepsek', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="type" class="form-label">Sekolah</label>
                                                            <input type="text" id="sekolah" name="sekolah" class="form-control"
                                                                value="<?= $idn['sekolah'] ?>" placeholder="Enter Sekolah" />
                                                            <!-- <small class="text-muted">Ex. master/sekolah</small> -->
                                                            <?= form_error('sekolah', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        value="<?= $idn['id'] ?>" placeholder="Enter ID" />
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
                                <div class="modal fade" id="hapus_modal<?= $idn['id'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('Identitas/hapus') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Identitas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin menghapus data identitas raport <br><b>
                                                            <?= $idn['tglraport'] ?> ?
                                                        </b> </p>

                                                    <p>Data yang dihapus tidak dapat dikembalikan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        placeholder="Enter ID" value="<?= $idn['id'] ?>" />
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
            <div class="modal fade" id="tambah_modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('Identitas/tambah') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tambah Identitas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">Tanggal Raport</label>
                                        <input type="date" id="tglraport" name="tglraport" class="form-control"
                                            placeholder="Enter tglraport" />
                                        <!-- <small class="text-muted">Ex. Guru, Tenaga Kependidikan</small> -->
                                        <?= form_error('tglraport', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">kepsek</label>
                                        <input type="text" id="kepsek" name="kepsek" class="form-control"
                                            placeholder="Enter keppala sekolah" />
                                        <!-- <small class="text-muted">Ex. master/sekolah</small> -->
                                        <?= form_error('kepsek', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">Sekolah</label>
                                        <input type="text" id="sekolah" name="sekolah" class="form-control"
                                            placeholder="Enter sekolah " />
                                        <!-- <small class="text-muted">Ex. master/sekolah</small> -->
                                        <?= form_error('sekolah', '<small class="text-danger">', '</small>') ?>
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