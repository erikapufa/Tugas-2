<!-- <div class="row">
    <div class="col-12">
        <div class="btn btn-primary tambahBtn mb-2" data-target=""> <i class="fas fa-plus"></i> Tambah</div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Data Kelas</strong></h3>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table_pendaftaran_awal" data-target="pendaftaran_awal">
                        <thead class="table-light">
                            <tr>
                                <th data-key="no">No</th>
                                <th data-key="no_pendaftaran">No Pendaftaran</th>
                                <th data-key="nama_tahun_pelajaran">Tahun Pelajaran</th>
                                <th data-key="nama_jurusan">Nama Jurusan</th>
                                <th data-key="nama_kelas">Nama Kelas</th>
                                <th data-key="btn_aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <div class="card-header">
                <h3 class="card-title"><strong>Data Siswa</strong></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table_siswa_awal" data-target="siswa_awal">
                        <thead class="table-light">
                            <tr>
                                <th data-key="no_telepon">No</th>
                                <th data-key="nama_siswa">Nama Siswa</th>
                                <th data-key="nik">NIK</th>
                                <th data-key="agama">Agama</th>
                                <th data-key="nisn">NISN</th>
                                <th data-key="jenis_kelamin">Jenis Kelamin</th>
                                <th data-key="tempat_lahir">Tempat Lahir</th>
                                <th data-key="tanggal_lahir">Tanggal Lahir</th>
                                <th data-key="alamat">Alamat</th>
                                <th data-key="telepon">Nomor Telepon</th>
                                <th data-key="asal_sekolah">Asal Sekolah</th>
                                <th data-key="email">Email</th>
                                <th data-key="btn_aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <div class="card-header">
                <h3 class="card-title"><strong>Data Orang Tua</strong></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table_orang_tua_awal" data-target="orang_tua_awal">
                        <thead class="table-light">
                            <tr>
                                <th data-key="no">No</th>
                                <th data-key="nama_ayah">Nama Ayah</th>
                                <th data-key="nama_ibu">Nama Ibu</th>
                                <th data-key="telepon_ayah">No Telepon Ayah</th>
                                <th data-key="telepon_ibu">No Telepon Ibu</th>
                                <th data-key="pekerjaan_ayah">Pekerjaan Ayah</th>
                                <th data-key="pekerjaan_ibu">Pekerjaan Ibu</th>
                                <th data-key="nama_wali">Nama Wali</th>
                                <th data-key="telepon_wali">Nomor Telepon Wali</th>
                                <th data-key="pekerjaan_wali">Pekerjaan Wali</th>
                                <th data-key="alamat">Alamat</th>
                                <th data-key="informasi">Sumber Informasi</th>
                                <th data-key="btn_aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal_" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PENDAFTARAN AWAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card-header bg-secondary text-dark mb-2">
                        <h3 class="card-title">A. Jenis Pendaftaran</h3>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="noPendaftaran">No. Pendaftaran</label>
                            <input type="text" class="form-control" id="noPendaftaran">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_tahun_pelajaran" class="form-label">Nama Tahun Pelajaran</label>
                            <select class="form-control chainedSelect" data-target="tahun_pelajaran" name="id_tahun_pelajaran" id="id_tahun_pelajaran">
                                <option value="">- Pilih Tahun Pelajaran -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_jurusan" class="form-label">Nama Jurusan</label>
                            <select class="form-control chainedSelect" data-parent="id_tahun_pelajaran" data-target="jurusan" name="id_jurusan" id="id_jurusan">
                                <option value="">- Pilih Jurusan -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_jurusan" class="form-label">Nama Jurusan</label>
                            <select class="form-control chainedSelect" data-parent="id_tahun_pelajaran" data-target="jurusan" name="id_jurusan" id="id_jurusan">
                                <option value="">- Pilih Jurusan -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                    </div>

                    <div class="card-header bg-secondary text-dark mb-2">
                        <h3 class="card-title">B. Data Siswa</h3>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="namaSiswa">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namaSiswa">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" id="agama">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenisKelamin">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tempatLahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempatLahir">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggalLahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggalLahir">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telepon">No. Telepon</label>
                            <input type="text" class="form-control" id="telepon">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="asalSekolah">Asal Sekolah</label>
                            <input type="text" class="form-control" id="asalSekolah">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>

                    <div class="card-header bg-secondary text-dark mb-2">
                        <h3 class="card-title">C. Data Orang Tua</h3>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="namaAyah">Nama Ayah</label>
                            <input type="text" class="form-control" id="namaAyah">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="namaIbu">Nama Ibu</label>
                            <input type="text" class="form-control" id="namaIbu">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="teleponAyah">No. Telepon Ayah</label>
                            <input type="text" class="form-control" id="teleponAyah">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="teleponIbu">No. Telepon Ibu</label>
                            <input type="text" class="form-control" id="teleponIbu">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pekerjaanAyah">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" id="pekerjaanAyah">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pekerjaanIbu">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" id="pekerjaanIbu">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="namaWali">Nama Wali</label>
                            <input type="text" class="form-control" id="namaWali">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="teleponWali">No. Telepon Wali</label>
                            <input type="text" class="form-control" id="teleponWali">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pekerjaanWali">Pekerjaan Wali</label>
                            <input type="text" class="form-control" id="pekerjaanWali">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamatOrtu">Alamat</label>
                            <input type="text" class="form-control" id="alamatOrtu">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sumberInformasi">Sumber Informasi</label>
                            <input type="text" class="form-control" id="sumberInformasi">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn" data-target="kelas">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> -->



