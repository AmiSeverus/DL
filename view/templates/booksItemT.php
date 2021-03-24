<div class=item>
    <center><h3>Информация о книге</h3></center>
    <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Автор</th>
            <th>На складе</th>
            <th>Удалить?</th>
        </tr>
        <tr>
            <td><?php echo $book['id'] ;?></td>
            <td>
                <?php echo $book['title'] ;?>
                <form action="#" method="POST">
                    <input type="hidden" name="id" value=<?php echo $book['id'] ;?>>
                    <input autocomplete="off" type="text" name="text" placeholder="Введите новое название">
                    <input class="btn" type="submit" name="submit" value="Изменить">
                    <input class="btn" type="reset" name="reset" value="Сбросить">
                </form>
            </td>
            <td>
                <?php echo $book['author'] ;?>
                <form action="#" method="POST">
                    <input type="hidden" name="id" value=<?php echo $book['id'] ;?>>
                    <input autocomplete="off" type="text" name="text" placeholder="Введите нового автора">
                    <input class="btn" type="submit" name="submit" value="Изменить">
                    <input class="btn" type="reset" name="reset" value="Сбросить">
                </form>
            </td>
            <td>
                <?php echo $book['availamount'] ;?>
                <form action="#" method="POST">
                    <input type="hidden" name="id" value=<?php echo $book['id'] ;?>>
                    <input autocomplete="off" min="0" type="amount" name="text" placeholder="Введите новое количество">
                    <input class="btn" type="submit" name="submit" value="Изменить">
                    <input class="btn" type="reset" name="reset" value="Сбросить">
                </form>
            </td>
            <td>
                <a href="<?php echo '/dl/index.php?controller=books&action=delete&id=' . $book['id']  ; ?>">Да</a>
            </td>
        </tr>
    </table>
    <center><h3>Книга выдавалась следующим читателям</h3></center>
    <table>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Дата выдачи</th>
            <th>Сдать до</th>
            <th>Сдать?</th>
        </tr>
        <?php foreach ($records as $record) { ;?>
        <tr>
            <td><?php echo $record['given_name'] ;?></td>
            <td><?php echo $record['surname'] ;?></td>
            <td><?php echo $record['given_date'] ;?></td>
            <td><?php echo $record['return_date'] ;?></td>
            <td><?php echo $record['form'] ;?></td>                        
        </tr>
        <?php } ;?>
    </table>
</div>

