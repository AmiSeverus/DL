<div class='dl'>
    <div class="searchitems">
        <div class='books'>
            <div class="booksSearch">
                <center>
                    <h4>Выбрать книгу</h4>
                </center>
                <form class='books' name='books' method="POST" action="#">
                    <select required name='searchField'>
                        <option>По названию</option>
                        <option>По автору</option>
                    </select>
                    <input required type="text" name='searchValue' placeholder="Заполните поле"></input>
                    <input class="btn" type="submit" name="submit" value="Найти">
                    <input class="btn" type="reset" name="reset" value="Сбросить">
                    </form>
            </div>
            <hr style="width: 90%;">
            <div class="booksView">
                <table style="width: 100%; border-spacing: 5px;">
                    <tr>
                        <th style="text-align: left; width: 25%;">Название</th>
                        <td style="text-align: left;">1</td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 25%;">Автор</th>
                        <td style="text-align: left;">2</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form><button type='submit' name='1' formmethod="POST" formaction="#">Выбрать</button></form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="readers">
            <div class='readersSearch'>
                <center>
                    <h4>Выбрать читателя</h4>
                </center>
                <form class='readers' name='readers' method="POST" action="#">
                    <select required name='searchField'>
                        <option>По имени</option>
                        <option>По фамилии</option>
                    </select>
                    <input required type="text" name='searchValue' placeholder="Заполните поле"></input>
                    <input class="btn" type="submit" name="submit" value="Найти">
                    <input class="btn" type="reset" name="reset" value="Сбросить">
                </form>
            </div>
            <hr style="width: 90%;">                    
            <div class="readersView">
                <table style="width: 100%; border-spacing: 5px;">
                    <tr>
                        <th style="text-align: left; width: 25%;">Имя</th>
                        <td style="text-align: left;">1</td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 25%;">Фамилия</th>
                        <td style="text-align: left;">2</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form><button type='submit' name='1' formmethod="POST" formaction="#">Выбрать</button></form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>                
    <div class='giveOut'>
        <hr>
        <form class="giveOut" method="POST" action="#">
            <input type="hidden" name="book_id" value='#'>
            <input type="hidden" name="reader_id" value='#'>
            <table style="width: 100%;">
                <tr>
                    <th colspan="2">
                        Книга
                    </th>
                    <th colspan="2">
                        Читатель
                    </th>
                    <th rowspan="2">
                        Выдать
                    </th>
                </tr>
                <tr>
                    <td>
                        Название
                    </td>
                    <td>
                        Автор
                    </td>
                    <td>
                        Имя
                    </td>
                    <td>
                        Фамилия
                    </td>
                </tr>
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        <input class="giveOutBtn" type="submit" value="Выдать">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

