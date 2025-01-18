$(document).ready(function () {
	loadTabel("tahun_pelajaran", "tahun_pelajaran");
	loadTabel("jurusan", "jurusan");
	loadTabel("kelas", "kelas");
	loadTabel("biaya", "jenis_biaya");
	loadTabel("biaya", "harga_biaya");
	loadTabel("seragam", "jenis_seragam");
	loadTabel("seragam", "stok_seragam");

	$("#id_tahun_pelajaran").load("biaya/option_tahun_pelajaran");
	$("#id_tahun_pelajaran").change(function () {
		let id = $(this).val(); // id tahun pelajaran
		let url = "biaya/option_jurusan";
		$("#id_jurusan").load(url + "/" + id);
	});

	$("#id_jurusan").change(function () {
		let id = $(this).val();
		let url = "biaya/option_kelas";
		$("#id_kelas").load(url + "/" + id);
	});

	$("#id_biaya").load("biaya/option_biaya");

	$("#id_seragam").load("biaya/option_seragam");
});

$(document).on("click", ".addBtn", function () {
	var targetMethod = $(this).data("method");
	$("#id").val("");
	$("#form_" + targetMethod).trigger("reset");
	$("#modal_" + targetMethod).modal("show");
});

function loadTabel(targetController, table) {
	let tableElement = $("#table_" + table);
	$.ajax({
		url: targetController + "/table_" + table,
		type: "GET",
		dataType: "json",
		success: function (response) {
			if (response.status) {
				let no = 1;
				tableElement.find("tbody").html("");
				$.each(response.data, function (i, item) {
					let tr = $("<tr>");
					tr.append("<td>" + no++ + "</td>");

					if (table === "jenis_biaya") {
						tr.append("<td>" + item.nama_biaya + "</td>");
						tr.append("<td>" + item.deskripsi + "</td>");
					} else if (table === "harga_biaya") {
						tr.append("<td>" + item.nama_biaya + "</td>");
						tr.append("<td>" + item.nama_tahun_pelajaran + "</td>");
						tr.append("<td>" + item.harga + "</td>");
						tr.append("<td>" + item.nama_jurusan + "</td>");
						tr.append("<td>" + item.nama_kelas + "</td>");
						tr.append("<td>" + item.harga + "</td>");
					} else if (table === "jenis_seragam") {
						tr.append("<td>" + item.nama_seragam + "</td>");
					} else if (table === "stok_seragam") {
						tr.append("<td>" + item.nama_seragam + "</td>");
						tr.append("<td>" + item.nama_tahun_pelajaran + "</td>");
						tr.append("<td>" + item.nama_jurusan + "</td>");
						tr.append("<td>" + item.nama_kelas + "</td>");
						tr.append("<td>" + item.ukuran + "</td>");
						tr.append("<td>" + item.stok + "</td>");
					} else if (table === "kelas") {
						tr.append("<td>" + item.nama_tahun_pelajaran + "</td>");
						tr.append("<td>" + item.nama_jurusan + "</td>");
						tr.append("<td>" + item.nama_kelas + "</td>");
					} else if (table === "jurusan") {
						tr.append("<td>" + no++ + "</td>");
						tr.append("<td>" + item.nama_tahun_pelajaran + "</td>");
						tr.append("<td>" + item.nama_jurusan + "</td>");
					} else if (table === "tahun_pelajaran") {
						tr.append("<td>" + no++ + "</td>");
						tr.append("<td>" + item.nama_tahun_pelajaran + "</td>");
						tr.append("<td>" + item.tanggal_mulai + "</td>");
						tr.append("<td>" + item.tanggal_akhir + "</td>");
						tr.append("<td>" + item.status_tahun_pelajaran + "</td>");
					}
					tr.append(
						'<td> <button class="btn btn-primary editBtn" data-method="' +
							table +
							'" data-target="' +
							targetController +
							'" data-id="' +
							item.id +
							'">Edit</button> <button class="btn btn-danger deleteBtn" data-method="' +
							table +
							'" data-target="' +
							targetController +
							'" data-id="' +
							item.id +
							'">Delete</button></td>'
					);
					tableElement.find("tbody").append(tr);
				});
			} else {
				tableElement
					.find("tbody")
					.html('<tr><td colspan="4">' + response.message + "</td></tr>");
			}
		},
	});
}

$(document).on("click", ".saveBtn", function () {
	var targetController = $(this).data("target");
	var targetMethod = $(this).data("method");
	var formData = new FormData($("#form_" + targetMethod)[0]);
	$.ajax({
		url: targetController + "/save_" + targetMethod,
		type: "POST",
		data: formData,
		processData: false,
		contentType: false,
		dataType: "json",
		success: function (response) {
			if (response.status) {
				alert(response.message);
				$("#modal_" + targetMethod).modal("hide");
				tampilkan_table(targetController, targetMethod);
			} else {
				alert(response.message);
			}
		},
	});
});

$(document).on("click", ".deleteBtn", function () {
	var targetController = $(this).data("target");
	var targetMethod = $(this).data("method");
	var id = $(this).data("id");
	$.ajax({
		url: targetController + "/delete_" + targetMethod,
		type: "POST",
		data: {
			id: id,
		},
		dataType: "json",
		success: function (response) {
			if (response.status) {
				alert(response.message);
				tampilkan_table(targetController, targetMethod);
			} else {
				alert(response.message);
			}
		},
	});
});

$(document).on("click", ".editBtn", function () {
	var targetController = $(this).data("target");
	var id = $(this).data("id");
	var url = "biaya/edit_" + targetController;
	var formData = new FormData($("#form_" + targetController)[0]);

	$.ajax({
		url: url,
		type: "POST",
		data: {
			id: id,
		},
		dataType: "json",
		success: function (response) {
			if (response.status) {
				if (targetController === "jenis_biaya") {
					// Use targetController here
					$("#id").val(response.data.id);
					$("#nama_biaya").val(response.data.nama_biaya);
					$("#deskripsi").val(response.data.deskripsi);
					$("#modal_" + targetController).modal("show");
				} else if (targetController === "harga_biaya") {
					// Use targetController here
					$("#id").val(response.data.id);
					$("#id_biaya").val(response.data.id_biaya);
					$("#id_tahun_pelajaran").val(response.data.id_tahun_pelajaran);
					$("#harga").val(response.data.harga);
					$("#modal_" + targetController).modal("show");
				}
			} else {
				alert(response.message);
			}
		},
	});
});
