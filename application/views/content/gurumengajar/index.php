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
                                <a href="<?= base_url('Gurumengajar/index') ?>"
                                    class="btn btn-secondary mt-2">Cancel</a>
                                <button type="submit" class="btn btn-primary mt-2">Selanjutnya</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Gurumengajar/tambah'); ?>" method="POST">
                            <div class="row g-2">
                                <div class="col mt-5 mb-3">
                                    <label for="type" class="form-label">Nama Guru</label>
                                    <input type="text" id="userid" name="userid" class="form-control"
                                        value="<?= $this->input->get('userid') ?>" placeholder="Pilih Guru" readonly />
                                    <?= form_error('userid', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mt-5 mb-3">
                                    <label for="type" class="form-label">Tahun Pelajaran</label>
                                    <input type="text" id="tapelid" name="tapelid" class="form-control"
                                        value="<?= $this->input->get('tapelid') ?>" placeholder="Pilih Guru" readonly />
                                    <?= form_error('tapelid', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mt-5 mb-3">
                                    <label for="type" class="form-label">Semester</label>
                                    <input type="text" id="semesterid" name="semesterid" class="form-control"
                                        value="<?= $this->input->get('semesterid') ?>" placeholder="Pilih Guru"
                                        readonly />
                                    <?= form_error('semesterid', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mt-5 mb-3">
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
                                <div class="col mt-5 mb-3">
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
                                <a href="<?= base_url('Gurumengajar/tambah') ?>"
                                    class="btn btn-secondary mt-2">Cancel</a>
                                <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>