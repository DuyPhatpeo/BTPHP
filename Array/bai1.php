<?php
session_start(); // Khởi tạo session để lưu giá trị n
$n = null;
$arr = [];

// Hàm a: Hiển thị mảng phát sinh ngẫu nhiên
function hienThiMang($arr)
{
    return implode(", ", $arr);
}

// Hàm b: Đếm số lượng phần tử là số chẵn
function demSoChan($arr)
{
    return count(array_filter($arr, fn($x) => $x % 2 == 0));
}

// Hàm c: Đếm số lượng phần tử nhỏ hơn 100
function demSoNhoHon100($arr)
{
    return count(array_filter($arr, fn($x) => $x < 100));
}

// Hàm d: Tính tổng các phần tử là số âm
function tongSoAm($arr)
{
    return array_sum(array_filter($arr, fn($x) => $x < 0));
}

// Hàm e: In ra vị trí các phần tử có chữ số kề cuối là 0
function viTriChuSoKeCuoi0($arr)
{
    $viTri = [];
    foreach ($arr as $index => $value) {
        $chuSoKeCuoi = intval(($value / 10) % 10);
        if ($chuSoKeCuoi == 0) {
            $viTri[] = $index;
        }
    }
    return $viTri;
}

// Hàm f: Sắp xếp các phần tử có chữ số kề cuối là 0 theo thứ tự tăng dần
function sapXepChuSoKeCuoi0($arr)
{
    $mangChuSoKeCuoiLa0 = array_filter($arr, fn($x) => intval(($x / 10) % 10) == 0);
    sort($mangChuSoKeCuoiLa0);
    return $mangChuSoKeCuoiLa0;
}

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST['n'];
    $_SESSION['n'] = $n; // Lưu giá trị n vào session
    $arr = [];

    // Sử dụng hàm rand() để tạo mảng ngẫu nhiên độ dài n
    for ($i = 0; $i < $n; $i++) {
        $arr[] = rand(-200, 200); // Giới hạn giá trị từ -200 đến 200 để có cả số âm và số dương
    }
} elseif (isset($_SESSION['n'])) {
    $n = $_SESSION['n']; // Lấy giá trị n từ session nếu đã lưu
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ứng Dụng Tạo Mảng Ngẫu Nhiên</title>
    <style>
        body {
            background-color: #f4f4f4;
            /* Màu nền sáng */
            color: #333;
            /* Màu chữ tối */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            /* Nền trắng */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Bóng nhẹ */
        }

        h1 {
            text-align: center;
            color: #007BFF;
            /* Màu tiêu đề sáng */
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            /* Viền sáng */
            border-radius: 4px;
            background-color: #f9f9f9;
            /* Nền sáng cho ô nhập */
            color: #333;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #007BFF;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            background-color: #e9ecef;
            padding: 15px;
            margin-top: 10px;
            border-radius: 4px;
            border-left: 5px solid #007BFF;
        }

        .result h3 {
            margin: 0 0 10px 0;
            color: #007BFF;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Tạo Mảng Ngẫu Nhiên</h1>
        <form method="post">
            <label for="n">Nhập số tự nhiên n:</label>
            <input type="number" name="n" id="n" min="1" value="<?= $n ?>" required>
            <input type="submit" value="Tạo Mảng">
        </form>

        <?php if ($n !== null): ?>
            <div class="result">
                <h3>Mảng phát sinh ngẫu nhiên:</h3>
                <p><?= hienThiMang($arr) ?></p>
            </div>

            <div class="result">
                <h3>Số phần tử là số chẵn:</h3>
                <p><?= demSoChan($arr) ?></p>
            </div>

            <div class="result">
                <h3>Số phần tử nhỏ hơn 100:</h3>
                <p><?= demSoNhoHon100($arr) ?></p>
            </div>

            <div class="result">
                <h3>Tổng các phần tử là số âm:</h3>
                <p><?= tongSoAm($arr) ?></p>
            </div>

            <div class="result">
                <h3>Vị trí các phần tử có chữ số kề cuối là 0:</h3>
                <p><?= implode(", ", viTriChuSoKeCuoi0($arr)) ?></p>
            </div>

            <div class="result">
                <h3>Mảng các phần tử có chữ số kề cuối là 0 sau khi sắp xếp:</h3>
                <p><?= hienThiMang(sapXepChuSoKeCuoi0($arr)) ?></p>
            </div>

        <?php endif; ?>
    </div>

</body>

</html>