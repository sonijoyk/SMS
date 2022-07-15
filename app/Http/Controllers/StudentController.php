<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Student\StudentRequest;
use App\Models\{
    Student,
    User,
    StudentMark,
    StudentTerm,
};
class StudentController extends Controller
{
    
    public function __construct(Student $Student)
    {
        $this->middleware('auth');
        $this->student = $Student;
    }

    public function index(){

        $students = Student::with('teacher')->get();
        $reportingTeachers = User::all();
        return view('dashboard',compact( 'students','reportingTeachers'));
    }

    public function create(StudentRequest $StudentRequest){

        $details = $StudentRequest->all();
        $this->student->create($details);
        return redirect()->back()->with('status','Student record created successfully');
    }

    public function update($id,StudentRequest $StudentRequest){

        $details = $StudentRequest->all();
        unset($details['_token']);
        Student::where('id', $id)->update($details);
        return redirect()->back()->with('status','Student record has been updated successfully');
    }

    public function delete($id){

        $Student = Student::with(['studentTerm','studentTerm.studentTermMarks'])->findOrFail($id);
        $student_terms = $Student->studentTerm()->get();
        $termIds = [];
        foreach ($student_terms as $key => $value) {
            $termIds[] = $value->id;
        }
        StudentMark::whereIn('student_terms_id',$termIds)->delete();
        $Student->studentTerm()->delete();
        $Student->delete();
        return redirect()->back()->with('status','Student record has been updated successfully');
    }

}
