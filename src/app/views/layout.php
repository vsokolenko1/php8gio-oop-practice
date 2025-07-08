<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?=$title??null?></title>
        <link href="/css/main.css?<?= rand(1, 9999)?>" rel="stylesheet" />
    </head>
    <body>
        <header>
            <div>
                <ul id="mainMenu">
                    <li><a href="/">Home</a></li>
                    <li><a href="/transactions">Transactions</a></li>
                    <li><a href="/transactions/upload">Upload</a></li>
                    <li><a href="/transactions/multiupload">Upload multi</a></li>
                </ul>
            </div>
        </header>
        <hr>
        <table>
            <tr>
                <td>Test table</td>
            </tr>
        </table>
        <!--<main>-->
        {{content}}
        <!--</main>-->
        <hr>
        <footer>
            <center>All rights reserved &copy;2025 <a href="mailto: vsokolenko1@gmail.com">Vladyslav Sokolenko</a></center>
        </footer>
        
    </body>
</html>