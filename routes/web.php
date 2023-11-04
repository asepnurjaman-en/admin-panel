<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdditionalController AS AdminAdditional;
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
Route::prefix('admin')->middleware('role:developer,admin')->group(function() {
    Route::get('/', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::get('strbox/table', [AdminDashboard::class, 'strbox_datatable'])->name('strbox.datatable');
    /** Additional */
    Route::get('contact', [AdminAdditional::class, 'contact'])->name('contact.index');
    Route::put('contact/update', [AdminAdditional::class, 'contact_update'])->name('contact.update');
    Route::get('link/social-media', [AdminAdditional::class, 'social'])->name('link.index.social');
    Route::get('link/ecommerce', [AdminAdditional::class, 'ecommerce'])->name('link.index.ecommerce');
    Route::put('link/update', [AdminAdditional::class, 'link_update'])->name('link.update');
    /** Blog */
    Route::resource('blog', AdminBlog::class);
    Route::get('table/blog', [AdminBlog::class, 'datatable'])->name('blog.datatable');
    Route::get('log/blog/{id}', [AdminBlog::class, 'log'])->name('blog.log');
    Route::get('bin/blog', [AdminBlog::class, 'bin'])->name('blog.bin');
    Route::patch('bin/blog/{id}/restore', [AdminBlog::class, 'bin_restore'])->name('blog.bin.restore');
    Route::delete('bin/blog/clear', [AdminBlog::class, 'bin_clear'])->name('blog.bin.clear');
    Route::get('uncategorized/blog', [AdminBlog::class, 'uncategorized'])->name('blog.uncategorized');
    Route::get('table/uncategorized/blog', [AdminBlog::class, 'uncategorized_datatable'])->name('blog.uncategorized.datatable');
    Route::get('blog/comments/request', [AdminBlogComment::class, 'index'])->name('blog-comment.index');
    Route::get('blog/{id}/comments', [AdminBlogComment::class, 'show'])->name('blog-comment.show');
    Route::get('blog/{id}/comments/publish', [AdminBlogComment::class, 'update'])->name('blog-comment.update');
    Route::resource('blog-category', AdminBlogCategory::class);
    Route::get('bin/blog-category', [AdminBlogCategory::class, 'bin'])->name('blog-category.bin');
    Route::patch('bin/blog-category/{id}/restore', [AdminBlogCategory::class, 'bin_restore'])->name('blog-category.bin.restore');
    Route::delete('bin/blog-category/clear', [AdminBlogCategory::class, 'bin_clear'])->name('blog-category.bin.clear');
});
