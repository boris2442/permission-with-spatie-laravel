<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role; // Ensure you have the correct namespace for Role model
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::all();

        return view('role-permission.role.index-role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('role-permission.role.create-role');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);
        Role::create([
            'name' => $request->name,
        ]);
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        return view('role-permission.role.edit-role', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id,
            ]
        ]);
        $role->update([
            'name' => $request->name,
        ]);
        return redirect()->route('roles.index')->with('success', 'Role update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'role deleted successfully.');
    }

     public function addPermissionToRole($roleId){
         $role=Role::findOrFail($roleId);
         $permissions=Permission::get();
         $rolePermissions=DB::table('role_has_permissions')
         ->where('role_has_permissions.role_id', $role->id)
         ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
         ->all();

        return view('role-permission.role.add-permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    public function givePermissionToRole(Request $request, $roleId){
        $request->validate([
        'permission'=>'required',
        ]);
          $role=Role::findOrFail($roleId);
          $role->syncPermissions($request->permission);
        return redirect()->back()->with('success', 'Permissions add to roles');
    }
}
