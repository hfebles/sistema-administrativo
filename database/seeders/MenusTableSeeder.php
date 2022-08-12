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

        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`) VALUES (3, 'Almacen', '/almacen', '0','2','1')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`, `enabled`) VALUES (4, 'Nomina', '/', '0','3','3', '0')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`, `enabled`) VALUES (5, 'Empleados', '/', '0','4','4', '0')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`) VALUES (6, 'Mantenimientos', '/manetenice', '0','5','1')");

        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Clientes', 'clients.index', '1','0','0', 'sales-clients')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Presupuestos', '/presupuestos', '1','1','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Facturas', '/facturas', '1','2','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Productos', '/inventario', '1','2','1')");

        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Plan Contable', '/accounting/ledger-account', '2','0','1', 'accounting-ledger')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Asientos contables', '/accounting/accounting-records', '2','1','1', 'accounting-records')");

        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Tasa BCV', '/mantenice/bcv', '6','0','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Impuestos', '/mantenice/taxes', '6','0','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Bancos', '/mantenice/bank', '6','0','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Roles', '/mantenice/roles', '6','0','1', 'roles')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Usuarios', '/mantenice/users', '6','0','1', 'user')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`, `grupo`) VALUES ('Menús', '/mantenice/menu', '6','0','1', 'menu')");
    }
}