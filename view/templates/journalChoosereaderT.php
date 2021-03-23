<div class="readers">
    <div class='readersSearch'>
        <center>
            <h4>Выбрать читателя</h4>
        </center>
        <form class='readers' name='readers' method="POST" action="<?php echo $url ; ?>" >
            <select required name='searchField'>
                <option>По имени</option>
                <option>По фамилии</option>
            </select>
            <input required type="text" name='searchValue' placeholder="Заполните поле">
            <input class="btn" type="submit" name="readers" value="Найти">
            <input class="btn" type="reset" name="reset" value="Сбросить">
        </form>
    </div>
    <hr style="width: 90%;">                    
    <div class="readersView">
        <table style="width: 100%; border-spacing: 5px;">
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Выдать</th>
            </tr>
            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>
            <?php foreach ($data as $reader) {
                if ($reader['id'] > 0) {?>
            <tr>
                <td><?php echo $reader['id']; ?></td>
                <td><?php echo $reader['given_name']; ?></td>
                <td><?php echo $reader['surname']; ?></td>
                <td><a href="<?php echo '/dl/index.php?controller=journal&action=giveout&readerid=' . $reader['id']  . '&bookid=' . $reader['bookid'] ; ?>">Выбрать</a></td>
            </tr>
            <?php }}?>        
        </table>
    </div>
</div>

