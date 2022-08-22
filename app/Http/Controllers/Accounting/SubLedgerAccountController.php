<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\SubLedgerAccount;


class SubLedgerAccountController extends Controller
{
    public function store(Request $request){

        $data = $request->except('_token');

        $save = new SubLedgerAccount();
        $save->code_sub_ledger_account = $data['code_sub_ledger_account'];
        $save->name_sub_ledger_account = strtoupper($data['name_sub_ledger_account']);
        $save->id_ledger_account = $data['id_ledger_account'];
        $save->save();

        return redirect()->route('ledger-account.show',  $data['id_group']);

    }
}
