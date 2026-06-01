<?php
namespace App\Core;

use App\Controllers\AgendaController;
use App\Models\AgendaModel;
use App\Database\Connection;

class Container {
    /**
    * Método estático para criar e retornar uma instância do AgendaController.
    * Ele gerencia a criação da conexão com o banco de dados e a injeção da dependência da Model no Controller.
    * @return AgendaController
    */
    public static function agendaController() {
        $connection = Connection::get();

        $model = new AgendaModel($connection);

        return new AgendaController($model);
    }
}