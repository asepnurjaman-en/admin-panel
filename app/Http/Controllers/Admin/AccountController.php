<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     */
    public function profile() : Response
    {
        $data = [
			'title' => 'profil saya',
            'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Profil', 'url' => '#'],
            ]
		];

		return response()->view('admin.account.profile', compact('data'));
    }

    /**
     * Display a listing of the resource.
     */
    public function edit_profile() : Response
    {
        $data = [
			'title' => 'edit profil saya',
            'back'  => route('profile.index'),
            'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Profil', 'url' => route('profile.index')],
                ['title' => 'Edit', 'url' => '#'],
            ],
            'form'	=> ['action' => route('profile.update'), 'class' => 'to-update']
		];

		return response()->view('admin.account.edit-profile', compact('data'));
    }

    /**
	 * Update the specified resource in storage.
	 */
	public function update_profile(Request $request) : JsonResponse
	{
        $user = User::findOrFail(Auth::user()->id);
        $validation = [
            'name' => 'required|string|max:150',
            'email'=> 'required|email|unique:users,id,'.$user->id
        ];
        if ($request->hasFile('avatar')) :
            $validation['avatar'] = 'required|image|mimes:jpg,jpeg,png';
        endif;
        $request->validate($validation);

        return response()->json([
            'toast' => ['icon'=>'success', 'title'=>'Profil disimpan', 'text'=>'Perubahan profil berhasil disimpan.'],
			'callback' => ['type'=>'redirect', 'url'=>route('profile.index')]
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function edit_password() : Response
    {
        $data = [
			'title' => 'edit kata sandi',
            'back'  => route('profile.index'),
            'breadcrumb' => [
                ['title' => 'Dasbor', 'url' => route('admin.dashboard')],
                ['title' => 'Profil', 'url' => route('profile.index')],
                ['title' => 'Kata sandi', 'url' => '#'],
            ],
            'form'	=> ['action' => route('profile.update-password'), 'class' => 'to-update']
		];

		return response()->view('admin.account.edit-password', compact('data'));
    }

    /**
	 * Update the specified resource in storage.
	 */
	public function update_password(Request $request) : JsonResponse
	{
        $user = User::findOrFail(Auth::user()->id);
        $validation = [
            'password'=> 'required|string|min:8|confirmed'
        ];
        $request->validate($validation);

        return response()->json([
            'toast' => ['icon'=>'success', 'title'=>'Kata sandi disimpan', 'text'=>'Perubahan kata sandi berhasil disimpan.'],
			'callback' => ['type'=>'redirect', 'url'=>route('profile.index')]
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
