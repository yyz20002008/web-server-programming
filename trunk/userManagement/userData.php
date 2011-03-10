<?php
function GetUsers()
{
        $conn = getConnection();
        $result = $conn->query('SELECT * FROM People P');
        return $result;
}
function GetUser($id)
{
        $conn = getConnection();
        $result = $conn->query("SELECT * FROM People P WHERE id=$id");
        $rs = $result->fetch_assoc();
        $conn->close();
        return $rs;
}
function SaveUser($rs)
{
        $conn = getConnection();
        $result = $conn->query("UPDATE People P SET FirstName='$rs[FirstName]', LastName='$rs[LastName]', Password='$rs[Password]' WHERE id=$rs[id]");
        $error = $conn->error;
        $conn->close();
       
        return $error ? array('Server Error' => $error) : Null;
}
function DeleteUser($id)
{
        $conn = getConnection();
        $result = $conn->query("DELETE FROM People WHERE id=$id");
        $error = $conn->error;
        $conn->close();
       
        return $error ? array('Server Error' => $error) : Null;
}

function ValidateUser($rs)
{
        $errors = Null;
        if(empty($rs['FirstName'])) $errors['FirstName'] = 'First Name is required';
        if(empty($rs['LastName'])) $errors['LastName'] = 'Last Name is required';
        if(strlen( $rs['Password']) < 6) $errors['Password'] = 'The Password must be at least 6 characters long';
        return $errors;
}


