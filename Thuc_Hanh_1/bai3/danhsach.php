<?php
/**
 * csv_logic.php
 * Chứa logic đọc file CSV và phân tích dữ liệu.
 * Kết quả: $headers, $data_array, $error
 */

$filename = '65HTTT_Danh_sach_diem_danh.csv';
$data_array = [];
$headers = [];
$error = null;

// ========================================================
// 1. XỬ LÝ ĐỌC FILE VÀ PHÂN TÍCH DỮ LIỆU
// ========================================================

if (!file_exists($filename)) {
    $error = "Lỗi: Không tìm thấy file dữ liệu CSV {$filename}!";
} else {
    // Mở file ở chế độ đọc
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        
        // Đọc dòng đầu tiên để lấy Tên cột (Header)
        if (($headers = fgetcsv($handle, 1000, ',')) !== FALSE) {
            
            // Đọc các dòng tiếp theo để lấy Dữ liệu
            while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                // Kiểm tra xem số lượng cột có khớp với header không 
                if (count($row) === count($headers)) {
                    // Kết hợp header và dữ liệu để tạo mảng associative (key-value)
                    $data_array[] = array_combine($headers, $row);
                }
            }
        } else {
             $error = "Lỗi: File CSV rỗng hoặc không đọc được header.";
        }
        
        fclose($handle); // Đóng file sau khi đọc xong
        
    } else {
        $error = "Lỗi: Không thể mở file {$filename}.";
    }
}
?>