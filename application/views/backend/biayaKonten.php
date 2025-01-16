<div class="container mt-5">
    <!-- Card for Navtabs -->
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab-jenis" data-toggle="pill" href="#jenis" role="tab" aria-controls="jenis" aria-selected="true">
                        <i class="fas fa-list"></i> Jenis Biaya
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-harga" data-toggle="pill" href="#harga" role="tab" aria-controls="harga" aria-selected="false">
                        <i class="fas fa-money-bill"></i> Harga Biaya
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <!-- Jenis Biaya -->
                <div class="tab-pane fade show active" id="jenis" role="tabpanel" aria-labelledby="tab-jenis">
                    <div class="btn btn-primary btnTambahJenisBiaya mb-2"> <i class="fas fa-plus"></i> Tambah</div>
                    <table class="table table-bordered" id="tabelJenisBiaya">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Biaya</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <!-- Harga Biaya -->
                <div class="tab-pane fade" id="harga" role="tabpanel" aria-labelledby="tab-harga">
                    <div class="btn btn-primary btnTambahHargaBiaya mb-2"> <i class="fas fa-plus"></i> Tambah</div>
                    <table class="table table-bordered" id="tabelHargaBiaya">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Pelajaran</th>
                                <th>Kelas</th>
                                <th>Jenis Biaya</th>
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

<!-- Modal Jenis Biaya -->
<div class="modal" id="modalJenisBiaya" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Biaya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formJenisBiaya" action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="id" name="id" value="">
                    <div class="mb-1">
                        <label for="jenis_biaya" class="form-label">Jenis Biaya</label>
                        <input type="text" class="form-control" id="jenis_biaya" name="jenis_biaya" value="">
                        <div class="error-block"></div>
                    </div>
                    <div class="mb-1">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="">
                        <div class="error-block"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal Jenis Biaya END -->

<!-- Modal Harga Biaya -->
<div class="modal" id="modalHargaBiaya" tabindex=" -1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Harga Biaya</h5>

                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-user">
                    <form id="formHarga" action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="">

                        <div class="mb-1">
                            <label for="id_tahun_pelajaran" class="form-label">Nama Tahun Pelajaran</label>
                            <select class="form-control" name="id_tahun_pelajaran" id="id_tahun_pelajaran">
                                <option value="">- Pilih Tahun Pelajaran -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="id_kelas" class="form-label">Nama Kelas</label>
                            <select class="form-control" name="id_kelas" id="id_kelas">
                                <option value="">- Pilih Kelas -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="id_jenis_biaya" class="form-label">Jenis Biaya</label>
                            <select class="form-control" name="id_jenis_biaya" id="id_jenis_biaya">
                                <option value="">- Pilih Jenis Biaya -</option>
                            </select>
                            <div class="error-block"></div>
                        </div>
                        <div class="mb-1">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="">
                            <div class="error-block"></div>
                        </div>

                    </form>

                    <div>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtnHarga">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Harga Biaya END -->

