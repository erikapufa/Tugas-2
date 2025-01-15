<?php
defined('BASEPATH') or exit('No direct script access allowed');

class biaya extends CI_Controller
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
            'content' => 'backend/biayaKonten',
            'title' => 'Admin'
        );
        $this->load->view('template', $data);
    }

    public function table_biaya()
    {
        $q = $this->md->getAllBiayaNotDeleted();
        $dt = [];
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $dt[] = $row;
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
    public function save()
    {
        $id = $this->input->post('id');
        $data['jenis_biaya'] = $this->input->post('jenis_biaya');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['deleted_at'] = 0;

        if ($data['jenis_biaya']) {
            $cek = $this->md->cekBiayaDuplicate($data['jenis_biaya'], $id);
            if ($cek->num_rows() > 0) {
                $ret['status'] = false;
                $ret['message'] = 'Data sudah ada';
                $ret['query'] = $this->db->last_query();
            } else {
                if ($id) {
                    $q = $this->md->updateBiaya($id, $data);
                    if ($q) {
                        $ret['status'] = true;
                        $ret['message'] = 'Data berhasil diupdate';
                    } else {
                        $ret['status'] = false;
                        $ret['message'] = 'Data gagal diupdate';
                    }
                } else {
                    $q = $this->md->saveBiaya($data);
                    if ($q) {
                        $ret['status'] = true;
                        $ret['message'] = 'Data berhasil disimpan';
                    } else {
                        $ret['status'] = false;
                        $ret['message'] = 'Data gagal disimpan';
                    }
                }
            }
        } else {
            $ret['status'] = false;
            $ret['message'] = 'Tahun Pelajaran tidak boleh kosong';
        }


        echo json_encode($ret);
    }

    public function edit()
    {

        $id = $this->input->post('id');
        $q = $this->md->getBiayaByID($id);
        if ($q->num_rows() > 0) {
            $ret = array(
                'status' => true,
                'data' => $q->row(),
                'message' => ''
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

    public function delete()
    {
        $id = $this->input->post('id');
        $data['deleted_at'] = time();
        $q = $this->md->updateBiaya($id, $data);
        if ($q) {
            $ret['status'] = true;
            $ret['message'] = 'Data berhasil dihapus';
        } else {
            $ret['status'] = false;
            $ret['message'] = 'Data gagal dihapus';
        }
        echo json_encode($ret);
    }

    //harga

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



    public function option_kelas($id)
    {

        $q = $this->md->getAllKelasNotDeleted($id);
        $ret = '<option value="">Pilih Kelas</option>';
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $ret .= '<option value="' . $row->id . '">' . $row->nama_kelas . '</option>';
            }
        }
        echo $ret;
    }

    public function option_jenis_biaya()
    {
        $q = $this->md->getAllBiaya();
        $ret = '<option value="">Pilih Biaya</option>';
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $ret .= '<option value="' . $row->id . '">' . $row->jenis_biaya . '</option>';
            }
        }
        echo $ret;
    }

    public function table_harga()
    {
        $q = $this->md->getAllHargaNotDeleted();
        $dt = [];
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $dt[] = $row;
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

    public function saveHarga()
    {

        $id = $this->input->post('id');
        $data['id_tahun_pelajaran'] = $this->input->post('id_tahun_pelajaran');
        $data['id_kelas'] = $this->input->post('id_kelas');
        $data['id_jenis_biaya'] = $this->input->post('id_jenis_biaya');
        $data['harga'] = $this->input->post('harga');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['deleted_at'] = 0;

        if ($data['harga']) {
            $cek = $this->md->cekHargaDuplicate($data['id_jenis_biaya'], $data['id_tahun_pelajaran'], $data['id_jurusan'], $data['id_kelas'], $id);
            if ($cek->num_rows() > 0) {
                $ret['status'] = false;
                $ret['message'] = 'Data terduplikasi';
                $ret['query'] = $this->db->last_query();
            } else {
                if ($id) {
                    $update = $this->md->updateHarga($id, $data);
                    if ($update) {
                        $ret = array(
                            'status' => true,
                            'message' => 'Data berhasil diupdate'
                        );
                    } else {
                        $ret = array(
                            'status' => false,
                            'message' => 'Data gagal diupdate'
                        );
                    }
                } else {
                    $insert = $this->md->insertHarga($data);

                    if ($insert) {
                        $ret = array(
                            'status' => true,
                            'message' => 'Data berhasil disimpan'
                        );
                    } else {
                        $ret = array(
                            'status' => false,
                            'message' => 'Data gagal disimpan'
                        );
                    }
                }
            }
        } else {
            $ret['status'] = false;
            $ret['message'] = 'Data tidak boleh kosong';
            $ret['query'] = $this->db->last_query();
        }
        echo json_encode($ret);
    }

    public function editHarga()
    {
        $id = $this->input->post('id');
        $q = $this->md->getHargaByID($id);
        if ($q->num_rows() > 0) {
            $ret['status'] = true;
            $ret['data'] = $q->row();
            $ret['message'] = '';
            $ret['query'] = $this->db->last_query();
        } else {
            $ret['status'] = false;
            $ret['data'] = [];
            $ret['message'] = 'Data tidak tersedia';
        }
        echo json_encode($ret);
    }

    public function deleteHarga()
    {
        $id = $this->input->post('id');
        $data['deleted_at'] = time();
        $q = $this->md->updateHarga($id, $data);
        if ($q) {
            $ret['status'] = true;
            $ret['message'] = 'Data berhasil dihapus';
        } else {
            $ret['status'] = false;
            $ret['message'] = 'Data gagal dihapus';
        }
        echo json_encode($ret);
    }
}

/* End of file: Kelas.php */