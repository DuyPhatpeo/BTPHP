<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Cửu Chương</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9f7f6;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #2c3e50;
            margin-top: 20px;
            font-size: 36px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .bang-cuu-chuong {
            margin: 15px;
            border-collapse: collapse;
            width: 250px;
            background-color: #ffffff;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .bang-cuu-chuong:hover {
            transform: translateY(-10px);
        }
        th {
            background-color: #1abc9c;
            color: white;
            padding: 10px;
            font-size: 18px;
            text-transform: uppercase;
        }
        td {
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 16px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e0f7fa;
        }
    </style>
</head>
<body>
    <h1>Bảng Cửu Chương</h1>
    <div class="container">
        <?php
            for ($i = 2; $i <= 10; $i++) {
                echo "<table class='bang-cuu-chuong'>";
                echo "<thead><tr><th colspan='2'>Bảng Cửu Chương {$i}</th></tr></thead>";
                echo "<tbody>";
                for ($j = 1; $j <= 10; $j++) {
                    echo "<tr>";
                    echo "<td>{$i} x {$j}</td>";
                    echo "<td>" . ($i * $j) . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
        ?>
    </div>
</body>
</html>
