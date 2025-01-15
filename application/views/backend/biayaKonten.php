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
            <div class="btn btn-primary btnTambah mb-2"> <i class="fas fa-plus"></i> Tambah</div>
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <!-- Jenis Biaya -->
                <div class="tab-pane fade show active" id="jenis" role="tabpanel" aria-labelledby="tab-jenis">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach ($jenis_biaya as $index => $jenis): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo $jenis; ?></td>
                                </tr>
                            <?php endforeach; ?> -->
                        </tbody>
                    </table>
                </div>

                <!-- Harga Biaya -->
                <div class="tab-pane fade" id="harga" role="tabpanel" aria-labelledby="tab-harga">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Tahun Pelajaran</th>
                                <th>Jenis Biaya</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach ($harga_biaya as $index => $biaya): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo $biaya['kelas']; ?></td>
                                    <td><?php echo $biaya['tahun_pelajaran']; ?></td>
                                    <td><?php echo $biaya['jenis_biaya']; ?></td>
                                    <td>Rp. <?php echo number_format($biaya['harga'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>