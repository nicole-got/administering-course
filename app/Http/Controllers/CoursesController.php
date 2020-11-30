<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CourseCreateRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Repositories\CourseRepository;
use App\Validators\CourseValidator;
use App\Services\CourseService;

class CoursesController extends Controller
{
    protected $repository;
    protected $service;
    protected $validator;

    
    public function __construct(CourseService $service,CourseRepository $repository, CourseValidator $validator)
    {
        $this->repository = $repository;
        $this->service      = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->repository->paginate(3);
        
        return view('course.index', [
            'courses' => $courses
        ]);
    }

    public function store(CourseCreateRequest $request)
    {
        $file = $request->hasFile('curso_xml');
        if($file){
            $xml = new \SimpleXMLElement($request->file('curso_xml'), null, true);
            
            foreach($xml as $curso){
                $data = [
                    'name' => $curso->nome
                ];
                $request = $this->service->store($data);
            }
        }else{
            $request = $this->service->store($request->all());
        }

        session()->flush('success', [
            'success'   => '',
            'messages'  => $request['messages']
        ]);

        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $course,
            ]);
        }

        return view('courses.show', compact('course'));
    }


    public function edit($id)
    {
        $course = $this->repository->find($id);
        
        return view('course.edit', [
            "course" => $course
        ]);
    }

    public function update(CourseUpdateRequest $request, $id)
    {
        $request = $this->service->update($request->all(), $id);

        session()->flush('success', [
            'success'   => '',
            'messages'  => $request['messages']
        ]);

        $users = \App\Entities\User::all();
        $students = $this->repository->all();
        $courses = \App\Entities\Course::all();

        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Course deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Course deleted.');
    }
}
