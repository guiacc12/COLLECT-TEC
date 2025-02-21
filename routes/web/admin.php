<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoriaController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProdutoController;
use App\Http\Controllers\Backend\PromocaoController;
use Illuminate\Support\Facades\Route;

//rota admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
->middleware(['auth', 'admin'])
->name('admin.dashboard');

//ROTA ADMIN VER PERFIL
Route::get('admin/profile', [ProfileController::class, 'index'])
->middleware(['auth', 'admin'])
->name('admin.profile');

//ROTA ADMIN PARA ATUALIZAR PERFIL
Route::post('admin/profile/update', [ProfileController::class, 'update'])
->middleware(['auth', 'admin'])
->name('admin.profile.update');

//ROTA ADMIN PARA ATUALIZAR SENHA
Route::post('admin/profile/update/password', [ProfileController::class, 'updatePassword'])
->middleware(['auth', 'admin'])
->name('admin.profile.password');

//ROTA SLIDER DESTAQUE
Route::PUT('muda-status', [SliderController::class, 'mudaStatus'])->name('slider.muda-status');
Route::resource('admin/slider', SliderController::class)
->middleware(['auth', 'admin']);

//ROTA CATEGORIAS
Route::PUT('cMuda-status', [CategoriaController::class, 'cMudaStatus'])->name('categoria.muda-status');
Route::resource('admin/categoria', CategoriaController::class)
->middleware(['auth', 'admin']);

//ROTA PRODUTOS
Route::PUT('pMuda-status', [ProdutoController::class, 'pMudaStatus'])->name('produto.muda-status');
Route::resource('admin/produto', ProdutoController::class)
->middleware(['auth', 'admin']);

//ROTA PRODUTOS
Route::PUT('proMuda-status', [PromocaoController::class, 'proMudaStatus'])->name('promocao.muda-status');
Route::resource('admin/promocao', PromocaoController::class)
->middleware(['auth', 'admin']);
