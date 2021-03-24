<div>
    <center><h3 class="headerFind">Все книги</h3></center>
    <table>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Автор</th>
        <th>Количество <br> на складе</th>
        <th>Дополнительная <br> информация</th>
        <th>Удалить</th>
    </tr>
    <tr>
        <td colspan="6">
            <hr>
        </td>
    </tr>
    <?php foreach ($data as $book) { ?>
    <tr>
        <td><?php echo $book['id']; ?></td>
        <td><?php echo $book['title']; ?></td>
        <td><?php echo $book['author']; ?></td>
        <td><?php echo $book['availamount']; ?></td>
        <td><a href="<?php echo '/dl/index.php?controller=books&action=item&id=' . $book['id']  ; ?>">Ссылка</a></td>
        <td><a href="<?php echo '/dl/index.php?controller=books&action=delete&id=' . $book['id']  ; ?>">Удалить</a></td>
    </tr>
    <?php }?>
</table>
</div>