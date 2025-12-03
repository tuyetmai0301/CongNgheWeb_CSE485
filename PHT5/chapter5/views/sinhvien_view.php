<?php
// Tệp View CHỈ chứa HTML và logic hiển thị (echo, foreach)
// Tệp View KHÔNG chứa câu lệnh SQL
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 5 - MVC</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; } 
    </style>
</head>
<body>

    <h2>Thêm Sinh Viên Mới (Kiến trúc MVC)</h2>
    <form method="POST" action="index.php">
        <label for="ten_sinh_vien">Tên Sinh Viên:</label>
        <input type="text" id="ten_sinh_vien" name="ten_sinh_vien" required>
        <label for="email_sinh_vien">Email:</label>
        <input type="email" id="email_sinh_vien" name="email_sinh_vien" required>
        <input type="submit" value="Thêm">
    </form>

    <h2>Danh Sách Sinh Viên (Kiến trúc MVC)</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sinh Viên</th>
                <th>Email</th> 
                <th>Ngày Tạo</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // TODO 4: Dùng vòng lặp foreach để duyệt qua biến $danh_sach_sv
        if (isset($danh_sach_sv) && is_array($danh_sach_sv)) {
            foreach ($danh_sach_sv as $sv) { 
                echo "<tr>";
                echo "<td>" . htmlspecialchars($sv['id']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['ten_sinh_vien']) . "</td>"; 
                echo "<td>" . htmlspecialchars($sv['email']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['ngay_tao']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Không có dữ liệu sinh viên.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>