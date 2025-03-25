<?php

class Asset {
    private $db;
    private $table = 'assets';

    public $id;
    public $name;
    public $description;
    public $value;
    public $date_acquired;

    public function __construct($database) {
        $this->db = $database;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (name, description, value, date_acquired) VALUES (:name, :description, :value, :date_acquired)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':value', $this->value);
        $stmt->bindParam(':date_acquired', $this->date_acquired);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readSingle() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET name = :name, description = :description, value = :value, date_acquired = :date_acquired WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':value', $this->value);
        $stmt->bindParam(':date_acquired', $this->date_acquired);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}