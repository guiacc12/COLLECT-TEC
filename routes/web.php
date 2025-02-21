<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('welcome');
});


//chamando rotas MSFLIX ORGANIZADAS
foreach(File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}

require __DIR__.'/auth.php';

//ROTA ADMIN LOGIN
Route::get('login', [AdminController::class, 'login'])->name('login');

//ROTA ADMIN RECUPERAÇÃO DE SENHA
Route::get('forgot-password', [AdminController::class, 'forgot'])->name('forgot');
