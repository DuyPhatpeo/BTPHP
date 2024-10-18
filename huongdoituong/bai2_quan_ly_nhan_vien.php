<?php
class NhanVien
{
    protected $hoTen;
    protected $soCon;
    protected $ngaySinh;
    protected $gioiTinh;
    protected $ngayVaoLam;
    protected $heSoLuong;
    protected $luongCoBan = 875000; // Lương cơ bản mặc định

    public function __construct($hoTen, $soCon, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong)
    {
        $this->hoTen = $hoTen;
        $this->soCon = $soCon;
        $this->ngaySinh = $ngaySinh;
        $this->gioiTinh = $gioiTinh;
        $this->ngayVaoLam = $ngayVaoLam;
        $this->heSoLuong = $heSoLuong;
    }

    public function tinhLuong()
    {
        return $this->luongCoBan * $this->heSoLuong;
    }
}

class NhanVienVanPhong extends NhanVien
{
    private $soNgayVang;
    private $dinhMucVang = 2; // Định mức vắng
    private $donGiaPhat = 100000; // Đơn giá phạt

    public function __construct($hoTen, $soCon, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soNgayVang)
    {
        parent::__construct($hoTen, $soCon, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong);
        $this->soNgayVang = $soNgayVang;
    }

    public function tinhPhat()
    {
        if ($this->soNgayVang > $this->dinhMucVang) {
            return ($this->soNgayVang - $this->dinhMucVang) * $this->donGiaPhat;
        }
        return 0;
    }

    public function tinhTroCap()
    {
        return ($this->gioiTinh == "Nữ") ? (200000 * $this->soCon * 1.5) : (200000 * $this->soCon);
    }

    public function tinhLuongThucLinh()
    {
        $luong = $this->tinhLuong();
        $troCap = $this->tinhTroCap();
        $phat = $this->tinhPhat();
        return $luong + $troCap - $phat;
    }
}

class NhanVienSanXuat extends NhanVien
{
    private $soSanPham;
    private $dinhMucSanPham = 100; // Định mức sản phẩm
    private $donGiaSanPham = 20000; // Đơn giá sản phẩm

    public function __construct($hoTen, $soCon, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soSanPham)
    {
        parent::__construct($hoTen, $soCon, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong);
        $this->soSanPham = $soSanPham;
    }

    public function tinhThuong()
    {
        if ($this->soSanPham > $this->dinhMucSanPham) {
            return ($this->soSanPham - $this->dinhMucSanPham) * $this->donGiaSanPham * 0.03;
        }
        return 0;
    }

    public function tinhTroCap()
    {
        return $this->soCon * 120000;
    }

    public function tinhLuongThucLinh()
    {
        $luong = $this->soSanPham * $this->donGiaSanPham;
        $troCap = $this->tinhTroCap();
        $thuong = $this->tinhThuong();
        return $luong + $troCap + $thuong;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Nhân viên</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
        }

        header {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 2em;
            font-weight: bold;
        }

