<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class QuartoController extends Controller
{

    public function index(): Collection
    {
        return DB::table('quartos')->get();
    }

    public function show(string $id)
    {
        return DB::table('quartos')->where([
            'id' => $id
        ])->first();
    }

}
