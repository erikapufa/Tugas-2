<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Jurusan</h3>
            </div>
            <div class="card-body">
                <div class="btn btn-primary btnJurusan mb-2"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" id="tabelJurusan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Nama Jurusan</th>
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

<div class="modal" id="modalJurusan" tabindex=" -1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jurusan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-user">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="">
                        <div class="mb-1">
                            <label for="id_tahun_ajaran" class="form-label">Tahun Ajaran</label>
                            <select class="form-control" id="id_tahun_ajaran" name="id_tahun_ajaran"></select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="">
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="">
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="">
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="status_tahun_pelajaran" class="form-label">Status</label>
                            <select class="form-control" id="status_tahun_pelajaran" name="status_tahun_pelajaran">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn">Simpan</button>
                <button type="button" class="btn btn-secondary closeBtn" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        tabelJurusan();
    });

    function tabelJurusan() {
        let tabelJurusan = $('#tabelJurusan');
        let tr = $('<tr>');
        $.ajax({
            url: '<?php echo base_url('jurusan/table_jurusan'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    tabelJurusan.find('tbody').html('');
                    let no = 1;
                    $.each(response.data, function(i, item) {
                        tr.append('<td>' + no++ + '</td>');
                        tr.append('<td>' + item.id_tahun_ajaran + '</td>');
                        tr.append('<td>' + item.nama_jurusan + '</td>');
                        tr.append('<td>' + item.tanggal_mulai + '</td>');
                        tr.append('<td>' + item.tanggal_akhir + '</td>');
                        tr.append('<td>' + item.status_tahun_pelajaran + '</td>');
                        tr.append('<td><button class="btn btn-primary" onclick="editJurusan(' + item.id + ')">Edit</button> <button class="btn btn-danger" onclick="deleteJurusan(' + item.id + ')">Delete</button></td>');
                        tabelJurusan.find('tbody').append(tr);
                    });
                } else {
                    tabelJurusan.find('tbody').html('');
                    tr.append('<td colspan="7">' + response.message + '</td>');
                    tabelJurusan.find('tbody').append(tr);
                }
            }
        });
    }

    $('.btnJurusan').click(function() {
        $('#modalJurusan').modal('show');
    });

    $('.saveBtn').click(function() {
        // Simpan data, lalu tutup modal, lalu reload tabel
    });

    $('.closeBtn').click(function() {
        $('#modalJurusan').modal('hide');
    });

    function editJurusan(id) {
        // Tampilkan data untuk diedit
    }

    function deleteJurusan(id) {
        // Hapus data, lalu reload tabel
    }
</script>