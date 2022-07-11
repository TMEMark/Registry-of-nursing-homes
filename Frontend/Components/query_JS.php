<?php

if(!isset($_GET['searchTerm'])){ 
    $json = [];
}else{
    
    $search = $_GET['searchTerm'];
    
    $sql = "SELECT naziv_pruzatelja FROM pruzatelji"; 
    
    $result = $mysqli->query($sql);
    
    $json = [];
    while($row = $result->fetch_assoc()){
        $json[] = ['text'=>$row['naziv_pruzatelja']];
    }
}
echo json_encode($json);


/*$queryPruzatelji = $db->query("SELECT naziv_pruzatelja FROM pruzatelji");
$results = $queryPruzatelji->fetchAll();*/
?>