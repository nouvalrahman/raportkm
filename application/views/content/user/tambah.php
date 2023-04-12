<div class="content-wrapper">
    <!-- content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> User / Tambah</h4>


        <?php if($this->session->flashdata('message')) : ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif($this->session->flashdata('message_error')) : ?>
            <div class="alert alert-danger alert-dismissible" role="start">
                <?= $this->session->flashdata('message_error')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        
        <?php endif ?>


        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5>Tambah User</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="<?= base_url('User/tambah');?>" method="POST">

            
            <div class="row g-2">
                <div class="col mt-5 mb-3">
                    <label for="type" class="form-label">Kode Guru</label>
                    <input type="text" id="username" name="username" placeholder="Enter Kode Guru" class="form-control"  />
                    <?= form_error('username', '<small class="text-danger">','</small>')?>
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Enter Nama" class="form-control"  />
                    <?= form_error('nama', '<small class="text-danger">','</small>')?>
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="text" id="password" name="password" placeholder="Enter Password" class="form-control"  />
                    <?= form_error('password', '<small class="text-danger">','</small>')?>
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-3">
                    <label for="passwordconfirm" class="form-label">Repeat Password</label>
                    <input type="text" id="passwordconfirm" name="passwordconfirm" placeholder="Enter Password Confirmation" class="form-control"  />
                    <?= form_error('passwordconfirm', '<small class="text-danger">','</small>')?>
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-3">
                    <label for="role_id" class="form-label">Role</label>
                    <select name="role_id" id="role_id" class="form-control select2">
                        <option value="1">Administrator</option>
                        <option value="2">Guru</option>
                    </select>
                    <?= form_error('role_id', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>
            <div class="float-end">
                <a href="<?= base_url('User/index')?>" class="btn btn-secondary mt-2">Cancel</a>
                <button type="submit" class="btn btn-primary mt-2">Tambah</button>
            </div>
            
        </form>
        </div>
    </div>
</div>
<!-- end content -->