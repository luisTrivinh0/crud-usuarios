<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\FinancialController;

// Rotas de autenticação
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);

// Rotas do CRUD de usuários
Route::middleware('auth:sanctum')->group(function () {
    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::put('users/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);

    // Rotas para adicionar/remover os perfis do usuário
    Route::post('users/{user}/add-moderator-role', [UserController::class, 'addModeratorRole']);
    Route::post('users/{user}/remove-moderator-role', [UserController::class, 'removeModeratorRole']);
    Route::post('users/{user}/add-admin-role', [UserController::class, 'addAdminRole']);
    Route::post('users/{user}/remove-admin-role', [UserController::class, 'removeAdminRole']);
    Route::post('users/{user}/add-financial-role/{level}', [UserController::class, 'addFinancialRole']);
    Route::put('users/{user}/update-financial-role/{level}', [UserController::class, 'updateFinancialRole']);
    Route::post('users/{user}/remove-financial-role', [UserController::class, 'removeFinancialRole']);
});

// Rotas do controlador de administrador
Route::middleware(['auth:sanctum', 'role:administrador'])->group(function () {
    Route::get('admin', [AdminController::class, 'index']);
    Route::post('admin', [AdminController::class, 'store']);
    Route::get('admin/{admin}', [AdminController::class, 'show']);
    Route::put('admin/{admin}', [AdminController::class, 'update']);
    Route::delete('admin/{admin}', [AdminController::class, 'destroy']);
});

// Rotas do controlador de moderador
Route::middleware(['auth:sanctum', 'role:moderador'])->group(function () {
    Route::get('moderator', [ModeratorController::class, 'index']);
    Route::get('moderator/{moderator}', [ModeratorController::class, 'show']);
});

// Rotas do controlador financeiro
Route::middleware(['auth:sanctum', 'role:financeiro-excluir'])->group(function () {
    Route::delete('financial/{financial}', [FinancialController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'role:financeiro-editar'])->group(function () {
    Route::put('financial/{financial}', [FinancialController::class, 'update']);
});
