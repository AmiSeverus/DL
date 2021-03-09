<table>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Фамилия</th>
    </tr>
    <?php foreach ($data as $reader) { ?>
    <a href="#"><tr>
        <td><?php echo $reader['id']; ?></td>
        <td><?php echo $reader['given_name']; ?></td>
        <td><?php echo $reader['surname']; ?></td>
    </tr></a>
    <?php }?>
</table>

