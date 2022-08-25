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
            'adm-list', 'adm-create', 'adm-edit', 'adm-delete',

            'role-list', 'role-create', 'role-edit', 'role-delete',
            'user-list', 'user-create', 'user-edit', 'user-delete',
            'menu-list', 'menu-create', 'menu-edit', 'menu-delete',
            'exchange-list', 'exchange-create', 'exchange-edit', 'exchange-delete',
            'sales-list', 'sales-create', 'sales-edit', 'sales-delete',
            'accounting-list', 'accounting-create', 'accounting-edit', 'accounting-delete',
            'warehouse-list', 'warehouse-create', 'warehouse-edit', 'warehouse-delete',
            'rrhh-list', 'rrhh-create', 'rrhh-edit', 'rrhh-delete',
            'taxes-list', 'taxes-create', 'taxes-edit', 'taxes-delete',
            'banks-list', 'banks-create', 'banks-edit', 'banks-delete',
            'invoices-list', 'invoices-create', 'invoices-edit', 'invoices-delete',

            'payment-list', 'payment-create', 'payment-edit', 'payment-delete',

            'accounting-ledger-list', 'accounting-ledger-create', 'accounting-ledger-edit', 'accounting-ledger-delete',
            'accounting-records-list', 'accounting-records-create', 'accounting-records-edit', 'accounting-records-delete',

            'sales-clients-list', 'sales-clients-create', 'sales-clients-edit', 'sales-clients-delete',
            'sales-order-list', 'sales-order-create', 'sales-order-edit', 'sales-order-delete',
            'sales-order-conf-list', 'sales-order-conf-create', 'sales-order-conf-edit', 'sales-order-conf-delete',
            'sales-invoices-list', 'sales-invoices-create', 'sales-invoices-edit', 'sales-invoices-delete',
            'sales-invoices-conf-list', 'sales-invoices-conf-create', 'sales-invoices-conf-edit', 'sales-invoices-conf-delete',

            'warehouse-warehouse-list', 'warehouse-warehouse-create', 'warehouse-warehouse-edit', 'warehouse-warehouse-delete',

            'product-category-list', 'product-category-create', 'product-category-edit', 'product-category-delete',
            'product-unit-list', 'product-unit-create', 'product-unit-edit', 'product-unit-delete',
            'product-presentation-list', 'product-presentation-create', 'product-presentation-edit', 'product-presentation-delete',
            'product-product-list', 'product-product-create', 'product-product-edit', 'product-product-delete',

            'rrhh-worker-list', 'rrhh-worker-create', 'rrhh-worker-edit', 'rrhh-worker-delete',
            'rrhh-group-worker-list', 'rrhh-group-worker-create', 'rrhh-group-worker-edit', 'rrhh-group-worker-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}