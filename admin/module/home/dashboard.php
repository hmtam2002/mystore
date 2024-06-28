<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

$data = [
    'titlePage' => 'Quản trị website'
];

?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
        </ol>
    </nav>
    <div class="d-flex flex-column flex-md-row">
        <soan class="fs-2 fw-bold">Thống kê hoạt động</soan>
        <input type="date" class="px-3 py-2 py-md-0 ms-md-5" value="<?= date('Y-m-d') ?>">
        <div class="btn-group btn-sm ms-md-5">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-right fa-rotate-180"></i></button>
            <button class="btn btn-outline-success fw-bold ">Tuần này</button>
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
        <div class="btn-group btn-sm ms-md-5">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-right fa-rotate-180"></i></button>
            <button class="btn btn-outline-danger fw-bold ">Tháng này</button>
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>

    <p class="fw-bold fs-5 mt-3">Biểu đồ đơn hàng</p>
    <canvas id="myChart_donhang"></canvas>
    <p class="fw-bold fs-5 mt-3">Biểu đồ doanh thu</p>
    <canvas id="myChart_doanhthu"></canvas>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart_donhang');
        const doanhthu = document.getElementById('myChart_doanhthu');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
                datasets: [{
                    label: 'Đơn hàng',
                    data: [12, 19],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        new Chart(doanhthu, {
            type: 'bar',
            data: {
                labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
                datasets: [{
                    label: 'Doanh thu',
                    data: [12, 19],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</main>