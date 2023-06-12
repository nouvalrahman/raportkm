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
                <div class="row-4">
                    <div class="col">
                        <h5>Pilih Guru Mengajar </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Gurumengajar/index'); ?>" method="GET">
                            <div class="row g-2">
                                <div class="col mt-5 mb-3">
                                    <label for="type" class="form-label">Pilih Guru</label>
                                    <select name="userid" id="userid" class="form-select">
                                        <?php foreach ($guru as $g): ?>
                                            <option value="<?= $g['id'] ?>" ?><?= $g['nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('userid', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="nama" class="form-label">Tahun Pelajaran</label>
                                    <select name="tapelid" id="tapelid" class="form-select">
                                        <?php foreach ($tapel as $t): ?>
                                            <option value="<?= $t['id'] ?>" ?><?= $t['tahunpelajaran'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('tapelid', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="type" class="form-label">Semester</label>
                                    <select name="semesterid" id="semesterid" class="form-select">
                                        <?php foreach ($semester as $s): ?>
                                            <option value="<?= $s['id'] ?>" ?><?= $s['semester'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('semesterid', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="float-end">
                                <!-- <a href="<?= $unset ?>" class="btn btn-secondary mt-2">Cancel</a> -->
                                <button type="submit" class="btn btn-primary mt-2">Selanjutnya</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Gurumengajar/tambah'); ?>" method="POST">
                            <div class="row g-2">
                                <div class="col mt-2 mb-3">
                                    <label for="type" class="form-label">Nama Guru</label>
                                    <?php foreach ($userid as $gm): ?>
                                        <input type="hidden" id="userid" name="userid" class="form-control"
                                            value="<?= $gm['id'] ?>" placeholder="Pilih Guru"
                                            readonly />
                                        <input type="text" id="user" name="user" class="form-control"
                                            value="<?= $gm['nama'] ?>" placeholder="Pilih Guru" readonly />
                                        <?= form_error('userid', '<small class="text-danger">', '</small>') ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mt-2 mb-3">
                                    <label for="type" class="form-label">Tahun Pelajaran</label>
                                    <?php foreach ($tapelid as $tp): ?>
                                        <input type="hidden" id="tapelid" name="tapelid" class="form-control"
                                            value="<?= $tp['id'] ?>"
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
                                <!-- <a href="<?= $unset ?>" class="btn btn-secondary mt-2">Cancel</a> -->
                                <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>