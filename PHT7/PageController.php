<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHomepage()
{
     $viewTitle = 'PHT Chương 7 - Blade Template';
        $pageTitle = 'Chào mừng bạn đến với Blade!';
        $pageDescription = 'Đây là trang chủ được render bằng Blade Template
Engine.';
        $tasks = [
            'Cài đặt Laravel',
            'Hiểu về Routing & Controller',
            'Tạo Layout với Blade',
            'Truyền dữ liệu cho View'
        ];

         return view('homepage', [
            'title' => $viewTitle,
            'page_title' => $pageTitle,
            'page_description' => $pageDescription,
            'tasks' => $tasks
        ]);
}
}
