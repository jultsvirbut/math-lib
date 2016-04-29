<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>TABLE</title>
    <script type="text/javascript" src="assets/js/jq.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <style type="text/css">
        body { font-family: Arial; font-size: 12px; }
        .create-var-interface { display: none; }
        .delete-table-row { color : red; cursor: pointer; }
        .delete-table-row:hover { text-decoration: underline; }
        .visual-program-table tr td { padding: 5px; margin-right: 5px; }
        .visual-program-table tr { transition: all .3s ease-in-out; }
        .visual-program-table tr:hover { background: #e3e3e3; }
    </style>
 </head>
 <body>

 <form action="handler.php">
  <p><b></b></p>
  <p><input type="radio" name="answer" value="a1"> <Br>
  <input type="radio" name="answer" value="a2"> <Br>
  <input type="radio" name="answer" value="a3">  </p>
  <p><input type="submit"></p>
 </form>

 </body>
</html>