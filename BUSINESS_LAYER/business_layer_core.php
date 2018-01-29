<?php

/*
 * Note:  This is a core file,no chanage is recommented
 */
require_once("../DATA_LAYER/database_connection.php");

class query_core extends dboperation {

    function insert($table, $field, $value) {
        $fields = implode(",", $field);
        $values = implode("','", $value);
        $qry = "INSERT INTO $table ($field) VALUES ('$values')";
        $res = $this->execute($qry);
        return mysqli_insert_id($this->con);
    }

    function update($table, $update_field, $where) {
        $query_set = array();
        $query_where = array();
        foreach ($update_field as $key => $value) {
            $query_set[] = " $key = '$value'";
        }
        foreach ($where as $key => $value) {
            $query_where[] = " $key = '$value'";
        }

        $query_set = implode(",", $query_set);
        $query_where = implode(" AND ", $query_where);

        $qry = "UPDATE $table SET $query_set  WHERE $query_where";
        return $this->execute($qry);
    }

    function delete($table, $field, $value) {
        $qry = "DELETE FROM $table WHERE $field = '$value'";
        return $this->execute($qry);
    }

    function select($table, $getfield, $where=array(), $operand="",$join=array()) {
        // Arranging where condition
        $query_where="";
        if(!empty($where)){
        foreach ($where as $key=>$value){
            $query_where[] =" $key = '$value'";
        }
        $query_where = " WHERE ".(implode($operand,$query_where));
        }
        ///////////////////////////////////////////
        // Arranging join
        $query_join="";
        if(!empty($join)){
        foreach ($join as $key=>$value){
            $query_join .= " INNER JOIN $key ON $value ";
        }
        }
        ///////////////////////////////////////////
        
        $qry = "select $field from $table $query_join $query_where";

        $res = $this->execute($qry);
        return $res;
    }

}
