<?php

namespace Database\Seeders;

use App\Models\Conf\Menu;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Menu::truncate();
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES (1, 'Ventas', '', '0','0','1', 'sales')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`,`grupo`) VALUES (2, 'Contabilidad', '', '0','1','1', 'accounting')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES (3, 'Almacen', '/warehouse/warehouse', '0','2','1', 'warehouse')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES (7, 'RRHH', '', '0','3','1', 'rrhh')");
        
        
        
        
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`, `enabled`) VALUES (4, 'Nomina', '/', '0','3','3', '0')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`, `enabled`) VALUES (5, 'Empleados', '/', '0','4','4', '0')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`) VALUES (6, 'Mantenimientos', '/manetenice', '0','5','1')");

        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Clientes', 'clients.index', '1','0','0', 'sales-clients')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Pedidos de venta', 'sales-order.index', '1','1','0', 'sales-order')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `enabled`) VALUES ('Facturas', '/facturas', '1','2','1', '0')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `grupo`) VALUES ('Productos', 'product.salable', '1','2', 'product-product')");

        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Plan Contable', '/accounting/ledger-account', '2','0','1', 'accounting-ledger')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Asientos contables', '/accounting/accounting-records', '2','1','1', 'accounting-records')");

        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Trabajadores', 'workers.index', '7','0','0', 'rrhh-worker')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Grupos de trabajo', 'group-workers.index', '7','1','0', 'rrhh-group-worker')");

        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Configurar Pedidos de venta', 'order-config.index', '6','0','0', 'sales-order-conf')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Tasa BCV', 'exchange.index', '6','0','0', 'exchange')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `enabled`, `grupo`) VALUES ('Impuestos', '/mantenice/taxes', '6','0','1','1', 'taxes')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `enabled`, `grupo`) VALUES ('Bancos', '/mantenice/banks', '6','0','1','1', 'banks')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Grupos', 'roles.index', '6','0','0', 'roles')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Usuarios', 'users.index', '6','0','0', 'user')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Menús', 'menu.index', '6','0','0', 'menu')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Categorias de productos', 'category.index', '6','0','0', 'category')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Unidades de medidas', 'unit.index', '6','0','0', 'product-unit')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Presentaciónes', 'presentation.index', '6','0','0', 'product-presentation')");
        












