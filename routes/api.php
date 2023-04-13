<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/cliente')->group(function () {
    Route::get("/consulta", [ClientController::class, 'get'])->name("get.listagem");
    Route::post("/cadastrar", [ClientController::class, 'create'])->name("post.cadastrar");
    Route::put("/atualizar/{id}", [ClientController::class, 'update'])->name("put.atualizar");
    Route::delete("/deletar/{id}", [ClientController::class, 'delete'])->name("delete.delete");
});

Route::fallback(function ($e) {
    return response()->json([
        "success"  => false,
        "message" => "Rota não localizada",
        "data"    => []
    ], 404);
});