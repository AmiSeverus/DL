<table>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Дополнительная<br> информация</th>
        <th>Удалить</th>
    </tr>
    <tr>
        <td colspan="5">
            <hr>
        </td>
    </tr>
    <?php foreach ($data as $reader) { ?>
    <tr>
        <td><?php echo $reader['id']; ?></td>
        <td><?php echo $reader['given_name']; ?></td>
        <td><?php echo $reader['surname']; ?></td>
        <td><a href="#">Ссылка</a></td>
        <td><a href="<?php echo '/dl/index.php?controller=readers&action=delete&id=' . $reader['id']  ; ?>">Удалить</a></td>
    </tr>
    <?php }?>
</table>

