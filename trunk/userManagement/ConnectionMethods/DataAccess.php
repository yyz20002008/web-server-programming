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
        $sql =  'SELECT CM.*, C.Name as Category_Name, CONCAT(P.FirstName, " ", P.LastName) as Person_Name '
                .       'FROM ConnectionMethods CM '
                .       '       JOIN People P ON CM.person_id = P.id '
                .       '       JOIN Categories C ON CM.Category_id = C.id '
                .       "WHERE CM.id=$id";
        //echo $sql;
        $result = $conn->query($sql);
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
function CreateConnectionMethod(&$rs)
{
        $conn = getConnection();
        $rs = EscapeRS($conn, $rs);
        $result = $conn->query(
                "INSERT INTO ConnectionMethods (person_id, category_id, Value) "
        .       "VALUES ($rs[person_id], $rs[category_id], '$rs[Value]')");
        $error = $conn->error;
        if(!$error)$rs['id'] = $conn->insert_id;
        $conn->close();
        return $error ? array('Server Error' => $error) : Null;
}
function DeleteConnectionMethod($id)
{
        $conn = getConnection();
        $sql =  "SELECT Count(*) as Count, Max(C.Name) as `Type` "
                .       "FROM ConnectionMethods CM Join ConnectionMethods CM1 "
                .       "       ON CM.person_id = CM1.person_id AND CM.category_id=CM1.category_id "
                .       " Join Categories C ON CM.category_id=C.id "
                .       "WHERE CM1.id=$id";
        //echo $sql;
        $result = $conn->query($sql);
        $rs = $result->fetch_assoc();
        if($rs['Count'] == 1) return array('Error' =>"Can not delete: deleting this record would leave contact without any $rs[Type]s");
        $result = $conn->query("DELETE FROM ConnectionMethods WHERE id=$id");
        $error = $conn->error;
        $conn->close();
        
        return $error ? array('Server Error' => $error) : Null;
}
function ValidateConnectionMethod($rs)
{
        $errors = Null;
        return $errors;
}
