<?php

function getPossibleNextId($pod){
    $sql="SELECT count(user_id) as lastUserId FROM user";
    $stmt=$pod->prepare($sql);
    $stmt->execute();
    $rows=$stmt->fetch();
    $lastId=intval($rows["lastUserId"]);
    $lastId++;
    return $lastId;
}

?>