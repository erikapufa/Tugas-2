<div class="card card-dark card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Jenis Seragam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Stok Seragam</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <div class="btn btn-primary addBtn mb-2" data-method="jenis_seragam"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" data-target="Seragam" id="table_jenis_seragam">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Seragam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="btn btn-primary addBtn mb-2" data-method="stok_seragam"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" data-target="Seragam" id="table_stok_seragam">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Seragam</th>
                                <th>Tahun Pelajaran</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Ukuran</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_jenis_seragam" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jenis Seragam</h5>

                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-user">
                    <form id="form_jenis_seragam" action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="">
                        <div class="mb-1">
                            <label for="nama_seragam" class="form-label">Nama Seragam</label>
                            <input type="text" class="form-control" id="nama_seragam" name="nama_seragam" value="">
                            <div class="error-block"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn" data-target="jenis_seragam">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_stok_seragam" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Stok Seragam</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-user">
                    <form id="form_stok_seragam" action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="">
                        <div class="mb-1">
                            <label for="id_seragam" class="form-label">Nama Seragam</label>
                            <select class="form-control" data-target="seragam" data-method="seragam" name="id_seragam" id="id_seragam">
                                <option value="">- Pilih Seragam -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="id_tahun_pelajaran" class="form-label">Tahun Pelajaran</label>
                            <select class="form-control" data-target="biaya" data-method="tahun_pelajaran" name="id_tahun_pelajaran" id="id_tahun_pelajaran">
                                <option value="">- Pilih Tahun Pelajaran -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="id_jurusan" class="form-label">Jurusan</label>
                            <select class="form-control" data-target="biaya" data-method="jurusan" name="id_jurusan" id="id_jurusan">
                                <option value="">- Pilih Jurusan -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="id_kelas" class="form-label">Kelas</label>
                            <select class="form-control" data-target="biaya" data-method="kelas" name="id_kelas" id="id_kelas">
                                <option value="">- Pilih Kelas -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="ukuran" class="form-label">Ukuran</label>
                            <input type="text" class="form-control" id="ukuran" name="ukuran" value="">
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" value="">
                            <div class="error-block"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn" data-target="stok_seragam">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>