<div class="find">
    <center><h3 class="headerFind">Добавить книгу</h3></center>
    <form action="/dl/index.php?controller=books&action=add" method="POST">
        <input required autocomplete="off" placeholder="Введите название" type="text" name='title'>
        <input required autocomplete="off" placeholder="Введите автора" type="text"  name="author">
        <input required autocomplete="off" min="0" placeholder="Количество" type="number"  name="availamount">
        <input class="btn" type="submit" name="submit" value="Отправить">
        <input class="btn" type="reset" name="reset" value="Сбросить">
    </form>
    <div class='message'><?php echo $message ; ?></div>
</div>

