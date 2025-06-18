<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?=$title??null?></title>
    </head>
    <body>

        <ul>
            <li><a href="/">Home page</a></li>
            <li><a href="/transactions">All transactions</a></li>
            <li><a href="/transactions/create">Create transaction</a></li>
            <li><a href="/non-existen-page">Non existent page</a></li>
        </ul>
        
        {{content}}
        
    </body>
</html>