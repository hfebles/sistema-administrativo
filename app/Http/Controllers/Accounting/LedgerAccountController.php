<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Accounting\LedgerAccount;
use App\Models\Accounting\Group;
use App\Models\Accounting\SubGroup;
use App\Models\Accounting\SubLedgerAccount;



class LedgerAccountController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:accounting-list|adm-list', ['only' => ['index']]);
         $this->middleware('permission:adm-create|accounting-create', ['only' => ['create','store']]);
         $this->middleware('permission:adm-edit|accounting-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:adm-delete|accounting-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $conf = [
            'agregar' => [ 'url' => "ledger-account" ],
        ];

        $data = DB::table('groups')->paginate(10);
        
        $table = [
            'c_table' => 'table table-bordered table-hover mb-0 ',
            'c_thead' => 'bg-gray-900 text-white',
            'ths' => ['#', 'Codigo', 'Grupo', ],
            'w_ts' => ['3','5', '',],
            'c_ths' => 
                [
                'text-center align-middle p-1',
                'text-center align-middle p-1', 
                'align-middle', ],
                
            'tds1' => ['code_group', 'name_group',],
            'switch' => false,
            'edit' => false,
            'show' => true,
            'url' => '/accounting/ledger-account',
            'id' => 'id_group',
            'data' => $data,
            'i' => (($request->input('page', 1) - 1) * 5),
        ];

        

        return view('accounting.ledger-account.index', compact('conf', 'table'));
        //return $table;

      
    }


    public function show($id){

        $conf = [
            'atras' => [ 'url' => "ledger-account" ],
        ];

        $data = DB::select('select g.code_group, g.name_group, sg.code_sub_group, sg.name_sub_group, c.code_ledger_account, c.name_ledger_account from ledger_accounts as c
                            INNER JOIN sub_groups as sg on sg.id_sub_group = c.id_sub_group
                            INNER JOIN groups as g on g.id_group = sg.id_group
                            GROUP BY g.id_group, sg.id_sub_group, c.id_ledger_account, g.code_group, g.name_group, sg.code_sub_group, sg.name_sub_group, c.code_ledger_account, c.name_ledger_account');
            
            $dataG = Group::where('id_group', '=', $id)->get()[0];



            $dataSG = SubGroup::where('id_group', '=', $id)->get();

            $dataLA = [];
            for($i = 0; $i < count($dataSG); $i++){
                $dataLA[$i] = LedgerAccount::where('id_sub_group', '=', $dataSG[$i]->id_sub_group)->get();
            }


            
            
           //return $dataG;
            return view('accounting.ledger-account.show', compact('conf', 'dataG', 'dataSG', 'dataLA'));
            
            //'tds2' => ['code_subgroup', 'name_subgroup',],
            //'tds3' => ['code_ledger_account', 'name_ledger_account',],
    }
}
