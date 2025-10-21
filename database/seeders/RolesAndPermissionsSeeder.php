<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Limpa o cache de permissões (evitar erros)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Cria os perfis
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'produtor de eventos']);
        Role::create(['name' => 'cliente']);
    }
}
