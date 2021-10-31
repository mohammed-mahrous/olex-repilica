<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Validation\Rules\Password;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Generator\StringManipulation\Pass\Pass;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'required|phone:EG,mobile|unique:users',
            'governorate' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'type' => 'required|string',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->type,
            'phone' => $request->phone,
            'governorate' => $request->governorate,
            'city' => $request->city,
        ]);

        event(new Registered($user));
        $success = "user $user->name was created successfully ";
        return redirect('dashboard/users')->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('dashboard.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'username' => 'sometimes|string|max:255|unique:users,username,' . $user->id,
            'phone' => 'sometimes|phone:EG,mobile|unique:users,phone,' . $user->id,
            'governorate' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'type' => 'string',
            'password' => ['sometimes', 'confirmed', function () use ($request) {
                if ($request->filled('password')) {
                    return Password::default();
                }
            }],
        ]);
        foreach ($request->except(['_method', '_token']) as $input_key => $input_value) {
            if ($request->filled($input_key)) {
                $user->$input_key = $input_value;
            }
        }
        if ($user->isDirty()) {
            $user->save();
            $success = "user $user->name updated succesfully";
            return redirect('dashboard/users')->with('success', $success);
        }
        return redirect()->back()->with('error', 'please change at least 1 field to successfully update the record');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy([$user->id]);
        return redirect()->back()->with('success', 'record was deleted successfully');
    }
}