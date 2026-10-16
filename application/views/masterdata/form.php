<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0"><?= $mode === 'create' ? 'Tambah Data' : 'Edit Data' ?> Master Data</h4>
    <a href="<?= site_url('masterdata') ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $err): ?><li><?= htmlspecialchars($err) ?></li><?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form method="post">
            <div class="form-section">
                <div class="form-section-title">
                    <span class="badge-icon"><i class="bi bi-person"></i></span> Data Pribadi
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-2">
                        <label class="form-label">No. Urut</label>
                        <input type="number" name="no_urut" class="form-control" value="<?= htmlspecialchars($row['no_urut'] ?? '') ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">NIP/NPS</label>
                        <input type="text" name="nip_nps" class="form-control" value="<?= htmlspecialchars($row['nip_nps'] ?? '') ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Status Kepegawaian</label>
                        <input type="text" name="status_kepegawaian" class="form-control" placeholder="PNS/PPPK/NPS/Magang" value="<?= htmlspecialchars($row['status_kepegawaian'] ?? '') ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Golongan</label>
                        <input type="text" name="golongan" class="form-control" value="<?= htmlspecialchars($row['golongan'] ?? '') ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jabatan Fungsional</label>
                        <input type="text" name="jabatan_fungsional" class="form-control" value="<?= htmlspecialchars($row['jabatan_fungsional'] ?? '') ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Status Keluarga</label>
                        <input type="text" name="status_keluarga" class="form-control" placeholder="Menikah/Belum menikah/Cerai" value="<?= htmlspecialchars($row['status_keluarga'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="<?= htmlspecialchars($row['tempat_lahir'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="<?= htmlspecialchars($row['tanggal_lahir'] ?? '') ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email Aktif</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($row['email'] ?? '') ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No NIK</label>
                        <input type="text" name="nik" class="form-control" maxlength="20" value="<?= htmlspecialchars($row['nik'] ?? '') ?>">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="form-section-title">
                    <span class="badge-icon"><i class="bi bi-mortarboard"></i></span> Pendidikan &amp; Karier
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-control" value="<?= htmlspecialchars($row['pendidikan'] ?? '') ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" class="form-control" value="<?= htmlspecialchars($row['tahun_lulus'] ?? '') ?>">
                    </div>
                    <div class="col-md-7">
                        <label class="form-label">Asal Pendidikan/Universitas</label>
                        <input type="text" name="asal_pendidikan" class="form-control" value="<?= htmlspecialchars($row['asal_pendidikan'] ?? '') ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">TMT Bekerja sebagai Perawat di RS</label>
                        <input type="date" name="tmt_bekerja" class="form-control" value="<?= htmlspecialchars($row['tmt_bekerja'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Level PK Saat Ini</label>
                        <input type="text" name="level_pk" class="form-control" value="<?= htmlspecialchars($row['level_pk'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">IP ASN</label>
                        <input type="number" name="ip_asn" class="form-control" value="<?= htmlspecialchars($row['ip_asn'] ?? '') ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Masa Berlaku STR</label>
                        <input type="text" name="masa_berlaku_str" class="form-control" placeholder="Seumur Hidup / tanggal" value="<?= htmlspecialchars($row['masa_berlaku_str'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Masa Berlaku SPK</label>
                        <input type="text" name="masa_berlaku_spk" class="form-control" value="<?= htmlspecialchars($row['masa_berlaku_spk'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Masa Berlaku SIP</label>
                        <input type="text" name="masa_berlaku_sip" class="form-control" value="<?= htmlspecialchars($row['masa_berlaku_sip'] ?? '') ?>">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="form-section-title">
                    <span class="badge-icon"><i class="bi bi-geo-alt"></i></span> Penempatan
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-4">
                        <label class="form-label">Penempatan</label>
                        <input type="text" name="penempatan" class="form-control" value="<?= htmlspecialchars($row['penempatan'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="<?= htmlspecialchars($row['jabatan'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="<?= htmlspecialchars($row['keterangan'] ?? '') ?>">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="form-section-title">
                    <span class="badge-icon"><i class="bi bi-heart-pulse"></i></span> Kesehatan
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Status Kesehatan</label>
                        <input type="text" name="status_kesehatan" class="form-control" value="<?= htmlspecialchars($row['status_kesehatan'] ?? '') ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Diagnosa Utama</label>
                        <input type="text" name="diagnosa_utama" class="form-control" value="<?= htmlspecialchars($row['diagnosa_utama'] ?? '') ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Komorbid</label>
                        <input type="text" name="komorbid" class="form-control" value="<?= htmlspecialchars($row['komorbid'] ?? '') ?>">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">BB (kg)</label>
                        <input type="text" name="bb" class="form-control" value="<?= htmlspecialchars($row['bb'] ?? '') ?>">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">TB (cm)</label>
                        <input type="text" name="tb" class="form-control" value="<?= htmlspecialchars($row['tb'] ?? '') ?>">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">BMI</label>
                        <input type="text" name="bmi" class="form-control" value="<?= htmlspecialchars($row['bmi'] ?? '') ?>">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="form-section-title">
                    <span class="badge-icon"><i class="bi bi-journal-text"></i></span> Pelatihan &amp; Workshop yang Diikuti
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-12">
                        <textarea name="pelatihan" class="form-control" rows="5"><?= htmlspecialchars($row['pelatihan'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-action-bar">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                <a href="<?= site_url('masterdata') ?>" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
