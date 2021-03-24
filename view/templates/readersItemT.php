<div class=item>
    <center><h3>Читатель</h3></center>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Удалить?</th>
        </tr>
        <tr>
            <td><?php echo $reader['id'] ;?></td>
            <td>
                <?php echo $reader['given_name'] ;?>
                <form action="#" method="POST">
                    <input type="hidden" name="recordid" value="recordid">
                    <input autocomplete="off" type="text" name="text" placeholder="Введите новое имя">
                    <input class="btn" type="submit" name="submit" value="Изменить">
                    <input class="btn" type="reset" name="reset" value="Сбросить">
                </form>
            </td>
            <td>
                <?php echo $reader['surname'] ;?>
                <form action="#" method="POST">
                    <input type="hidden" name="recordid" value="recordid">
                    <input autocomplete="off" type="text" name="text" placeholder="Введите новую фамилию">
                    <input class="btn" type="submit" name="submit" value="Изменить">
                    <input class="btn" type="reset" name="reset" value="Сбросить">
                </form>
            </td>
            <td>
                <a href="<?php echo '/dl/index.php?controller=readers&action=delete&id=' . $reader['id']  ; ?>">Да</a>
            </td>
        </tr>
    </table>
    <center><h3>Брал/-а следующие книги</h3></center>
    <table>
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>Дата выдачи</th>
            <th>Сдать до</th>
            <th>Сдать?</th>
        </tr>
        <?php foreach ($records as $record) { ;?>
        <tr>
            <td><?php echo $record['title'] ;?></td>
            <td><?php echo $record['author'] ;?></td>
            <td><?php echo $record['given_date'] ;?></td>
            <td><?php echo $record['return_date'] ;?></td>
            <td><?php echo $record['form'] ;?></td>                        
        </tr>
        <?php }?>
    </table>
</div>

