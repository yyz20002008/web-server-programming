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
        $rs = EscapeRS($conn, $rs);
        $result = $conn->query("UPDATE People P SET FirstName='$rs[FirstName]', LastName='$rs[LastName]', Password='$rs[Password]' WHERE id=$rs[id]");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function CreateUser($rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
        $sql =  "INSERT INTO People "
                .       "(FirstName, LastName, Password, created_at )"
                .       "VALUES ('$rs[FirstName]','$rs[LastName]', '$rs[Password]', Now() )";
        $result = $conn->query($sql);
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function NewUser()
{
        return array('FirstName'=>'', 'LastName'=>'', 'Password'=>'', 'id'=> '', 'created_at'=>Null, 'updated_at'=>Null);
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
function EscapeRS($conn, $rs)
{
        $cleanRs = array();
        foreach($rs as $key => $value)
        {
                $cleanRs[$key] = $conn->real_escape_string($value);
        }
        return $cleanRs;
}
?>




