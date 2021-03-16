<table>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Дополнительная<br> информация</th>
    </tr>
    <tr>
        <td colspan="4">
            <hr>
        </td>
    </tr>
    <?php foreach ($data as $reader) { ?>
    <tr>
        <td><?php echo $reader['id']; ?></td>
        <td><?php echo $reader['given_name']; ?></td>
        <td><?php echo $reader['surname']; ?></td>
        <td><a href="#">Ссылка</a></td>
    </tr>
    <?php }?>
</table>

