<?php
if (!defined("_CODE"))
{
    exit("Access denied...");
}

$data = [
    'titlePage' => 'Quản trị website'
];

// Xử lý yêu cầu cho biểu đồ tháng
if (isset($_GET['month']))
{
    $data = $db->getRaw('SELECT code,order_date,price FROM orders WHERE status <> 5');
    $month = $_GET['month'];
    $startOfMonth = date('Y-m-01', strtotime($month));
    $endOfMonth = date('Y-m-t', strtotime($month));

    $totalRevenue = 0;
    $totalOrderCount = 0;

    foreach ($data as $order)
    {
        $orderDate = date('Y-m-d', strtotime($order['order_date']));
        if ($orderDate >= $startOfMonth && $orderDate <= $endOfMonth)
        {
            $totalRevenue += $order['price'];
            $totalOrderCount++;
        }
    }

    // Gửi dữ liệu về dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode([
        'totalRevenue' => $totalRevenue,
        'totalOrderCount' => $totalOrderCount
    ]);
    exit;
}

if (isset($_GET['week']))
{
    $week = $_GET['week'];

    // // Mảng dữ liệu của bạn (dữ liệu mẫu)
    // $data = [
    //     ['code' => 'B6Typ7', 'order_date' => '2024-07-10 15:31:29', 'price' => 1800000],
    //     ['code' => 'xPSiia', 'order_date' => '2024-07-11 10:19:18', 'price' => 480000],
    //     // Các phần tử khác ở đây...
    //     ['code' => '2rSN42', 'order_date' => '2024-07-17 00:25:55', 'price' => 50000],
    // ];

    $data = $db->getRaw('SELECT code,order_date,price FROM orders WHERE status <> 5');

    // Tách năm và tuần từ giá trị tuần
    list($year, $weekNumber) = explode('-W', $week);

    // Tính ngày bắt đầu và kết thúc của tuần
    $dto = new DateTime();
    $dto->setISODate($year, $weekNumber);
    $startOfWeek = $dto->format('Y-m-d');
    $endOfWeek = $dto->modify('+6 days')->format('Y-m-d');

    // Tạo mảng để lưu tổng doanh thu và số lượng đơn hàng theo ngày trong tuần
    $revenueByDay = array_fill(0, 7, 0);
    $orderCountByDay = array_fill(0, 7, 0);

    // Duyệt qua mảng và tính tổng doanh thu cùng số lượng đơn hàng cho mỗi ngày trong tuần
    foreach ($data as $order)
    {
        $orderDate = date('Y-m-d', strtotime($order['order_date']));
        if ($orderDate >= $startOfWeek && $orderDate <= $endOfWeek)
        {
            $dayOfWeek = date('N', strtotime($orderDate)) - 1; // 0 (Thứ 2) đến 6 (Chủ nhật)
            $revenueByDay[$dayOfWeek] += $order['price'];
            $orderCountByDay[$dayOfWeek] += 1;
        }
    }

    // Trả về dữ liệu dạng JSON và kết thúc script
    echo json_encode(['revenue' => array_values($revenueByDay), 'orderCount' => array_values($orderCountByDay)]);
    exit;
}

?>



