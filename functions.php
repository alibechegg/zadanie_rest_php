<?php 
    function isLoggedIn(){
        if(isset($_SESSION['username'])){
            return true;
        }
        return false;
    }

    function redirect($location){
        header("Location:" . $location);
        exit;
    }

    function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
        if(isLoggedIn()){
            redirect($redirectLocation);
        }
    }

    function ifItIsMethod($method=null){
        if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
            return true;
        }
        return false;
    }

    function login_user($username, $password) {

        global $connection;

        $username = trim($username);
        $password = trim($password);

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);


        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_query = mysqli_query($connection, $query);

        if (!$select_user_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_array($select_user_query)) {

            $db_user_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];


            if (password_verify($password, $db_user_password)) {
                $_SESSION['username'] = $db_username;
                redirect("index.php");
            } else {
                return false;
            }
        }
        return true;
    }

    function register_user($username, $email, $password){

        global $connection;
    
        $username = mysqli_real_escape_string($connection, $username);
        $email    = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            
            
        $query = "INSERT INTO users (username, user_password) ";
        $query .= "VALUES('{$username}', '{$password}')";
        $register_user_query = mysqli_query($connection, $query);

        if (!$register_user_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
            
    }
    
    function recordCount($table) {
        global $connection;
        $query = "SELECT * FROM " . $table;
        $select_things = mysqli_query($connection, $query);
        $result = mysqli_num_rows($select_things);
        confirmQuery($select_things);
        return $result;
    }

    function escape($string) {
        global $connection;
        
        return mysqli_real_escape_string($connection, trim($string));   
    }

    function confirmQuery($result) {
    
        global $connection;
    
        if(!$result ) {
            die("QUERY FAILED ." . mysqli_error($connection));  
        } 
    }
?>