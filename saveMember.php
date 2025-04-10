<?php
require 'db.php';
require 'member.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $parent_id = $_POST['parent_id'];
    $member = new Member($pdo);

    if($member->addMember($name, $parent_id)){
        echo 'success';
    } else {
        echo 'Failed to add member';
    }
}
?>