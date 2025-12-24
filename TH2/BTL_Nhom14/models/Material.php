<?php
class Material {
    private $conn;
    private $table = "materials";

    public function __construct($db) { 
        $this->conn = $db; 
    }

    public function getByLesson($lesson_id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE lesson_id = :lesson_id ORDER BY uploaded_at DESC");
        $stmt->execute(['lesson_id' => $lesson_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (lesson_id, filename, file_path, file_type)
                VALUES (:lesson_id, :filename, :file_path, :file_type)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
