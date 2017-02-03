<?php
include ("core.php");

$mod = $_GET["mod"];
$json = array();

$pageCount = 5;

if($mod == "add"){
	
    $json["title"] = $_POST["title"];
    $json["author"] = implode("_",$_POST["author"]);
    $json["id"] = $_POST["id"];

    if ($json["id"])
    
        mysql_query("UPDATE `library` SET `title` = '" . $json['title']  . "',`author` = '" . $json['author'] . "' WHERE `id` = " . $json["id"]);
        
    else{
        
        mysql_query("INSERT INTO `library`(`author`,`title`) VALUES ('" .  $json["author"]  . "','" . $json['title'] . "')");
            
        $json["id"] = mysql_insert_id();
           
        $resultCount = mysql_query ("SELECT COUNT(1) FROM `library`");
    	$resultCount = mysql_fetch_array ($resultCount);

    	$lastPage = ceil ($resultCount[0]/$pageCount);

    	$json["lastPage"] = $lastPage;

    }


	
}

else if($mod == "setFlag"){
    
    $id = $_POST["id"];
    
    $result = mysql_query("SELECT `flag` FROM `library` WHERE `id` = $id");
    $data = mysql_fetch_array( $result );
    
    mysql_query("UPDATE `library` SET `flag`=" . ( $data["flag"] ? "0" : "1" ) . " WHERE `id` = $id");
    
    $json["flag"] = $data["flag"] ? 0 : 1;
}

else if($mod =="removeBook"){
    
    $id = $_POST["id"];
     
    $select = mysql_query("SELECT `id` FROM `library` WHERE `id` = $id");
    
    mysql_query("DELETE FROM `library` WHERE `id` = $id");  
    
    $resultCount = mysql_query ("SELECT COUNT(1) FROM `library`");
	$resultCount = mysql_fetch_array ($resultCount);
	
	$lastPage = ceil ($resultCount[0]/$pageCount);
	
	$json["lastPage"] = $lastPage;
}

else if($mod =="updateBook"){
    
    $id = $_POST["id"];
    
 	$result = mysql_query ("SELECT * FROM `library` WHERE `id`= $id");
	
	$data = mysql_fetch_array ($result);
	
	$authors = explode("_",$data["author"]);
	
	
	
	$json["id"] = $data["id"];
	$json["author"] = $authors;
	$json["title"] = $data["title"];
	
}

else if ($mod == "addAuthor")
{
	
	$json["name"] = $_POST["author"];
	
	mysql_query("INSERT INTO `writer` (`name`) VALUES ('" . $json["name"] . "')");
	
	$json["id"] = mysql_insert_id();
	
}

header('Content-Type: application/json');
echo(json_encode($json));


