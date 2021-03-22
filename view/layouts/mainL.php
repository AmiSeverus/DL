<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<style>
    * {
        box-sizing: border-box;
        background-color: aquamarine;
    }

    body {
        display:flex;
        position: relative;
        justify-content: center;
    }

    .container {
        display: flex;
        position: relative;
        flex-direction: column;
        justify-content: center;
    }
    
    center {
        width: 100%;
    }

    .container_mainHeader {
        display:flex;
        position: relative;
        align-items: center;
    }

    .container_content {
        display: flex;
        position: relative;
        flex-direction:row;
        justify-content: space-evenly;
    }

    .container_header {
        display:flex;
        position: relative;
        width: 100%;
        border-bottom: 1px solid black;
        margin: 0px;
        height: 100%;
        align-items: center;
    }

    .container_items{
        display:flex;
        position: relative;
        flex-direction: column;
        border: 1px solid black;
        width: 50%;
        align-items: center;
    }

    .container_list, .container_itemSearch, .container_itemAdd {
        margin-bottom: 10px;
        margin-top: 10px;
        font-size: 0.8em;
    }

    .journal {
        display: flex;
        position:relative;
        align-items: center;
        width: 100%;
        border: 1px solid black;
        border-top: none;
        font-size: 0.8em;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .content{
        margin-top: 15px;
        display: flex;
        position: relative;
        flex-direction:row;
        justify-content: space-evenly; 
    }
    
    hr {
        height: 0.5px;
        background-color: black;
        border: none;
    }
    
    table {
        margin: 0 auto;
        border-spacing: 15px 10px;
        font-size: 0.7em;
    }
    
    th, td {
        text-align: center;
    }
    
    form {
    display: flex;
    flex-direction: column;
    margin-bottom: 5px;
    }

    input, select {
        font-size: 0.7em;
        border: 1px solid black;
        margin: 5px 0;
        min-height: 1.5em;
        background-color: white;
        
    }

    .btn {
        cursor: pointer;
        background-color: inherit;
    }

    .btn:hover{
        opacity: 0.5;
    }

    .btn:active{
        font-weight: bold;
    }

    .headerFind {
        margin: 0;
        margin-bottom: 5px;
    }

    .message {
        text-align: center;
        color: blue;
    }
    
    .dl {
    display: flex;
    flex-direction: column;
    position: relative;
    justify-content: center;
    width: 100%;
    }

    .searchitems {
        display: flex;
        position: relative;
        flex-direction: row;
        justify-content: center;
    }

    .booksSearch, .booksView, .readersSearch, .readersView {
        margin: 10px;
    }   

    .books, .readers {
        width: 100%;
    }

    .giveOut table {
        border-spacing: 0;
    }

    .giveOut td, .giveOut th {
        border: 1px solid black;
    }

    .giveOutBtn {
        border: none; 
        width: 100%; 
        cursor: pointer;
    }

    .giveOutBtn:hover {
        color: blue;
    }
</style>
<title>Digital Library</title>
</head>
<body>
    <div class='container'>
        <a href='/dl/index.php'>
            <h1 class='container_mainHeader'>
                <center>Электронная библиотека</center>
            </h1>
        </a>
        <div class='container_content'>
            <div class='container_items'>
                <h3 class='container_header'>
                    <center>Книги</center>
                </h3>
                <div class='container_list'>
                    <a href='/dl/index.php?controller=books'>Все книги</a> 
                </div>
                <div class='container_itemSearch'>
                    <a href='/dl/index.php?controller=books&action=find'>Найти книгу</a>
                </div>
                <div class='container_itemAdd'>
                    <a href='/dl/index.php?controller=books&action=add'>Добавить книгу</a>
                </div>
            </div>
            <div class='container_items'>
                <h3 class='container_header'>
                    <center>Читатели</center>
                </h3>
                <div class='container_list'>
                    <a href='/dl/index.php?controller=readers'>Все читатели</a>
                </div>
                <div class='container_itemSearch'>
                    <a href='/dl/index.php?controller=readers&action=find'>Найти читателя</a>
                </div>
                <div class='container_itemAdd'>
                    <a href='/dl/index.php?controller=readers&action=add'>Добавить читателя</a>
                </div>
            </div>
        </div>
        <div class='journal'>
            <center>
                <a href="/dl/index.php?controller=journal">Выдать книгу читателю</a>
            </center>
        </div>
        <div class='journal'>
            <center>
                <a href="#">Показать журнал выдачи</a>
            </center>
        </div>        
        <div class='content'>
            <?php echo $CONTENT ; ?>
        </div>
    </div>
</body>