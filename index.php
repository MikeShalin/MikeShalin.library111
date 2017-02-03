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
       
    </style>
</head>
<body>
<form id="create_author">
	
		<input placeholder="Author" type="text" name="author">
		<input type="submit" value="Создать">
	</form>
	<br>
<form id='form' method="GET" name="multiple-select" class="anchor">
    <input type="hidden" name="id" placeholder="id">
    <select name="author" data-placeholder="Выберите автора" class="chosen-select" multiple style="width:350px;" tabindex="4">
    <?php
	
	$result = mysql_query("SELECT * FROM `writer`");
		
	while ($data = mysql_fetch_assoc($result))
	
	{
		
		echo '<option value="' . $data["ide"] . '">' . $data["name"] . '</option>';
		
	}
	
	?>
    </select>

    <input type="" name="title" placeholder="title">
    <input type="submit" name="">    
</form>
<ul class="container">
    <?php
    $result = mysql_query ("SELECT * FROM `library` LIMIT " . $page * $pageCount . ", " . $pageCount);
    
    
    if (mysql_num_rows($result) >  0){
        while ( $data = mysql_fetch_array ($result) )
        {
            $authors = explode("_",$data["author"]);
			
			$condition = "";
			foreach($authors as $i=>$ide){
				
				$condition .= " OR `ide` = " . $ide;
				
			}
			$condition = substr($condition, 4);
			
			$resultAuthors = mysql_query("SELECT * FROM `writer` WHERE " . $condition);
			
			//echo $condition;
			
			echo 
                "<li id='book_" . $data["id"] . "' onclick='setTaskStatus( " . $data["id"] . " )'>
                
                <i>";
			$splite = "";
			while ($dataAuthor = mysql_fetch_array($resultAuthors)){
				
				$splite .=", " . $dataAuthor["name"];
				
			} 
			echo substr($splite, 2);
			
			echo  "</i>: "  . $data["title"] .  "<b>" . ( $data["flag"] == 1 ? "(прочитал)" : "(не прочитал)" ) . "</b></li>" .  "

                <button id = " . $data["id"] . " onclick='removeBook(" . $data["id"] . ")'>Удалить</button>
                <br>

                <button onclick='updateBook(" . $data["id"] . ")'>Редактировать</button>
                ";
        
        }
        
    } else {
		
		echo "На странице нет данных";
		
	}
    ?>
</ul>
<div class="books">
    <?php
	$resultCount = mysql_query ("SELECT COUNT(1) FROM `library`");
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
