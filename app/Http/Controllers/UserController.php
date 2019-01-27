<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('user.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

   
    public function create(Request $request)
    {
               
        return view('user.create');
        
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
         
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|alphaNum|min:3',
         
        ]);
        
       
        $user = new User();
        
        $user ->password = Hash::make($request->newPassword);
        $user -> name = $request->name;
        $user -> email =$request->email;
                
        $user->save(); 

        return redirect()->route('user.index')
                        ->with('success','Admin dodan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $users = User::find($id);
        return view('user.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $users = User::find($id);
        return view('user.edit',compact('users'));
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
           
             
        ]);
         
     


        User::find($id)->update($request->all());

        return redirect()->route('user.index')
                        ->with('success','Admin azuriran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         User::find($id)->delete();
        return redirect()->route('user.index')
                        ->with('success','Admin obrisan');
    }
}
