<?php
    function addpost($data)
    {
        db_insert("post", $data);
    }

    function getListPost($where='', $limit="LIMIT 0,10")
    {
        $result = db_fetch_array("SELECT * from post INNER JOIN post_cat ON post.post_cat = post_cat.cat_id $limit $where");
        return $result;
    }
    function getListCat()
    {
        return db_fetch_array("SELECT * FROM post_cat ");
    }
    function addPostCat($data)
    {
        db_insert("post_cat",$data);
    }

    function getCatById($id)
    {
        return db_fetch_row("SELECT * FROM post_cat WHERE cat_id='$id'");
    }
    function updateCat($data, $catID)
    {
        db_update("post_cat",$data, "cat_id = '{$catID}'");
    }
    function getPostById($postId)
    {
        return db_fetch_row("SELECT * FROM post WHERE post_id = '{$postId}'");
    }
    function deletePost($id)
    {
        db_delete("post", "post_id ='{$id}'");
    }
    function deleteCat($id)
    {
        db_delete("post_cat", "cat_id ='{$id}'");
    }
    function catStatus($id, $status)
    {
        db_update("post_cat",array("status" => $status ), "cat_id ='{$id}'");
    }
    function postStatus($id, $pstatus)
    {
        db_update("post", array("post_status" => $pstatus), "post_id = '{$id}'");
    }
    function updatePost($id, $array)
    {
        db_update("post", $array, "post_id ='{$id}'");
    }
    function getPostPag($start, $numPerPage, $where='1')
    {
        return db_fetch_array("SELECT * from post INNER JOIN post_cat ON post.post_cat = post_cat.cat_id WHERE $where LIMIT $start, $numPerPage");
    }
?>