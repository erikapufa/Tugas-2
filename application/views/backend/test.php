<!-- <script>
    // $(document).off('click', '.option').on('click', '.option', function() {
    // 	var targetMethod = $(this).data('method');
    // 	var targetController = $(this).data('target');
    // 	let base = $(this).data('url');
    // 	var url = base + targetController +'/option_' + targetMethod;
    // 	$('#id_' + targetMethod).load(url);
    // })


    // function tampilkan_option(){
    // 	var targetMethod = $('#id_' + ).data('method');
    // 	var targetController = $(this).data('target');
    // 	let base = $(this).data('url');
    // 	var url = base + targetController +'/option_' + targetMethod;
    // 	$('#id_' + targetMethod).load(url);
    // }




    $(document).ready(function() {
        tampilkan_table('biaya', 'biaya');
        tampilkan_table('biaya', 'harga_biaya');
        tampilkan_table('seragam', 'seragam');
        tampilkan_table('seragam', 'stok');
        tampilkan_table('tahun_pelajaran', 'tahun_pelajaran');
        tampilkan_table('jurusan', 'jurusan');
        tampilkan_table('kelas', 'kelas');
        tampilkan_table('akun_pengguna', 'akun_pengguna');

        $('#id_tahun_pelajaran').load('kelas/option_tahun_pelajaran');
        $('#id_tahun_pelajaran').change(function() {
            let id = $(this).val();
            let url = 'kelas/option_jurusan';
            $('#id_jurusan').load(url + '/' + id);
        })
        $('#id_biaya').load('biaya/option_biaya');
        $('#id_seragam').load('seragam/option_seragam');


    })

    $(document).on('click', '.tambahBtn', function() {
        var targetMethod = $(this).data('method');
        $('#id').val('');
        $('#form_' + targetMethod).trigger('reset');
        $('#modal_' + targetMethod).modal('show');

    })

    function tampilkan_table(targetController, table) {
        let tableElement = $('#tabel_' + table);
        $.ajax({
            url: targetController + '/table_' + table,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    let no = 1;
                    tableElement.find('tbody').html('');
                    $.each(response.data, function(i, item) {
                        let tr = $('<tr>');
                        tr.append('<td>' + no++ + '</td>');

                        if (table === 'biaya') {
                            tr.append('<td>' + item.nama_biaya + '</td>');
                            tr.append('<td>' + item.deskripsi + '</td>');
                        } else if (table === 'harga_biaya') {
                            tr.append('<td>' + item.nama_biaya + '</td>');
                            tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
                            tr.append('<td>' + item.harga + '</td>');
                        } else if (table === 'seragam') {
                            tr.append('<td>' + item.nama_seragam + '</td>');
                        } else if (table === 'stok') {
                            tr.append('<td>' + item.nama_seragam + '</td>');
                            tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
                            tr.append('<td>' + item.ukuran + '</td>');
                            tr.append('<td>' + item.stok + '</td>');
                        } else if (table === 'tahun_pelajaran') {
                            tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
                            tr.append('<td>' + item.tanggal_mulai + '</td>');
                            tr.append('<td>' + item.tanggal_akhir + '</td>');
                            tr.append('<td>' + item.status_tahun_pelajaran + '</td>');
                        } else if (table === 'jurusan') {
                            tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
                            tr.append('<td>' + item.nama_jurusan + '</td>');
                        } else if (table === 'kelas') {
                            tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
                            tr.append('<td>' + item.nama_jurusan + '</td>');
                            tr.append('<td>' + item.nama_kelas + '</td>');
                        } else if (table === 'akun_pengguna') {
                            tr.append('<td>' + item.username + '</td>');
                            tr.append('<td>' + item.password + '</td>');
                        }

                        tr.append('<td> <button class="btn btn-primary editBtn" data-method="' + table + '" data-target="' + targetController + '" data-id="' + item.id + '">Edit</button> <button class="btn btn-danger deleteBtn" data-method="' + table + '" data-target="' + targetController + '" data-id="' + item.id + '">Delete</button></td>');
                        tableElement.find('tbody').append(tr);
                    });
                } else {
                    tableElement.find('tbody').html('<tr><td colspan="4">' + response.message + '</td></tr>');
                }
            }
        })
    }


    $(document).on('click', '.saveBtn', function() {
        var targetController = $(this).data('target');
        var targetMethod = $(this).data('method');
        var formData = new FormData($('#form_' + targetMethod)[0]);
        $.ajax({
            url: targetController + '/save_' + targetMethod,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    alert(response.message);
                    $('#modal_' + targetMethod).modal('hide');
                    tampilkan_table(targetController, targetMethod);

                } else {
                    alert(response.message);
                }
            }

        })
    })

    $(document).on('click', '.editBtn', function() {
        var targetController = $(this).data('target');
        var targetMethod = $(this).data('method');
        var formData = new FormData($('#form_' + targetMethod)[0]);
        formData.append('id', $(this).data('id'));

        $.ajax({
            url: targetController + '/edit_' + targetMethod,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {

                if (response.status) {
                    if (targetMethod === 'biaya') {
                        $('#id').val(response.data.id);
                        $('#nama_biaya').val(response.data.nama_biaya);
                        $('#deskripsi').val(response.data.deskripsi);
                        $('#modal_' + targetMethod).modal('show');
                        tampilkan_table(targetController, targetMethod);
                    } else if (targetMethod === 'harga_biaya') {
                        $('#id').val(response.data.id);
                        $('#id_biaya').val(response.data.id_biaya);
                        $('#id_tahun_pelajaran').val(response.data.id_tahun_pelajaran);
                        $('#harga').val(response.data.harga);
                        $('#modal_' + targetMethod).modal('show');
                        tampilkan_table(targetController, targetMethod);
                    } else if (targetMethod === 'tahun_pelajaran') {
                        $('#id').val(response.data.id);
                        $('#nama_tahun_pelajaran').val(response.data.nama_tahun_pelajaran);
                        $('#tanggal_mulai').val(response.data.tanggal_mulai);
                        $('#tanggal_akhir').val(response.data.tanggal_akhir);
                        $('#status_tahun_pelajaran').val(response.data.status_tahun_pelajaran);
                        $('#modal_' + targetMethod).modal('show');
                        tampilkan_table(targetController, targetMethod);
                    } else if (targetMethod === 'jurusan') {
                        $('#id').val(response.data.id);
                        $('#id_tahun_pelajaran').val(response.data.id_tahun_pelajaran);
                        $('#nama_jurusan').val(response.data.nama_jurusan);
                        $('#modal_' + targetMethod).modal('show');
                        tampilkan_table(targetController, targetMethod);
                    } else if (targetMethod === 'kelas') {
                        $('#id').val(response.data.id);
                        $('#id_tahun_pelajaran').val(response.data.id_tahun_pelajaran);
                        $('#id_jurusan').val(response.data.id_jurusan);
                        $('#nama_kelas').val(response.data.nama_kelas);
                        $('#modal_' + targetMethod).modal('show');
                        tampilkan_table(targetController, targetMethod);
                    } else if (targetMethod === 'seragam') {
                        $('#id').val(response.data.id);
                        $('#nama_seragam').val(response.data.nama_seragam);
                        $('#modal_' + targetMethod).modal('show');
                        tampilkan_table(targetController, targetMethod);
                    } else {
                        $('#id').val(response.data.id);
                        $('#id_seragam').val(response.data.id_seragam);
                        $('#id_tahun_pelajaran').val(response.data.id_tahun_pelajaran);
                        $('#ukuran').val(response.data.ukuran);
                        $('#stok').val(response.data.stok);
                        $('#modal_' + targetMethod).modal('show');
                        tampilkan_table(targetController, targetMethod);
                    }
                } else {
                    alert(response.message);
                }
            }

        })
    });


    $(document).on('click', '.deleteBtn', function() {
        var targetController = $(this).data('target');
        var targetMethod = $(this).data('method');
        var id = $(this).data('id');
        $.ajax({
            url: targetController + '/delete_' + targetMethod,
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    alert(response.message);
                    tampilkan_table(targetController, targetMethod);
                } else {
                    alert(response.message);
                }
            }

        })
    })


    $(document).on('click', '#logoutBtn', function() {
        if (confirm('Apakah Anda yakin ingin keluar?')) {
            $.ajax({
                url: 'login/logout',
                type: 'POST',
                success: function(response) {
                    let res = JSON.parse(response);
                    if (res.status) {
                        window.location.href = 'login';
                    } else {
                        alert('Logout gagal. Silakan coba lagi.');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan. Tidak dapat logout.');
                }
            });
        }
    });
</script> -->




<!-- <div class="card card-primary card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs tab_harga_biaya" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Jenis Biaya</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Harga</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <div class="btn btn-primary tambahBtn mb-2" data-method="biaya"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" data-target="biaya" id="table_biaya">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Biaya</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="btn btn-primary tambahBtn mb-2" data-method="harga_biaya"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" data-target="biaya" id="table_harga_biaya">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Biaya</th>
                                <th>Tahun Pelajaran</th>
                                <th>Harga</th>
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

<div class="modal" id="modal_biaya" tabindex=" -1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jenis Biaya</h5>

                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-user">
                    <form id="form_biaya" action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="">
                        <div class="mb-1">
                            <label for="nama_biaya" class="form-label">Nama Biaya</label>
                            <input type="text" class="form-control" id="nama_biaya" name="nama_biaya" value="">
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="">
                            <div class="error-block"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn" data-target="biaya" data-method="biaya">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_harga_biaya" tabindex=" -1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Harga Biaya</h5>

                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-user">
                    <form id="form_harga_biaya" action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="">
                        <div class="mb-1">
                            <label for="id_biaya" class="form-label">Nama Biaya</label>
                            <select class="form-control option" data-target="biaya" data-method="biaya" name="id_biaya" id="id_biaya">
                                <option value="">- Pilih Biaya -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="id_tahun_pelajaran" class="form-label">Tahun Pelajaran</label>
                            <select class="form-control option" data-target="biaya" data-method="tahun_pelajaran" name="id_tahun_pelajaran" id="id_tahun_pelajaran">
                                <option value="">- Pilih Tahun Pelajaran -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="">
                            <div class="error-block"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn" data-target="biaya" data-method="harga_biaya">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> -->