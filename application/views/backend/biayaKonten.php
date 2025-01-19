<div class="card card-dark card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
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
                <div class="btn btn-primary addBtn mb-2" data-method="jenis_biaya"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" data-target="biaya" id="table_jenis_biaya">
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
                <div class="btn btn-primary addBtn mb-2" data-method="harga_biaya"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" data-target="biaya" id="table_harga_biaya">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Biaya</th>
                                <th>Tahun Pelajaran</th>
                                <!-- <th>Jurusan</th>
                                <th>Kelas</th> -->
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

<div class="modal" id="modal_jenis_biaya" tabindex=" -1" role="dialog">
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
                    <form id="form_jenis_biaya" action="#" method="post" enctype="multipart/form-data">
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
                <button type="button" class="btn btn-primary saveBtn" data-target="biaya" data-method="jenis_biaya">Simpan</button>
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
                            <select class="form-control" data-target="biaya" data-method="biaya" name="id_biaya" id="id_biaya">
                                <option value="">- Pilih Biaya -</option>
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
                        <!-- <div class="mb-1">
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
                        </div> -->
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
</div>

<script>
    // $(document).ready(function() {

    //     loadTabel('jenis_biaya');
    //     loadTabel('harga_biaya');

    // });

    // $('#id_tahun_pelajaran').load('<?php echo base_url('biaya/option_tahun_pelajaran'); ?>');
    // $('#id_tahun_pelajaran').change(function() {
    //     let id = $(this).val(); // id tahun pelajaran
    //     let url = '<?php echo base_url('biaya/option_jurusan'); ?>';
    //     $('#id_jurusan').load(url + '/' + id);
    // });

    // $('#id_jurusan').change(function() {
    //     let id = $(this).val();
    //     let url = '<?php echo base_url('biaya/option_kelas'); ?>';
    //     $('#id_kelas').load(url + '/' + id);
    // });

    // $('#id_biaya').load('<?php echo base_url('biaya/option_biaya'); ?>');

    // $('.addBtn').on('click', function() {
    //     let target = $(this).data('target');
    //     let form = '#form_' + target;
    //     $(form + ' input[type = "hidden"]').val('');
    //     $(form)[0].reset();

    //     $('#modal_' + target).modal('show');
    // });

    // function loadTabel(target) {
    //     let table = $('#table_' + target);
    //     let url = '<?php echo base_url("biaya/table_"); ?>' + target;

    //     let tr = '';
    //     $.ajax({
    //         url: url,
    //         type: 'GET',
    //         dataType: 'json',
    //         success: function(response) {
    //             if (response.status) {
    //                 table.find('tbody').html('');
    //                 let no = 1;
    //                 if (target == 'jenis_biaya') {
    //                     $.each(response.data, function(i, item) {
    //                         tr = $('<tr>');
    //                         tr.append('<td>' + no++ + '</td>');
    //                         tr.append('<td>' + item.nama_biaya + '</td>');
    //                         tr.append('<td>' + item.deskripsi + '</td>');
    //                         tr.append(
    //                             '<td>' +
    //                             '<button class="btn btn-primary editBtn" data-target="jenis_biaya" data-id="' +
    //                             item.id +
    //                             '">Edit</button> ' +
    //                             '<button class="btn btn-danger deleteBtn" data-target="jenis_biaya" data-id="' +
    //                             item.id +
    //                             '">Delete</button>' +
    //                             '</td>'
    //                         );
    //                         table.find('tbody').append(tr);
    //                     });
    //                 } else if (target == 'harga_biaya') {
    //                     $.each(response.data, function(i, item) {
    //                         tr = $('<tr>');
    //                         tr.append('<td>' + no++ + '</td>');
    //                         tr.append('<td>' + item.nama_biaya + '</td>');
    //                         tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
    //                         tr.append('<td>' + item.nama_jurusan + '</td>');
    //                         tr.append('<td>' + item.nama_kelas + '</td>');
    //                         tr.append('<td>' + item.harga + '</td>');
    //                         tr.append(
    //                             '<td>' +
    //                             '<button class="btn btn-primary editBtn" data-target="harga_biaya" data-id="' +
    //                             item.id +
    //                             '">Edit</button> ' +
    //                             '<button class="btn btn-danger deleteBtn" data-target="harga_biaya" data-id="' +
    //                             item.id +
    //                             '">Delete</button>' +
    //                             '</td>'
    //                         );
    //                         table.find('tbody').append(tr);
    //                     });
    //                 }
    //             } else {
    //                 tr = $('<tr>');
    //                 table.find('tbody').html('');
    //                 tr.append('<td colspan="4">' + response.message + '</td>');
    //                 table.find('tbody').append(tr);
    //             }
    //         }
    //     });
    // }

    // $(".saveBtn").on("click", function() {
    //     let base = '<?php echo base_url(); ?>';
    //     var targetController = $(this).data("target");
    //     var url = base + "biaya/save_" + targetController;
    //     var formData = new FormData($("#form_" + targetController)[0]);
    //     $.ajax({
    //         url: url,
    //         type: "POST",
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         dataType: "json",
    //         success: function(response) {
    //             if (response.status) {
    //                 alert(response.message);
    //                 $("#modal_" + targetController).modal("hide");
    //                 loadTabel('jenis_biaya');
    //                 loadTabel('harga_biaya');
    //             } else {
    //                 alert(response.message);
    //             }
    //         },
    //     });
    // });

    // $(document).on("click", ".deleteBtn", function() {
    //     let base = '<?php echo base_url(); ?>';
    //     var targetController = $(this).data("target");
    //     var id = $(this).data("id");
    //     var url = base + "biaya/delete_" + targetController;

    //     if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
    //         $.ajax({
    //             url: url,
    //             type: "POST",
    //             data: {
    //                 id: id,
    //             },
    //             dataType: "json",
    //             success: function(response) {
    //                 if (response.status) {
    //                     alert(response.message);
    //                     loadTabel('jenis_biaya');
    //                     loadTabel('harga_biaya');
    //                 } else {
    //                     alert(response.message || "Gagal menghapus data.");
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error("Error:", error);
    //                 alert("Terjadi kesalahan, silakan coba lagi nanti.");
    //             },
    //         });
    //     }
    // });

    // $(document).on("click", ".editBtn", function() {
    //     let base = "<?php echo base_url(); ?>";
    //     var targetController = $(this).data("target");
    //     var id = $(this).data("id");
    //     var url = base + "biaya/edit_" + targetController;
    //     var formData = new FormData($("#form_" + targetController)[0]);

    //     $.ajax({
    //         url: url,
    //         type: "POST",
    //         data: {
    //             id: id,
    //         },
    //         dataType: "json",
    //         success: function(response) {
    //             if (response.status) {
    //                 if (targetController === "jenis_biaya") {
    //                     // Use targetController here
    //                     $("#id").val(response.data.id);
    //                     $("#nama_biaya").val(response.data.nama_biaya);
    //                     $("#deskripsi").val(response.data.deskripsi);
    //                     $("#modal_" + targetController).modal("show");
    //                 } else if (targetController === "harga_biaya") {
    //                     // Use targetController here
    //                     $("#id").val(response.data.id);
    //                     $("#id_biaya").val(response.data.id_biaya);
    //                     $("#id_tahun_pelajaran").val(response.data.id_tahun_pelajaran);
    //                     $("#harga").val(response.data.harga);
    //                     $("#modal_" + targetController).modal("show");
    //                 }
    //             } else {
    //                 alert(response.message);
    //             }
    //         },
    //     });
    // });
</script>