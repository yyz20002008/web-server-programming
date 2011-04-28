<?php
        include_once('../inc/global.php');
        session_start();
        
function IsLoggedIn()
{
        return isset($_SESSION['UserID']);
}

function GetUserName()
{
        return $_SESSION['UserName'];
}

function GetUserID()
{
        return $_SESSION['UserID'];
}

function DoLogin($email, $password)
{
        $sql =  "SELECT P.id, P.FirstName, P.LastName, P.Password "
                .       "From People P Join ConnectionMethods CM ON P.id=CM.person_id "
                .       "WHERE CM.Value = '$email'";
                //echo $sql;
        $conn = getConnection();
        $result = $conn->query($sql);
        $rs = $result->fetch_assoc();
        $conn->close();
        if($rs)
        {
                if($rs['Password'] == $password)
                {
                        $_SESSION['UserID'] = $rs['id'];
                        $_SESSION['UserName'] = $rs['FirstName'] . " " . $rs['LastName'];
                        $_SESSION['UserEmail'] = $email;
                        return true;
                }
        }
        return false;   
}

function DoLogout()
{
        session_destroy();
}

function RequireLogin()
{
        if(!IsLoggedIn())
        {
                header('location: login.php');
                die();
        }
}
