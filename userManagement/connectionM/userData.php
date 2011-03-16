<?php
function GetUsers()
{
        $conn = getConnection();
        $result = $conn->query('SELECT * FROM ConnectionMethods CM');
        return $result;
}
function GetUser($id)
{
        $conn = getConnection();
        $result = $conn->query("SELECT * FROM ConnectionMethods CM WHERE id=$id");
        $rs = $result->fetch_assoc();
        $conn->close();
        return $rs;
}
function SaveUser($rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
      
        $result = $conn->query("UPDATE ConnectionMethods CM SET Value='$rs[Value]' WHERE id='$rs[id]'");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function CreateUser($rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
        $sql =  "INSERT INTO ConnectionMethods "
                .       "(person_id,category_id,Value,created_at )"
                .       "VALUES ('$rs[person_id]','$rs[category_id]','$rs[Value]', Now() )";
        $result = $conn->query($sql);
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function NewUser()
{
        return array('person_id'=>'','category_id'=>'','Value'=>' ','id'=>null,'created_at'=>Null, 'updated_at'=>Null);
}
function DeleteUser($id)
{
        $conn = getConnection();
        $result = $conn->query("DELETE FROM ConnectionMethods WHERE id=$id");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}

function ValidateUser($rs)
{
        $errors = Null;
        if(empty($rs['Value'])) $errors['Value'] = 'Value is required';
        if(empty($rs['person_id'])) $errors['person_id'] = 'person_id is required';
        if(empty($rs['category_id'])) $errors['category_id'] = 'category_id is required';
        
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
