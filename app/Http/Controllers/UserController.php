<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\UserRole;
use App\Enums\UserGender;
use App\Enums\UserStatus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->paginate(7);

        return view('role-admin.user.index', ['title' => 'Pengguna', 'users' => $user]);
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
        $user = $request->validate([
            'username' => 'required|alpha_num:ascii|unique:users|min:8',
            'email' => 'required|string|email:dns',
            'password' => 'required|alpha_num:ascii|min:8',
            'firstname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'city_of_birth' => 'nullable|string',
            'date_of_birth' => 'nullable|string',
            'gender' => ['nullable', new Enum(UserGender::class)],
            'contact' => 'nullable|string|max:15',
        ]);

        $user['user_role'] = UserRole::USER->value;
        $user['user_status'] = UserStatus::ISACTIVE->value;

        $user['date_of_birth'] = Carbon::parse($user['date_of_birth'])->format('Y-m-d');

        if ($request->avatar) {
            $newPath = Str::after($request->avatar, 'tmp/');

            Storage::disk('public')->move($request->avatar, "img/users/$newPath");

            $user['avatar'] = "img/users/$newPath";
        }

        User::create($user);

        return Redirect::route('admin.users.index')->with(['message' => 'Berhasil menambahkan data siswa baru']);
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

        return Redirect::route('admin.users.index')->with(['message' => 'Berhasil mengubah role dan status siswa']);
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

        return Redirect::route('admin.users.index')->with(['message' => 'Berhasil menghapus data siswa']);
    }
}
