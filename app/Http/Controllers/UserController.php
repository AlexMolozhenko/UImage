<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request, string $currentpage, string $order)
    {
          $user =  User::getUsersFromNum($currentpage,$order) ;
          return response($user);
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $city = $request->input('city');
        $user = User::getUser($name,$city);

        if(!$user){

            $user = User::create([
                'name' => $name,
                'city' => $city,
            ]);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $dir_image = public_path() . '/user_image';
            $filename = fake()->unixTime()."_".rand().".".$file->extension();

            $file->move($dir_image,$filename);
           $result =  $user->userImages()->create(['image' => $filename]);
        }
        return response()->json(['message' => $result]);
    }

}
