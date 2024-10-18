<?php
// Lớp phân số
class PhanSo
{
    public $tuso;
    public $mauso;

    // Constructor
    public function __construct($tuso, $mauso)
    {
        if ($mauso == 0) {
            throw new Exception("Mẫu số không thể bằng 0!");
        }
        $this->tuso = $tuso;
        $this->mauso = $mauso;
    }

    // Hàm tìm ước chung lớn nhất (gcd)
    private function gcd($a, $b)
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    // Hàm rút gọn phân số
    public function rutGon()
    {
        $gcd = $this->gcd($this->tuso, $this->mauso);
        $this->tuso /= $gcd;
        $this->mauso /= $gcd;
    }

    // Hàm thực hiện phép tính
    public function tinh($ps, $pheptinh)
    {
        switch ($pheptinh) {
            case 'cong':
                $tuso = $this->tuso * $ps->mauso + $ps->tuso * $this->mauso;
                $mauso = $this->mauso * $ps->mauso;
                break;
            case 'tru':
                $tuso = $this->tuso * $ps->mauso - $ps->tuso * $this->mauso;
                $mauso = $this->mauso * $ps->mauso;
                break;
            case 'nhan':
                $tuso = $this->tuso * $ps->tuso;
                $mauso = $this->mauso * $ps->mauso;
                break;
            case 'chia':
                if ($ps->tuso == 0) {
                    throw new Exception("Không thể chia cho phân số có tử số bằng 0!");
                }
                $tuso = $this->tuso * $ps->mauso;
                $mauso = $this->mauso * $ps->tuso;
                break;
            default:
                throw new Exception("Phép tính không hợp lệ!");
        }

        $result = new PhanSo($tuso, $mauso);
        $result->rutGon();
        return $result;
    }

    // Hàm in phân số
    public function inPhanSo()
    {
        return $this->tuso . "/" . $this->mauso;
    }
}

// Xử lý form
$ketqua = "";
$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $tuso1 = $_POST['tuso1'];
        $mauso1 = $_POST['mauso1'];
        $tuso2 = $_POST['tuso2'];
        $mauso2 = $_POST['mauso2'];
        $pheptinh = $_POST['pheptinh'];

        // Kiểm tra phép tính
        if (empty($pheptinh)) {
            throw new Exception("Vui lòng chọn phép tính!");
        }

        // Tạo hai phân số
        $ps1 = new PhanSo($tuso1, $mauso1);
        $ps2 = new PhanSo($tuso2, $mauso2);

        // Tính toán kết quả
        $result = $ps1->tinh($ps2, $pheptinh);
        $ketqua = $result->inPhanSo();

        // Chuẩn bị hiển thị phép tính
        $pheptinh_hien_thi = '';
        switch ($pheptinh) {
            case 'cong':
                $pheptinh_hien_thi = '+';
                break;
            case 'tru':
                $pheptinh_hien_thi = '-';
                break;
            case 'nhan':
                $pheptinh_hien_thi = '*';
                break;
            case 'chia':
                $pheptinh_hien_thi = '/';
                break;
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính phân số</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 40px;
            font-size: 28px;
            font-weight: 600;
            color: #2e3a59;
        }

        form {
            width: 30%;
            margin: 30px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        .input-group {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 45%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: #f9f9f9;
            color: #333;
        }

        .input-group input:focus {
            outline: none;
            border-color: #4CAF50;
            background-color: #fff;
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .radio-group input[type="radio"] {
            display: none;
        }

        .radio-group label {
            background-color: #f1f1f1;
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            flex: 1;
        }

        .radio-group input[type="radio"]:checked+label {
            background-color: #4CAF50;
            color: white;
        }

        .radio-group label:hover {
            background-color: #e0e0e0;
        }

        button {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .result,
        .error {
            text-align: center;
            margin-top: 30px;
        }

        .result h3,
        .error {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .result h3 {
            color: #4CAF50;
        }

        .error {
            color: red;
        }

        .result .pheptinh {
            color: #2e3a59;
            font-weight: normal;
        }

        .result .ketqua {
            color: #007BFF;
        }

        .note {
            color: #777;
            font-style: italic;
            text-align: center;
            margin-top: 30px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                width: 80%;
                padding: 20px;
            }

            .input-group {
                flex-direction: column;
            }

            .input-group input {
                width: 100%;
                margin-bottom: 10px;
            }

            .radio-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <h2>Thực hiện phép tính trên hai phân số</h2>
    <form method="POST">
        <div class="input-group">
            <div>
                <label for="tuso1">Tử số phân số 1:</label>
                <input type="number" name="tuso1" value="<?php echo isset($_POST['tuso1']) ? $_POST['tuso1'] : ''; ?>" required>
            </div>
            <div>
                <label for="mauso1">Mẫu số phân số 1:</label>
                <input type="number" name="mauso1" value="<?php echo isset($_POST['mauso1']) ? $_POST['mauso1'] : ''; ?>" required>
            </div>
        </div>

        <div class="input-group">
            <div>
                <label for="tuso2">Tử số phân số 2:</label>
                <input type="number" name="tuso2" value="<?php echo isset($_POST['tuso2']) ? $_POST['tuso2'] : ''; ?>" required>
            </div>
            <div>
                <label for="mauso2">Mẫu số phân số 2:</label>
                <input type="number" name="mauso2" value="<?php echo isset($_POST['mauso2']) ? $_POST['mauso2'] : ''; ?>" required>
            </div>
        </div>

        <div class="radio-group">
            <input type="radio" id="cong" name="pheptinh" value="cong" <?php echo isset($_POST['pheptinh']) && $_POST['pheptinh'] == 'cong' ? 'checked' : ''; ?>>
            <label for="cong">Cộng</label>
            <input type="radio" id="tru" name="pheptinh" value="tru" <?php echo isset($_POST['pheptinh']) && $_POST['pheptinh'] == 'tru' ? 'checked' : ''; ?>>
            <label for="tru">Trừ</label>
            <input type="radio" id="nhan" name="pheptinh" value="nhan" <?php echo isset($_POST['pheptinh']) && $_POST['pheptinh'] == 'nhan' ? 'checked' : ''; ?>>
            <label for="nhan">Nhân</label>
            <input type="radio" id="chia" name="pheptinh" value="chia" <?php echo isset($_POST['pheptinh']) && $_POST['pheptinh'] == 'chia' ? 'checked' : ''; ?>>
            <label for="chia">Chia</label>
        </div>

        <button type="submit">Tính kết quả</button>

        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php elseif ($ketqua): ?>
            <div class="result">
                <h3><span class="pheptinh"><?php echo "$tuso1/$mauso1 $pheptinh_hien_thi $tuso2/$mauso2"; ?></span></h3>
                <h3><span class="ketqua">Kết quả: <?php echo $ketqua; ?></span></h3>
            </div>
        <?php endif; ?>

        <div class="note">
            <p>Lưu ý: Phân số sẽ được rút gọn sau khi tính toán.</p>
        </div>
    </form>


</body>

</html>