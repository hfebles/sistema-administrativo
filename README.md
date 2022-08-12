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
|    | clients-create        |
|    | clients-edit        |
|    | clients-delete        |







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

```



seeder plan de cuentas
http://127.0.0.1:8000/accounting/group-accounting