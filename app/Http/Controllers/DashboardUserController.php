<?php

namespace App\Http\Controllers;


use App\Models\Userr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    public function index(Request $request)
    {

        if($request->has('search')){
            $users=Userr::latest()
            ->where('name','LIKE','%'.$request->search.'%')
            ->orWhere('email','LIKE','%'.$request->search.'%')->paginate(10);
        }
        else{
        $users=Userr::latest()->paginate(10);
    }
        return view('dashboard.user.index',['users'=>$users]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
           
        ]);
        $validated['password']=bcrypt($validated['password']);
        $validated['email_verified_at']=now();
        $validated['remember_token']=Str::random(10);

        Userr::create($validated);
        return redirect('dashboard-user')->with('pesan','Data berhasil ditambahkan!');
        
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
        return view('dashboard.user.edit',['item'=>Userr::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            
            'name' => 'required|min:3',
            'email' => 'required|nullable',
            'password' => 'nullable|min:8', //password optional
            
        ]);

        $user = Userr::findOrFail($id);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if(!empty($validated['password']))
        {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        return redirect('dashboard-user')->with('pesan','Data berhasil di update   !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Userr::destroy($id);
        return redirect('/dashboard-user')->with('pesan','Data berhasil dihapus!');
    }
}
