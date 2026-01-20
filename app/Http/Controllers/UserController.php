<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use App\Models\User;
use Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = auth()->user();

        return view("users.profile", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'profile-picture' => 'image|mimes:jpg,png,svg', 
        ],
        [
            'message.required'=> 'Triyng to remain anonymous? Fill the name field homie!',
            'message.max' => 'Too long brother! 255 characters or less.',
            'message.min'=> 'Too short brother! 3 characters or more.',
        ]);

        // 2. Deleta a imagem antiga (usando o disco 'public')
        if ($user->picture) {
            Storage::disk('public')->delete('images/' . $user->picture);
        }

        $file = $request->file('profile-picture');
        
        $name = $file->hashName();

        $file->storeAs('/images', $name, 'public');

        $user->name = $validated['name'];
        $user->picture = $name;

        $user->save();

        return redirect('/')->with('success','Profile successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
