<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="/function" method="POST">
        @csrf
        <label>Enter Number1:</label>
        <input type="text" name="num1">
        <label>Enter Number2:</label>
        <input type="text" name="num2">
        <button type="submit" value="plus" name="submit">Plus</button>
        
        <button type="submit" value="minus" name="submit">Minus</button> 

        <button type="submit" value="multiply" name="submit">multiply</button> 

        <button type="submit" value="divide" name="submit">divide</button> 
        @yield("abc")
    </form>
</body>
</html>