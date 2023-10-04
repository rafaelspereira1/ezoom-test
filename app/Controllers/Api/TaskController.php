<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use CodeIgniter\API\ResponseTrait;

class TaskController extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        $this->model = new TaskModel(); 
    }

    protected $format = 'json';
    
    public function index()
    {
        $tasks = $this->model->findAll();
        return $this->respond($tasks);
    }

    public function show($id = null)
    {
        $task = $this->model->find($id);
        if ($task === null) {
            return $this->failNotFound('Task not found');
        }
        return $this->respond($task);
    }

    public function create()
    {

        $data = $this->request->getJSON();

        $validationRules = [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in_list[pending,completed,canceled]',
        ];

        if (!$this->validate($validationRules)) {
            $validationErrors = implode(', ', $this->validator->getErrors());
            return $this->failValidationError($validationErrors);
        }

        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        }
        return $this->failServerError('Failed to create task');
    }

     public function update($id = null)
    {
        $data = $this->request->getJSON();

        $validationRules = [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in_list[pending,completed,canceled]',
        ];

        if (!$this->validate($validationRules)) {
            $validationErrors = implode(', ', $this->validator->getErrors());
            return $this->failValidationError($validationErrors);
        }

        if ($this->model->update($id, $data)) {
            return $this->respond($this->model->find($id));
        }
        
        return $this->failServerError('Failed to update task');
    }

    public function delete($id = null)
    {
        $task = $this->model->find($id);
        if ($task === null) {
            return $this->failNotFound('Task not found');
        }
        $this->model->delete($id);
        return $this->respondDeleted($task);
    }
}
