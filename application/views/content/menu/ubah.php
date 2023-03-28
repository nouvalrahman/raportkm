<div class="modal fade" id="ubahmodal<?= $m['id']?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('menu/ubah')?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Ubah Menu</h5>
                                                    <button type="button" class="btn-close" data-bd-toggle="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="type" class="form-label">Menu</label>
                                                            <input type="hidden" id="id" name="id" class="form-control" placeholder="Enter ID" value="<?= $m['id']?>"/>
                                                            <input type="text" id="menu" name="menu" class="form-control" placeholder="Enter Menu" value="<?= $m['menu']?>"/>
                                                            <?= form_error('menu', '<small class="text-danger">', '</small>')?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="type" class="form-label">icon</label>
                                                            <input type="text" id="icon" name="icon" class="form-control" placeholder="Enter Icon" value="<?= $m['icon']?>"/>
                                                            <small class="text-muted">Ex. menu-icon tf-icon bx bx-cube-alt</small>
                                                            <?= form_error('icon', '<small class="text-danger">', '</small>')?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning">Ubah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>