<!-- 
<div class="row">
    <div class="col-12">
        <div class="btn btn-primary tambahBtn mb-2" data-target="pendaftaran_awal"> <i class="fas fa-plus"></i> Tambah</div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Data Kelas</strong></h3>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table_pendaftaran_awal" data-target="pendaftaran_awal">
                        <thead class="table-light">
                            <tr>
                                <th data-key="no">No</th>
                                <th data-key="no_pendaftaran">No Pendaftaran</th>
                                <th data-key="jenis_pendaftaran">Jenis Pendaftaran</th>
                                <th data-key="data_siswa">Data Siswa</th>
                                <th data-key="data_orang_tua">Data Orang Tua</th>
                                <th data-key="btn_aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>




            <div class="modal" id="modal_pendaftaran_awal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">PENDAFTARAN AWAL</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form_pendaftaran_awal" action="#" method="post" enctype="multipart/form-data">
                                <div class="card-header bg-secondary text-dark mb-2">
                                    <h3 class="card-title">A. Jenis Pendaftaran</h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="no_pendaftaran">No. Pendaftaran</label>
                                        <input type="text" class="form-control" id="no_pendaftaran">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id_tahun_pelajaran" class="form-label">Nama Tahun Pelajaran</label>
                                        <select class="form-control chainedSelect" data-target="tahun_pelajaran" name="id_tahun_pelajaran" id="id_tahun_pelajaran">
                                            <option value="">- Pilih Tahun Pelajaran -</option>
                                        </select>
                                        <div class="error-block"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="id_jurusan" class="form-label">Nama Jurusan</label>
                                        <select class="form-control chainedSelect" data-parent="id_tahun_pelajaran" data-target="jurusan" name="id_jurusan" id="id_jurusan">
                                            <option value="">- Pilih Jurusan -</option>
                                        </select>
                                        <div class="error-block"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id_kelas" class="form-label">Nama Kelas</label>
                                        <select class="form-control chainedSelect" data-parent="id_jurusan" data-target="kelas" name="id_kelas" id="id_kelas">
                                            <option value="">- Pilih Kelas -</option>
                                        </select>
                                        <div class="error-block"></div>
                                    </div>
                                </div>

                                <div class="card-header bg-secondary text-dark mb-2">
                                    <h3 class="card-title">B. Data Siswa</h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_siswa">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_siswa">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" id="nik">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="agama">Agama</label>
                                        <input type="text" class="form-control" id="agama">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nisn">NISN</label>
                                        <input type="text" class="form-control" id="nisn">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="telepon">No. Telepon</label>
                                        <input type="text" class="form-control" id="telepon">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="asal_sekolah">Asal Sekolah</label>
                                        <input type="text" class="form-control" id="asal_sekolah">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                </div>

                                <div class="card-header bg-secondary text-dark mb-2">
                                    <h3 class="card-title">C. Data Orang Tua</h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input type="text" class="form-control" id="nama_ayah">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" class="form-control" id="nama_ibu">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="telepon_ayah">No. Telepon Ayah</label>
                                        <input type="text" class="form-control" id="telepon_ayah">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telepon_ibu">No. Telepon Ibu</label>
                                        <input type="text" class="form-control" id="telepon_ibu">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" id="pekerjaan_ayah">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" id="pekerjaan_ibu">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_wali">Nama Wali</label>
                                        <input type="text" class="form-control" id="nama_wali">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telepon_wali">No. Telepon Wali</label>
                                        <input type="text" class="form-control" id="telepon_wali">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                        <input type="text" class="form-control" id="pekerjaan_wali">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="alamat_ortu">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_ortu">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="sumber_informasi">Sumber Informasi</label>
                                        <input type="text" class="form-control" id="sumber_informasi">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary saveBtn" data-target="awal">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div> -->