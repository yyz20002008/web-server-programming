<?php
function GetUsers()
{
        $conn = getConnection();
        $result = $conn->query('SELECT * FROM Address A');
        return $result;
}
function GetUser($id)
{
        $conn = getConnection();
        $result = $conn->query("SELECT * FROM Address A WHERE id=$id");
        $rs = $result->fetch_assoc();
        $conn->close();
        return $rs;
}
function SaveUser($rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
      
        $result = $conn->query("UPDATE Address A SET Address='$rs[Address]', City='$rs[City]', State='$rs[State]', Zip='$rs[Zip]', Country='$rs[Country]' WHERE id='$rs[id]'");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function CreateUser($rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
        $sql =  "INSERT INTO Address "
                .       "(Address, City, State, Zip, Country,created_at )"
                .       "VALUES ('$rs[Address]','$rs[City]', '$rs[State]','$rs[Zip]','$rs[Country]', Now() )";
        $result = $conn->query($sql);
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function NewUser()
{
        return array('Address'=>'', 'City'=>'', 'State'=>'', 'Zip'=>'','Country'=>'', 'created_at'=>Null, 'updated_at'=>Null);
}
function DeleteUser($id)
{
        $conn = getConnection();
        $result = $conn->query("DELETE FROM Address WHERE id=$id");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}

function ValidateUser($rs)
{
        $errors = Null;
        if(empty($rs['Address'])) $errors['Address'] = 'Address is required';
        if(empty($rs['City'])) $errors['City'] = 'City is required';
        if(empty( $rs['State'])) $errors['State'] = 'The State is required';
        if(empty( $rs['Zip'])) $errors['Zip'] = 'The Zip is required';
        if(empty( $rs['Country'])) $errors['Country'] = 'The Country is required';
        
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
