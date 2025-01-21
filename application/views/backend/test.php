<script>
    public
    function save_tahun_pelajaran() {

        $id = $this - > input - > post('id');
        $data['nama_tahun_pelajaran'] = $this - > input - > post('nama_tahun_pelajaran');
        $data['tanggal_mulai'] = $this - > input - > post('tanggal_mulai');
        $data['tanggal_akhir'] = $this - > input - > post('tanggal_akhir');
        $data['status_tahun_pelajaran'] = $this - > input - > post('status_tahun_pelajaran');

        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['deleted_at'] = 0;

        $this - > form_validation - > set_rules('nama_tahun_pelajaran', 'Tahun Pelajaran', 'trim|required|regex_match[/^\d{4}\/\d{4}$/]', array('required' => '%s harus diisi', 'regex_match' => 'Format Tahun Pelajaran salah.'));
        $this - > form_validation - > set_rules('tanggal_mulai', 'Tanggal Mulai', 'trim|required', array('required' => '%s harus diisi'));
        $this - > form_validation - > set_rules('tanggal_akhir', 'Tanggal Akhir', 'trim|required', array('required' => '%s harus diisi'));
        $this - > form_validation - > set_rules('status_tahun_pelajaran', 'Status Tahun Pelajaran', 'trim|required', array('required' => '%s harus diisi'));

        if ($this - > form_validation - > run() == FALSE) {
            $ret['status'] = false;
            foreach($_POST as $key => $value) {
                $ret['error'][$key] = form_error($key);
            }
        } else {
            // if($data['nama_tahun_pelajaran']){
            // $cek = $this->md->cekTahunPelajaranDuplicate($data['nama_tahun_pelajaran'], $id);
            // if ($cek->num_rows() > 0) {
            // $ret['status'] = false;
            // $ret['message'] = 'Tahun Pelajaran sudah ada';
            // $ret['query'] = $this->db->last_query();
            // } else {
            if ($id) {
                $update = $this - > md - > updateTahunPelajaran($id, $data);
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
                $data['created_at'] = date('Y-m-d H:i:s');
                $insert = $this - > md - > insertTahunPelajaran($data);

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
     

        echo json_encode($ret);
    }
</script>