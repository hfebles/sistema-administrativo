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
| TASA BCV      | exchange-list       |
|    | exchange-create        |
|    | exchange-edit        |
|    | exchange-delete        |
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
| Ventas (pedidos)      | sales-order-list       |
|    | sales-order-create        |
|    | sales-order-edit        |
|    | sales-order-delete        |
| Ventas (mant conf)      | sales-order-conf-list       |
|    | sales-order-conf-create        |
|    | sales-order-conf-edit        |
|    | sales-order-conf-delete        |
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
| Unidad de prouctos (conf) | product-unit-list       |
|    | product-unit-create        |
|    | product-unit-edit        |
|    | product-unit-delete        |
| Prouctos | product-product-list       |
|    | product-product-create        |
|    | product-product-edit        |
|    | product-product-delete        |
| RRHH (menu) | rrhh-list       |
|    | rrhh-create        |
|    | rrhh-edit        |
|    | rrhh-delete        |
| RRHH Trabajadores | rrhh-worker-list       |
|    | rrhh-worker-create        |
|    | rrhh-worker-edit        |
|    | rrhh-worker-delete        |
| RRHH Grupos de trabajo | rrhh-group-worker-list       |
|    | rrhh-group-worker-create        |
|    | rrhh-group-worker-edit        |
|    | rrhh-group-worker-delete        |
| Impuestos | taxes-list       |
|    | taxes-create        |
|    | taxes-edit        |
|    | taxes-delete        |
| Bancos | banks-list       |
|    | banks-create        |
|    | banks-edit        |
|    | banks-delete        |
| Pagos | payment-list       |
|    | payment-create        |
|    | payment-edit        |
|    | payment-delete        |
| Facturacion | 'sales-invoices-list       |
|    | 'sales-invoices-create        |
|    | 'sales-invoices-edit        |
|    | 'sales-invoices-delete        |




```php

        $permissions = [ 
            //root
            'adm-list', 'adm-create', 'adm-edit', 'adm-delete',

            //menu
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'user-list', 'user-create', 'user-edit', 'user-delete',
            'menu-list', 'menu-create', 'menu-edit', 'menu-delete',
            'exchange-list', 'exchange-create', 'exchange-edit', 'exchange-delete',
            'sales-list', 'sales-create', 'sales-edit', 'sales-delete',
            'accounting-list', 'accounting-create', 'accounting-edit', 'accounting-delete',
            'warehouse-list', 'warehouse-create', 'warehouse-edit', 'warehouse-delete',
            'rrhh-list', 'rrhh-create', 'rrhh-edit', 'rrhh-delete',
            'product-unit-list', 'product-unit-create', 'product-unit-edit', 'product-unit-delete',
            'product-presentation-list', 'product-presentation-create', 'product-presentation-edit', 'product-presentation-delete',
            'product-category-list', 'product-category-create', 'product-category-edit', 'product-category-delete',
            'taxes-list', 'taxes-create', 'taxes-edit', 'taxes-delete',
            'banks-list', 'banks-create', 'banks-edit', 'banks-delete',

            //Pagos
            'payment-list', 'payment-create', 'payment-edit', 'payment-delete',
            
            

            //accounting
            'accounting-ledger-list', 'accounting-ledger-create', 'accounting-ledger-edit', 'accounting-ledger-delete',
            'accounting-records-list', 'accounting-records-create', 'accounting-records-edit', 'accounting-records-delete',

            //VENTAS
            'sales-clients-list', 'sales-clients-create', 'sales-clients-edit', 'sales-clients-delete',
            'sales-order-list', 'sales-order-create', 'sales-order-edit', 'sales-order-delete',
            'sales-order-conf-list', 'sales-order-conf-create', 'sales-order-conf-edit', 'sales-order-conf-delete',
            'sales-invoices-list', 'sales-invoices-create', 'sales-invoices-edit', 'sales-invoices-delete',

            // Warehouse
            'warehouse-warehouse-list', 'warehouse-warehouse-create', 'warehouse-warehouse-edit', 'warehouse-warehouse-delete',

            //products
            'product-product-list', 'product-product-create', 'product-product-edit', 'product-product-delete',


            //RRHH
            'rrhh-worker-list', 'rrhh-worker-create', 'rrhh-worker-edit', 'rrhh-worker-delete',
            'rrhh-group-worker-list', 'rrhh-group-worker-create', 'rrhh-group-worker-edit', 'rrhh-group-worker-delete',
        ];

```



