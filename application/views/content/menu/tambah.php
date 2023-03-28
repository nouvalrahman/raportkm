<div class="modal fade" id="tambahmodal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?= base_url('Menu/tambah') ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="type" class="form-label">Menu</label>
                                            <input type="text" id="menu" name="menu" class="form-control" placeholder="Enter Menu" />
                                            <?= form_error('menu', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                    <div   div class="row">
                                        <div class="col mb-3">
                                            <label for="type" class="form-label">Icon</label>
                                            <input type="text" id="icon" name="icon" class="form-control" placeholder="Enter Icon" />
                                            <small class="text-muted">Ex. menu-icon tf-icons bx bx-cube-alt</small>
                                            <?= form_error('icon', '<small class="text-danger">', '</small>') ?>
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