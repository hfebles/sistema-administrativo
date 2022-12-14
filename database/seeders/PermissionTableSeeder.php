<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $permissions = [
            'adm-list',
            'adm-create',
            'adm-edit',
            'adm-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'menu-list',
            'menu-create',
            'menu-edit',
            'menu-delete',
            'sales-list',
            'sales-create',
            'sales-edit',
            'sales-delete',
            'accounting-list',
            'accounting-create',
            'accounting-edit',
            'accounting-delete',
            'accounting-ledger-list',
            'accounting-ledger-create',
            'accounting-ledger-edit',
            'accounting-ledger-delete',
            'accounting-records-list',
            'accounting-records-create',
            'accounting-records-edit',
            'accounting-records-delete',
            'sales-clients-list',
            'sales-clients-create',
            'sales-clients-edit',
            'sales-clients-delete',
            
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}