<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Admin List';
        return view('admin.admin.list',$data);
    }

    public function add(){
        $data['header_title'] = 'Add Admin';
        return view('admin.admin.add',$data);
    }

    public function insert(Request $request){
        // dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success',"User Added Successfully");

    }
    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = 'Edit Admin';
            return view('admin.admin.edit',$data);
        }
        else
        {
            abort(404);
        }

    }

    public function update($id , Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user =  User::getSingle($id); 
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->email);
        }
        $user->save();
        return redirect('admin/admin/list')->with('success',"User Updated Successfully");

    }
    public function delete($id){
        $user =  User::getSingle($id); 
        $user->is_delete == 1;
        $user->delete();
        return redirect('admin/admin/list')->with('error',"User Deleted !");
         
    }
}
