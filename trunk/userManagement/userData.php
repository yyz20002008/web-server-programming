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
?>