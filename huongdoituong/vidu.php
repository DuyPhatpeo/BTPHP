<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tính chu vi và diện tích</title>

    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #f4f7f8;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        fieldset {
            background-color: #ffffff;
            border: 1px solid #dce4ec;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        legend {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 1.2em;
        }

        table {
            width: 100%;
            margin-top: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #dce4ec;
            border-radius: 4px;
            background-color: #f4f7f8;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            margin: 20px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        td {
            padding: 10px;
            vertical-align: middle;
        }

        tr {
            margin-bottom: 10px;
        }
    </style>

</head>

<body>

    <?php
    abstract class Hinh
    {
        protected $ten, $dodai;

        public function setTen($ten)
        {
            $this->ten = $ten;
        }

        public function getTen()
        {
            return $this->ten;
        }

        public function setDodai($doDai)
        {
            $this->dodai = $doDai;
        }

        public function getDodai()
        {
            return $this->dodai;
        }

        abstract public function tinh_CV();
        abstract public function tinh_DT();
    }

    class HinhTron extends Hinh
    {
        const PI = 3.14;

        function tinh_CV()
        {
            return round($this->dodai * 2 * self::PI, 2);
        }

        function tinh_DT()
        {
            return round(pow($this->dodai, 2) * self::PI, 2);
        }
    }

    class HinhVuong extends Hinh
    {
        public function tinh_CV()
        {
            return round($this->dodai * 4, 2);
        }

        public function tinh_DT()
        {
            return round(pow($this->dodai, 2), 2);
        }
    }

    class HinhTamGiacDeu extends Hinh
    {
        public function tinh_CV()
        {
            return round($this->dodai * 3, 2);
        }

        public function tinh_DT()
        {
            return round((sqrt(3) / 4) * pow($this->dodai, 2), 2);
        }
    }

    class HinhChuNhat extends Hinh
    {
        public function tinh_CV()
        {
            return round(($this->dodai * 3) * 2, 2);
        }

        public function tinh_DT()
        {
            return round($this->dodai * ($this->dodai * 2), 2);
        }
    }



    $str = NULL;

    if (isset($_POST['tinh'])) {
        if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") {
            $hv = new HinhVuong();
            $hv->setTen($_POST['ten']);
            $hv->setDodai($_POST['dodai']);
            $str = "Diện tích hình vuông " . $hv->getTen() . " là: " . $hv->tinh_DT() . " \n" .
                "Chu vi của hình vuông " . $hv->getTen() . " là: " . $hv->tinh_CV();
        }

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") {
            $ht = new HinhTron();
            $ht->setTen($_POST['ten']);
            $ht->setDodai($_POST['dodai']);
            $str = "Diện tích của hình tròn " . $ht->getTen() . " là: " . $ht->tinh_DT() . " \n" .
                "Chu vi của hình tròn " . $ht->getTen() . " là: " . $ht->tinh_CV();
        }

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "htg") {
            $htg = new HinhTamGiacDeu();
            $htg->setTen($_POST['ten']);
            $htg->setDodai($_POST['dodai']);
            $str = "Diện tích của tam giác đều " . $htg->getTen() . " là: " . $htg->tinh_DT() . " \n" .
                "Chu vi của tam giác đều " . $htg->getTen() . " là: " . $htg->tinh_CV();
        }

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn") {
            $hcn = new HinhChuNhat();
            $hcn->setTen($_POST['ten']);
            $hcn->setDodai($_POST['dodai']);
            $str = "Diện tích của hình chữ nhật " . $hcn->getTen() . " là: " . $hcn->tinh_DT() . " \n" .
                "Chu vi của hình chữ nhật " . $hcn->getTen() . " là: " . $hcn->tinh_CV();
        }
    }
    ?>

    <form action="" method="post">
        <fieldset>
            <legend>Tính chu vi và diện tích các hình đơn giản</legend>
            <table border='0'>
                <tr>
                    <td>Chọn hình</td>
                    <td>
                        <div class="radio-group">
                            <label><input type="radio" name="hinh" value="hv" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") echo 'checked' ?> />Hình vuông</label>
                            <label><input type="radio" name="hinh" value="ht" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") echo 'checked' ?> />Hình tròn</label>
                            <label><input type="radio" name="hinh" value="htg" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "htg") echo 'checked' ?> />Hình tam giác đều</label>
                            <label><input type="radio" name="hinh" value="hcn" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn") echo 'checked' ?> />Hình chữ nhật</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Nhập tên:</td>
                    <td><input type="text" name="ten" value="<?php if (isset($_POST['ten'])) echo $_POST['ten']; ?>" /></td>
                </tr>
                <tr>
                    <td>Nhập độ dài:</td>
                    <td><input type="text" name="dodai" value="<?php if (isset($_POST['dodai'])) echo $_POST['dodai']; ?>" /></td>
                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str; ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="tinh" value="Tính" /></td>
                </tr>
            </table>
        </fieldset>
    </form>

</body>

</html>