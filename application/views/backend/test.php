    public function save_pendaftaran_awal()
    {
    $id = $this->input->post('id');
    $data = [
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

    // Validasi input
    $this->form_validation->set_rules('id_tahun_pelajaran', 'Tahun Pelajaran', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('nik', 'NIK', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('agama', 'agama', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('nisn', 'NISN', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('alamat_siswa', 'Alamat', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('no_telepon_siswa', 'No. Telepon Siswa', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('no_telepon_ayah', 'No. Telepon Ayah', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('no_telepon_ibu', 'No. Telepon Ibu', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('pekerjaan_wali', 'Pekerjaan Wali', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('alamat_orang_tua', 'Alamat Orang Tua', 'trim|required', array('required' => '%s harus diisi'));
    $this->form_validation->set_rules('sumber_informasi', 'Sumber Informasi', 'trim|required', array('required' => '%s harus diisi'));

    // Tambahkan validasi lain sesuai kebutuhan

    if ($this->form_validation->run() == FALSE) {
    $ret['status'] = false;
    foreach ($_POST as $key => $value) {
    $ret['error'][$key] = form_error($key);
    }
    } else {
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