<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded-3">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
        </ol>
    </nav>

    <div class="d-flex flex-column flex-md-row">
        <span class="fs-2 fw-bold">Thống kê hoạt động</span>
        <input type="week" id="week-input" class="px-3 py-2 py-md-0 ms-md-5" value="<?= date('Y-\WW') ?>">
        <div class="btn-group btn-sm ms-md-5">
            <button class="btn btn-outline-secondary" id="prev-week"><i
                    class="fa-solid fa-arrow-right fa-rotate-180"></i></button>
            <button class="btn btn-outline-success fw-bold" id="this-week">Tuần này</button>
            <button class="btn btn-outline-secondary" id="next-week"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>

    <p class="fw-bold fs-5 mt-3">Biểu đồ đơn hàng</p>
    <canvas id="myChart_doanhthutuan"></canvas>


    <!-- Phần giao diện mới cho thống kê theo tháng -->
    <div class="d-flex flex-column flex-md-row mt-5">
        <span class="fs-2 fw-bold">Thống kê theo tháng</span>
        <input type="month" id="month-input" class="px-3 py-2 py-md-0 ms-md-5" value="<?= date('Y-m') ?>">
        <div class="btn-group btn-sm ms-md-5">
            <button class="btn btn-outline-secondary" id="prev-month"><i
                    class="fa-solid fa-arrow-right fa-rotate-180"></i></button>
            <button class="btn btn-outline-success fw-bold" id="this-month">Tháng này</button>
            <button class="btn btn-outline-secondary" id="next-month"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>

    <p class="fw-bold fs-5 mt-3">Biểu đồ doanh thu và đơn hàng theo tháng</p>
    <canvas id="myChart_doanhthuthang"></canvas>

    <script>
    $(document).ready(function() {
        function fetchData(week) {
            $.getJSON(window.location.href, {
                week: week
            }, function(data) {
                updateChart(data);
            });
        }

        function updateChart(data) {
            myChart.data.datasets[0].data = data.revenue;
            myChart.data.datasets[1].data = data.orderCount;
            myChart.update();
        }

        function adjustWeek(dateStr, weekDiff) {
            const [year, week] = dateStr.split('-W');
            const date = new Date(year, 0, (1 + (week - 1) * 7)); // Đầu tuần hiện tại
            date.setDate(date.getDate() + (weekDiff * 7));
            const newYear = date.getFullYear();
            const newWeek = Math.ceil((((date - new Date(newYear, 0, 1)) / 86400000) + date.getDay() + 1) / 7);
            return `${newYear}-W${('0' + newWeek).slice(-2)}`;
        }

        $('#week-input').on('change', function() {
            const week = $(this).val();
            fetchData(week);
        });

        $('#prev-week').on('click', function() {
            const currentWeek = $('#week-input').val();
            const newWeek = adjustWeek(currentWeek, -1);
            $('#week-input').val(newWeek);
            fetchData(newWeek);
        });

        $('#next-week').on('click', function() {
            const currentWeek = $('#week-input').val();
            const newWeek = adjustWeek(currentWeek, 1);
            $('#week-input').val(newWeek);
            fetchData(newWeek);
        });

        $('#this-week').on('click', function() {
            const today = new Date();
            const year = today.getFullYear();
            const week = ("0" + today.getWeek()).slice(-2);
            const currentWeek = `${year}-W${week}`;
            $('#week-input').val(currentWeek);
            fetchData(currentWeek);
        });

        const ctx = document.getElementById('myChart_doanhthutuan').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
                datasets: [{
                        label: 'Doanh thu (VND)',
                        data: [],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Số lượng đơn hàng',
                        data: [],
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Fetch data for the initial week
        fetchData($('#week-input').val());
    });

    Date.prototype.getWeek = function() {
        const date = new Date(this.getTime());
        date.setHours(0, 0, 0, 0);
        date.setDate(date.getDate() + 4 - (date.getDay() || 7));
        const yearStart = new Date(date.getFullYear(), 0, 1);
        return Math.ceil((((date - yearStart) / 86400000) + 1) / 7);
    };
    </script>



    <!-- Script cho biểu đồ thống kê theo tháng -->
    <script>
    $(document).ready(function() {
        function fetchMonthlyData(month) {
            $.getJSON(window.location.href, {
                month: month
            }, function(data) {
                updateMonthlyChart(data);
            });
        }

        function updateMonthlyChart(data) {
            myMonthlyChart.data.datasets[0].data = [data.totalRevenue];
            myMonthlyChart.data.datasets[1].data = [data.totalOrderCount];
            myMonthlyChart.update();
        }

        function adjustMonth(dateStr, monthDiff) {
            const [year, month] = dateStr.split('-');
            const date = new Date(year, month - 1, 1);
            date.setMonth(date.getMonth() + monthDiff);
            const newYear = date.getFullYear();
            const newMonth = ('0' + (date.getMonth() + 1)).slice(-2);
            return `${newYear}-${newMonth}`;
        }

        $('#month-input').on('change', function() {
            const month = $(this).val();
            fetchMonthlyData(month);
        });

        $('#prev-month').on('click', function() {
            const currentMonth = $('#month-input').val();
            const newMonth = adjustMonth(currentMonth, -1);
            $('#month-input').val(newMonth);
            fetchMonthlyData(newMonth);
        });

        $('#next-month').on('click', function() {
            const currentMonth = $('#month-input').val();
            const newMonth = adjustMonth(currentMonth, 1);
            $('#month-input').val(newMonth);
            fetchMonthlyData(newMonth);
        });

        $('#this-month').on('click', function() {
            const today = new Date();
            const year = today.getFullYear();
            const month = ("0" + (today.getMonth() + 1)).slice(-2);
            const currentMonth = `${year}-${month}`;
            $('#month-input').val(currentMonth);
            fetchMonthlyData(currentMonth);
        });

        const monthlyCtx = document.getElementById('myChart_doanhthuthang').getContext('2d');
        const myMonthlyChart = new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: ['Tổng'],
                datasets: [{
                        label: 'Doanh thu (VND)',
                        data: [],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Số lượng đơn hàng',
                        data: [],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Fetch data for the initial month
        fetchMonthlyData($('#month-input').val());
    });
    </script>
    </body>
</main>