<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function index(): Collection
    {
        return DB::table('reservas')
            ->join(
            'clientes',
            'reservas.cliente_id',
            '=',
            'clientes.id')
            ->join(
                'quartos',
                'reservas.quarto_id',
                '=',
                'quartos.id'
            )
            ->select('clientes.nome as cliente', 'quartos.numero as quarto', 'data_checkin', 'data_checkout', 'status', 'preco_total', 'reservas.id as id')
            ->get();
    }

    public function store(StoreReservaRequest $request): JsonResponse
    {
        $cliente = DB::table('clientes')->first();

         DB::table('quartos')
            ->where('id', $request->quarto_id)
            ->update(['disponivel' => false]);

        $reserva = DB::table('reservas')->insert([
            'cliente_id' => $cliente->id,
            'quarto_id' => $request->quarto_id,
            'data_checkin' => Carbon::today(),
            'data_checkout' => Carbon::today(),
            'status' => 'reservado',
            'preco_total' => $request->preco_total,
            'created_at' => Carbon::today(),
            'updated_at' => Carbon::today(),
        ]);

        return response()->json($reserva, 201);
    }

}
