<?php

namespace App\Services;

use Illuminate\Database\QueryExceprion;
use Exceprion;
use App\Repositories\StudentRepository;
use App\Validators\StudentValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class StudentService
{
    private $repository;
    private $validator;

    public function __construct(StudentRepository $repository, StudentValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function search($id){
        if(!$id) {
            $student = $this->repository->paginate(3);
        }else{
            $student = $this->repository->where("id",$id)->paginate(3);
        }
        
        return $student;
    }

    public function store($data)
    { 
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $student = $this->repository->create($data);
            return 
            [
                'success'   => true,
                'messages'   => 'Aluno criado',
                'data'      => $student
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

            $student = $this->repository->update($data, $id);
            return 
            [
                'success'   => true,
                'messages'   => 'Aluno Atualizado',
                'data'      => $student
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
                'messages'   => 'Aluno removido'
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