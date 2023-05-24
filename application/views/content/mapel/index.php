<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Access /</span>Sub Menu</h4>


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
                        <h5>Sub Menu</h5>

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
                                <th>Menu</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($submenu_join as $sbmj): ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $sbmj['menu'] ?>
                                    </td>
                                    <td>
                                        <?= $sbmj['title'] ?>
                                    </td>
                                    <td>
                                        <?= $sbmj['url'] ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#ubah_modal<?= $sbmj['submenuid'] ?>">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus_modal<?= $sbmj['submenuid'] ?>">Hapus</a>
                                    </td>
                                </tr>


                                <!-- Modal Ubah -->
                                <div class="modal fade" id="ubah_modal<?= $sbmj['submenuid'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('submenu/ubah') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Ubah Sub Menu</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="type" class="form-label">Menu</label>
                                                            <select name="menu_id" id="menu_id" class="form-select">
                                                                <?php foreach ($menu as $m): ?>
                                                                    <option value="<?= $m['id'] ?>" <?php if ($m['id'] == $sbmj['menu_id']) {
                                                                          echo "selected";
                                                                      } ?>><?= $m['menu'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>

                                                            <?= form_error('menu_id', '<small class="text-danger">', '</small>') ?>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="type" class="form-label">Judul Sub Menu</label>
                                                            <input type="text" id="title" name="title" class="form-control"
                                                                value="<?= $sbmj['title'] ?>" placeholder="Enter title" />
                                                            <small class="text-muted">Ex. Guru, Tenaga Kependidikan</small>
                                                            <?= form_error('title', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="type" class="form-label">URL Sub Menu</label>
                                                            <input type="text" id="url" name="url" class="form-control"
                                                                value="<?= $sbmj['url'] ?>" placeholder="Enter URL" />
                                                            <small class="text-muted">Ex. master/sekolah</small>
                                                            <?= form_error('url', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        value="<?= $sbmj['submenuid'] ?>" placeholder="Enter ID" />
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
                                <div class="modal fade" id="hapus_modal<?= $sbmj['submenuid'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('submenu/hapus') ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Sub Menu</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin menghapus data <b>
                                                            <?= $sbmj['menu'] . " dengan sub menu " . $sbmj['title'] ?> ?
                                                        </b> </p>

                                                    <p>Data yang dihapus tidak dapat dikembalikan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        placeholder="Enter ID" value="<?= $sbmj['submenuid'] ?>" />
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
                    <form action="<?= base_url('submenu/tambah') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tambah Sub Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">Menu</label>
                                        <select name="menu_id" id="menu_id" class="form-select">
                                            <?php foreach ($menu as $m): ?>
                                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                            <?php endforeach ?>
                                        </select>

                                        <?= form_error('menu_id', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">Judul Sub Menu</label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter title" />
                                        <small class="text-muted">Ex. Guru, Tenaga Kependidikan</small>
                                        <?= form_error('title', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="type" class="form-label">URL Sub Menu</label>
                                        <input type="text" id="url" name="url" class="form-control"
                                            placeholder="Enter URL" />
                                        <small class="text-muted">Ex. master/sekolah</small>
                                        <?= form_error('url', '<small class="text-danger">', '</small>') ?>
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