<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_Awal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Masterdata_model', 'md');
    }

    public function index()
    {
        $data = array(
            'menu' => 'backend/menu',
            'content' => 'backend/pendaftaranAwalKonten',
            'title' => 'Admin'
        );
        $this->load->view('template', $data);
    }

    public function option_tahun_pelajaran()
    {
        $q = $this->md->getAllTahunPelajaranNotDeleted();
        $ret = '<option value="">Pilih Tahun Pelajaran</option>';
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $ret .= '<option value="' . $row->id . '">' . $row->nama_tahun_pelajaran . '</option>';
            }
        }
        echo $ret;
    }

    public function option_jurusan($id = null)
    {
        $id = $id ?? $this->input->get('id_tahun_pelajaran');
        if (!$id) {
            echo '<option value="">Pilih Jurusan</option>';
            return;
        }

        $q = $this->md->getJurusanByTahunPelajaranID($id);
        $ret = '<option value="">Pilih Jurusan</option>';
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $ret .= '<option value="' . $row->id . '">' . $row->nama_jurusan . '</option>';
            }
        }
        echo $ret;
    }


    public function option_kelas($id = null)
    {
        // Validasi apakah $id ada
        if (!$id) {
            echo '<option value="">Pilih Kelas</option>';
            return;
        }

        // Ambil data kelas berdasarkan ID jurusan
        $q = $this->md->getKelasByJurusanID($id);
        $ret = '<option value="">Pilih Kelas</option>';
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $ret .= '<option value="' . $row->id . '">' . $row->nama_kelas . '</option>';
            }
        }
        echo $ret;
    }


    public function table_pendaftaran_awal()
    {
        // Menggunakan query builder yang lebih terstruktur
        $this->db->select([
            'data_pendaftaran_awal.id',
            'data_pendaftaran_awal.id_tahun_pelajaran',
            'tahun_pelajaran.nama_tahun_pelajaran',
            'data_pendaftaran_awal.id_jurusan',
            'jurusan.nama_jurusan',
            'data_pendaftaran_awal.id_kelas',
            'kelas.nama_kelas'
        ]);

        // Menentukan tabel utama
        $this->db->from('data_pendaftaran_awal');

        // Melakukan join dengan tabel terkait
        $this->db->join(
            'data_tahun_pelajaran as tahun_pelajaran',
            'data_pendaftaran_awal.id_tahun_pelajaran = tahun_pelajaran.id',
            'left'
        ); // Pastikan menggunakan left join atau jenis join yang sesuai

        $this->db->join(
            'data_jurusan as jurusan',
            'data_pendaftaran_awal.id_jurusan = jurusan.id',
            'left'
        ); // Sama dengan di atas, pastikan jenis join benar

        $this->db->join(
            'data_kelas as kelas',
            'data_pendaftaran_awal.id_kelas = kelas.id',
            'left'
        ); // Samakan dengan yang lain

        // Menambahkan kondisi untuk tidak mengambil data yang dihapus
        $this->db->where('data_pendaftaran_awal.deleted_at', 0);

        // Eksekusi query
        $query = $this->db->get();

        // Menyusun data hasil query
        $response = [];

        if ($query->num_rows() > 0) {
            $data = [];
            foreach ($query->result() as $row) {
                $data[] = [
                    'id' => $row->id,
                    'id_tahun_pelajaran' => $row->id_tahun_pelajaran,
                    'nama_tahun_pelajaran' => $row->nama_tahun_pelajaran,
                    'id_jurusan' => $row->id_jurusan,
                    'nama_jurusan' => $row->nama_jurusan,
                    'id_kelas' => $row->id_kelas,
                    'nama_kelas' => $row->nama_kelas
                ];
            }

            // Menyusun response sukses
            $response['status'] = true;
            $response['data'] = $data;
            $response['message'] = '';
        } else {
            // Response ketika data tidak ditemukan
            $response['status'] = false;
            $response['data'] = [];
            $response['message'] = 'Data tidak tersedia';
        }

        // Mengirimkan response dalam format JSON
        echo json_encode($response);
    }

    public function table_siswa()
    {
        $q = $this->md->getAllPendaftaranAwalNotDeleted();
        $dt = [];
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $dt[] = [
                    'id' => $row->id,
                    'nama_siswa' => $row->nama_siswa,
                    'nik' => $row->nik,
                    'agama' => $row->agama,
                    'nisn' => $row->nisn,
                    'jenis_kelamin' => $row->jenis_kelamin,
                    'tempat_lahir' => $row->tempat_lahir,
                    'tanggal_lahir' => $row->tanggal_lahir,
                    'alamat_siswa' => $row->alamat_siswa,
                    'no_telepon_siswa' => $row->no_telepon_siswa,
                    'email' => $row->email,
                    'asal_sekolah' => $row->asal_sekolah,
                ];
            }
            $ret['status'] = true;
            $ret['data'] = $dt;
            $ret['message'] = '';
        } else {
            $ret['status'] = false;
            $ret['data'] = [];
            $ret['message'] = 'Data tidak tersedia';
        }
        echo json_encode($ret);
    }

    public function table_orangtua()
    {
        $q = $this->md->getAllPendaftaranAwalNotDeleted();
        $dt = [];
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $dt[] = [
                    'id' => $row->id,
                    'nama_ayah' => $row->nama_ayah,
                    'nama_ibu' => $row->nama_ibu,
                    'no_telepon_ayah' => $row->no_telepon_ayah,
                    'no_telepon_ibu' => $row->no_telepon_ibu,
                    'pekerjaan_ayah' => $row->pekerjaan_ayah,
                    'pekerjaan_ibu' => $row->pekerjaan_ibu,
                    'nama_wali' => $row->nama_wali,
                    'no_telepon_wali' => $row->no_telepon_wali,
                    'pekerjaan_wali' => $row->pekerjaan_wali,
                    'alamat_orang_tua' => $row->alamat_orang_tua,
                    'sumber_informasi' => $row->sumber_informasi,
                ];
            }
            $ret['status'] = true;
            $ret['data'] = $dt;
            $ret['message'] = '';
        } else {
            $ret['status'] = false;
            $ret['data'] = [];
            $ret['message'] = 'Data tidak tersedia';
        }
        echo json_encode($ret);
    }
    public function save_pendaftaran_awal()
    {
        $id = $this->input->post('id');
        $data = [
            // 'no_pendaftaran' => $no_pendaftaran,
            'id_tahun_pelajaran' => $this->input->post('id_tahun_pelajaran'),
            'id_jurusan' => $this->input->post('id_jurusan'),
            'id_kelas' => $this->input->post('id_kelas'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'nik' => $this->input->post('nik'),
            'agama' => $this->input->post('agama'),
            'nisn' => $this->input->post('nisn'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_siswa' => $this->input->post('alamat_siswa'),
            'no_telepon_siswa' => $this->input->post('no_telepon_siswa'),
            'email' => $this->input->post('email'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'no_telepon_ayah' => $this->input->post('no_telepon_ayah'),
            'no_telepon_ibu' => $this->input->post('no_telepon_ibu'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'nama_wali' => $this->input->post('nama_wali'),
            'no_telepon_wali' => $this->input->post('no_telepon_wali'),
            'pekerjaan_wali' => $this->input->post('pekerjaan_wali'),
            'alamat_orang_tua' => $this->input->post('alamat_orang_tua'),
            'sumber_informasi' => $this->input->post('sumber_informasi'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => 0
        ];

        if (!$id) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }
        // $data['no_pendaftaran'] = $this->md->generateNomorPendaftaran($data['id_tahun_pelajaran'], $data['id_jurusan']);;

        $this->form_validation->set_rules('id_tahun_pelajaran', 'Tahun Pelajaran', 'trim|required', array('required' => '%s harus diisi'));
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required', array('required' => '%s harus diisi'));
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required', array('required' => '%s harus diisi'));

        if ($this->form_validation->run() == FALSE) {
            $ret['status'] = false;
            foreach ($_POST as $key => $value) {
                $ret['error'][$key] = form_error($key);
            }
        } else {
            // Simpan atau update data
            if ($id) {
                $update = $this->md->updatePendaftaranAwal($id, $data);
                $ret = $update ?
                    ['status' => true, 'message' => 'Data berhasil diupdate'] :
                    ['status' => false, 'message' => 'Data gagal diupdate'];
            } else {
                $insert = $this->md->savePendaftaranAwal($data);
                $ret = $insert ?
                    ['status' => true, 'message' => 'Data berhasil disimpan'] :
                    ['status' => false, 'message' => 'Data gagal disimpan'];
            }
        }

        echo json_encode($ret);
    }

    public function edit_pendaftaran_awal()
    {
        $id = $this->input->post('id');
        $q = $this->md->getPendaftaranAwalByID($id);

        if ($q->num_rows() > 0) {
            $ret = array(
                'status' => true,
                'data' => $q->row(),
                'message' => '',
            );
        } else {
            $ret = array(
                'status' => false,
                'data' => [],
                'message' => 'Data tidak ditemukan',
                'query' => $this->db->last_query()
            );
        }

        echo json_encode($ret);
    }

    public function delete_pendaftaran_awal()
    {
        $id = $this->input->post('id');
        $data['deleted_at'] = time();
        $q = $this->md->updatePendaftaranAwal($id, $data);
        if ($q) {
            $ret = [
                'status' => true,
                'message' => 'Data berhasil dihapus'
            ];
        } else {
            $ret = [
                'status' => false,
                'message' => 'Data gagal dihapus'
            ];
        }
        echo json_encode($ret);
    }

    
}
