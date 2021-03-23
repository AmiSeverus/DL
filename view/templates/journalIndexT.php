<table class='journal'>
    <tr>
        <th>ID</th>
        <th colspan="3">Книга - Читатель</th>
        <th>Дата выдачи</th>
        <th>Вернуть до</th>
        <th>Дата возврата</th>
        <th>Вернуть</th>
    </tr>
    <?php foreach ($data as $item) {;?>
    <tr>
        <td rowspan="4"><?php echo $item ['id'] ;?></td>
        <th rowspan="2">Книга</th>
        <th>Название</th>
        <td><?php echo $item['title'];?></td>
        <td rowspan="4"><?php echo $item ['given_date'] ;?></td>
        <td rowspan="4"><?php echo $item ['return_date'] ;?></td>
        <td rowspan="4"><?php echo $item['return_date_actual'];?></td>
        <td rowspan="4">
            <?php echo $item['form'] ;?>
        </td>
    </tr>
    <tr>
        <th>Автор</th>
        <td><?php echo $item['author'];?></td>
    </tr>
    <tr>
        <th rowspan="2">Читатель</th>
        <th>Имя</th>
        <td><?php echo $item['given_name'];?></td>                    
    </tr>
    <tr>
        <th>Фамилия</th>
        <td><?php echo $item['surname'];?></td>
    </tr>
    <?php };?>
</table>

