<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Repositories\StudentRepository;
use App\Validators\StudentValidator;
use App\Services\StudentService;


class StudentsController extends Controller
{
    protected $repository;
    protected $service;
    protected $validator;

    
    public function __construct(StudentService $service,StudentRepository $repository, StudentValidator $validator)
    {
        $this->repository = $repository;
        $this->service      = $service;
    }


    public function index()
    {
        $courses = \App\Entities\Course::pluck("name","id")->all();
        $students = \App\Entities\Student::paginate(3);
        foreach($students as $key => $student){
            $course = \App\Entities\Course::find($student->course_id);
            if($course == "[]"){
                $students[$key]->course_id = "";
            }else{
                $students[$key]->course_id = $course->name;
            }
        }
        
        return view('student.index', [
            'courses' => $courses,
            'students' => $students,
        ]);
    }

    public function search(StudentCreateRequest $request)
    {
        $students =  $this->service->search($request->id);
        
        return view('student.index', [
            'students'  => $students,
        ]);
        
    }

    public function store(StudentCreateRequest $request)
    {
        
        if($request->hasFile('photo')){
            $nameExt = $request->file('photo')->getClientOriginalName();
            $name = pathinfo($nameExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $nameSave = $name.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('public\img', $nameSave);
        }else{
            $nameSave = "nophoto.png";
        }

        $data = [
            'course_id'     => $request->input('course_id'),
            'name'          => $request->input('name'),
            'registration'  => $request->input('registration'),
            'uf'            => $request->input('uf'),
            'city'          => $request->input('city'),
            'cep'           => $request->input('cep'),
            'neighborhood'  => $request->input('neighborhood'),
            'street'        => $request->input('street'),
            'number'        => $request->input('number'),
            'complement'    => $request->input('complement'),
            'photo'         => $nameSave
        ];
        $request = $this->service->store($data);
        
        $student = $request['success'] ? $request['data'] : null;

        session()->flush('success', [
            'success'   => '',
            'messages'  => $request['messages']
        ]);

        return redirect()->route('student.index');
    }


    public function show($id)
    {
        $student = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $student,
            ]);
        }

        return view('students.show', compact('student'));
    }


    public function edit($id)
    {
        $student = $this->repository->find($id);
        $courses = \App\Entities\Course::pluck("name","id")->all();
        
        return view('student.edit', [
            "student" => $student,
            "courses" => $courses
        ]);
    }

    public function update(StudentUpdateRequest $request, $id)
    {
        $request = $this->service->update($request->all(), $id);

        session()->flush('success', [
            'success'   => '',
            'messages'  => $request['messages']
        ]);

        return redirect()->route('student.index');
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Student deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Student deleted.');
    }
}
