<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?=$title??null?></title>
        <link href="/css/main.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <div>
                <ul id="mainMenu">
                    <li><a href="/">Home page</a></li>
                    <li><a href="/transactions">All transactions</a></li>
                    <li><a href="/transactions/create">Create transaction</a></li>
                    <li><a href="/non-existen-page">Non existent page</a></li>
                </ul>
            </div>
        </header>
        <hr>
        <main>
        {{content}}
        </main>
        <hr>
        <footer>
            <center>All rights reserved &copy;2025 <a href="mailto: vsokolenko1@gmail.com">Vladyslav Sokolenko</a></center>
        </footer>
        
    </body>
</html>