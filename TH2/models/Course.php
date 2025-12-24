<?php

class Course {
    private $conn;
    private $table = "courses";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getByCategory($categoryId) {
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE category_id = ? ORDER BY title");
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchByTitle($keyword)
{
    $sql = "SELECT * FROM courses WHERE title LIKE ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["%$keyword%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function searchByTitleAndCategory($keyword, $categoryId)
{
    if (!empty($categoryId)) {
        $sql = "SELECT * FROM courses WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$categoryId]);
    } 
    else {
        $sql = "SELECT * FROM courses WHERE title LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["%$keyword%"]);
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function getAll() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  
    public function getByInstructor($instructor_id) {
        $sql = "SELECT * FROM {$this->table} WHERE instructor_id = :id ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $instructor_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table} 
                (title, description, instructor_id, category_id, price, duration_weeks, level, image)
                VALUES (:title, :description, :instructor_id, :category_id, :price, :duration_weeks, :level, :image)";
        
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function get($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $sql = "UPDATE {$this->table} SET
                title=:title, description=:description, category_id=:category_id,
                price=:price, duration_weeks=:duration_weeks, level=:level, image=:image 
                WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id'=>$id]);
    }
}