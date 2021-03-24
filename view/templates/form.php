<form name='record' method="POST" action="/dl/index.php?controller=journal&action=return">
    <input type="hidden" name="recordid" value="<?php echo $data['id'];?>">
    <input type="hidden" name='bookid' value="<?php echo $data['bookid'];?>">
    <input class="btnReturn" type="submit" value="Да">
</form>

