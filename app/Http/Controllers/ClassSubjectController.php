<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list(){
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = 'Subject Assign List';
        return view('admin.assign_subject.list', $data);
    }

    public function add(){
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Assign Subject';
        return view('admin.assign_subject.add',$data);
    }
    public function insert(Request $request){
        // dd($request->all());
        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id){
            $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id , $subject_id);
            if (!empty($getAlreadyFirst)) {
                $getAlreadyFirst->status = $request->status;
                $getAlreadyFirst->save();
            } else {
                $save = new ClassSubjectModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $subject_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->id;
                $save->save();
            }
                
            }
            return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assigned');
        }

        else

        {
            return redirect()->back()->with('error','Please Try Again');
        }
    }

    public function edit($id){
        $getRecord =ClassSubjectModel::getSingle($id);
        if(!empty($getRecord))
        {
        $data['getRecord']= $getRecord;
        $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Assign Subject Edit';
        return view('admin.assign_subject.edit',$data);
        }
        else
        {
            abort(404);
        }
        
    }   
    
    public function update($id, Request $request){
        ClassSubjectModel::deleteSubject($request->class_id);
        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id){
            $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id , $subject_id);
            if (!empty($getAlreadyFirst)) {
                $getAlreadyFirst->status = $request->status;
                $getAlreadyFirst->save();
            } else {
                $save = new ClassSubjectModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $subject_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->id;
                $save->save();
            }
                
            }
        }
        
        return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assigned');
        
    }

    public function delete($id){
        $save = ClassSubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Record Deleted Successfully!!');
    }
}
