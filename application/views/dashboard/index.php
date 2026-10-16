<?php $this->load->view('templates/header'); ?>

<h4 class="mb-1">Dashboard Kepegawaian IPPAT Kiara</h4>
<p class="text-muted mb-4">Data Pegawai</p>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary h-100 border-0 shadow-sm stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-6 opacity-75">Total Pegawai</div>
                        <div class="fs-2 fw-bold"><?= (int) $total ?></div>
                    </div>
                    <i class="bi bi-people-fill fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success h-100 border-0 shadow-sm stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-6 opacity-75">Jenis Status Kepegawaian</div>
                        <div class="fs-2 fw-bold"><?= count($statusKepegawaian) ?></div>
                    </div>
                    <i class="bi bi-briefcase-fill fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning h-100 border-0 shadow-sm stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-6 opacity-75">Jenis Golongan</div>
                        <div class="fs-2 fw-bold"><?= count($golongan) ?></div>
                    </div>
                    <i class="bi bi-bar-chart-fill fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info h-100 border-0 shadow-sm stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-6 opacity-75">Jenis Level PK</div>
                        <div class="fs-2 fw-bold"><?= count($levelPk) ?></div>
                    </div>
                    <i class="bi bi-award-fill fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Status Kepegawaian</strong></div>
            <div class="card-body">
                <canvas id="chartStatus" height="260"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Golongan</strong></div>
            <div class="card-body">
                <canvas id="chartGolongan" height="260"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Level PK</strong></div>
            <div class="card-body">
                <canvas id="chartLevelPk" height="260"></canvas>
            </div>
        </div>
    </div>
</div>

<hr class="my-5">

<p class="text-muted mb-4">Master Data</p>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary h-100 border-0 shadow-sm stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-6 opacity-75">Total Pegawai</div>
                        <div class="fs-2 fw-bold"><?= (int) $totalMaster ?></div>
                    </div>
                    <i class="bi bi-people-fill fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success h-100 border-0 shadow-sm stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-6 opacity-75">Jenis Status Kepegawaian</div>
                        <div class="fs-2 fw-bold"><?= count($statusKepegawaianMaster) ?></div>
                    </div>
                    <i class="bi bi-briefcase-fill fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning h-100 border-0 shadow-sm stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-6 opacity-75">Jenis Penempatan</div>
                        <div class="fs-2 fw-bold"><?= count($penempatanMaster) ?></div>
                    </div>
                    <i class="bi bi-bar-chart-fill fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info h-100 border-0 shadow-sm stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-6 opacity-75">Jenis Jabatan</div>
                        <div class="fs-2 fw-bold"><?= count($jabatanMaster) ?></div>
                    </div>
                    <i class="bi bi-award-fill fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Status Kepegawaian</strong></div>
            <div class="card-body">
                <canvas id="chartStatusMaster" height="260"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Penempatan</strong></div>
            <div class="card-body">
                <canvas id="chartPenempatanMaster" height="260"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Jabatan</strong></div>
            <div class="card-body">
                <canvas id="chartJabatanMaster" height="260"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
const palette = [
    '#0d6efd', '#198754', '#ffc107', '#0dcaf0', '#dc3545',
    '#6610f2', '#fd7e14', '#20c997', '#6f42c1', '#adb5bd',
];

function renderPieChart(canvasId, labels, data) {
    const ctx = document.getElementById(canvasId);
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: palette,
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
            },
        },
    });
}

function renderDoughnutChart(canvasId, labels, data) {
    const ctx = document.getElementById(canvasId);
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: palette,
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
            },
        },
    });
}

function renderBarChart(canvasId, labels, data) {
    const ctx = document.getElementById(canvasId);
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: palette,
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } },
            },
        },
    });
}

renderPieChart(
    'chartStatus',
    <?= json_encode(array_column($statusKepegawaian, 'label')) ?>,
    <?= json_encode(array_map('intval', array_column($statusKepegawaian, 'total'))) ?>
);
renderPieChart(
    'chartGolongan',
    <?= json_encode(array_column($golongan, 'label')) ?>,
    <?= json_encode(array_map('intval', array_column($golongan, 'total'))) ?>
);
renderPieChart(
    'chartLevelPk',
    <?= json_encode(array_column($levelPk, 'label')) ?>,
    <?= json_encode(array_map('intval', array_column($levelPk, 'total'))) ?>
);

renderBarChart(
    'chartStatusMaster',
    <?= json_encode(array_column($statusKepegawaianMaster, 'label')) ?>,
    <?= json_encode(array_map('intval', array_column($statusKepegawaianMaster, 'total'))) ?>
);
renderPieChart(
    'chartPenempatanMaster',
    <?= json_encode(array_column($penempatanMaster, 'label')) ?>,
    <?= json_encode(array_map('intval', array_column($penempatanMaster, 'total'))) ?>
);
renderDoughnutChart(
    'chartJabatanMaster',
    <?= json_encode(array_column($jabatanMaster, 'label')) ?>,
    <?= json_encode(array_map('intval', array_column($jabatanMaster, 'total'))) ?>
);
</script>

<?php $this->load->view('templates/footer'); ?>
