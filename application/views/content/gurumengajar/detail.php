<div class="content-wrapper">
    <!-- content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> User / Tambah</h4>


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


        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5>Detail Guru Mengajar </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="<?= base_url('Gurumengajar/tambah'); ?>" method="POST">


                <div class="row g-2">
                    <div class="col mt-5 mb-3">
                        <label for="type" class="form-label">Kode Guru</label>
                        <input type="text" id="userid" name="userid" value="<?= $this->session->userdata('userid') ?>"
                            class="form-control" />
                        <?= form_error('userid', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Tahun Pelajaran</label>
                        <input type="text" id="tapelid" name="tapelid" value="<?= $this->session->userdata('tapel') ?>"
                            class="form-control" />
                        <?= form_error('tapelid', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="type" class="form-label">Semester</label>
                        <input type="text" id="semester" name="semester"
                            value="<?= $this->session->userdata('semester') ?>" class="form-control" />
                        <?= form_error('semester', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <select name="mapelid" id="mapelid" class="form-select">
                            <label for="type" class="form-label">Pilih Mapel</label>
                            <?php foreach ($mapel as $m): ?>
                                <option value="<?= $m['id'] ?>" ?><?= $m['mata_pelajaran'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <!-- <small class="text-muted">Ex. master/sekolah</small> -->
                        <?= form_error('mapelid', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <select name="kelasid" id="kelasid" class="form-select">
                            <label for="type" class="form-label">Pilih Kelas</label>
                            <?php foreach ($kelas as $k): ?>
                                <option value="<?= $k['id'] ?>" ?><?= $k['kelas'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <!-- <small class="text-muted">Ex. master/sekolah</small> -->
                        <?= form_error('kelasid', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="float-end">
                    <a href="<?= base_url('User/index') ?>" class="btn btn-secondary mt-2">Cancel</a>
                    <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- end content -->