<div class="container mt-5">
    <!-- Card for Navtabs -->
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab-jenis" data-toggle="pill" href="#jenis" role="tab" aria-controls="jenis" aria-selected="true">
                        <i class="fas fa-tshirt"></i> Jenis Seragam
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-stok" data-toggle="pill" href="#stok" role="tab" aria-controls="stok" aria-selected="false">
                        <i class="fas fa-box"></i> Stok Seragam
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <!-- Jenis Seragam -->
                <div class="tab-pane fade show active" id="jenis" role="tabpanel" aria-labelledby="tab-jenis">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Seragam</th>
                                <th>Ukuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach ($jenis_seragam as $index => $seragam): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo $seragam['jenis']; ?></td>
                                    <td><?php echo $seragam['ukuran']; ?></td>
                                </tr>
                            <?php endforeach; ?> -->
                        </tbody>
                    </table>
                </div>

                <!-- Stok Seragam -->
                <div class="tab-pane fade" id="stok" role="tabpanel" aria-labelledby="tab-stok">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Seragam</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach ($stok_seragam as $index => $stok): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo $stok['jenis']; ?></td>
                                    <td><?php echo $stok['jumlah']; ?></td>
                                </tr>
                            <?php endforeach; ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>