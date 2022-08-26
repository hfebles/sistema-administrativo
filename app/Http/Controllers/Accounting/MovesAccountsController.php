<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Accounting\MovesAccounts;
use Illuminate\Http\Request;

class MovesAccountsController extends Controller
{
    public function createMoves($ref, $type){

        $move = new MovesAccounts();

        $move->ref_moves_account = $ref;
        $move->type_moves_account = $type;
        $move->save();

        return ['id_move' => $move->id, 'type_move' => $type];
    }


    public function verMovimientos($id){

        $data = MovesAccounts::select('moves_accounts.*', 'accounting_entries.*')
        ->join('accounting_entries', 'accounting_entries.id_moves_account', '=', 'moves_accounts.id_moves_account')
        ->where('moves_accounts.id_moves_account', '=', $id)
        ->get();


        return $data;
    }
}
