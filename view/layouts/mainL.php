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
                    <form method="GET"  >
                        
                    </form>
                    <a href='/dl/index.php?controller=books'>Все книги</a> 
                </div>
                <div class='container_itemSearch'>
                    <a href=#>Найти книгу</a>
                </div>
                <div class='container_itemAdd'>
                    <a href=#>Добавить книгу</a>
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
                    <a href=#>Найти читателя</a>
                </div>
                <div class='container_itemAdd'>
                    <a href=#>Добавить читателя</a>
                </div>
            </div>
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