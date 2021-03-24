<div class="find">
    <center><h3 class="headerFind">Добавить читателя</h3></center>
    <form action="/dl/index.php?controller=readers&action=add" method="POST">
        <input required placeholder="Введите имя" type="text" name='given_name'>
        <input required placeholder="Введите фамилию" type="text"  name="surname">
        <input class="btn" type="submit" name="submit" value="Отправить">
        <input class="btn" type="reset" name="reset" value="Сбросить">
    </form>
    <div class='message'><?php echo $message ; ?></div>
</div>