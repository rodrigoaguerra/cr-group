<?php
date_default_timezone_set('America/Sao_Paulo');

// Carrega configuração de ambiente (config.php se existir, senão config-example.php)
$configFile = __DIR__ . '/../config.php';
if (file_exists($configFile)) {
    require_once $configFile;
} else {
    require_once __DIR__ . '/../config-example.php';
}

require_once __DIR__ . '/../src/Database/Connection.php';
require_once __DIR__ . '/../src/Models/AgendaModel.php';
require_once __DIR__ . '/../src/Controllers/AgendaController.php';
require_once __DIR__ . '/../src/Core/Container.php';

use App\Core\Container;

$agendaController = Container::agendaController();

$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$errors = array();
$item = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($action) {
        case 'store':
            $result = $agendaController->create($_POST);
            if (!empty($result['errors'])) {
                $errors = $result['errors'];
                $item = $_POST;
                $action = 'create';
                break;
            }

            header('Location: ?action=list');
            exit;

        case 'update':
            if ($id === null) {
                header('Location: ?action=list');
                exit;
            }

            $result = $agendaController->update($id, $_POST);
            if (!empty($result['errors'])) {
                $errors = $result['errors'];
                $item = array_merge($_POST, ['id' => $id]);
                $action = 'edit';
                break;
            }

            header('Location: ?action=list');
            exit;

        case 'delete':
            if ($id !== null) {
                $agendaController->delete($id);
            }
            header('Location: ?action=list');
            exit;
    }
}

switch ($action) {
    case 'create':
        $formTitle = 'Criar compromisso';
        $formDescription = 'Preencha o formulário para adicionar um novo compromisso.';
        $formAction = '?action=store';
        $submitText = 'Criar';
        require __DIR__ . '/views/agenda/form.php';
        break;

    case 'edit':
        if ($id === null) {
            header('Location: ?action=list');
            exit;
        }

        $item = $agendaController->find($id);
        if ($item === null) {
            header('Location: ?action=list');
            exit;
        }

        $formTitle = 'Editar compromisso';
        $formDescription = 'Atualize os dados do compromisso abaixo.';
        $formAction = '?action=update&id=' . $item['id'];
        $submitText = 'Salvar alterações';
        require __DIR__ . '/views/agenda/form.php';
        break;

    default:
        $data = $agendaController->index();
        $items = $data['items'];
        require __DIR__ . '/views/agenda/list.php';
        break;
}
