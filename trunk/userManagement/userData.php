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
       
        return $error;
}
function DeleteUser($id)
{
        $conn = getConnection();
        $result = $conn->query("DELETE FROM People WHERE id=$id");
        $error = $conn->error;
        $conn->close();
       
        return $error;
}

function ValidateUser($rs)
{
        return Null;
}

