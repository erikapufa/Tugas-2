<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterdata_model extends CI_Model
{

    protected $tableTahunPelajaran = 'data_tahun_pelajaran';
    protected $tableKelas = 'data_kelas';
    protected $tableJurusan = 'data_jurusan';
    protected $tableSeragam = 'data_seragam';
    protected $tableBiaya = 'data_biaya';
    protected $tableHarga = 'data_harga';
    protected $tableStok = 'data_stok';


    public function __construct()
    {
        parent::__construct();
    }


    public function getAllTahunPelajaran()
    {
        return $this->db->get($this->tableTahunPelajaran);
    }

    public function getAllTahunPelajaranNotDeleted()
    {
        $this->db->where('deleted_at', 0);
        return $this->db->get($this->tableTahunPelajaran);
    }
    public function getTahunPelajaranByName($nama_tahun_pelajaran)
    {
        $this->db->where('nama_tahun_pelajaran', $nama_tahun_pelajaran);
        return $this->db->get($this->tableTahunPelajaran);
    }

    public function getTahunPelajaranByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->tableTahunPelajaran);
    }

    public function cekTahunPelajaranDuplicate($nama_tahun_pelajaran, $id)
    {
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $this->db->where('nama_tahun_pelajaran', $nama_tahun_pelajaran);
        return $this->db->get($this->tableTahunPelajaran);
    }

    public function saveTahunPelajaran($data)
    {
        $this->db->insert($this->tableTahunPelajaran, $data);
        return $this->db->insert_id();
    }
    public function updateTahunPelajaran($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->tableTahunPelajaran, $data);
        return $this->db->affected_rows();
    }

    public function deleteTahunPelajaran($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tableTahunPelajaran);
        return $this->db->affected_rows();
    }



    public function getAllJurusan()
    {
        return $this->db->get($this->tableJurusan);
    }
    public function getAllJurusanNotDeleted()
    {
        $this->db->select($this->tableJurusan . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran');
        $this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableJurusan . '.id_tahun_pelajaran');
        $this->db->where($this->tableJurusan . '.deleted_at', 0);
        return $this->db->get($this->tableJurusan);
    }

    public function getJurusanByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->tableJurusan);
    }

    public function getJurusanByTahunPelajaranID($id)
    {
        $this->db->where('id_tahun_pelajaran', $id);
        return $this->db->get($this->tableJurusan);
    }

    public function cekJurusanDuplicate($nama_jurusan, $id_tahun_pelajaran, $id)
    {
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $this->db->where('id_tahun_pelajaran =', $id_tahun_pelajaran);
        $this->db->where('nama_jurusan', $nama_jurusan);
        return $this->db->get($this->tableJurusan);
    }

    public function saveJurusan($data)
    {
        $this->db->insert($this->tableJurusan, $data);
        return $this->db->insert_id();
    }

    public function updateJurusan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->tableJurusan, $data);
        return $this->db->affected_rows();
    }

    public function deleteJurusan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tableJurusan);
        return $this->db->affected_rows();
    }

    # code...

    public function getAllKelas()
    {
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

    public function getKelasByID($id)
    {
        $this->db->select($this->tableKelas . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableJurusan . '.nama_jurusan, ' . $this->tableJurusan . '.id_tahun_pelajaran');
        $this->db->join($this->tableJurusan, $this->tableJurusan . '.id = ' . $this->tableKelas . '.id_jurusan', 'left');
        $this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableJurusan . '.id_tahun_pelajaran', 'left');
        $this->db->where($this->tableKelas . '.deleted_at', 0);
        $this->db->where($this->tableKelas . '.id', $id);
        return $this->db->get($this->tableKelas);
    }

    public function cekKelasDuplicate($nama_kelas, $id_jurusan, $id)
    {
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $this->db->where('id_jurusan', $id_jurusan);
        $this->db->where('nama_kelas', $nama_kelas);
        return $this->db->get($this->tableKelas);
    }

    public function saveKelas($data)
    {
        $this->db->insert($this->tableKelas, $data);
        return $this->db->insert_id();
    }

    public function updateKelas($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->tableKelas, $data);
        return $this->db->affected_rows();
    }

    public function deleteKelas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tableKelas);
        return $this->db->affected_rows();
    }



    // DATA BIAYA
    public function getAllBiaya()
    {
        return $this->db->get($this->tableBiaya);
    }

    public function getAllBiayaNotDeleted()
    {
        $this->db->where('deleted_at', 0);
        return $this->db->get($this->tableBiaya);
    }
    public function getBiayaByName($jenis_biaya)
    {
        $this->db->where('jenis_biaya', $jenis_biaya);
        return $this->db->get($this->tableBiaya);
    }

    public function getBiayaByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->tableBiaya);
    }

    public function cekBiayaDuplicate($jenis_biaya, $id)
    {
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $this->db->where('jenis_biaya', $jenis_biaya);
        return $this->db->get($this->tableBiaya);
    }

    public function saveBiaya($data)
    {
        $this->db->insert($this->tableBiaya, $data);
        return $this->db->insert_id();
    }
    public function updateBiaya($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->tableBiaya, $data);
        return $this->db->affected_rows();
    }

    public function deleteBiaya($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tableBiaya);
        return $this->db->affected_rows();
    }


    // Kelas
    public function getAllHarga()
    {
        return $this->db->get($this->tableHarga);
    }
    public function getAllHargaNotDeleted()
    {
        $this->db->select($this->tableHarga . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableKelas . '.nama_kelas, ' . $this->tableBiaya . '.jenis_biaya');
        $this->db->join($this->tableKelas, $this->tableKelas . '.id = ' . $this->tableHarga . '.id_kelas');
        $this->db->join($this->tableBiaya, $this->tableBiaya . '.id = ' . $this->tableHarga . '.id_jenis_biaya');
        $this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableKelas . '.id_tahun_pelajaran');
        $this->db->where($this->tableHarga . '.deleted_at', 0); // Konsistensi deleted_at di tableHarga
        return $this->db->get($this->tableHarga);
    }

    public function getHargaByID($id)
    {
        $this->db->select($this->tableHarga . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableKelas . '.nama_kelas, ' . $this->tableBiaya . '.jenis_biaya');
        $this->db->join($this->tableKelas, $this->tableKelas . '.id = ' . $this->tableHarga . '.id_kelas', 'left'); // Koreksi join
        $this->db->join($this->tableBiaya, $this->tableBiaya . '.id = ' . $this->tableHarga . '.id_jenis_biaya', 'left'); // Tambahkan join jika perlu
        $this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableKelas . '.id_tahun_pelajaran', 'left');
        $this->db->where($this->tableHarga . '.deleted_at', 0); // Konsistensi deleted_at di tableHarga
        $this->db->where($this->tableHarga . '.id', $id);
        return $this->db->get($this->tableHarga);
    }

    public function saveHarga($data)
    {
        $this->db->insert($this->tableHarga, $data);
        return $this->db->insert_id();
    }

    public function updateHarga($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->tableHarga, $data);
        return $this->db->affected_rows();
    }

    public function deleteHarga($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tableHarga);
        return $this->db->affected_rows();
    }

    // seragam
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

    public function deleteSeragam($id = null)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tableSeragam);
        return $this->db->affected_rows();
    }



    // stok

    public function getAllStokNotDeleted()
    {
        $this->db->select($this->tableStok . '.*, '
            . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, '
            . $this->tableJurusan . '.nama_jurusan, '
            . $this->tableKelas . '.nama_kelas, '
            . $this->tableSeragam . '.nama_seragam');

        $this->db->join($this->tableSeragam, $this->tableSeragam . '.id = ' . $this->tableStok . '.id_seragam');
        $this->db->join($this->tableKelas, $this->tableKelas . '.id = ' . $this->tableStok . '.id_kelas');
        $this->db->join($this->tableJurusan, $this->tableJurusan . '.id = ' . $this->tableKelas . '.id_jurusan');
        $this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableJurusan . '.id_tahun_pelajaran');

        $this->db->where($this->tableStok . '.deleted_at', 0);

        return $this->db->get($this->tableStok);
    }


    public function cekStokDuplicate($id_seragam, $id_tahun_pelajaran, $id_jurusan, $id_kelas, $id)
    {
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $this->db->where('id_biaya', $id_seragam);
        $this->db->where('id_tahun_pelajaran', $id_tahun_pelajaran);
        $this->db->where('id_jurusan', $id_jurusan);
        $this->db->where('id_kelas', $id_kelas);
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
        $this->db->select($this->tableStok . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableJurusan . '.nama_jurusan,' . $this->tableKelas . '.nama_kelas,' . $this->tableSeragam . '.nama_seragam,');
        $this->db->join($this->tableSeragam, $this->tableSeragam . '.id = ' . $this->tableStok . '.id_seragam');
        $this->db->join($this->tableKelas, $this->tableKelas . '.id = ' . $this->tableStok . '.id_kelas');
        $this->db->join($this->tableJurusan, $this->tableJurusan . '.id = ' . $this->tableKelas . '.id_jurusan');
        $this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableJurusan . '.id_tahun_pelajaran');
        $this->db->where($this->tableStok . '.deleted_at', 0);
        $this->db->where($this->tableStok . '.id', $id);
        return $this->db->get($this->tableStok);
    }

    public function deleteStok($id = null)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tableStok);
        return $this->db->affected_rows();
    }


    //User
    public function getUserAll()
    {
        $q = $this->db->get($this->table);
        return $q->result();
    }

    public function getUserByID($id = null)
    {
        $q = $this->db->where('id', $id)->get($this->table);
        return $q;
    }

    public function getUserByUsername($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('users')->row();
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

    public function deleteUser($id = null)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function check_user($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $q = $this->db->get('user');
        return $q->row();
    }

    public function getUserByUsernameExceptId($username, $id)
    {
        $this->db->where('username', $username);
        $this->db->where('id !=', $id);
        return $this->db->get('users')->row();
    }
}

   



/* End of file: Masterdata_model.php */