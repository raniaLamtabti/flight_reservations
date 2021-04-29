<?php
echo json_encode($data['user']);
?>

<form action="<?php echo URLROOT; ?>/Users/edit" method="POST">
    <input type="text" name="id" value="<?php echo $_SESSION['id'] ?>" hidden>
    <button type="submit">edit</button>
</form>

<form action="<?php echo URLROOT; ?>/Users/delete" method="POST">
    <input type="text" name="id" value="<?php echo $_SESSION['id'] ?>" hidden>
    <button type="submit">delete</button>
</form>

<a href="<?php echo URLROOT; ?>/Users/read">read</a>

<form action="<?php echo URLROOT; ?>/Users/logout" method="POST">
    <button type="submit">logout</button>
</form>