seeder plan de cuentas
http://127.0.0.1:8000/accounting/group-accounting




clientes
```sql

INSERT INTO `clients`( `name_client`, `idcard_client`, `address_client`, `id_state`) VALUES ('INVERSIONES LUDYS MODAS C.A', 'J402050054', 'AV ANDRES BELLO EDIF CECALA 56 PISO PB', 4),
('FELIZ INFANTIL', 'J400794226', 'AV FRANCISCO DE LORETO LOCAL NRO 47-1', 4),
('FELIZ BABY', 'J407445863', 'CALLE LONGORIA C.C VICTORIA CENTER PB LOCAL A-56', 4),
('RESTURANT LUNCHERIA LA PROVIDENCIA', 'J296261172', 'CALLE LIBERTADOR CRUCE CON RIVAS DAVILA LA VICTORIA EDO ARAGUA', 4),
('EXPRESS MANSION VICTORIA', 'J407968050', 'CALLE RIVAS DAVILA CC PLENO CENTRO NIVEL 1 LOCAL 5 Y 6', 4),
('INVERSIONES DELICIOUS CREAM C.A', 'J406235768', 'CALLE LIBERTADOR CRUCE CON RIVAS DAVILA C.C PLENO CENTRO NIVEL PB LOCAL 1 Y 2 LA VICTORIA EDO ARAGUA', 4),
('SUNTORY C.A', 'J299564273', 'CALLE RIVAS DAVILA NRO 48', 4),
('INVERSIONES SATURNO', 'J405695870', 'MERCADO CAMPESINO LA MORA', 4),
('INVERSIONES AGROCOL', 'J409926818', 'AV PRINCIPAL LA MORA MERCADO CAMPESINO LA MORA', 4),
('PANADERIA CHARCUTERIA LA MANSION DEL PAN II', 'J307563532', 'CALLE GARCIA DE SENA EDIF SAN JUDAS PB LOCAL 01', 4),
('ASOCIACION COOPERATIVA EL PARIENTE R.L', 'J314106970', 'CTRA PANAMERICANA LOCAL NRO 6-1 SECTOR EL MATADERO LAS TEJERIAS EDO ARAGUA', 4),
('PLACE ZONE', 'J295746598', 'ESQ RIVAS DAVILA CON CALLE LIBERTADOR CENTRO LA VICTORIA', 4),
('ABASTO MUSSLE FEHR', 'J143549026', 'VÍA PRINCIPAL VICTORIA MATA PALO', 4),
('DISTRIBUIDORA DICONO, C.A', 'J297197109', 'MERCADO CAMPESINO LA MORA', 4),
('SUPERMERCADO MORICHAL, C.A', 'J308712817', 'AV UNIVERSIDAD CC MORICHAL NIVEL PB LA VICTORIA', 4),
('CONFITERIA ANDRES BELLO, C.A', 'J296548539', 'CALLE ANDRES BELLO EDIF CENTRAL PISO PB LOCAL 2-A ZONA CENTRO LA VICTORIA ARAGUA', 4),
('MANICERIA, REPOSTERIA Y CONDIMENTOS LOS CATIIIIRES', 'J409669408', 'CALLE RIBAS DAVILA C/C LIBERTADOR LOCAL NRO 12 SECTOR CENTRO LA VICTORIA ARAGUA', 4),
('DISTRIBUIDORA SOCO FC, C.A', 'J404115293', 'AV PRINCIPAL SOCO LOCAL NASTAS PLANTA BAJA #01', 4),
('FRIGORIFICO CHARCUTERIA DELICTESES LA SUPREMA', 'J309395866', 'CALLE LONGORIA C.C CARABOBO CC VICTORIA LOCAL 111-112', 4),
('SUPERMERCADOS EL BOSQUE', 'J413107724', 'AV. LAS DELICIAS C.C C.A REGIONAL NIVEL PB LOCAL 03 URB EL BOSQUE MARACAY EDO ARAGUA', 4),
('LUNA INFANTIL C.A', 'J299784796', 'AV MIRANDA ESTE 32 CC MIRANDA PLAZA NIVEL PB LOCAL 11 SECTOR CENTRO MARACAY EDO ARAGUA', 4),
('CASA AUDIO VIDEO', 'J310637997', 'AV BOLIVAR ESTE CASCO CENTRAL LOCAL NRO 7-A', 4),
('INVERSIONES NEW CENTURY 2010 C.A', 'J298503793', 'AV BOLIVAR ESTE LOCAL NRO 11 SECTOR CENTRO MARACAY', 4),
('FESTIMAGIC C.A', 'J500642903', 'AV SANTOS MICHELENA Y PEREZ ALMARZA EDIF ORTON PISO PB LOCAL 35', 4),
('COMERCIAL LUCKY FUNG', 'J316337847', 'BOULEVARD PEREZ ALMARZA LOCAL NRO 18 SECTOR CENTRO MARACAY EDO ARAGUA', 4),
('DIADEMAS UNIDAS 2016, C.A', 'J408357496', 'CALLE VARGAS LOCAL NRO 25 SECTOR CASCO CENTRAL', 4),
('FARMACIA DIGA CENTER', 'J308154105', 'AV DOCTOR MONTOYA SECTOR LA MORITA C.C DIGACENTER LOCAL 12 Y 13', 4),
('MANSION IMPERIAL', 'J310888167', 'AV LAS DELICIAS MARACAY', 4),
('VIP MANSION C.A', 'J412889869', 'AV INTERCOMUNAL TUMERO- MARACAY CENTRO COMERCIAL EL SOL LOCAL PB DEL 01-09', 4),
('INVERSIONES LEON & YOLANDA', 'J404959769', 'CALLE CARABOBO SUR LOCAL 145 BARRIO SANTA ROSA', 4),
('FARMACIA LAS BALLENAS 2020 C.A', 'J500389183', 'FRENTE A LAS BALLENAS', 4),
('INVERSIONES DON PAPA', 'J412632795', 'CALLE LOPEZ AVELEDO CRUCE CON LA CUARTA TRANSVERSAL NRO 49', 4),
('CORPORACIÓN UNIVEN', 'J294625827', 'AV SANTOS MICHELENA CRUCE CON LIBERTAD LOCAL NRO 82 ZONA CENTRO MARACAY', 4),
('COMERCIAL BUEN FUTURO 2018, C.A', 'J412900390', 'AV. BOLIVAR OESTE LOCAL 74 SECTOR CENTRO MARACAY', 4),
('COMERCIAL CONFI-BOYACA', 'J299132861', 'CALLE BOYACA LOCAL NRO 0 SECTOR CENTRO MARACAY', 4),
('FARMACIA GALERIA PLAZA C.A', 'J500772408', 'AV BOLIVAR CC GALERIA PLAZA NIVEL PLANTA BAJA LOCAL PB-144; PB-145; PB- 146; PB-147; PB--148; SECTOR CENTRO MARACAY', 4),
('INVERSIONES CANALETTO, C.A', 'J413086700', 'AV ANDRES BELLO LOCAL COMERCIAL NRO 6 SECTOR LA COOPERATIVA MARACAY ARAGUA', 4),
('SUPERMECADOS LI FENG, C.A', 'J313539996', 'AV VENEZUELA ENTRE AVENIDA COROPO Y CALLE LIBERTADOR LOCAL NRO 154 BARRIO LA PAZ SANTA RITA', 4),
('FARMACIA LOS JARALES, C.A', 'J402593708', 'AV DON JULIO CENTENO PARCELA 10-I CC LOS JARALES NIVEL PB LOCAL LPB 14 URB. ASENTAMIENTO CAMPESINO LOS HARALES SAN DIEGO VALENCIA EDO CARABOBO', 4),
('GRUPO SOL ROJO, C.A', 'J411995592', 'AV SANTOS MICHELENA NRO 40 MARACAY EDO ARAGUA', 4),
('PAMBOO MARKET, C.A', 'J500767286', 'AV BERMUDEZ LOCAL LOCAL NRO 92 BARRIO BARRIO LOURDES MARACAY ARAGUA', 4),
('COMERCIAL DAI CHANG, C.A', 'J311325247', 'CALLE BOYACA LOCAL NRO 50 SECTOR CENTRO MARACAY ESTADO ARAGUA', 4),
('COMERCIAL W 38, C.A', 'J315733889', 'CALLE BOYACA LOCAL LOCAL NRO 7 ZONA CENTRO MARACAY ESTADO ARAGUA', 4),
('FARMACIA HYPER JUMBO, C.A', 'J309437151', 'AV CASANOVA GODOY CC HYPER JUMBO NIVEL PB LOCAL 27 Y 28 URB BASE ARAGUA MARACAY', 4),
('DISTRIBUIDORA YELMAN, C.A', 'J500017529', 'AV FRANCISCO DE MIRANDA LOCAL NRO 8 SECTOR LA HOYADA LOS TEQUES MIRANDA', 4),
('COMERCIAL BABY LUCKY, C.A', 'J297864652', 'CALLE CARABOBO SUR EDFI CARMENCITA LOCAL NRO 85 SECTOR SANTA ROSA MARACAY ARAGUA', 4),
('GRUPO NOVO MARKET, C.A', 'J412092804', 'CALLE VARGAS NORTE PARCELA 10 Y 12 C.C SAMBIL PLAZA PLAZA NIVEL PB LOCAL 01 SECTOR CENTRO MARACAY', 4),
('COMERCIAL CASA MIRANDA, C.A', 'J405613076', 'CALLE VARGAS SUR LOCAL NRO 36 SECTOR CENTRO MARACAY ARAGUA', 4),
('COMERCIAL SONIDO GRAN ORIENTAL', 'J298502215', 'CALLE PAEZ ENTRE BOYACA Y AYACUCHO N-104-42-17 SECTOR CENTRO', 4),
('MULTIVEN 88', 'J40012779', 'CALLE MIRANDA CASA NRO 8', 4),
('MULTITIENDA ÉXITO C.A', 'J413199319', 'CALLE BERMUDEZ EDIF FENG PISO 1 LOCAL 104-37-34', 4),
('DISTRIBUIDORA UNICA MIRANDA', 'J311212604', 'AV MIRANDA CRUCE CON INDEPENDENCIA EDIF SAN ESTEBAM NRO 104-36', 4),
('INVERSIONES POPULAR II', 'J404981845', 'AV BERMUDEZ ESTE ENTRE CALLE INDEPENDENCIA Y BOYACA NRO 01-04', 4),
('INVERSIONES LUNA SOL', 'J405047968', 'CALLE INDEPENDENCIA NRO 104-23-10', 4);

INSERT INTO `sale_order_configurations` (`id_sale_order_configuration`, `print_name_sale_order_configuration`, `correlative_sale_order_configuration`, `control_number_sale_order_configuration`, `id_sub_ledger_account`, `enabled_sale_order_configuration`, `created_at`, `updated_at`) VALUES (NULL, 'pb', 'PV', '1', NULL, '1', NULL, NULL);
```