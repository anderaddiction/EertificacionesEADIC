<?php

namespace App\Http\Controllers\Roles;

use App\Role;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'ASC')->paginate(20);
        return view('auth.roles.show', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role;
        return view('auth.roles.create', [
            'role' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        Role::create(
            $request->validated()
                + ['code' => getRandomString()]
                + ['slug' => generateUrl($request->name)]
        );
        return redirect()->back()->with('Success', 'Data stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('auth.roles.show', [
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('auth.roles.edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $role)
    {
        $role->update($request->validated()
            + ['slug' => generateUrl($request->name)]);

        return redirect()->back()->with('Success', 'Data stored Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $roles = Role::orderBy('id', 'ASC')->paginate(20);
        return view('auth.roles.index', [
            'roles' => $roles
        ]);
    }
}
