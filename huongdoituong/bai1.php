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
        input[type="text"], select {
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
        #sinhvien_fields, #giangvien_fields {
            margin-top: 20px;
        }
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <?php
    // Lớp Người
    class Nguoi {
        public $hoTen;
        public $diaChi;
        public $gioiTinh;

        public function __construct($hoTen, $diaChi, $gioiTinh) {
            $this->hoTen = $hoTen;
            $this->diaChi = $diaChi;
            $this->gioiTinh = $gioiTinh;
        }

        public function hienThiThongTin() {
            return "Họ Tên: $this->hoTen, Địa chỉ: $this->diaChi, Giới tính: $this->gioiTinh";
        }
    }

    // Lớp Sinh viên kế thừa từ lớp Người
    class SinhVien extends Nguoi {
        public $lopHoc;
        public $nganhHoc;

        public function __construct($hoTen, $diaChi, $gioiTinh, $lopHoc, $nganhHoc) {
            parent::__construct($hoTen, $diaChi, $gioiTinh);
            $this->lopHoc = $lopHoc;
            $this->nganhHoc = $nganhHoc;
        }

        public function tinhDiemThuong() {
            if ($this->nganhHoc == "CNTT") {
                return 1;
            } elseif ($this->nganhHoc == "Kinh tế") {
                return 1.5;
            } else {
                return 0;
            }
        }

        public function hienThiThongTin() {
            $thongTinChung = parent::hienThiThongTin();
            $diemThuong = $this->tinhDiemThuong();
            return "$thongTinChung, Lớp học: $this->lopHoc, Ngành học: $this->nganhHoc, Điểm thưởng: $diemThuong";
        }
    }

    // Lớp Giảng viên kế thừa từ lớp Người
    class GiangVien extends Nguoi {
        public $trinhDo;
        const LUONG_CO_BAN = 1500000;

        public function __construct($hoTen, $diaChi, $gioiTinh, $trinhDo) {
            parent::__construct($hoTen, $diaChi, $gioiTinh);
            $this->trinhDo = $trinhDo;
        }

        public function tinhLuong() {
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

        public function hienThiThongTin() {
            $thongTinChung = parent::hienThiThongTin();
            $luong = $this->tinhLuong();
            return "$thongTinChung, Trình độ: $this->trinhDo, Lương: $luong";
        }
    }
    ?>

    <h2>Nhập thông tin Sinh viên hoặc Giảng viên</h2>
    <form method="POST" action="">
        <label for="loai">Chọn loại:</label>
        <select name="loai" id="loai">
            <option value="sinhvien">Sinh viên</option>
            <option value="giangvien">Giảng viên</option>
        </select><br><br>

        <label for="hoTen">Họ Tên:</label>
        <input type="text" name="hoTen" id="hoTen" required><br><br>

        <label for="diaChi">Địa chỉ:</label>
        <input type="text" name="diaChi" id="diaChi" required><br><br>

        <label for="gioiTinh">Giới tính:</label>
        <select name="gioiTinh" id="gioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br><br>

        <div id="sinhvien_fields">
            <label for="lopHoc">Lớp học:</label>
            <input type="text" name="lopHoc" id="lopHoc" required><br><br>

            <label for="nganhHoc">Ngành học:</label>
            <input type="text" name="nganhHoc" id="nganhHoc" required><br><br>
        </div>

        <div id="giangvien_fields" style="display:none;">
            <label for="trinhDo">Trình độ:</label>
            <select name="trinhDo" id="trinhDo" required>
                <option value="Cử nhân">Cử nhân</option>
                <option value="Thạc sĩ">Thạc sĩ</option>
                <option value="Tiến sĩ">Tiến sĩ</option>
            </select><br><br>
        </div>

        <input type="submit" name="submit" value="Hiển thị thông tin">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $loai = $_POST['loai'];
        $hoTen = $_POST['hoTen'];
        $diaChi = $_POST['diaChi'];
        $gioiTinh = $_POST['gioiTinh'];

        if ($loai == "sinhvien") {
            $lopHoc = $_POST['lopHoc'];
            $nganhHoc = $_POST['nganhHoc'];
            $sinhVien = new SinhVien($hoTen, $diaChi, $gioiTinh, $lopHoc, $nganhHoc);
            echo "<h3>Thông tin Sinh viên:</h3>";
            echo "<p>" . $sinhVien->hienThiThongTin() . "</p>";
        } elseif ($loai == "giangvien") {
            $trinhDo = $_POST['trinhDo'];
            $giangVien = new GiangVien($hoTen, $diaChi, $gioiTinh, $trinhDo);
            echo "<h3>Thông tin Giảng viên:</h3>";
            echo "<p>" . $giangVien->hienThiThongTin() . "</p>";
        }
    }
    ?>

    <script>
    // Hiển thị đúng các trường nhập liệu theo loại được chọn
    document.getElementById('loai').addEventListener('change', function() {
        var loai = this.value;
        if (loai == 'sinhvien') {
            document.getElementById('sinhvien_fields').style.display = 'block';
            document.getElementById('giangvien_fields').style.display = 'none';
        } else if (loai == 'giangvien') {
            document.getElementById('sinhvien_fields').style.display = 'none';
            document.getElementById('giangvien_fields').style.display = 'block';
        }
    });
    </script>
</body>
</html>
