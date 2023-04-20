<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index (Request $request)
    {
        $keyword = $request -> get('search');
        $perPage = 5;

        if(!empty ($keyword)){
            $organizations = Organization::where('name', 'LIKE', "%$keyword%" )
            ->orWhere('inn', 'LIKE', "%$keyword%" )
            ->latest()->paginate($perPage);
        }else{
            $organizations = Organization::latest()->paginate($perPage);
        }
        return view('admin.organizations.index', ['organizations'=>$organizations])->with('1',(request()->input('page',1) -1) *5);
    }

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $organization = new Organization;





        $organization->save();
        return redirect()->route('organizations.index')->with('success', 'Пользователь создан');
    }

    public function edit($id){
        $organization = Organization::findOrFail($id);
        return view('admin.organizations.edit', ['organization'=>$organization]);
    }

    public function update(Request $request, Organization $organization){
        $request->validate([
            'name'=>'required'
        ]);



        $organization = Organization::find($request->hidden_id);

        $organization->name = $request->name;
        $organization->inn = $request->inn;


        $organization->save();

        return redirect()->route('organizations.index')->with('success', 'Пользователь обнавлён');
    }

    public function destroy($id){
        $organization = Organization::findOrFail($id);
        $organization->delete();
        return redirect()->route('organizations.index')->with('success', 'Пользователь удалён');
    }
}
