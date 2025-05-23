<?php 
    include "../includes/alert.php";

    // Declare Variables
    $form = 'null';
    $email = "";
    $errors = array();
    $success = array();
    
    if (isset($_POST['login'])) {
        $email = esc($_POST['email']);
        $password = esc($_POST['pwd']);
        
        if (empty($email)) {
            array_push($errors, "Email required!");
            $form = 'login';
        }
        if (empty($password)) {
            array_push($errors, "Password required!");
            $form = 'login';
        }

        if (empty($errors)) {
            // $password = md5($password); // encrypt password
            $sql = "SELECT * FROM Staff WHERE email='$email' and PWD='$password' LIMIT 1";
            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
                // Get id of created user
                $reg_user_id = $result -> fetch_assoc()['ID']; 

                // Put logged in user into session array
                $_SESSION['user'] = getUserById($reg_user_id);     
                $_SESSION['message'] = alert('success', "You are now logged in");
                array_push($success, "You are now logged in");

                // Redirect to public area
                header('location: clients');    
            } else {
                $_SESSION['message'] = alert('error', "You are now logged in");
                array_push($errors, 'Wrong credentials!');
                $form = 'login';
            }                      

            $conn -> close();
        }
    }

    function esc(String $value) {       
        // Bring the global db connect object into function
        global $conn;

        $val = trim($value); // remove empty space sorrounding string
        // $val = mysqli_real_escape_string($conn, $value);

        return $val;
    }

    // Get user info from user id
    function getUserById($id) {
        global $conn;
        $sql = "SELECT * FROM Staff WHERE ID=$id LIMIT 1";

        $result = $conn -> query($sql);
        $user = $result -> fetch_assoc(); 

        // returns user in an array format: 
        // ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
        return $user; 
    }
?>