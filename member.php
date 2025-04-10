<?php 
 class Member {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getMembers() {
        $stmt = $this->pdo->query("SELECT * FROM members");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMember($name, $parent_id) {
        $stmt = $this->pdo->prepare("INSERT INTO members (name, parent_id) VALUES (?, ?)");
        return $stmt->execute([$name, $parent_id]);
    }
 }


?>