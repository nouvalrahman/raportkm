<div class="content-wrapper">
    <!-- content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Guru Mengajar</h4>


        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($this->session->flashdata('message_error')): ?>
            <div class="alert alert-danger alert-dismissible" role="start">
                <?= $this->session->flashdata('message_error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif ?>


        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5>Detail Guru Mengajar </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Gurumengajar/tambah'); ?>" method="POST">
                            <div class="row g-2">
                                <div class="col mt-2 mb-3">
                                    <label for="type" class="form-label">Nama Guru</label>
                                    <?php foreach ($userid as $us): ?>
                                        <input type="hidden" id="userid" name="userid" class="form-control"
                                            value="<?= $this->session->userdata('user') ?>" placeholder="Pilih Guru"
                                            readonly />
                                        <input type="text" id="user" name="user" class="form-control"
                                            value="<?= $us['nama'] ?>" placeholder="Pilih Guru" readonly />
                                        <?= form_error('userid', '<small class="text-danger">', '</small>') ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mt-2 mb-3">
                                    <label for="type" class="form-label">Tahun Pelajaran</label>
                                    <?php foreach ($tapelid as $tp): ?>
                                        <input type="hidden" id="tapelid" name="tapelid" class="form-control"
                                            value="<?= $this->session->userdata('tapel') ?>"
                                            placeholder="Pilih Tahun Pelajaran" readonly />
                                        <input type="text" id="tap" name="tap" class="form-control"
                                            value="<?= $tp['tahunpelajaran'] ?>" placeholder="Pilih Tahun Pelajaran"
                                            readonly />
                                        <?= form_error('tapelid', '<small class="text-danger">', '</small>') ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mt-2 mb-3">
                                    <label for="type" class="form-label">Semester</label>
                                    <?php foreach ($smtid as $smt): ?>
                                        <input type="hidden" id="semesterid" name="semesterid" class="form-control"
                                            value="<?= $this->session->userdata('semester') ?>" placeholder="Pilih Semester"
                                            readonly />
                                        <input type="text" id="smtid" name="smtid" class="form-control"
                                            value="<?= $smt['semester'] ?>" placeholder="Pilih Semester" readonly />
                                        <?= form_error('semesterid', '<small class="text-danger">', '</small>') ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mt-2 mb-3">
                                    <label for="type" class="form-label">Pilih Mapel</label>
                                    <select name="mapelid" id="mapelid" class="form-select">
                                        <?php foreach ($mapel as $m): ?>
                                            <option value="<?= $m['id'] ?>" ?><?= $m['mata_pelajaran'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('mapelid', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mt-2 mb-3">
                                    <label for="type" class="form-label">Pilih Kelas</label>
                                    <select name="kelasid" id="kelasid" class="form-select">
                                        <?php foreach ($kelas as $k): ?>
                                            <option value="<?= $k['id'] ?>" ?><?= $k['kelas'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('kelasid', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="float-end">
                                <a href="<?= $unset ?>" class="btn btn-secondary mt-2">Cancel</a>
                                <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap py-2 px-2">
                            <table class="table table-striped dt-responsive nowrap datatables py-1 px-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Tahun Pelajaran</th>
                                        <th>Semester</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    $no = 1;
                                    ?>
                                    <?php foreach ($gurumengajar as $g): ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?php foreach ($userid as $u): ?>
                                                    <?= $u['nama'] ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td>
                                                <?= $g['mata_pelajaran'] ?>
                                            </td>
                                            <td>
                                                <?= $g['kelas'] ?>
                                            </td>
                                            <td>
                                                <?php foreach ($tapelid as $t): ?>
                                                    <?= $t['tahunpelajaran'] ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td>
                                                <?php foreach ($smtid as $s): ?>
                                                    <?= $s['semester'] ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#ubahmodal<?= $g['id'] ?>">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapusmodal<?= $g['id'] ?>">Hapus</a>
                                            </td>
                                        </tr>


                                        <!-- Modal Ubah -->
                                        <div class="modal fade" id="ubahmodal<?= $g['id'] ?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="<?= base_url('Gurumengajar/ubah') ?>" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <label for="type" class="form-label">Nama
                                                                        Guru</label>
                                                                    <input type="text" id="nama" name="nama"
                                                                        class="form-control" value="<?= $g['userid'] ?>"
                                                                        readonly disabled />
                                                                    <!-- <small class="text-muted">Ex. Guru, Tenaga Kependidikan</small> -->
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <label for="type" class="form-label">Jurusan</label>
                                                                    <select name="jurusanid" id="jurusanid"
                                                                        class="form-select">
                                                                        <?php foreach ($jurusanid as $j): ?>
                                                                            <option value="<?= $j['id'] ?>" <?php if ($j['id'] == $g['jurusanid']) {
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
                                                                value="<?= $g['id'] ?>" placeholder="Enter ID" />
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
                                        <div class="modal fade" id="hapusmodal<?= $g['id'] ?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="<?= base_url('Gurumengajar/hapus') ?>" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1">Hapus Kelas
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin menghapus data <b> <br>
                                                                    <?= $g['nama'] ?>
                                                                    <?= $g['mata_pelajaran'] ?><br>Di kelas
                                                                    <?= $g['kelas'] ?> ?
                                                                </b> </p>

                                                            <p>Data yang dihapus tidak dapat dikembalikan.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" id="id" name="id" class="form-control"
                                                                placeholder="Enter ID" value="<?= $g['kelasid'] ?>" />
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
                </div>
            </div>
        </div>
    </div>
</div>