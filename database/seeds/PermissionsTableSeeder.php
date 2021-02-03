<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'organizacion_create',
            ],
            [
                'id'    => 18,
                'title' => 'organizacion_edit',
            ],
            [
                'id'    => 19,
                'title' => 'organizacion_show',
            ],
            [
                'id'    => 20,
                'title' => 'organizacion_delete',
            ],
            [
                'id'    => 21,
                'title' => 'organizacion_access',
            ],
            [
                'id'    => 22,
                'title' => 'alcanceuno_create',
            ],
            [
                'id'    => 23,
                'title' => 'alcanceuno_edit',
            ],
            [
                'id'    => 24,
                'title' => 'alcanceuno_show',
            ],
            [
                'id'    => 25,
                'title' => 'alcanceuno_delete',
            ],
            [
                'id'    => 26,
                'title' => 'alcanceuno_access',
            ],
            [
                'id'    => 27,
                'title' => 'alcancedo_create',
            ],
            [
                'id'    => 28,
                'title' => 'alcancedo_edit',
            ],
            [
                'id'    => 29,
                'title' => 'alcancedo_show',
            ],
            [
                'id'    => 30,
                'title' => 'alcancedo_delete',
            ],
            [
                'id'    => 31,
                'title' => 'alcancedo_access',
            ],
            [
                'id'    => 32,
                'title' => 'huella_create',
            ],
            [
                'id'    => 33,
                'title' => 'huella_edit',
            ],
            [
                'id'    => 34,
                'title' => 'huella_show',
            ],
            [
                'id'    => 35,
                'title' => 'huella_delete',
            ],
            [
                'id'    => 36,
                'title' => 'huella_access',
            ],
            [
                'id'    => 37,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
