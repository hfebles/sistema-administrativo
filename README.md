### Permisología



| Nombre      | Descricíon |
| :-----------: | :----------- |
|root       | adm-list       |
|    | adm-create        |
|    | adm-edit        |
|    | adm-delete        |
| Roles      | role-list       |
|    | role-create        |
|    | role-edit        |
|    | role-delete        |
| Usuarios      | user-list       |
|    | user-create        |
|    | user-edit        |
|    | user-delete        |
| Menus      | menu-list       |
|    | menu-create        |
|    | menu-edit        |
|    | menu-delete        |
| Ventas (permiso para ver el dropdown)      | sales-list       |
|    | sales-create        |
|    | sales-edit        |
|    | sales-delete        |
| Contabilidad (ver el dropdown)      | accounting-list       |
|    | accounting-create        |
|    | accounting-edit        |
|    | accounting-delete        |
| Contabilidad (Plan contable)      | accounting-ledger-list       |
|    | accounting-ledger-create        |
|    | accounting-ledger-edit        |
|    | accounting-ledger-delete        |
| Contabilidad (asientos contable)      | accounting-records-list       |
|    | accounting-records-create        |
|    | accounting-records-edit        |
|    | accounting-records-delete        |
| Ventas (clientes)      | clients-list       |
|    | sales-clients-create        |
|    | sales-clients-edit        |
|    | sales-clients-delete        |
| Almacen (ver el dropdown)      | warehouse-list       |
|    | warehouse-create        |
|    | warehouse-edit        |
|    | warehouse-delete        |
| Almacen      | warehouse-warehouse-list       |
|    | warehouse-warehouse-create        |
|    | warehouse-warehouse-edit        |
|    | warehouse-warehouse-delete        |
| Categoria de prouctos (conf) | product-category-list       |
|    | product-category-create        |
|    | product-category-edit        |
|    | product-category-delete        |
| Presentacion de prouctos (conf) | product-category-list       |
|    | product-presentation-create        |
|    | product-presentation-edit        |
|    | product-presentation-delete        |
| Unidad de prouctos (conf) | product-category-list       |
|    | product-unit-create        |
|    | product-unit-edit        |
|    | product-unit-delete        |







```php

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
            'warehouse-list',
            'warehouse-create',
            'warehouse-edit',
            'warehouse-delete',
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
            'warehouse-warehouse-list',
            'warehouse-warehouse-create',
            'warehouse-warehouse-edit',
            'warehouse-warehouse-delete',
            'product-category-list',
            'product-category-create',
            'product-category-edit',
            'product-category-delete',
            'product-unit-list',
            'product-unit-create',
            'product-unit-edit',
            'product-unit-delete',
            'product-presentation-list',
            'product-presentation-create',
            'product-presentation-edit',
            'product-presentation-delete',
            
            
        ];

```



seeder plan de cuentas
http://127.0.0.1:8000/accounting/group-accounting