<?php
function GetUsers()
{
        $conn = getConnection();
        $result = $conn->query('SELECT * FROM Categories C');
        return $result;
}
function GetUser($id)
{
        $conn = getConnection();
        $result = $conn->query("SELECT * FROM Categories C WHERE id=$id");
        $rs = $result->fetch_assoc();
        $conn->close();
        return $rs;
}
function SaveUser($rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
      
        $result = $conn->query("UPDATE Categories C SET Name='$rs[Name]' WHERE id='$rs[id]'");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function CreateUser($rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
        $sql =  "INSERT INTO Categories "
                .       "(Name,created_at )"
                .       "VALUES ('$rs[Name]', Now() )";
        $result = $conn->query($sql);
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function NewUser()
{
        return array('Name'=>' ', 'id'=>null,'created_at'=>Null, 'updated_at'=>Null);
}
function DeleteUser($id)
{
        $conn = getConnection();
        $result = $conn->query("DELETE FROM Categories WHERE id=$id");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}

function ValidateUser($rs)
{
        $errors = Null;
        if(empty($rs['Name'])) $errors['Name'] = 'Name is required';
        
        
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
