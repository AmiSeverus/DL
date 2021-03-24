<div class=item>
    <center><h3>Читатель</h3></center>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
        </tr>
        <tr>
            <td>Some ID</td>
            <td>
                Some given_name
                <form action="#" method="POST">
                    <input type="hidden" name="recordid" value="recordid">
                    <input type="text" name="text" placeholder="Введите новое имя">
                    <input class="btn" type="submit" name="submit" value="Изменить">
                    <input class="btn" type="reset" name="reset" value="Сбросить">
                </form>
            </td>
            <td>
                Some surname
                <form action="#" method="POST">
                    <input type="hidden" name="recordid" value="recordid">
                    <input type="text" name="text" placeholder="Введите новую фамилию">
                    <input class="btn" type="submit" name="submit" value="Изменить">
                    <input class="btn" type="reset" name="reset" value="Сбросить">
                </form>
            </td>
        </tr>
    </table>
    <center><h3>Книги на руках</h3></center>
    <table>
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>Дата выдачи</th>
            <th>Сдать до</th>
            <th>Сдать?</th>
        </tr>
        <tr>
            <td>Some title</td>
            <td>Some author</td>
            <td>Given_date</td>
            <td>Return_date</td>
            <td>
                <form action="#" method="POST">
                    <input type="hidden" name="recordid">
                    <input class="btn" type="submit" name="submit" value="Да">
                </form>
            </td>                        
        </tr>
    </table>
</div>

