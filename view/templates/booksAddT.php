<div class="find">
    <h3 class="headerFind">Добавить книгу</h3>
    <form action="/dl/index.php?controller=books&action=add" method="POST">
        <input placeholder="Введите название" type="text" name='title'>
        <input placeholder="Введите автора" type="text"  name="author">
        <input placeholder="Количество" type="text"  name="availamount">
        <input class="btn" type="submit" name="submit" value="Отправить">
        <input class="btn" type="reset" name="reset" value="Сбросить">
    </form>
    <div class='message'><?php echo $message ; ?></div>
</div>