DB::insert("INSERT INTO `products` (`id_product`, `name_product`, `description_product`, `price_product`, `product_usd_product`, `tax_exempt_product`, `qty_product`, `salable_product`, `code_product`, `part_number_product`, `lot_number_product`, `id_warehouse`, `id_product_category`, `id_unit_product`, `id_presentation_product`, `enabled_product`, `created_at`, `updated_at`) VALUES
(1, 'PRUEBA1', '1', 10.20, 1, 0, 50, 1, '001', NULL, NULL, 1, 1, 1, 1, 1, '2022-08-15 20:50:01', '2022-08-15 20:50:01')");

DB::insert("INSERT INTO `products` (`id_product`, `name_product`, `description_product`, `price_product`, `product_usd_product`, `tax_exempt_product`, `qty_product`, `salable_product`, `code_product`, `part_number_product`, `lot_number_product`, `id_warehouse`, `id_product_category`, `id_unit_product`, `id_presentation_product`, `enabled_product`, `created_at`, `updated_at`) VALUES
(2, 'PRUEBA2 ', '1', 100, 0, 1, 50, 1, '002', NULL, NULL, 1, 1, 1, 1, 1, '2022-08-15 20:50:01', '2022-08-15 20:50:01')");

DB::insert("INSERT INTO `product_categories` (`id_product_category`, `name_product_category`, `enabled_product_category`, `created_at`, `updated_at`) VALUES
(1, 'SALSA', 1, '2022-08-15 20:48:41', '2022-08-15 20:48:41')");



DB::insert("INSERT INTO `unit_products` (`id_unit_product`, `name_unit_product`, `short_unit_product`, `enabled_unit_product`, `created_at`, `updated_at`) VALUES
(1, 'KILO', 'KL', 1, '2022-08-15 20:48:23', '2022-08-15 20:48:23')");
DB::insert("INSERT INTO `unit_products` (`id_unit_product`, `name_unit_product`, `short_unit_product`, `enabled_unit_product`, `created_at`, `updated_at`) VALUES
(2, 'MILIGRAMO', 'MG', 1, '2022-08-15 20:48:23', '2022-08-15 20:48:23')");
DB::insert("INSERT INTO `unit_products` (`id_unit_product`, `name_unit_product`, `short_unit_product`, `enabled_unit_product`, `created_at`, `updated_at`) VALUES
(3, 'GRAMO', 'G', 1, '2022-08-15 20:48:23', '2022-08-15 20:48:23')");

DB::insert("INSERT INTO `unit_products` (`id_unit_product`, `name_unit_product`, `short_unit_product`, `enabled_unit_product`, `created_at`, `updated_at`) VALUES(4, 'METRO CUBICO', 'M3', 1, '2022-08-15 20:48:23', '2022-08-15 20:48:23')");
DB::insert("INSERT INTO `unit_products` (`id_unit_product`, `name_unit_product`, `short_unit_product`, `enabled_unit_product`, `created_at`, `updated_at`) VALUES(5, 'CENTIMERO CUBICO', 'CM3', 1, '2022-08-15 20:48:23', '2022-08-15 20:48:23')");
DB::insert("INSERT INTO `unit_products` (`id_unit_product`, `name_unit_product`, `short_unit_product`, `enabled_unit_product`, `created_at`, `updated_at`) VALUES(6, 'MILIMETRO CUBICO', 'ML3', 1, '2022-08-15 20:48:23', '2022-08-15 20:48:23')");

DB::insert("INSERT INTO `unit_products` (`id_unit_product`, `name_unit_product`, `short_unit_product`, `enabled_unit_product`, `created_at`, `updated_at`) VALUES(7, 'LITRO', 'L', 1, '2022-08-15 20:48:23', '2022-08-15 20:48:23')");
DB::insert("INSERT INTO `unit_products` (`id_unit_product`, `name_unit_product`, `short_unit_product`, `enabled_unit_product`, `created_at`, `updated_at`) VALUES(8, 'MILILITRO', 'ML', 1, '2022-08-15 20:48:23', '2022-08-15 20:48:23')");


DB::insert("INSERT INTO `presentation_products` (`id_presentation_product`, `name_presentation_product`, `enabled_presentation_product`, `created_at`, `updated_at`) VALUES(1, 'BOLSON', 1, '2022-08-15 20:48:07', '2022-08-15 20:48:07')");

DB::insert("INSERT INTO `warehouses` (`id_warehouse`, `name_warehouse`, `code_warehouse`, `id_company`, `enabled_warehouse`, `created_at`, `updated_at`) VALUES(1, 'PRODUCTO TERMINADO', 'PT', NULL, 1, '2022-08-15 22:06:51', '2022-08-15 22:06:51')");
DB::insert("INSERT INTO `warehouses` (`id_warehouse`, `name_warehouse`, `code_warehouse`, `id_company`, `enabled_warehouse`, `created_at`, `updated_at`) VALUES(2, 'MATERIA PRIMA', 'MP', NULL, 1, '2022-08-15 22:06:51', '2022-08-15 22:06:51')");



DB::insert("INSERT INTO `order_states` (`id_order_state`, `name_order_state`, `enabled_order_state`) VALUES
(1, 'Pedido por facturar', '1')");
DB::insert("INSERT INTO `order_states` (`id_order_state`, `name_order_state`, `enabled_order_state`) VALUES
(2, 'Facturado', '1')");
DB::insert("INSERT INTO `order_states` (`id_order_state`, `name_order_state`, `enabled_order_state`) VALUES
(3, 'Cancelado', '1')");
}

}