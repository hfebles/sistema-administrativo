<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\SubGroup;

class SubGroupController extends Controller
{
    
    public function store(Request $request){

        $data = $request->except('_token');

        $save = new SubGroup();
        $save->code_sub_group = $data['code_sub_group'];
        $save->name_sub_group = strtoupper($data['name_sub_group']);
        $save->id_group = $data['id_group'];
        $save->save();

        return redirect()->route('ledger-account.show', $save->id_group);

    }
}
