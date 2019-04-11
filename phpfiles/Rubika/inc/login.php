<?php
include 'bdd.php';

if (isset($_POST["username"])){
    $sql = "SELECT * FROM rubika_users WHERE login = :login";
    $req = $db ->prepare($sql);
    $req -> execute(array(':login' => $_POST['username']));
    $data = $req->fetch();

    if($_POST["username"] == $data["login"]){
        $newDataPlayer = array(
            'id' => $data['id'],
            'name' => $data['name'],
            'firstname' => $data['firstname'],
            'login' => $data['login'],
            'level' => $data['level'],
            'inventory' => $data['inventory']
         );

        $ue4_answer = array(
            'isConnected' => true,
            'newDataPlayer' => $newDataPlayer
        );
    }
    else
    {
        $ue4_answer = array('isConnected' => false);
    }

    echo json_encode($ue4_answer, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

