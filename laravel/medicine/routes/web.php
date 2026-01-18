<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;

// Đường dẫn hiển thị danh sách (trang chủ)

Route::get('/', [SaleController::class, 'index'])->name('sales.index');

// Đường dẫn để tạo mới (hiển thị form thêm mới)
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');

// Đường dẫn để lưu dữ liệu mới (thực hiện thêm mới)
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

// Đường dẫn để hiển thị chi tiết  (tuỳ chọn)
Route::get('/sales/{id}', [SaleController::class, 'show'])->name('sales.show');

// Đường dẫn để chỉnh sửa thông tin đồ án (hiển thị form chỉnh sửa)
Route::get('/sales/{id}/edit', [SaleController::class, 'edit'])->name('sales.edit');

// Đường dẫn để cập nhật thông tin  (thực hiện cập nhật)
Route::put('/sales/{id}', [SaleController::class, 'update'])->name('sales.update');

// Đường dẫn để xóa  (thực hiện xóa sau khi có modal xác nhận)
Route::delete('/sales/{id}', [SaleController::class, 'destroy'])->name('sales.destroy');
