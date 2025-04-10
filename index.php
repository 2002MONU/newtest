<?php
require 'db.php';
require 'member.php';
$memberObj = new Member($pdo);
$members = $memberObj->getMembers();

function displayTree($members, $parent_id = 0) {
    $tree = "<ul>";
    foreach ($members as $member) {
        if ($member['parent_id'] == $parent_id) {
            $tree .= "<li>{$member['name']}";
            $tree .= displayTree($members, $member['id']);
            $tree .= "</li>";
        }
    }
    $tree .= "</ul>";
    return $tree;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add members</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container mt-5">
        <h5>Members</h5>
        <div id="memberTree"><?= displayTree($members);?></div>
        <button type="button" class="btn btn-primary" id="addBtn">Add Member</button>
    </div>

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal " id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addForm" >
      <div class="modal-body ">
      <div class="form-group">
            <label for="">Parent</label>
            <select name="parent_id" id="" class="form-control">
                <option value="0">None</option>
                <?php foreach ($members as $m): ?>
                            <option value="<?= $m['id'] ?>"><?= $m['name'] ?></option>
                        <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" ></script>

<script  src="js/script.js"></script>
</body>
</html>