<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Đường dẫn hiển thị danh sách đồ án (trang chủ)

Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Đường dẫn để tạo mới một đồ án (hiển thị form thêm mới)
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Đường dẫn để lưu dữ liệu đồ án mới (thực hiện thêm mới)
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


// Đường dẫn để chỉnh sửa thông tin đồ án (hiển thị form chỉnh sửa)
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Đường dẫn để cập nhật thông tin đồ án (thực hiện cập nhật)
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

// Đường dẫn để xóa đồ án (thực hiện xóa sau khi có modal xác nhận)
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
