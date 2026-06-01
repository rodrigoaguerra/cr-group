<?php

namespace App\Models;

use PDO;

class AgendaModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function all() {
        $stmt = $this->db->query('SELECT * FROM agenda ORDER BY event_date ASC, id DESC');
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare('SELECT * FROM agenda WHERE id = :id LIMIT 1');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $item = $stmt->fetch();
        return $item === false ? null : $item;
    }

    public function create(array $data) {
        $stmt = $this->db->prepare(
            'INSERT INTO agenda (title, description, event_date, created_at) VALUES (:title, :description, :event_date, NOW())'
        );
        $stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindValue(':event_date', $data['event_date'], PDO::PARAM_STR);
        $stmt->execute();

        return (int)$this->db->lastInsertId();
    }

    public function update($id, array $data) {
        $stmt = $this->db->prepare(
            'UPDATE agenda SET title = :title, description = :description, event_date = :event_date WHERE id = :id'
        );
        $stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindValue(':event_date', $data['event_date'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM agenda WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function validate(array $data) {
        $errors = array();

        $title = isset($data['title']) ? trim($data['title']) : '';
        $description = isset($data['description']) ? trim($data['description']) : '';
        $eventDate = isset($data['event_date']) ? trim($data['event_date']) : '';

        if ($title === '') {
            $errors['title'] = 'O título é obrigatório.';
        }

        if ($description === '') {
            $errors['description'] = 'A descrição é obrigatória.';
        }

        if ($eventDate === '') {
            $errors['event_date'] = 'A data e hora do evento são obrigatórias.';
        } elseif (!strtotime($eventDate)) {
            $errors['event_date'] = 'Formato de data inválido. Use YYYY-MM-DD HH:MM:SS.';
        }

        return $errors;
    }
}