<!-- Script Jenis Biaya -->
<script>
    $(document).ready(function() {
        tabelJenisBiaya();
    });

    function tabelJenisBiaya() {
        let tabelJenisBiaya = $('#tabelJenisBiaya');
        let tr = '';
        $.ajax({
            url: '<?php echo base_url('biaya/table_biaya'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    tabelJenisBiaya.find('tbody').html('');
                    let no = 1;
                    $.each(response.data, function(i, item) {
                        tr = $('<tr>');
                        tr.append('<td>' + no++ + '</td>');
                        tr.append('<td>' + item.jenis_biaya + '</td>');
                        tr.append('<td>' + item.keterangan + '</td>');
                        tr.append(
                            '<td>' +
                            '<button class="btn btn-primary" onclick="editJenisbiaya(' + item.id + ')">Edit</button> ' +
                            '<button class="btn btn-danger" onclick="deleteJenisBiaya(' + item.id + ')">Delete</button>' +
                            '</td>'
                        );
                        tabelJenisBiaya.find('tbody').append(tr);
                    });
                } else {
                    tabelJenisBiaya.find('tbody').html('');
                    tr = $('<tr>');
                    tr.append('<td colspan="4">' + response.message + '</td>');
                    tabelJenisBiaya.find('tbody').append(tr);
                }
            }
        });
    }

    $('.btnTambahJenisBiaya').click(function() {
        $('#id').val('');
        $('#formJenisBiaya').trigger('reset');
        $('#modalJenisBiaya').modal('show');
    });

    $('.saveBtn').click(function() {
        $.ajax({
            url: '<?php echo base_url('biaya/save'); ?>',
            type: 'POST',
            data: {
                id: $('#id').val(),
                jenis_biaya: $('#jenis_biaya').val(),
                keterangan: $('#keterangan').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    alert(response.message);
                    $('#modalJenisBiaya').modal('hide');
                    tabelJenisBiaya();
                } else {
                    alert(response.message);
                }
            }
        });
    });

    function editJenisbiaya(id) {
        $.ajax({
            url: '<?php echo base_url('biaya/edit'); ?>',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('#id').val(response.data.id);
                    $('#jenis_biaya').val(response.data.jenis_biaya);
                    $('#keterangan').val(response.data.keterangan);
                    $('#modalJenisBiaya').modal('show');
                } else {
                    alert(response.message);
                }
            }
        });
    }

    function deleteJenisBiaya(id) {
        $.ajax({
            url: '<?php echo base_url('biaya/delete'); ?>',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    alert(response.message);
                    tabelJenisBiaya();
                } else {
                    alert(response.message);
                }
            }
        });
    }



    // harga

    $(document).ready(function() {
        tabelHarga();
        $('#id_tahun_pelajaran').load('<?php echo base_url('biaya/option_tahun_pelajaran'); ?>');
        $('#id_tahun_pelajaran').change(function() {
            let id = $(this).val(); // id tahun pelajaran
            let url = '<?php echo base_url('biaya/option_kelas'); ?>';
            $('#id_kelas').load(url + '/' + id);
        })
        $('#id_jenis_biaya').load('<?php echo base_url('biaya/option_jenis_biaya'); ?>');
    })

    function tabelHarga() {
        let tabel = $('#tabelHargaBiaya');
        let tr = '';
        $.ajax({
            url: '<?php echo base_url('biaya/table_harga'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    tabel.find('tbody').html('');
                    let no = 1;
                    $.each(response.data, function(i, item) {
                        tr = $('<tr>');
                        tr.append('<td>' + no++ + '</td>');
                        tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
                        tr.append('<td>' + item.nama_kelas + '</td>');
                        tr.append('<td>' + item.jenis_biaya + '</td>');
                        tr.append('<td>' + item.nama_harga + '</td>');
                        tr.append('<td><button class="btn btn-primary" onclick="editHarga(' + item.id + ')">Edit</button> <button class="btn btn-danger" onclick="deleteHarga(' + item.id + ')">Delete</button></td>');
                        tabel.find('tbody').append(tr);
                    });
                } else {
                    tabel.find('tbody').html('<tr><td colspan="6">' + response.message + '</td></tr>');
                }
            }
        });
    }

    $('.btnTambahHargaBiaya').click(function() {
        $('#id').val('');
        $('#formHarga').trigger('reset');
        $('#modalHargaBiaya').modal('show');
    });
    $('.saveBtnHarga').click(function() {
        // lakukan proses simpan data, lalu tutup modal , lalu reload tabel
        $.ajax({
            url: '<?php echo base_url('biaya/saveHarga'); ?>',
            type: 'POST',
            data: {
                id: $('#id').val(),
                id_tahun_pelajaran: $('#id_tahun_pelajaran').val(),
                id_kelas: $('#id_kelas').val(),
                id_jenis_biaya: $('#id_jenis_biaya').val(),
                harga: $('#harga').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    alert(response.message);
                    $('#modalHargaBiaya').modal('hide');
                    tabel();
                } else {
                    alert(response.message);
                }
            }

        })
    })


    function editHarga(id) {
        // tampilkan data dalam modal 
        $.ajax({
            url: '<?php echo base_url('biaya/editHarga'); ?>',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('#id').val(response.data.id);
                    $('#id_tahun_pelajaran').val(response.data.id_tahun_pelajaran);
                    $('#id_kelas').val(response.data.id_kelas);
                    $('#id_jenis_biaya').val(response.data.id_jenis_biaya);
                    $('#harga').val(response.data.harga);
                    setJurusan(response.data.id_tahun_pelajaran, response.data.id_kelas, response.data.id_jenis_data);
                    $('#modalHargaBiaya').modal('show');
                } else {
                    alert(response.message);
                }
            }
        })
    };

    function deleteHarga(id) {
        // lakukan proses delete data, lalu reload tabel
        $.ajax({
            url: '<?php echo base_url('biaya/deleteHarga'); ?>',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    alert(response.message);
                    tabel();
                } else {
                    alert(response.message);
                }
            }
        })
    };

    function setKelas(id_tahun_pelajaran, id) {
        let url = '<?php echo base_url('biaya/option_kelas'); ?>';
        $('#id_kelas').load(url + '/' + id_tahun_pelajaran, function() {
            $('#id_kelas').val(id);
        });

    }
</script>

</div>