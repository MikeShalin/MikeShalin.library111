<?php
include ("core.php");

$mod = $_GET["mod"];
$json = array();

$pageCount = 5;

if($mod == "add"){
	
    $json["title"] = $_POST["title"];
    $json["author"] = $_POST["author"];
    $json["id"] = $_POST["id"];

    if ($json["id"]>0){
		
		mysql_query("DELETE FROM `library` WHERE `bookId` =" . $json["id"]); 
	   
        mysql_query("UPDATE `book` SET `book__title` = '" . $json['title']  . "' WHERE `book__id` = " . $json["id"]);
    	
		foreach ($json["author"] as $i=>$authorId){
			
			mysql_query("INSERT INTO `library`(`writerId`,`bookId`) VALUES ('" . $authorId . "','" . $json["id"] . "')");
			
		}
	}
    else{
		
        mysql_query("INSERT INTO `book`(`book__title`) VALUES ('" . $json['title'] . "')");
		
		$bookId = mysql_insert_id();
        
		foreach ($json["author"] as $i=>$authorId){
			
			mysql_query("INSERT INTO `library`(`writerId`,`bookId`) VALUES ('" . $authorId . "','" . $bookId . "')");
			
		}
           
        $resultCount = mysql_query ("SELECT COUNT(1) FROM `book`");
    	$resultCount = mysql_fetch_array ($resultCount);

    	$lastPage = ceil ($resultCount[0]/$pageCount);

    	$json["lastPage"] = $lastPage;

    }


	
}

else if($mod =="removeBook"){
    
    $id = $_POST["id"];
        
    mysql_query("DELETE FROM `book` WHERE `book__id` = $id"); 
	
	mysql_query("DELETE FROM `library` WHERE `bookId` = $id"); 
    
    $resultCount = mysql_query ("SELECT COUNT(1) FROM `book`");
	$resultCount = mysql_fetch_array ($resultCount);
	
	$lastPage = ceil ($resultCount[0]/$pageCount);
	
	$json["lastPage"] = $lastPage;
}

else if($mod =="updateBook"){
    
    $id = $_POST["id"];
    
 	$result = mysql_query ("SELECT * FROM `book` WHERE `book__id`= $id");
	
	$data = mysql_fetch_array ($result);

	$authors = array();
	
	$result = mysql_query("SELECT * FROM `library` WHERE `bookId` = ".$id);
	
	while($author = mysql_fetch_assoc($result)){
		
		$authors[] = $author["writerId"];
		
	}
	
	$json["id"] = $data["book__id"];
	$json["author"] = $authors;
	$json["title"] = $data["book__title"];
	
}

else if ($mod == "addAuthor")
{
	
	$json["name"] = $_POST["author"];
	
	mysql_query("INSERT INTO `writer` (`writer__name`) VALUES ('" . $json["name"] . "')");
	
	$json["id"] = mysql_insert_id();
	
}

header('Content-Type: application/json');
echo(json_encode($json));


