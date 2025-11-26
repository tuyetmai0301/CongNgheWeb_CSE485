<?php
// index.php
// BƯỚC 1: INCLUDE LOGIC XỬ LÝ DỮ LIỆU
require_once 'danhsach.php'; 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển Thị Dữ Liệu từ File CSV (Tách File)</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); overflow-x: auto; }
        h1 { color: #007bff; text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; white-space: nowrap; }
        th { background-color: #007bff; color: white; font-weight: bold; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .error { color: red; text-align: center; font-weight: bold; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Danh Sách Tài Khoản Đọc Từ File CSV</h1>
        
        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php else: ?>
            
            <table>
                <thead>
                    <tr>
                        <?php foreach ($headers as $header): ?>
                            <th><?= htmlspecialchars(strtoupper($header)) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_array as $row): ?>
                        <tr>
                            <?php foreach ($row as $cell): ?>
                                <td><?= htmlspecialchars($cell) ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
        <?php endif; ?>
    </div>

</body>
</html>