<?php
function GetCategories()
{
        $conn = getConnection();
        $result = $conn->query('SELECT * FROM Categories P');
        return $result;
}
function GetUsers()
{
        $conn = getConnection();
        $result = $conn->query('SELECT * FROM People P');
        return $result;
}
function GetConnectionMethods($person_id = Null)
{
        $conn = getConnection();
        $sql =  'SELECT CM.*, C.Name as Category_Name, CONCAT(P.FirstName, " ", P.LastName) as Person_Name '
                .       'FROM ConnectionMethods CM '
                .       '       JOIN People P ON CM.person_id = P.id '
                .       '       JOIN Categories C ON CM.Category_id = C.id ';
        if($person_id != Null)
                $sql .= " WHERE person_id=$person_id ";
        $result = $conn->query($sql);
        return $result;
}
function NewConnectionMethod()
{
        return Null;
}
function GetConnectionMethod($id)
{
        $conn = getConnection();
        $result = $conn->query("SELECT * FROM ConnectionMethods WHERE id=$id");
        $rs = $result->fetch_assoc();
        $conn->close();
        return $rs;
}
function SaveConnectionMethod($rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
        $result = $conn->query("UPDATE ConnectionMethods SET Value='$rs[Value]', category_id=$rs[category_id], person_id=$rs[person_id]  WHERE id=$rs[id]");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function CreateConnectionMethod($rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
        $result = $conn->query(
                "INSERT INTO ConnectionMethods (person_id, category_id, Value) "
        .       "VALUES ($rs[person_id], $rs[category_id], '$rs[Value]')");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function ValidateConnectionMethod($rs)
{
        $errors = Null;
        return $errors;
}
