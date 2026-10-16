<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div class="d-flex align-items-center gap-3">
        <span class="page-title-icon"><i class="bi bi-people"></i></span>
        <div>
            <h4 class="mb-0">Data Kepegawaian IPPAT Kiara</h4>
            <small class="text-muted"><?= (int) $total ?> pegawai terdaftar</small>
        </div>
    </div>
    <a href="<?= site_url('datakiara/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Data
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white search-card border-0 pt-3">
        <form method="get" class="row g-2">
            <div class="col-sm-8 col-md-5">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="q" class="form-control"
                           placeholder="Cari nama, NIP/NPS, NIK, penempatan, atau jabatan..."
                           value="<?= htmlspecialchars($search) ?>">
                </div>
            </div>
            <div class="col-sm-4 col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
            <?php if ($search !== ''): ?>
            <div class="col-sm-4 col-md-2">
                <a href="<?= site_url('datakiara') ?>" class="btn btn-outline-secondary w-100">Reset</a>
            </div>
            <?php endif; ?>
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-modern mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">Pegawai</th>
                        <th>NIP/NPS</th>
                        <th>NIK</th>
                        <th>Penempatan</th>
                        <th>Jabatan</th>
                        <th>Level PK</th>
                        <th>Status Kesehatan</th>
                        <th class="text-center pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($rows)): ?>
                        <tr><td colspan="8" class="text-center text-muted py-5">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                            Tidak ada data<?= $search !== '' ? ' yang cocok dengan pencarian' : '' ?>.
                        </td></tr>
                    <?php else: ?>
                        <?php foreach ($rows as $row):
                            $initial = mb_strtoupper(mb_substr(trim($row['nama']), 0, 1));
                            $sehat = strcasecmp(trim((string) ($row['status_kesehatan'] ?? '')), 'Sehat') === 0;
                        ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="avatar-initial"><?= htmlspecialchars($initial) ?></span>
                                        <div>
                                            <a href="<?= site_url('datakiara/edit/' . $row['id']) ?>" class="fw-semibold text-decoration-none"><?= htmlspecialchars($row['nama']) ?></a>
                                            <div><small class="text-muted">No. <?= (int) $row['no_urut'] ?></small></div>
                                        </div>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($row['nip_nps'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['nik'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['penempatan'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['jabatan'] ?? '-') ?></td>
                                <td>
                                    <?php if (!empty($row['level_pk'])): ?>
                                        <span class="badge rounded-pill text-bg-primary"><?= htmlspecialchars($row['level_pk']) ?></span>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (!empty($row['status_kesehatan'])): ?>
                                        <span class="badge rounded-pill <?= $sehat ? 'text-bg-success' : 'text-bg-warning' ?>">
                                            <?= htmlspecialchars($row['status_kesehatan']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center text-nowrap pe-4">
                                    <a href="<?= site_url('datakiara/edit/' . $row['id']) ?>" class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></a>
                                    <a href="<?= site_url('datakiara/delete/' . $row['id']) ?>" class="btn btn-sm btn-outline-danger" title="Hapus"
                                       onclick="return confirm('Hapus data ini? Tindakan ini tidak bisa dibatalkan.');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white d-flex justify-content-between align-items-center flex-wrap gap-2">
        <small class="text-muted">Total: <?= (int) $total ?> data</small>
        <?= $pagination ?>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
