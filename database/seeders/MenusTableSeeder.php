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
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`) VALUES (1, 'Ventas', '', '0','0','1')");

        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`) VALUES (2, 'Almacen', '/almacen', '0','1','1')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`, `enabled`) VALUES (3, 'Nomina', '/', '0','1','3', '0')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`, `enabled`) VALUES (4, 'Empleados', '/', '0','1','4', '0')");
        DB::insert("INSERT INTO `menus`(`id`, `name`, `slug`, `parent`, `order`, `href`) VALUES (5, 'Mantenimientos', '/manetenice', '0','5','1')");

        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Clientes', '/clientes', '1','0','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Presupuestos', '/presupuestos', '1','1','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Facturas', '/facturas', '1','2','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Productos', '/inventario', '1','2','1')");


        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Tasa BCV', '/mantenice/bcv', '5','0','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Impuestos', '/mantenice/taxes', '5','0','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Bancos', '/mantenice/bank', '5','0','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Roles', '/mantenice/roles', '5','0','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Usuarios', '/mantenice/users', '5','0','1')");
        DB::insert("INSERT INTO `menus`(`name`, `slug`, `parent`, `order`, `href`) VALUES ('Menús', '/mantenice/menu', '5','0','1')");
    }
}