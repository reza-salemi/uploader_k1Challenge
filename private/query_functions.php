<?php

function insert_img($name,$url,$date)
{
    global $db;
    $sql = "INSERT INTO files ";
    $sql .= "(name,url,date)";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db,$name) . "',";
    $sql .= "'" . db_escape($db,$url) . "',";
    $sql .= "'" . db_escape($db,$date) . "')";
    mysqli_query($db,$sql);
}

function show_img()
{
    global $db;
    $sql = "SELECT * FROM files";
    $result = mysqli_query($db,$sql);
    return $result;

}
function show_img_by_id($id)
{
    global $db;
    $sql = "SELECT * FROM files ";
    $sql .= "WHERE id='" . db_escape($db,$id) . "'";
    $result = mysqli_query($db,$sql);
    $image = mysqli_fetch_assoc($result);
    return $image;

}

function delete_img($id)
{
    global $db;
    $sql = "DELETE FROM files ";
    $sql .= "WHERE id='" . db_escape($db,$id) . "'";
    mysqli_query($db,$sql);
}
?>