<?php

namespace App\Controllers;

use App\Models\AgendaModel;

class AgendaController {
    private $model;

    public function __construct(AgendaModel $model) {
        $this->model = $model;
    }

    public function index() {
        return array(
            'items' => $this->model->all()
        );
    }

    public function find($id) {
        return $this->model->find($id);
    }

    public function create(array $data) {
        $errors = $this->model->validate($data);

        if (!empty($errors)) {
            return array('errors' => $errors, 'data' => $data);
        }

        $id = $this->model->create($data);
        return array('id' => $id);
    }

    public function update($id, array $data) {
        $errors = $this->model->validate($data);

        if (!empty($errors)) {
            return array('errors' => $errors, 'data' => $data);
        }

        $this->model->update($id, $data);
        return array('success' => true);
    }

    public function delete($id) {
        return $this->model->delete($id);
    }
}
