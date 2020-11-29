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
        
        return view('student.index', [
            'courses' => $courses
        ]);
    }

    public function store(StudentCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $student = $request['success'] ? $request['data'] : null;

        session()->flush('success', [
            'success'   => '',
            'messages'  => $request['messages']
        ]);

        return redirect()->route('user.dashboard');
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

        return redirect()->route('user.dashboard');
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
