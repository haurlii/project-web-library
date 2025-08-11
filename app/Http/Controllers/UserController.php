<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRole;
use App\Enums\UserGender;
use App\Enums\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->paginate(7);

        return view('user.index', ['title' => 'Pengguna', 'users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|alpha_num:ascii|unique:users|min:8',
            'email' => 'required|string|email:dns',
            'password' => 'required|alpha_num:ascii|min:8',
            'firstname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'city_of_birth' => 'nullable|string',
            'date_of_birth' => 'nullable|string',
            'gender' => ['nullable', new Enum(UserGender::class)],
            'contact' => 'nullable|string|max:15',
            'avatar' => 'nullable|image|max:10000',
        ]);

        $validated['user_role'] = UserRole::USER->value;
        $validated['user_status'] = UserStatus::ISACTIVE->value;

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('img/users', 'public');
            $validated['avatar'] = $path;
        };

        User::create($validated);

        return redirect('/users')->with(['message' => 'Success Add Data User']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'user_role' => ['nullable', new Enum(UserRole::class)],
            'user_status' => ['nullable', new Enum(UserStatus::class)],
        ]);

        $user->update($validated);

        return redirect('/users')->with(['message' => 'Success Edit Role dan Status User']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (!empty($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
        $user->delete();

        return redirect('/users')->with(['message' => 'Success Delete Data User']);
    }
}
