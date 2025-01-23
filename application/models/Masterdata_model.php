<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterdata_model extends CI_Model
{

	protected $tableTahunPelajaran = 'data_tahun_pelajaran';
	protected $tableKelas = 'data_kelas';
	protected $tableJurusan = 'data_jurusan';
	protected $tableBiaya = 'data_biaya';
	protected $tableHargaBiaya = 'data_harga_biaya';
	protected $tableSeragam = 'data_seragam';
	protected $tableStok = 'data_stok';
	protected $table = 'user';
	protected $tablePendaftaranAwal = 'data_pendaftaran_awal';
	// protected $tableOrangTua = 'data_orang_tua';
	// protected $tableSiswa = 'data_siswa';
	public function __construct()
	{
		parent::__construct();
	}


	public function getAllTahunPelajaran()
	{
		return  $this->db->get($this->tableTahunPelajaran);
	}

	public function getAllTahunPelajaranNotDeleted()
	{
		$this->db->where('deleted_at', 0);
		return  $this->db->get($this->tableTahunPelajaran);
	}

	public function getNamaTahunPelajaran($nama_tahun_pelajaran)
	{
		$q = $this->db->where('nama_tahun_pelajaran', $nama_tahun_pelajaran)->get($this->tableTahunPelajaran);
		return $q;
	}

	public function getTahunPelajaranByID($id)
	{

		return $this->db->where('id', $id)->get($this->tableTahunPelajaran);
	}

	public function cekTahunPelajaranDuplicate($nama_tahun_pelajaran, $id)
	{
		if ($id) {
			$this->db->where('id !=', $id);
		}
		$this->db->where('nama_tahun_pelajaran', $nama_tahun_pelajaran);
		return $this->db->get($this->tableTahunPelajaran);
	}

	public function deleteTahunPelajaran($id = null)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->tableTahunPelajaran);
		return $this->db->affected_rows();
	}

	public function updateTahunPelajaran($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->tableTahunPelajaran, $data);
		return $this->db->affected_rows();
	}

	public function insertTahunPelajaran($data)
	{
		$this->db->insert($this->tableTahunPelajaran, $data);
		return $this->db->insert_id();
	}




	public function getAllJurusan()
	{
		return  $this->db->get($this->tableJurusan);
	}

	public function getJurusanByID($id)
	{

		$this->db->where('id', $id);
		return $this->db->get($this->tableJurusan);
	}

	public function getAllJurusanNotDeleted()
	{
		$this->db->select($this->tableJurusan . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran');
		$this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableJurusan . '.id_tahun_pelajaran');
		$this->db->where($this->tableJurusan . '.deleted_at', 0);
		return $this->db->get($this->tableJurusan);
	}

	public function cekJurusanDuplicate($nama_jurusan, $id_tahun_pelajaran, $id)
	{
		if ($id) {
			$this->db->where('id !=', $id);
		}
		$this->db->where('id_tahun_pelajaran =', $id_tahun_pelajaran);
		$this->db->where('nama_jurusan', $nama_jurusan);
		$this->db->where('deleted_at', 0);
		return $this->db->get($this->tableJurusan);
	}

	public function updateJurusan($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->tableJurusan, $data);
		return $this->db->affected_rows();
	}

	public function insertJurusan($data)
	{
		$this->db->insert($this->tableJurusan, $data);
		return $this->db->insert_id();
	}


	//Data Kelas

	public function getAllKelas()
	{
		return  $this->db->get($this->tableKelas);
	}

	public function getKelasByID($id)
	{
		// $this->db->select($this->tableKelas . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableJurusan . '.nama_jurusan, ' . $this->tableJurusan . '.id_tahun_pelajaran');
		// $this->db->join($this->tableJurusan, $this->tableJurusan . '.id = ' . $this->tableKelas . '.id_jurusan', 'left');
		// $this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableJurusan . '.id_tahun_pelajaran', 'left');
		// $this->db->where($this->tableKelas . '.deleted_at', 0);
		$this->db->where($this->tableKelas . '.id', $id);
		return $this->db->get($this->tableKelas);
	}

	public function getAllKelasNotDeleted()
	{
		$this->db->select($this->tableKelas . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableJurusan . '.nama_jurusan');
		$this->db->join($this->tableJurusan, $this->tableJurusan . '.id = ' . $this->tableKelas . '.id_jurusan');
		$this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableJurusan . '.id_tahun_pelajaran');
		$this->db->where($this->tableKelas . '.deleted_at', 0);
		return $this->db->get($this->tableKelas);
	}

	public function getJurusanByTahunPelajaranID($id)
	{
		$this->db->where($this->tableJurusan . '.deleted_at', 0);
		$this->db->where('id_tahun_pelajaran', $id);
		return $this->db->get($this->tableJurusan);
	}
	public function getKelasByTahunPelajaranID($id)
	{
		$this->db->where($this->tableKelas . '.deleted_at', 0);
		$this->db->where('id_tahun_pelajaran', $id);
		return $this->db->get($this->tableKelas);
	}
	public function cekKelasDuplicate($nama_kelas,  $id_jurusan, $id)
	{
		if ($id) {
			$this->db->where('id !=', $id);
		}
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->where('nama_kelas', $nama_kelas);
		$this->db->where('deleted_at', 0);
		return $this->db->get($this->tableKelas);
	}


	public function updateKelas($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->tableKelas, $data);
		return $this->db->affected_rows();
	}

	public function saveKelas($data)
	{
		$this->db->insert($this->tableKelas, $data);
		return $this->db->insert_id();
	}

	// Data Biaya
	public function getAllBiayaNotDeleted()
	{
		$this->db->where('deleted_at', 0);
		return  $this->db->get($this->tableBiaya);
	}

	public function cekBiayaDuplicate($nama_biaya, $id)
	{
		if ($id) {
			$this->db->where('id !=', $id);
		}
		$this->db->where('nama_biaya', $nama_biaya);
		$this->db->where('deleted_at', 0);
		return $this->db->get($this->tableBiaya);
	}

	public function getBiayaByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->tableBiaya);
	}

	public function updateBiaya($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->tableBiaya, $data);
		return $this->db->affected_rows();
	}


	public function insertBiaya($data)
	{
		$this->db->insert($this->tableBiaya, $data);
		return $this->db->insert_id();
	}



	// data harga biaya

	public function getAllHargaBiaya()
	{
		$this->db->select($this->tableHargaBiaya . '.*, ' . $this->tableBiaya . '.nama_biaya ,' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran');
		$this->db->join($this->tableBiaya, $this->tableBiaya . '.id = ' . $this->tableHargaBiaya . '.id_biaya', 'left');
		$this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableHargaBiaya . '.id_tahun_pelajaran', 'left');
		$this->db->where($this->tableHargaBiaya . '.deleted_at', 0);
		return $this->db->get($this->tableHargaBiaya);
	}


	public function cekHargaBiayaDuplicate($id_biaya, $id_tahun_pelajaran, $id)
	{
		if ($id) {
			$this->db->where('id !=', $id);
		}
		$this->db->where('id_biaya', $id_biaya);
		$this->db->where('id_tahun_pelajaran', $id_tahun_pelajaran);
		$this->db->where('deleted_at', 0);
		return $this->db->get($this->tableHargaBiaya);
	}

	public function getBiayaNotDeleted()
	{
		$this->db->where('deleted_at', 0);
		return $this->db->get($this->tableBiaya);
	}

	public function getHargaBiayaByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->tableHargaBiaya);
	}

	public function insertHargaBiaya($data)
	{
		$this->db->insert($this->tableHargaBiaya, $data);
		return $this->db->insert_id();
	}

	public function updateHargaBiaya($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->tableHargaBiaya, $data);
		return $this->db->affected_rows();
	}


	// data seragam
	public function getAllSeragamNotDeleted()
	{
		$this->db->where('deleted_at', 0);
		return  $this->db->get($this->tableSeragam);
	}

	public function getSeragamByID($id)
	{
		return $this->db->where('id', $id)->get($this->tableSeragam);
	}

	public function cekSeragamDuplicate($nama_seragam, $id)
	{
		if ($id) {
			$this->db->where('id !=', $id);
		}
		$this->db->where('nama_seragam', $nama_seragam);
		$this->db->where('deleted_at', 0);
		return $this->db->get($this->tableSeragam);
	}

	public function updateSeragam($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->tableSeragam, $data);
		return $this->db->affected_rows();
	}


	public function insertSeragam($data)
	{
		$this->db->insert($this->tableSeragam, $data);
		return $this->db->insert_id();
	}




	//data stok

	public function getAllStokNotDeleted()
	{
		$this->db->select($this->tableStok . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableSeragam . '.nama_seragam,');
		$this->db->join($this->tableSeragam, $this->tableSeragam . '.id = ' . $this->tableStok . '.id_seragam');
		$this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableStok . '.id_tahun_pelajaran');
		$this->db->where($this->tableStok . '.deleted_at', 0);
		return $this->db->get($this->tableStok);
	}

	public function cekStokDuplicate($id_tahun_pelajaran, $ukuran, $id_seragam, $id)
	{
		if ($id) {
			$this->db->where('id !=', $id);
		}
		$this->db->where('id_tahun_pelajaran', $id_tahun_pelajaran);
		$this->db->where('id_seragam', $id_seragam);
		$this->db->where('ukuran', $ukuran);
		$this->db->where('deleted_at', 0);
		return $this->db->get($this->tableStok);
	}

	public function updateStok($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->tableStok, $data);
		return $this->db->affected_rows();
	}

	public function insertStok($data)
	{
		$this->db->insert($this->tableStok, $data);
		return $this->db->insert_id();
	}

	public function getStokByID($id)
	{
		// $this->db->select($this->tableStok . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableSeragam . '.nama_seragam,');
		// $this->db->join($this->tableSeragam, $this->tableSeragam . '.id = ' . $this->tableStok . '.id_seragam');
		// $this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableStok . '.id_tahun_pelajaran');
		// $this->db->where($this->tableStok . '.deleted_at', 0);
		$this->db->where($this->tableStok . '.id', $id);
		return $this->db->get($this->tableStok);
	}


	//Data User
	public function getAllUserNotDeleted()
	{
		$this->db->where('deleted_at', 0);
		return  $this->db->get($this->table);
	}

	public function cekUsernameDuplicate($username, $id)
	{
		if ($id) {
			$this->db->where('id !=', $id);
		}
		$this->db->where('username', $username);
		$this->db->where('deleted_at', 0);
		return $this->db->get($this->table);
	}

	public function getUsernameByID($id)
	{
		$this->db->where($this->table . '.id', $id);
		return $this->db->get($this->table);
	}

	public function updateUser($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function insertUser($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}


	// pendaftaran awal
	public function getAllPendaftaranAwal()
	{
		$this->db->where('deleted_at', 0);
		return  $this->db->get($this->tablePendaftaranAwal);
	}

	public function getAllPendaftaranAwalNotDeleted()
	{
		$this->db->select($this->tablePendaftaranAwal . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableJurusan . '.nama_jurusan,' . $this->tableKelas . '.nama_kelas');
		$this->db->join($this->tableJurusan, $this->tableJurusan . '.id = ' . $this->tablePendaftaranAwal . '.id_jurusan');
		$this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableJurusan . '.id_tahun_pelajaran');
		$this->db->join($this->tableKelas, $this->tableKelas . '.id = ' . $this->tablePendaftaranAwal . '.id_kelas');
		$this->db->where($this->tablePendaftaranAwal . '.deleted_at', 0);
		return $this->db->get($this->tablePendaftaranAwal);
	}

	public function getPendaftaranAwalByID($id=null)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->tablePendaftaranAwal);
	}

	public function getKelasByJurusanID($id)
	{
		$this->db->where('deleted_at', 0);
		$this->db->where('id_jurusan', $id);
		return $this->db->get($this->tableKelas);
	}

	public function cekPendaftaranAwalDuplicate($email, $nik, $nisn, $id = null)
	{
		// Jika ID ada, pastikan kita mengecualikan ID tersebut
		if ($id !== null) {
			$this->db->where('id !=', $id);
		}

		// Periksa email, nik, nisn yang duplikat
		$this->db->where('email', $email);
		$this->db->where('nik', $nik);
		$this->db->where('nisn', $nisn);
		$this->db->where('deleted_at', 0); // Pastikan data tidak dihapus

		// Lakukan query
		$query = $this->db->get($this->tablePendaftaranAwal);

		// Jika ada hasil (email, nik, atau nisn sudah terdaftar)
		if ($query->num_rows() > 0) {
			return true;  // Data duplikat ditemukan
		}

		return false;  // Tidak ada duplikat
	}




	public function updatePendaftaranAwal($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->tablePendaftaranAwal, $data);
		return $this->db->affected_rows();
	}

	public function savePendaftaranAwal($data)
	{
		return $this->db->insert($this->tablePendaftaranAwal, $data);
	}


	// public function generateNamaPendaftaran($id_tahun_pelajaran, $id_jurusan)
	// {
	// 	// Cari nomor urut terakhir berdasarkan tahun pelajaran dan jurusan
	// 	$this->db->select('nama_pendaftaran');
	// 	$this->db->from('data_pendaftaran_awal');
	// 	$this->db->where('id_tahun_pelajaran', $id_tahun_pelajaran);
	// 	$this->db->where('id_jurusan', $id_jurusan);
	// 	$this->db->order_by('no_pendaftaran', 'DESC');
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();

	// 	// Cek apakah ada data
	// 	if ($query->num_rows() > 0) {
	// 		$row = $query->row();
	// 		$last_no = $row->nama_pendaftaran;
	// 		// Ambil nomor urut terakhir, misalnya 2025-TI-001 => 001
	// 		$last_number = intval(substr($last_no, strrpos($last_no, '-') + 1));
	// 		$next_number = $last_number + 1;
	// 	} else {
	// 		$next_number = 1; // Mulai dari 1 jika belum ada data
	// 	}

	// 	// Format nomor pendaftaran
	// 	$new_nama_pendaftaran = sprintf('%s-%s-%03d', $id_tahun_pelajaran, $id_jurusan, $next_number);

	// 	return $new_nama_pendaftaran;
	// }

	// public function insertNamapendaftaran($data)
	// {
	// 	return $this->db->insert('data_pendaftaran_awal', $data);
	// }

	public function getTableDataKelas()
	{
		$this->db->select('no_pendaftaran, id_tahun_pelajaran, id_jurusan, id_kelas');
		$this->db->from($this->tablePendaftaranAwal);
		$query = $this->db->get();
		return $query;
	}

	public function getTahunPelajaranNama($id)
	{
		// Mengambil nama_tahun_pelajaran berdasarkan id_tahun_pelajaran
		$this->db->select('nama_tahun_pelajaran');
		$this->db->from('data_tahun_pelajaran');  // Sesuaikan nama tabel
		$this->db->where('id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->nama_tahun_pelajaran;  // Mengembalikan nama_tahun_pelajaran
		} else {
			return null;  // Jika tidak ditemukan
		}
	}


	// Fungsi untuk mengambil jurusan berdasarkan ID
	public function getJurusanNama($id)
	{
		// Mengambil nama_jurusan berdasarkan id_jurusan
		$this->db->select('nama_jurusan');
		$this->db->from('data_jurusan');  // Sesuaikan nama tabel
		$this->db->where('id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->nama_jurusan;  // Mengembalikan nama_jurusan
		} else {
			return null;  // Jika tidak ditemukan
		}
	}


	public function getNamaJurusanByIdJurusan($id_jurusan)
	{
		$this->db->select('nama_jurusan');
		$this->db->from($this->tableJurusan);
		$this->db->where('id', $id_jurusan);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->nama_jurusan; // Mengembalikan nama_jurusan
		}

		return null; // Jika tidak ditemukan
	}
	public function getNamaTahunPelajaranByIdTahunPelajaran($id_tahun_pelajaran)
	{
		$this->db->select('nama_tahun_pelajaran');
		$this->db->from($this->tableTahunPelajaran);
		$this->db->where('id', $id_tahun_pelajaran);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->nama_tahun_pelajaran; // Mengembalikan nama_jurusan
		}

		return null; // Jika tidak ditemukan
	}

	public function formatTahunPelajaran($nama_tahun_pelajaran)
	{
		// Pastikan formatnya adalah "2024/2025"
		$tahun = explode('/', $nama_tahun_pelajaran);

		// Validasi apakah format sesuai
		if (count($tahun) < 2) {
			return '0000'; // Berikan nilai default jika format tidak sesuai
		}

		// Ambil dua digit terakhir dari masing-masing tahun
		$tahun_awal = substr($tahun[0], -2); // Contoh: "2024" jadi "24"
		$tahun_akhir = substr($tahun[1], -2); // Contoh: "2025" jadi "25"

		// Gabungkan menjadi format "2425"
		return $tahun_awal . $tahun_akhir;
	}


	public function hitungUrutanPendaftaran($id_tahun_pelajaran, $id_jurusan)
	{
		// Ambil ID terbesar untuk jurusan dan tahun pelajaran yang sesuai
		$this->db->select_max('id'); // Cari ID tertinggi
		$this->db->where('id_tahun_pelajaran', $id_tahun_pelajaran);
		$this->db->where('id_jurusan', $id_jurusan);
		$query = $this->db->get('data_pendaftaran_awal');
		$result = $query->row();

		// Jika belum ada data, urutan dimulai dari 1
		if (empty($result) || empty($result->id)) {
			return 1;
		}

		// Urutan berdasarkan ID tertinggi + 1
		return $result->id + 1;
	}



	public function generate($id_jurusan, $id_tahun_pelajaran, $id)
	{
		// Dapatkan nama jurusan dan tahun pelajaran
		$nama_jurusan = $this->getNamaJurusanByIdJurusan($id_jurusan);
		$nama_tahun_pelajaran = $this->getNamaTahunPelajaranByIdTahunPelajaran($id_tahun_pelajaran);

		// Format tahun pelajaran
		$format_tahun = $this->formatTahunPelajaran($nama_tahun_pelajaran);

		// Nomor pendaftaran: Tahun-Jurusan-Urutan
		$no_pendaftaran = $format_tahun . '-' . $nama_jurusan . '-' . str_pad($id, 4, '0', STR_PAD_LEFT);

		return $no_pendaftaran;
	}





	public function getById($tablePendaftaranAwal, $id)
	{
		$this->db->where('id', $id);  // Menambahkan kondisi untuk ID
		$query = $this->db->get($tablePendaftaranAwal);  // Melakukan query untuk mengambil data
		return $query->row();  // Mengembalikan baris pertama data yang ditemukan
	}

}

