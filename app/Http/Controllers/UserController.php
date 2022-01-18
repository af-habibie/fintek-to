<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->latest()->paginate(15);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:25|regex:/^[a-zA-Z ]+$/u',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:6|max:12',
                'role' => 'required',
                'photo' => 'required|max:2048|mimes:jpg,jpeg,png'
            ],
            [
                'name.regex' => 'The name field must be letter.'
            ]
        );

        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('img/users'), $fileName);

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->role = $request->role;
        $users->photo = $fileName;
        $users->save();

        return redirect()->route('users.index');
    }

     public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:25|regex:/^[a-zA-Z ]+$/u',
                'email' => 'required|email',
                'password' => 'max:12',
                // 'role' => 'required|role',
                'photo' => 'max:2048|mimes:jpg,jpeg,png'
            ],
            [
                'name.regex' => 'The name field must be letter.'
            ]
        );

        $data = User::find($user->id);

        if ($request->photo) {
            if (!empty($user->photo)) {
                if (file_exists(public_path('img/users/' . $user->photo))) {
                    unlink(public_path('img/users/' . $user->photo));
                }
            }

            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('img/users'), $fileName);

            $data->photo = $fileName;
        }

        $data->name = $request->name;
        $data->email = $request->email;
        // $data->role = $request->role;

        if (!empty($request->password)) {
            $data->password = $request->password;
        }

        $data->save();

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('users.index');
    }
}
