<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\ControllerPermissionRequest as StoreRequest;
use App\Http\Requests\ControllerPermissionRequest as UpdateRequest;
use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Support\Facades\DB;
use Backpack\CRUD\CrudTrait;

class ControllerPermissionCrudController extends CrudController
{
    use CrudTrait;

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel('App\Models\ControllerPermission');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/controller-permission');
        $this->crud->setEntityNameStrings('controller-permission', 'controller-permissions');
        $this->crud->enableAjaxTable();
        $this->crud->setListView('permissions-matrix');
    }

    public function index() {
        $controllers = $this->getControllers("App\Http\Controllers\Admin\\");
        $suffix = "CrudController";

        $roles = Role::all();
        $this->data['controllers'] = $controllers;
        $this->crud->hasAccessOrFail('list');

        $role_permissions = [];
        for ($i = 0; $i < count($roles); $i++) {
            $role = Role::findByName($roles[$i]->name);

            $role_permissions[$roles[$i]->name] = [];
            foreach ($this->data['controllers'] as $key => $actions) {
                foreach ($actions as $action) {
                    $permission = $key . $suffix . "@" . $action;
                    $form_permission = $key . "@" . $action;

                    if ($permission == "" || $form_permission == "")
                        continue;

                    $roleHasPermission = $roles[$i]->hasPermissionTo($permission, $roles[$i]->id);
                    $role_permissions[$roles[$i]->name][$form_permission] = $roleHasPermission ? 1 : 0;
                }
            }
        }

        $this->data['role_permissions'] = $role_permissions;
        $this->data['roles'] = $roles;
        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst($this->crud->entity_name_plural);

        // get all entries if AJAX is not enabled
        if (! $this->data['crud']->ajaxTable())
            $this->data['entries'] = $this->data['crud']->getEntries();

        return view('custom_admin.permissions-matrix', $this->data);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $this->savePermissions($data, "permissionname");
        $this->assignPermissions($data, "rolepermission");
        $this->deletePermissions($data, "deletepermission");

        return \Redirect::to($this->crud->route);
    }

    public function update(UpdateRequest $request)
    {
        $data = $request->all();
        $this->savePermissions($data, "permissionname");
        $this->assignPermissions($data, "rolepermission");
        $this->deletePermissions($data, "deletepermission");

        return \Redirect::to($this->crud->route);
    }

    private function getControllers($query = "App\Http\Controllers\\", $suffix = "CrudController") {
        $routeCollection = \Route::getRoutes();
        $routes = [];

        foreach ($routeCollection as $route) {
            $action = $route->getAction();

            if (array_key_exists('controller', $action)) {
                $explodedAction = explode('@', $action['controller']);

                if (substr($explodedAction[0], 0, strlen($query)) === $query) {
                    $route_key = $this->getControllerReadableName($explodedAction[0], $query, $suffix);
                    if (!isset($routes[$route_key]))
                        $routes[$route_key] = [];

                    $routes[$route_key][] = $explodedAction[1];
                }
            }
        }

        return $routes;
    }

    private function getControllerReadableName($crudController, $path = "App\Http\Controllers\\", $suffix = "CrudController") {
        return explode($suffix, explode($path, $crudController)[1])[0];
    }

    private function savePermissions($data, $prefix, $suffix = "CrudController") {
        $controllersAndActions = $this->getPermissionsActions($data, $prefix, $suffix);

        foreach ($controllersAndActions as $key => $value) {
            $permission = Permission::where('name', $value)->first();
            if ($permission == null)
                Permission::create(['name' => $value]);
        }
    }

    private function deletePermissions($data, $prefix, $suffix = "CrudController") {
        foreach ($data as $key => $value) {
            if (substr($key, 0, strlen($prefix)) != $prefix)
                continue;

            $tmp = explode($prefix . '_', $key);
            $rolePermission = explode('|', $tmp[1]);

            $roleStr = $rolePermission[0];
            $actionArr = explode('~', $rolePermission[1]);
            $actionStr = $actionArr[0] . $suffix . '@' . $actionArr[1];

            $role = Role::findByName($roleStr);
            if (!$role->hasPermissionTo($actionStr, $role->id))
                $role->revokePermissionTo($actionStr, $role->id);
        }
    }

    private function getPermissionsActions($data, $prefix, $suffix = "CrudController") {
        $controllersAndActions = [];
        foreach ($data as $key => $value) {
            if (substr($key, 0, strlen($prefix)) == $prefix) {
                $tmp = explode($prefix . '_', $key);
                $controllerAction = explode('~', $tmp[1]);
                $controller = $controllerAction[0] . $suffix;
                $action = $controllerAction[1];
                $controllersAndActions[] = "$controller@$action";
            }
        }

        return $controllersAndActions;
    }

    private function assignPermissions($data, $prefix, $suffix = "CrudController") {
        foreach ($data as $key => $value) {
            if (substr($key, 0, strlen($prefix)) != $prefix)
                continue;

            $tmp = explode($prefix . '_', $key);
            $rolePermission = explode('|', $tmp[1]);

            $roleStr = $rolePermission[0];
            $actionArr = explode('~', $rolePermission[1]);
            $actionStr = $actionArr[0] . $suffix . '@' . $actionArr[1];

            $role = Role::findByName($roleStr);

            if (!$role->hasPermissionTo($actionArr, $role->id))
                $role->givePermissionTo($actionStr, $role->id);
        }
    }

    private function hasPermissionTo($permissionName, $role_id) {
        $permission = Permission::all()->where('name', $permissionName[0])->first();
        if ($permission)
            return DB::select('SELECT * FROM `permission_roles` WHERE `permission_id` = ? AND `role_id` = ? ', [$permission->id, $role_id]);
        return false;
    }

    private function givePermissionTo($permissionName, $role_id) {
        $permission = Permission::all()->where('name', $permissionName[0])->first();
        if ($permission)
            return DB::select('INSERT `permission_roles` (`permission_id`, `role_id`) VALUES (?, ?)', [$permission->id, $role_id]);
        return false;
    }

    private function revokePermissionTo($permissionName, $role_id) {
        $permission = Permission::all()->where('name', $permissionName[0])->first();
        if ($permission)
            return DB::select('DELETE FROM `permission_roles` WHERE `permission_id` = ? AND `role_id` = ?', [$permission->id, $role_id]);
        return false;
    }
}
