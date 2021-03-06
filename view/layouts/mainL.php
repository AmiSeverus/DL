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

    .journalMain {
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

    .giveOut form {
        margin-bottom: 0;
        height: 50%;
    }
    .giveOut td, .giveOut th {
        border: 1px solid black;
    }

    .giveOutBtn {
        border: none;
        width: 100%; 
        cursor: pointer;
        background-color: inherit;
        margin: 2px 0;
        min-height: 0;
        height:100%;
        padding: 0;
    }

    .giveOutBtn:hover {
        color: blue;
        background-color: inherit;
    }
    
    .reset{
        text-decoration: none;
        color: black;
        cursor: pointer;
        width: 100%;
        margin: 2px 0;
        height: 100%;
        font-size: 0.7em;
        background-color: inherit;
        opacity: 0.8;
    }
    
    .reset:hover{
        color: blue;
    }
    
    button {
        border: 1px solid black;
        cursor: pointer;
    }
    button:hover {
        font-weight: bolder;
    }
    
    .journal {
        border-spacing: 0;
        border: none;
    }

    .journal tr, .journal th, .journal td {
        border: 1px solid black;
        padding: 5px;
    }

    .journal input {
        border: none; 
        width: 100%; 
        cursor: pointer;
        background-color: inherit;
    }

    .journal input:hover {
        color: blue;
    }
    
    .item table {
    border-spacing: 0;
    }

    .item tr, .item th, .item td {
        border: 1px solid black;
        padding: 5px;
    }

    .item input .btn {
        border: none; 
        width: 100%; 
        cursor: pointer;
    }

    .item input .btn:hover {
        color: blue;
    }
    
    .btnReturn {
        border: none;
        width: 100%;
        cursor: pointer;
        background-color: inherit;
    }
    
    .btnReturn:hover{
        color: blue;
    }
    
</style>
<title>Digital Library</title>
</head>
<body>
    <div class='container'>
        <a href='/dl/index.php'>
            <h1 class='container_mainHeader'>
                <center>?????????????????????? ????????????????????</center>
            </h1>
        </a>
        <div class='container_content'>
            <div class='container_items'>
                <h3 class='container_header'>
                    <center>??????????</center>
                </h3>
                <div class='container_list'>
                    <a href='/dl/index.php?controller=books'>?????? ??????????</a> 
                </div>
                <div class='container_itemSearch'>
                    <a href='/dl/index.php?controller=books&action=find'>?????????? ??????????</a>
                </div>
                <div class='container_itemAdd'>
                    <a href='/dl/index.php?controller=books&action=add'>???????????????? ??????????</a>
                </div>
            </div>
            <div class='container_items'>
                <h3 class='container_header'>
                    <center>????????????????</center>
                </h3>
                <div class='container_list'>
                    <a href='/dl/index.php?controller=readers'>?????? ????????????????</a>
                </div>
                <div class='container_itemSearch'>
                    <a href='/dl/index.php?controller=readers&action=find'>?????????? ????????????????</a>
                </div>
                <div class='container_itemAdd'>
                    <a href='/dl/index.php?controller=readers&action=add'>???????????????? ????????????????</a>
                </div>
            </div>
        </div>
        <div class='journalMain'>
            <center>
                <a href="/dl/index.php?controller=journal&action=choosebook">???????????? ?????????? ????????????????</a>
            </center>
        </div>
        <div class='journalMain'>
            <center>
                <a href="/dl/index.php?controller=journal">???????????????? ???????????? ????????????</a>
            </center>
        </div>        
        <div class='content'>
            <?php echo $CONTENT ; ?>
        </div>
    </div>
</body>