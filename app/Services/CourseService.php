<?php

namespace App\Services;

use Illuminate\Database\QueryExceprion;
use Exceprion;
use App\Repositories\CourseRepository;
use App\Validators\CourseValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class CourseService
{
    private $repository;
    private $validator;

    public function __construct(CourseRepository $repository, CourseValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data)
    { 
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $course = $this->repository->create($data);
            return 
            [
                'success'   => true,
                'messages'   => 'Curso criado',
                'data'      => $course
            ];
        }
        catch(Exception $err)
        {
            switch(get_class($err))
            {
                case QueryExceprion::class      : return ['success'   => false, 'messages' => $err->getMessage()];
                case ValidatorException::class  : return ['success'   => false, 'messages' => $err->getMessageBag()];
                case Exception::class           : return ['success'   => false, 'messages' => $err->getMessage()];
                default                         : return ['success'   => false, 'messages' => $err->getMessage()];
            }
        }
    }

    public function update($data, $id)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $course = $this->repository->update($data, $id);
            return 
            [
                'success'   => true,
                'messages'   => 'Curso Atualizado',
                'data'      => $course
            ];
        }
        catch(Exception $err)
        {
            switch(get_class($err))
            {
                case QueryExceprion::class      : return ['success'   => false, 'messages' => $err->getMessage()];
                case ValidatorException::class  : return ['success'   => false, 'messages' => $err->getMessageBag()];
                case Exception::class           : return ['success'   => false, 'messages' => $err->getMessage()];
                default                         : return ['success'   => false, 'messages' => $err->getMessage()];
            }
        }
        
    }

    public function destroy($id)
    {
        try
        {
            $this->repository->delete($id);
            return  [
                'success'   => true,
                'messages'   => 'Curso removido'
            ];
        }
        catch(Exception $err)
        {
            switch(get_class($err))
            {
                case QueryExceprion::class      : return ['success'   => false, 'messages' => $err->getMessage()];
                case ValidatorException::class  : return ['success'   => false, 'messages' => $err->getMessageBag()];
                case Exception::class           : return ['success'   => false, 'messages' => $err->getMessage()];
                default                         : return ['success'   => false, 'messages' => $err->getMessage()];
            }
        }
    }
}