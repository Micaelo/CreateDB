<?php include "connectToDB.php";
function insertData() {
    global $con;
    $result = mysqli_query(
        $con,
        "INSERT INTO users(user_name, email) VALUES('$_POST[username]', '$_POST[email]')"
    );
    if(!result){
        echo "<br>MySQL failed: ". mysqli_error() ."<br>";
    }
}

function printData()
{
    global $con;
    $result = mysqli_query(
        $con,
        "SELECT * FROM users"
    );
    if ($result) {
        while($row = mysqli_fetch_assoc($result)){
            echo "$row[user_name]<br>";
        }

    }else{
        echo "failed: " . mysqli_error();
    }
}

function loadSingleRecord($email){
    global $con;
    $result = mysqli_query(
        $con,
        "SELECT * FROM users WHERE email = '$email'"
    );
    if(!result){

    }
    return mysqli_fetch_assoc($result);
}

function updateRecord($username, $email){
    global $con;
    echo "fun: ".$username ." ". $email;
    $result = mysqli_query(
        $con,
        "UPDATE users 
                SET user_name = '$username' 
                WHERE email = '$email'"
    );
    if(!result){
        echo "UPDATING failed: " . mysqli_error();
    }
    return $result;
}

function deleteRecord($email){
    global $con;
    $result = mysqli_query(
        $con,
        "DELETE FROM users 
                WHERE email = '$email'"
    );
    if(!result){
        echo mysqli_error();
    }
    return $result;
}
