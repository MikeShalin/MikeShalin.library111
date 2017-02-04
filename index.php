<?php
    header("Content-Type: text/html; charset=utf-8");
    include ("core.php");

    

    $pageCount = 5;
    if(!isset($_GET["page"]))
    {
        $page = 0;
    }
    else
    {
        $page = $_GET["page"] - 1;
    }
?>
<!doctype html>
<html lang="us">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EJS test</title>
    <link rel="stylesheet" type="text/css" href="chosen.min.css">
    <style>
        .tasks li {
            cursor: pointer;
        }
        a{
            text-decoration: none;
        }
		.input{
			height: 24px;
			padding: 0px 1px 1px 1px;
		}
		li{
			margin: 20px 0px 0px;
		}
		
		.submit{
			padding: 4px 6px 6px;
		}
    </style>
</head>
<body>
<form id="create_author">
	
		<input class="input" placeholder="Автор" type="text" name="author">
		<input class="submit" type="submit" value="Создать">
	</form>
	<br>
<form id='form' method="GET" name="multiple-select" class="anchor">
    <input type="hidden" name="id" placeholder="id">
    <select name="author" data-placeholder="Выберите автора" class="chosen-select" multiple style="width:350px; " tabindex="4">
    <?php
	
	$result = mysql_query("SELECT * FROM `writer`");
		
	while ($data = mysql_fetch_assoc($result))
	
	{
		
		echo '<option value="' . $data["writer__id"] . '">' . $data["writer__name"] . '</option>';
		
	}
	
	?>
	</select>
    <input class="input" type="" name="title" placeholder="Название книги">
    <input class="submit" type="submit" name="add">    
</form>
<ul class="container">
    <?php
    $result = mysql_query ("SELECT * FROM `book` LIMIT " . $page * $pageCount . ", " . $pageCount);
    
    
    if (mysql_num_rows($result) >  0){
        while ( $data = mysql_fetch_array ($result) )
        {
            
			
			$resultAuthors = mysql_query("SELECT * FROM `library`, `writer` WHERE `library`.`bookId` = ". $data["book__id"] ." AND `library`.`writerId` = `writer`.`writer__id`");
			
			//echo $condition;
			
			echo 
                "<li id='book_" . $data["id"] . "' onclick='setTaskStatus( " . $data["id"] . " )'>
                
                <i>";
			$splite = "";
			while ($dataAuthor = mysql_fetch_array($resultAuthors)){
				
				$splite .=", " . $dataAuthor["writer__name"];
				
			} 
			echo substr($splite, 2);
			
			echo  "</i>: "  . $data["book__title"] .  "</li>" .  "

                <button id = " . $data["book__id"] . " onclick='removeBook(" . $data["book__id"] . ")'>Удалить</button>
            

                <button onclick='updateBook(" . $data["book__id"] . ")'>Редактировать</button>
                ";
        
        }
        
    } else {
		
		echo "На странице нет данных";
		
	}
    ?>
</ul>
<div class="books">
    <?php
	$resultCount = mysql_query ("SELECT COUNT(1) FROM `book`");
	$resultCount = mysql_fetch_array ($resultCount);
	
	$from = $page * $pageCount;
	$to = $from + $pageCount;
	
	if ($from > $resultCount[0] ){
	
		echo "<a href = '/?page=1'> Перейти на первую страницу </a>";
		
	} else {
			
	if ($from > 0){
		
		echo "<a href = '/?page=" . ($page) ."'> ⇐ </a>";
		
	} 
	
	    echo "<b>" . ($page + 1) . "</b>";
		
	if ($resultCount[0] > $to){
	    
		echo "<a href = '/?page=" . ($page + 2) ."'> ⇒ </a>";
		
	}
	
	}
	
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="main.js?1"></script>
<script src="chosen.proto.min.js"></script>
<script src="chosen.jquery.min.js"></script>
</body>
</html>
