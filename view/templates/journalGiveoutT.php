<div class='dl'>               
    <div class='giveOut'>
        <center><h3 class="headerFind">Детали предполагаемой выдачи</h3></center>
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
                <td rowspan="2">
                    <?php echo $book['title'] ;?>
                </td>
                <td rowspan="2">
                    <?php echo $book['author'] ;?>
                </td>
                <td rowspan="2">
                    <?php echo $reader['given_name'] ;?>
                </td>
                <td rowspan="2">
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
            <tr>
                <td>
                    <a class='reset' href='/dl/index.php?controller=journal&action=choosebook'>Сбросить</a>
                </td>                      
            </tr>
        </table>
    </div>
</div>

