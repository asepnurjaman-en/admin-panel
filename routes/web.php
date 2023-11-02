<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController AS AdminBlog;
use App\Http\Controllers\Admin\DashboardController AS AdminDashboard;
use App\Http\Controllers\Admin\BlogCommentController AS AdminBlogComment;
use App\Http\Controllers\Admin\BlogCategoryController AS AdminBlogCategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('admin')->group(function() {
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::get('strbox/table', [AdminDashboard::class, 'strbox_datatable'])->name('strbox.datatable');
    /** Blog */
    Route::resource('blog', AdminBlog::class);
    Route::get('log/blog/{id}', [AdminBlog::class, 'log'])->name('blog.log');
    Route::get('table/blog', [AdminBlog::class, 'datatable'])->name('blog.datatable');
    Route::get('bin/blog', [AdminBlog::class, 'bin'])->name('blog.bin');
    Route::patch('bin/blog/{id}/restore', [AdminBlog::class, 'bin_restore'])->name('blog.bin.restore');
    Route::delete('bin/blog/clear', [AdminBlog::class, 'bin_clear'])->name('blog.bin.clear');
    Route::get('blog/comments/request', [AdminBlogComment::class, 'index'])->name('blog-comment.index');
    Route::get('blog/{id}/comments', [AdminBlogComment::class, 'show'])->name('blog-comment.show');
    Route::get('blog/{id}/comments/publish', [AdminBlogComment::class, 'update'])->name('blog-comment.update');
    Route::resource('blog-category', AdminBlogCategory::class);
});