        table {
            width: 70%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            font-size: 1.1em;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        td input[type="text"],
        td input[type="number"],
        td input[type="date"],
        td select {
            width: 95%;
            padding: 8px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #fafafa;
        }

        td input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            display: block;
            margin: 30px auto;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result-box {
            text-align: center;
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .result-box h3 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .result-box p {
            font-size: 1.2em;
            margin: 5px 0;
        }

        .result-table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            font-size: 1.1em;
        }

        .result-table th,
        .result-table td {
            padding: 10px;
            text-align: left;
        }

        .result-table th {
            background-color: #4CAF50;
            color: white;
        }

        .result-table td {
            background-color: #f9f9f9;
        }

        .highlight {
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>

<body>

    <header>QUẢN LÝ NHÂN VIÊN</header>

    <form method="POST">
        <table>
            <tr>
                <td>Họ và tên:</td>
                <td><input type="text" name="hoTen" required value="<?php echo isset($_POST['hoTen']) ? $_POST['hoTen'] : ''; ?>"></td>
                <td>Số con:</td>
                <td><input type="number" name="soCon" required value="<?php echo isset($_POST['soCon']) ? $_POST['soCon'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaySinh" required value="<?php echo isset($_POST['ngaySinh']) ? $_POST['ngaySinh'] : ''; ?>"></td>
                <td>Ngày vào làm:</td>
                <td><input type="date" name="ngayVaoLam" required value="<?php echo isset($_POST['ngayVaoLam']) ? $_POST['ngayVaoLam'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <select name="gioiTinh" required>
                        <option value="Nam" <?php echo (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                        <option value="Nữ" <?php echo (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                    </select>
                </td>
                <td>Hệ số lương:</td>
                <td><input type="number" step="0.01" name="heSoLuong" required value="<?php echo isset($_POST['heSoLuong']) ? $_POST['heSoLuong'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Loại nhân viên:</td>
                <td>
                    <input type="radio" name="loaiNhanVien" value="Van phong" onchange="toggleRows()" <?php echo (isset($_POST['loaiNhanVien']) && $_POST['loaiNhanVien'] == 'Van phong') ? 'checked' : ''; ?>> Văn phòng
                    <input type="radio" name="loaiNhanVien" value="San xuat" onchange="toggleRows()" <?php echo (isset($_POST['loaiNhanVien']) && $_POST['loaiNhanVien'] == 'San xuat') ? 'checked' : ''; ?>> Sản xuất
                </td>
            </tr>
            <tr id="vanPhongRow" style="display: none;">
                <td>Số ngày vắng:</td>
                <td><input type="number" name="soNgayVang" value="<?php echo isset($_POST['soNgayVang']) ? $_POST['soNgayVang'] : ''; ?>"></td>
            </tr>
            <tr id="sanXuatRow" style="display: none;">
                <td>Số sản phẩm:</td>
                <td><input type="number" name="soSanPham" value="<?php echo isset($_POST['soSanPham']) ? $_POST['soSanPham'] : ''; ?>"></td>
            </tr>
        </table>

        <input type="submit" value="Tính lương">
    </form>

    <script>
        function toggleRows() {
            const loaiNhanVien = document.querySelector('input[name="loaiNhanVien"]:checked').value;
            if (loaiNhanVien === "Van phong") {
                document.getElementById("vanPhongRow").style.display = "table-row";
                document.getElementById("sanXuatRow").style.display = "none";
            } else {
                document.getElementById("sanXuatRow").style.display = "table-row";
                document.getElementById("vanPhongRow").style.display = "none";
            }
        }
        toggleRows(); // Đảm bảo trạng thái ban đầu khi tải trang
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Nhận dữ liệu từ form
        $hoTen = $_POST['hoTen'];
        $soCon = $_POST['soCon'];
        $ngaySinh = $_POST['ngaySinh'];
        $gioiTinh = $_POST['gioiTinh'];
        $ngayVaoLam = $_POST['ngayVaoLam'];
        $heSoLuong = $_POST['heSoLuong'];

        // Xử lý nhân viên văn phòng
        if ($_POST['loaiNhanVien'] == "Van phong") {
            $soNgayVang = $_POST['soNgayVang'];
            $nv = new NhanVienVanPhong($hoTen, $soCon, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soNgayVang);
            echo "<div class='result-box'>";
            echo "<h3>Thông tin nhân viên văn phòng:</h3>";
            echo "<table class='result-table'>";
            echo "<tr><th>Lương cơ bản</th><td class='highlight'>" . number_format($nv->tinhLuong()) . " VND</td></tr>";
            echo "<tr><th>Tiền trợ cấp</th><td class='highlight'>" . number_format($nv->tinhTroCap()) . " VND</td></tr>";
            echo "<tr><th>Tiền phạt</th><td class='highlight'>" . number_format($nv->tinhPhat()) . " VND</td></tr>";
            echo "<tr><th>Lương thực lĩnh</th><td class='highlight'>" . number_format($nv->tinhLuongThucLinh()) . " VND</td></tr>";
            echo "</table>";
            echo "</div>";
        }
        // Xử lý nhân viên sản xuất
        else if ($_POST['loaiNhanVien'] == "San xuat") {
            $soSanPham = $_POST['soSanPham'];
            $nv = new NhanVienSanXuat($hoTen, $soCon, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soSanPham);
            echo "<div class='result-box'>";
            echo "<h3>Thông tin nhân viên sản xuất:</h3>";
            echo "<table class='result-table'>";
            echo "<tr><th>Lương cơ bản</th><td class='highlight'>" . number_format($nv->tinhLuong()) . " VND</td></tr>";
            echo "<tr><th>Tiền trợ cấp</th><td class='highlight'>" . number_format($nv->tinhTroCap()) . " VND</td></tr>";
            echo "<tr><th>Tiền thưởng</th><td class='highlight'>" . number_format($nv->tinhThuong()) . " VND</td></tr>";
            echo "<tr><th>Lương thực lĩnh</th><td class='highlight'>" . number_format($nv->tinhLuongThucLinh()) . " VND</td></tr>";
            echo "</table>";
            echo "</div>";
        }
    }
    ?>
</body>

</html>