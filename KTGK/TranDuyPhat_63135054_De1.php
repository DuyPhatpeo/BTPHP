<?php
$stories = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['story_maTruyen'])) {
        foreach ($_POST['story_maTruyen'] as $index => $maTruyen) {
            $stories[] = [
                'maTruyen' => $maTruyen,
                'tenTruyen' => $_POST['story_tenTruyen'][$index],
                'tenTacGia' => $_POST['story_tenTacGia'][$index],
                'soChuong' => $_POST['story_soChuong'][$index],
                'theLoai' => $_POST['story_theLoai'][$index],
                'noiDung' => $_POST['story_noiDung'][$index]
            ];
        }
    }
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['themTruyen'])) {
    $maTruyen = $_POST['maTruyen'];
    $tenTruyen = $_POST['tenTruyen'];
    $tenTacGia = $_POST['tenTacGia'];
    $soChuong = $_POST['soChuong'];
    $theLoai = $_POST['theLoai'];
    $noiDung = $_POST['noiDung'];


    $isDuplicate = false;
    foreach ($stories as $story) {
        if ($story['maTruyen'] === $maTruyen) {
            $isDuplicate = true;
            break;
        }
    }


    if ($isDuplicate) {
        $message = "Error: Không thêm được truyện (Mã truyện bị trùng).";
    } elseif (!empty($maTruyen) && !empty($tenTruyen) && !empty($tenTacGia) && !empty($soChuong) && !empty($theLoai) && !empty($noiDung)) {

        $stories[] = [
            'maTruyen' => $maTruyen,
            'tenTruyen' => $tenTruyen,
            'tenTacGia' => $tenTacGia,
            'soChuong' => $soChuong,
            'theLoai' => $theLoai,
            'noiDung' => $noiDung
        ];
        $message = "Thêm thành công truyện.";
    } else {
        $message = "Error: Không thêm được truyện (Các trường không được để trống).";
    }
}

if (isset($_POST['reset'])) {
    $stories = [];
    $message = "Đã reset danh sách truyện.";
}

$maTruyen = $_POST['maTruyen'] ?? '';
$tenTruyen = $_POST['tenTruyen'] ?? '';
$tenTacGia = $_POST['tenTacGia'] ?? '';
$soChuong = $_POST['soChuong'] ?? '';
$theLoai = $_POST['theLoai'] ?? '';
$noiDung = $_POST['noiDung'] ?? '';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản Lý Truyện</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        margin: 20px;
    }

    label {
        font-weight: bolder;
    }
    </style>
</head>

<body class="container mt-5">
    <div class="container w-50 mb-4">
        <?php if (!empty($message)) : ?>
        <div class="alert <?php echo (strpos($message, 'Error') !== false) ? 'alert-danger' : 'alert-success'; ?>">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>

        <form action="" method="post" class="row g-4">
            <?php foreach ($stories as $story) : ?>
            <input type="hidden" name="story_maTruyen[]" value="<?php echo htmlspecialchars($story['maTruyen']); ?>">
            <input type="hidden" name="story_tenTruyen[]" value="<?php echo htmlspecialchars($story['tenTruyen']); ?>">
            <input type="hidden" name="story_tenTacGia[]" value="<?php echo htmlspecialchars($story['tenTacGia']); ?>">
            <input type="hidden" name="story_soChuong[]" value="<?php echo htmlspecialchars($story['soChuong']); ?>">
            <input type="hidden" name="story_theLoai[]" value="<?php echo htmlspecialchars($story['theLoai']); ?>">
            <input type="hidden" name="story_noiDung[]" value="<?php echo htmlspecialchars($story['noiDung']); ?>">
            <?php endforeach; ?>

            <div class="form-group">
                <label for="maTruyen">Mã truyện:</label>
                <input type="text" id="maTruyen" name="maTruyen" class="form-control"
                    value="<?php echo htmlspecialchars($maTruyen); ?>">
            </div>
            <div class="form-group">
                <label for="tenTruyen">Tên truyện:</label>
                <input type="text" id="tenTruyen" name="tenTruyen" class="form-control"
                    value="<?php echo htmlspecialchars($tenTruyen); ?>">
            </div>
            <div class="form-group">
                <label for="tenTacGia">Tên tác giả:</label>
                <input type="text" id="tenTacGia" name="tenTacGia" class="form-control"
                    value="<?php echo htmlspecialchars($tenTacGia); ?>">
            </div>
            <div class="form-group">
                <label for="soChuong">Số chương:</label>
                <input type="text" id="soChuong" name="soChuong" class="form-control"
                    value="<?php echo htmlspecialchars($soChuong); ?>">
            </div>
            <div class="form-group">
                <label for="theLoai">Thể loại:</label>
                <select id="theLoai" name="theLoai" class="form-control">
                    <option value="Hành động" <?php if ($theLoai == 'Hành động') echo 'selected'; ?>>Hành động</option>
                    <option value="Tình cảm" <?php if ($theLoai == 'Tình cảm') echo 'selected'; ?>>Tình cảm</option>
                    <option value="Kinh dị" <?php if ($theLoai == 'Kinh dị') echo 'selected'; ?>>Kinh dị</option>
                    <option value="Viễn tưởng" <?php if ($theLoai == 'Viễn tưởng') echo 'selected'; ?>>Viễn tưởng
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="noiDung">Nội dung tóm tắt:</label>
                <textarea id="noiDung" name="noiDung" class="form-control"
                    rows="4"><?php echo htmlspecialchars($noiDung); ?></textarea>
            </div>
            <div class="col-12">
                <button type="submit" name="themTruyen" class="btn btn-dark">Thêm truyện vào danh sách</button>
                <button type="submit" name="reset" class="btn btn-danger">Làm mới</button>
                <button type="submit" name="themVaoFile" lass="btn btn-primary">Thêm truyện vào file</button>
            </div>
        </form>
    </div>

    <div class="container">
        <h2 class="mt-5">Danh sách truyện</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã truyện</th>
                    <th>Tên truyện</th>
                    <th>Tên tác giả</th>
                    <th>Số chương</th>
                    <th>Thể loại</th>
                    <th>Nội dung tóm tắt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stories as $story) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($story['maTruyen']); ?></td>
                    <td><?php echo htmlspecialchars($story['tenTruyen']); ?></td>
                    <td><?php echo htmlspecialchars($story['tenTacGia']); ?></td>
                    <td><?php echo htmlspecialchars($story['soChuong']); ?></td>
                    <td><?php echo htmlspecialchars($story['theLoai']); ?></td>
                    <td><?php echo htmlspecialchars($story['noiDung']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>