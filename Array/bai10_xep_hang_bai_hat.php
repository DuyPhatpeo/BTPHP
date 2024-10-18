<?php
session_start();

if (!isset($_SESSION['songs'])) {
    $_SESSION['songs'] = [];
}

if (isset($_POST['add_song'])) {
    $song_name = $_POST['song_name'];
    $rank = intval($_POST['rank']);

    if (!empty($song_name) && $rank > 0) {
        $_SESSION['songs'][] = ['name' => $song_name, 'rank' => $rank];
    }
}

if (isset($_POST['show_ranking'])) {
    usort($_SESSION['songs'], function ($a, $b) {
        return $a['rank'] <=> $b['rank'];
    });
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng xếp hạng bài hát</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: white;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px;
            background-color: #1DB954;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1aa34a;
        }

        .ranking-table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .ranking-table th,
        .ranking-table td {
            padding: 15px;
            text-align: left;
        }

        .ranking-table th {
            background-color: #333;
            color: white;
            text-transform: uppercase;
        }

        .ranking-table tr {
            border-bottom: 1px solid #444;
        }

        .ranking-table tr:hover {
            background-color: #222;
        }

        .ranking-table .rank {
            font-size: 24px;
            color: #1DB954;
            font-weight: bold;
        }

        .ranking-table .rank:nth-child(1) {
            color: #1E90FF;
        }

        .ranking-table .rank:nth-child(2) {
            color: #2ECC71;
        }

        .ranking-table .rank:nth-child(3) {
            color: #FF6347;
        }

        .song-title {
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Bảng xếp hạng bài hát</h1>
        <form method="POST">
            <input type="text" name="song_name" placeholder="Tên bài hát">
            <input type="number" name="rank" placeholder="Thứ hạng">

            <button type="submit" name="add_song">Thêm bài hát</button>
            <button type="submit" name="show_ranking">Hiển thị bảng xếp hạng</button>
        </form>

        <table class="ranking-table">
            <thead>
                <tr>
                    <th>Thứ hạng</th>
                    <th>Tên bài hát</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['songs'] as $index => $song) {
                    echo "<tr>";
                    echo "<td class='rank'>" . $song['rank'] . "</td>";
                    echo "<td><span class='song-title'>" . $song['name'] . "</span></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>