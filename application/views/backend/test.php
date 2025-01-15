public function getAllHargaBiayaNotDeleted(){
$this->db->select($this->tableHargaBiaya . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableJurusan . '.nama_jurusan,' . $this->tableKelas . '.nama_kelas,' . $this->tableBiaya . '.nama_biaya,');
$this->db->join($this->tableBiaya, $this->tableBiaya . '.id = ' . $this->tableHargaBiaya . '.id_biaya');
$this->db->join($this->tableKelas, $this->tableKelas . '.id = ' . $this->tableHargaBiaya . '.id_kelas');
$this->db->join($this->tableJurusan, $this->tableJurusan . '.id = ' . $this->tableKelas . '.id_jurusan');
$this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tableJurusan . '.id_tahun_pelajaran');
$this->db->where($this->tableHargaBiaya . '.deleted_at', 0);
return $this->db->get($this->tableHargaBiaya);
}