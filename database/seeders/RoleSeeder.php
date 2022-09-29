<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador ver todo
        $admin = Role::create(['name' => 'admin']);

        // Usuario solo puede ver la lista de usuario pero no puede crearlos
        $user = Role::create(['name' => 'user']);
        $permission = Permission::create(['name' => 'user.index'])->syncRoles([$admin , $user]);
        $permission = Permission::create(['name' => 'user.create'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'user.edit'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'user.update'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'user.store'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'user.show'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'user.destroy'])->syncRoles([$admin]);
    }
}
