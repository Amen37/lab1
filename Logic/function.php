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
function checkEmailExists($pod,$email){
    $sql="SELECT user_id FROM user WHERE email=?";
    $stmt=$pod->prepare($sql);
    $stmt->execute([$email]);
    $rows=$stmt->fetch();
    if($rows!=null){
        return true;
    }else {
        return false;
    }
}
?>