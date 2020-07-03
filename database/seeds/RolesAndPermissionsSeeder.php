<?php

use App\Base\Constants\Auth\Permission as PermissionSlug;
use App\Base\Constants\Auth\Role as RoleSlug;
use App\Models\Access\Permission;
use App\Models\Access\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
      * List of all the permissions to be created.
      *
      * @var array
      */

    protected $permissions = [

        PermissionSlug::ACCESS_DASHBOARD => [
            'name' => 'Access-Dashboard',
            'description' => 'Access Dashboard',
            'main_menu' => 'dashboard',
            'sub_menu' => null,
            'sort' => 1,
            'main_link' => 'dashboard',
            'icon' => 'fa fa-tachometer'
        ],
        PermissionSlug::GET_ALL_ROLES => [
            'name' => 'Get-All-Roles',
            'description' => 'Get all roles',
            'main_menu'=>'settings',
            'sub_menu'=>'roles',
            'sub_link'=>'roles',
            ],

        PermissionSlug::GET_ALL_PERMISSIONS => [
            'name' => 'Get-All-Permissions',
            'description' => 'Get all permissions',
            'main_menu'=>'settings',
            'sub_menu'=>'roles',
        ],

        PermissionSlug::SETTINGS => [
            'name' => 'view-all-settings',
            'description' => 'View All Settings',
            'main_menu' => 'settings',
            'sub_menu' => null,
            'sort' => 12,
            'icon' => 'fa fa-cogs'
        ],
        PermissionSlug::VIEW_COMPANIES => [
            'name' => 'View-Companies',
            'description' => 'View Companies',
            'main_menu' => 'company',
            'sub_menu' => null,
            'sort' => 7,
            'main_link' => 'company',
            'icon' => 'fa fa-building'
        ],
            PermissionSlug::DRIVERS_MENU => [
            'name' => 'drivers',
            'description' => 'View all driver related menus',
            'main_menu' => 'drivers',
            'sub_menu' => null,
            'sort' => 4,
            'icon' => 'fa fa-users'
        ],

        PermissionSlug::VIEW_DRIVERS => [
            'name' => 'Get-All-Drivers',
            'description' => 'Get all drivers',
            'main_menu'=>'drivers',
            'sub_menu'=>'driver_details',
            'sub_link'=>'drivers',
        ],
        PermissionSlug::VIEW_SYSTEM_SETINGS => [
            'name' => 'Get-All-System-Settings',
            'description' => 'Get all system settings',
            'main_menu'=>'settings',
            'sub_menu'=>'system_settings',
            'sub_link'=>'system/settings',
        ],
        PermissionSlug::USER_MENU => [
            'name' => 'users',
            'description' => 'View all user related menus',
            'main_menu' => 'users',
            'sub_menu' => null,
            'sort' => 5,
            'icon' => 'fa fa-user'
        ],
        PermissionSlug::VIEW_USERS => [
            'name' => 'Get-All-Users',
            'description' => 'Get all Users',
            'main_menu'=>'users',
            'sub_menu'=>'user_details',
            'sub_link'=>'users',
        ],
        PermissionSlug::ADMIN => [
            'name' => 'Admin',
            'description' => 'Admin User List',
            'main_menu'=>'admin',
            'sub_menu'=> null,
            'main_link'=>'admins',
            'sort' => 3,
            'icon' => 'fa fa-user-circle-o'
        ],
            PermissionSlug::VIEW_CAR_MAKES => [
            'name' => 'View-Car-Makes',
            'description' => 'Get all car makes',
            'main_menu'=>'carmakes',
            'sub_menu'=>null,
            'main_link'=>'carmakes',
        ],
            PermissionSlug::ADD_CAR_MAKES => [
            'name' => 'Add-Car-Makes',
            'description' => 'Add new car makes',
            'main_menu'=>'carmakes',
            'sub_menu'=>'add_car_makes',
            'sub_link'=>'carmakes/add',
        ],
            PermissionSlug::EDIT_CAR_MAKES => [
            'name' => 'Edit-Car-Makes',
            'description' => 'Edit new car makes',
            'main_menu'=>'carmakes',
            'sub_menu'=>'edi_car_makes',
            'sub_link'=>'carmakes/edit',
        ],
          PermissionSlug::DELETE_CAR_MAKES => [
            'name' => 'Delete-Car-Makes',
            'description' => 'Delete new car makes',
            'main_menu'=>'carmakes',
            'sub_menu'=>'edi_car_makes',
            'sub_link'=>'carmakes/edit',
        ],
        PermissionSlug::VIEW_CAR_MODELS => [
            'name' => 'View-Car-Models',
            'description' => 'Get all car Models',
            'main_menu'=>'carmakes',
            'sub_menu'=>null,
            'main_link'=>'carmakes',
        ],
            PermissionSlug::ADD_CAR_MODELS => [
            'name' => 'Add-Car-Models',
            'description' => 'Add new car Models',
            'main_menu'=>'carmakes',
            'sub_menu'=>'add_car_makes',
            'sub_link'=>'carmakes/add',
        ],
            PermissionSlug::EDIT_CAR_MODELS => [
            'name' => 'Edit-Car-Models',
            'description' => 'Edit new car Models',
            'main_menu'=>'carmakes',
            'sub_menu'=>'edi_car_makes',
            'sub_link'=>'carmakes/edit',
        ],
          PermissionSlug::DELETE_CAR_MODELS => [
            'name' => 'Delete-Car-Models',
            'description' => 'Delete new car Models',
            'main_menu'=>'carmakes',
            'sub_menu'=>'edi_car_makes',
            'sub_link'=>'carmakes/edit',
        ],
];

    /**
     * List of all the roles to be created along with their permissions.
     *
     * @var array
     */
    protected $roles = [
        RoleSlug::SUPER_ADMIN => [
            'name' => 'Super Admin',
            'description' => 'Admin group with unrestricted access',
            'all' => true,
        ],
        RoleSlug::USER => [
            'name' => 'Normal User',
            'description' => 'Normal user with standard access',
            'permissions' => []
        ],
        RoleSlug::ADMIN => [
            'name' => 'Admin',
            'description' => 'Admin group with restricted access',
            'permissions' => [PermissionSlug::GET_ALL_ROLES, PermissionSlug::GET_ALL_PERMISSIONS,PermissionSlug::ACCESS_DASHBOARD,PermissionSlug::SETTINGS,PermissionSlug::VIEW_COMPANIES,PermissionSlug::DRIVERS_MENU,PermissionSlug::VIEW_DRIVERS,PermissionSlug::VIEW_SYSTEM_SETINGS,PermissionSlug::USER_MENU,PermissionSlug::VIEW_USERS,PermissionSlug::ADMIN,PermissionSlug::VIEW_CAR_MAKES,PermissionSlug::ADD_CAR_MAKES,PermissionSlug::EDIT_CAR_MAKES,PermissionSlug::DELETE_CAR_MAKES,PermissionSlug::VIEW_CAR_MODELS,PermissionSlug::ADD_CAR_MODELS,PermissionSlug::EDIT_CAR_MODELS,PermissionSlug::DELETE_CAR_MODELS],
        ],
        RoleSlug::DRIVER=>[
            'name' => 'Driver',
            'description' => 'Driver user with standard access',
            'permissions' => [],
        ]

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            foreach ($this->permissions as $permissionSlug => $attributes) {
                // Create permission if it doesn't exist
                Permission::firstOrCreate(['slug' => $permissionSlug], $attributes);
            }

            foreach ($this->roles as $roleSlug => $role) {
                // Create role if it doesn't exist
                $createdRole = Role::firstOrCreate(
                    ['slug' => $roleSlug],
                    array_merge(array_except($role, ['permissions']), ['locked' => true])
                );

                // Sync permissions
                if (isset($role['permissions'])) {
                    $rolePermissions = $role['permissions'];
                    $rolePermissionIds = Permission::whereIn('slug', $rolePermissions)->pluck('id');
                    $createdRole->permissions()->sync($rolePermissionIds);
                }
            }

            /**
             * Delete all unused permissions
             */
            $existingPermissions = Permission::pluck('slug')->toArray();

            $newPermissions = array_keys($this->permissions);

            $permissionsToDelete = array_diff($existingPermissions, $newPermissions);

            Permission::whereIn('slug', $permissionsToDelete)->delete();
        });
    }
}
