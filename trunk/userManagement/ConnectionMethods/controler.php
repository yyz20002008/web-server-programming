<?php
        require_once('../../inc/global.php');
        require_once('DataAccess.php');

switch($_REQUEST['action'])
{
        case 'new':
                        $rs = NewConnectionMethod();
                        include 'edit.php';
                break;
        case 'edit':
                $rs = GetConnectionMethod($_REQUEST['id']);
                include 'edit.php';
                break;
        case 'save':
                $rs = $_REQUEST;
                $errors = ValidateConnectionMethod($rs);
                if(!$errors)
                        if(isset($rs['id']))
                                $errors = SaveConnectionMethod($rs);
                        else
                                $errors = CreateConnectionMethod($rs);
                if(!$errors)
                {
                        include 'row.php';
                        die();
                }
                include 'edit.php';
                break;          
        case 'prompt_delete':
                break;
        case 'delete':
                break;
}