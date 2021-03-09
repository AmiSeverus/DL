<table>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Автор</th>
        <th>Кол-во на складе<th/>
    </tr>
    <?php foreach ($data as $book) { ?>
    <a href="#"><tr>
        <td><?php echo $book['id']; ?></td>
        <td><?php echo $book['title']; ?></td>
        <td><?php echo $book['author']; ?></td>
        <td><?php echo $book['availamount']; ?></td>
    </tr></a>
    <?php }?>
</table>


<?php



