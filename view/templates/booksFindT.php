<div>
    <center><h3>Найти книгу</h3></center>
    <form name='search'action='/dl/index.php?controller=books&action=find' method="POST">
        <select required name='searchField'>
            <option>По названию</option>
            <option>По автору</option>
        </select>
        <input autocomplete="off" required type="text" name='searchValue' placeholder="Заполните поле"></input>
        <input class="btn" type="submit" name="submit" value="Отправить">
        <input class="btn" type="reset" name="reset" value="Сбросить">
    </form>
    <div class='message'><?php echo $message ; ?></div>
</div>
