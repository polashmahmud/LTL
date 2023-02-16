<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'   => 'required|string|max:255',
        ]);

        $user = auth()->user();

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = $image->getClientOriginalName();
            $imageNewName = explode('.', $imageName)[0];
            $fileExtension = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            if (!file_exists(storage_path('app/public/avatar'))) {
                mkdir(storage_path('app/public/avatar'), 0777, true);
            }
            $image->move(storage_path('app/public/avatar'), $fileExtension);

            $user->avatar = $fileExtension;
        }

        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function destroy()
    {
        $user = auth()->user();

        if (file_exists(storage_path('app/public/avatar/' . $user->avatar))) {
            unlink(storage_path('app/public/avatar/' . $user->avatar));
        }

        $user->avatar = null;
        $user->save();

        return response()->json(['success' => 'Avatar removed successfully.']);
    }
}
