<div class='dl'>               
    <div class='giveOut'>
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
                    <?php echo $book['title'] ;?>
                </td>
                <td>
                    <?php echo $book['author'] ;?>
                </td>
                <td>
                    <?php echo $reader['given_name'] ;?>
                </td>
                <td>
                    <?php echo $reader['surname'] ;?>                        
                </td>
                <td>
                    <form class="giveOut" name="record" method="POST" action="/dl/index.php?controller=journal&action=giveout">
                        <input type="hidden" name="bookid" value="<?php echo $book['id'] ;?>">
                        <input type="hidden" name="readerid" value="<?php echo $reader['id'] ;?>">
                        <input class="giveOutBtn" name="submit" type="submit" value="Выдать">    
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>

