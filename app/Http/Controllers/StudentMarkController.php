<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Student\StudentRequest;
use App\Models\{
    Student,
    User,
    StudentMark,
    StudentTerm,
    Subject,
    Term
};

class StudentMarkController extends Controller
{
     public function __construct(StudentMark $StudentMark,StudentTerm $StudentTerm)
    {
        $this->middleware('auth');
        $this->StudentMark = $StudentMark;
        $this->StudentTerm = $StudentTerm;
    }

    public function index(){

        $students = Student::with('teacher')->get();
        $terms = Term::all();
        $subjects = Subject::orderby('id')->get();
        $studentMarks = studentTerm::with(['student','term','studentTermMarks','studentTermMarks.subject'])->get();
        return view('Marks.marks',compact( 'students','terms','subjects','studentMarks'));
    }

    public function save(Request $request){

        $studentTerm = $this->StudentTerm->create(['student_id'=>$request->student,'term_id'=>$request->term]);
        $data = [];
        foreach ($request->marks as $key => $value) {
            $data[] = ['student_terms_id'=>$studentTerm->id,'subject_id'=>$key,'mark'=>$value[0]];
        }
        StudentMark::insert($data);
        return redirect()->back()->with('status','Marks Added Successfully');
    }

    public function update($id,Request $request){

        $studentTerm= studentTerm::findOrFail($id);
        $studentTerm->term_id = $request->term;  
        $studentTerm->save();
        $data = [];
        foreach ($request->marks as $key => $value) {
            $data[] = ['student_terms_id'=>$studentTerm->id,'subject_id'=>$key,'mark'=>$value[0]];
        }
        StudentMark::where('student_terms_id',$studentTerm->id)->delete();
        StudentMark::insert($data);
        return redirect()->back()->with('status','Marks Added Successfully');
    }

    public function delete($id){
        
        $Student = studentTerm::findOrFail($id);
        StudentMark::where('student_terms_id',$id)->delete();
        $Student->delete();
        return redirect()->back()->with('status','Student record has been updated successfully');
    }


}
