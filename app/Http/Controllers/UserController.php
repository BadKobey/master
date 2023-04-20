<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index (Request $request)
    {
        $keyword = $request -> get('search');
        $perPage = 5;

        if(!empty ($keyword)){
            $users = User::where('name', 'LIKE', "%$keyword%" )
            ->orWhere('oraganization_id', 'LIKE', "%$keyword%" )
            ->latest()->paginate($perPage);
        }else{
            $users = User::latest()->paginate($perPage);
        }
        return view('admin.users.index', ['users'=>$users])->with('1',(request()->input('page',1) -1) *5);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028'
        ]);

        $user = new User;

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);



        $user->save();
        return redirect()->route('users.index')->with('success', 'Пользователь создан');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user'=>$user]);
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name'=>'required'
        ]);

        $file_name = $request->hidden_product_image;

        if($request->image !=''){
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);
        }

        $user = User::find($request->hidden_id);

        $user->name = $request->name;
        $user->oraganization_id = $request->oraganization_id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;

        $user->save();

        return redirect()->route('users.index')->with('success', 'Пользователь обнавлён');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $image_path = public_path()."/images/";
        $image = $image_path. $user->imsge;
        if(file_exists($image)){
            @unlink($image);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Пользователь удалён');
    }
}
