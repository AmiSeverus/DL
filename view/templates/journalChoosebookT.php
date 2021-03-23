<div class='books'>
    <div class="booksSearch">
        <center>
            <h4>Выбрать книгу</h4>
        </center>
        <form class='books' name='books' method="POST" action="/dl/index.php?controller=journal&action=choosebook">
            <select required name='searchField'>
                <option>По названию</option>
                <option>По автору</option>
            </select>
            <input required type="text" name='searchValue' placeholder="Заполните поле"></input>
            <input class="btn" type="submit" name="books" value="Найти">
            <input class="btn" type="reset" name="reset" value="Сбросить">
        </form>
    </div>
    <hr style="width: 90%;">
    <div class="booksView">
        <table style="width: 100%; border-spacing: 5px;">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Выдать</th>
            </tr>
            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>
            <?php foreach ($data as $book) { 
                if ($book['id'] > 0) {?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><a href="<?php echo '/dl/index.php?controller=journal&action=choosereader&bookid=' . $book['id']  ; ?>">Выбрать</a></td>
            </tr>
            <?php }}?>
        </table>
    </div>
</div>

