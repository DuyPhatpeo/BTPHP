<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin Sinh viên/Giảng viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        #sinhvien_fields,
        #giangvien_fields {
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            form {
                padding: 15px;
            }
        }

        .output {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <h2>Nhập thông tin Sinh viên hoặc Giảng viên</h2>

    <form method="POST" action="">
        <label for="loai">Chọn loại:</label>
        <select name="loai" id="loai" required>
            <option value="sinhvien" <?php if (isset($_POST['loai']) && $_POST['loai'] == "sinhvien") echo 'selected'; ?>>Sinh viên</option>
            <option value="giangvien" <?php if (isset($_POST['loai']) && $_POST['loai'] == "giangvien") echo 'selected'; ?>>Giảng viên</option>
        </select><br><br>

        <label for="hoTen">Họ Tên:</label>
        <input type="text" name="hoTen" id="hoTen" required value="<?php echo isset($_POST['hoTen']) ? $_POST['hoTen'] : ''; ?>"><br><br>

        <label for="diaChi">Địa chỉ:</label>
        <input type="text" name="diaChi" id="diaChi" required value="<?php echo isset($_POST['diaChi']) ? $_POST['diaChi'] : ''; ?>"><br><br>

        <label for="gioiTinh">Giới tính:</label>
        <select name="gioiTinh" id="gioiTinh" required>
            <option value="Nam" <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nam") echo 'selected'; ?>>Nam</option>
            <option value="Nữ" <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nữ") echo 'selected'; ?>>Nữ</option>
        </select><br><br>

        <div id="sinhvien_fields" style="display: none;">
            <label for="lopHoc">Lớp học:</label>
            <input type="text" name="lopHoc" id="lopHoc" value="<?php echo isset($_POST['lopHoc']) ? $_POST['lopHoc'] : ''; ?>"><br><br>

            <label for="nganhHoc">Ngành học:</label>
            <input type="text" name="nganhHoc" id="nganhHoc" value="<?php echo isset($_POST['nganhHoc']) ? $_POST['nganhHoc'] : ''; ?>"><br><br>
        </div>

        <div id="giangvien_fields" style="display: none;">
            <label for="trinhDo">Trình độ:</label>
            <select name="trinhDo" id="trinhDo">
                <option value="Cử nhân" <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo'] == "Cử nhân") echo 'selected'; ?>>Cử nhân</option>
                <option value="Thạc sĩ" <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo'] == "Thạc sĩ") echo 'selected'; ?>>Thạc sĩ</option>
                <option value="Tiến sĩ" <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo'] == "Tiến sĩ") echo 'selected'; ?>>Tiến sĩ</option>
            </select><br><br>
        </div>

        <input type="submit" name="submit" value="Hiển thị và lưu thông tin">

        <div class="output">    
    </form>

    
        <?php
        // Đường dẫn file lưu trữ thông tin
        $file_path = "thongtin.txt";

        // Lớp Người
        class Nguoi
        {
            public $hoTen;
            public $diaChi;
            public $gioiTinh;

            public function __construct($hoTen, $diaChi, $gioiTinh)
            {
                $this->hoTen = $hoTen;
                $this->diaChi = $diaChi;
                $this->gioiTinh = $gioiTinh;
            }

            public function hienThiThongTin()
            {
                return "Họ Tên: $this->hoTen, Địa chỉ: $this->diaChi, Giới tính: $this->gioiTinh";
            }
        }

        // Lớp Sinh viên kế thừa từ lớp Người
        class SinhVien extends Nguoi
        {
            public $lopHoc;
            public $nganhHoc;

            public function __construct($hoTen, $diaChi, $gioiTinh, $lopHoc, $nganhHoc)
            {
                parent::__construct($hoTen, $diaChi, $gioiTinh);
                $this->lopHoc = $lopHoc;
                $this->nganhHoc = $nganhHoc;
            }

            public function tinhDiemThuong()
            {
                if ($this->nganhHoc == "CNTT") {
                    return 1;
                } elseif ($this->nganhHoc == "Kinh tế") {
                    return 1.5;
                } else {
                    return 0;
                }
            }

            public function hienThiThongTin()
            {
                $thongTinChung = parent::hienThiThongTin();
                $diemThuong = $this->tinhDiemThuong();
                return "$thongTinChung, Lớp học: $this->lopHoc, Ngành học: $this->nganhHoc, Điểm thưởng: $diemThuong";
            }
        }

        // Lớp Giảng viên kế thừa từ lớp Người
        class GiangVien extends Nguoi
        {
            public $trinhDo;
            const LUONG_CO_BAN = 1500000;

            public function __construct($hoTen, $diaChi, $gioiTinh, $trinhDo)
            {
                parent::__construct($hoTen, $diaChi, $gioiTinh);
                $this->trinhDo = $trinhDo;
            }

            public function tinhLuong()
            {
                switch ($this->trinhDo) {
                    case "Cử nhân":
                        return self::LUONG_CO_BAN * 2.34;
                    case "Thạc sĩ":
                        return self::LUONG_CO_BAN * 3.67;
                    case "Tiến sĩ":
                        return self::LUONG_CO_BAN * 5.66;
                    default:
                        return 0;
                }
            }

            public function hienThiThongTin()
            {
                $thongTinChung = parent::hienThiThongTin();
                $luong = $this->tinhLuong();
                return "$thongTinChung, Trình độ: $this->trinhDo, Lương: " . number_format($luong) . " VND";
            }
        }

        // Xử lý form
        if (isset($_POST['submit'])) {
            $loai = $_POST['loai'];
            $hoTen = $_POST['hoTen'];
            $diaChi = $_POST['diaChi'];
            $gioiTinh = $_POST['gioiTinh'];
            $thongTin = "";

            if ($loai == "sinhvien") {
                $lopHoc = $_POST['lopHoc'];
                $nganhHoc = $_POST['nganhHoc'];
                $sinhVien = new SinhVien($hoTen, $diaChi, $gioiTinh, $lopHoc, $nganhHoc);
                $thongTin = "Sinh viên: " . $sinhVien->hienThiThongTin();
            } elseif ($loai == "giangvien") {
                $trinhDo = $_POST['trinhDo'];
                $giangVien = new GiangVien($hoTen, $diaChi, $gioiTinh, $trinhDo);
                $thongTin = "Giảng viên: " . $giangVien->hienThiThongTin();
            }

            // Ghi thông tin vào file
            file_put_contents($file_path, $thongTin . "\n", FILE_APPEND);

            echo "<h3>Thông tin đã được lưu:</h3>";
            echo "<p>$thongTin</p>";
        }
        ?>
    </div>

    <script>
        // Hiển thị đúng các trường nhập liệu theo loại được chọn
        document.getElementById('loai').addEventListener('change', function () {
            var loai = this.value;
            if (loai == 'sinhvien') {
                document.getElementById('sinhvien_fields').style.display = 'block';
                document.getElementById('giangvien_fields').style.display = 'none';
            } else if (loai == 'giangvien') {
                document.getElementById('sinhvien_fields').style.display = 'none';
                document.getElementById('giangvien_fields').style.display = 'block';
            }
        });

        // Kiểm tra loại ngay khi trang được tải để hiển thị các trường nhập liệu tương ứng
        document.addEventListener('DOMContentLoaded', function () {
            var loai = document.getElementById('loai').value;
            if (loai == 'sinhvien') {
                document.getElementById('sinhvien_fields').style.display = 'block';
            } else if (loai == 'giangvien') {
                document.getElementById('giangvien_fields').style.display = 'block';
            }
        });
    </script>
</body>

</html>
