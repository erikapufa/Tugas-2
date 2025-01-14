<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kelas</h3>
            </div>
            <div class="card-body">
                <div class="btn btn-primary btnKelas mb-2"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" id="tabelKelas">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Mulai</th>
                                <th>Akhir</th>
                                <th>Status</th>
                                <th>Aksi</th>
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

<div class="modal" id="modalKelas" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kelas</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="id" name="id" value="">
                    <div class="mb-1">
                        <label for="status_tahun_pelajaran" class="form-label">Tahun Ajaran</label>
                        <select class="form-control" id="status_tahun_pelajaran" name="status_tahun_pelajaran">
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="id_jurusan" class="form-label">Jurusan</label>
                        <select class="form-control" id="id_jurusan" name="jurusan">
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="nama_kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="">
                    </div>
                    <div class="mb-1">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="">
                    </div>
                    <div class="mb-1">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="">
                    </div>
                    <div class="mb-1">
                        <label for="status_kelas" class="form-label">Status</label>
                        <select class="form-control" id="status_kelas" name="status_kelas">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn">Simpan</button>
                <button type="button" class="btn btn-secondary btnKeluarKelas" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        tabelKelas();
    });

    function tabelKelas() {
        let tabelKelas = $('#tabelKelas');
        $.ajax({
            url: '<?php echo base_url('kelas/table_kelas'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                tabelKelas.find('tbody').empty(); // Reset tabel sebelum mengisi
                if (response.status) {
                    let no = 1;
                    $.each(response.data, function(i, item) {
                        let row = `
                            <tr>
                                <td>${no++}</td>
                                <td>${item.nama_tahun_pelajaran}</td>
                                <td>${item.tanggal_mulai}</td>
                                <td>${item.tanggal_akhir}</td>
                                <td>${item.status_tahun_pelajaran}</td>
                                <td>
                                    <button class="btn btn-primary" onclick="editKelas(${item.id})">Edit</button>
                                    <button class="btn btn-danger" onclick="deleteKelas(${item.id})">Delete</button>
                                </td>
                            </tr>`;
                        tabelKelas.find('tbody').append(row);
                    });
                } else {
                    tabelKelas.find('tbody').html('<tr><td colspan="6">Tidak ada data tersedia.</td></tr>');
                }
            }
        });
    }

    $('.btnKelas').click(function() {
        $('#modalKelas').modal('show');
    });

    $('.btnKeluarKelas').click(function() {
        $('#modalKelas').modal('hide');
    });
</script>