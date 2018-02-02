<?php

/*
 * Note:  This is a core file,no chanage is recommented
 */

class dboperation {

    var $con, $res;

    function getconnection() {
        $this->con = mysqli_connect(DOMAIN, USERNAME, PASSWORD);
        mysqli_select_db($this->con, DATABASE);
    }

    function execute($query) {
        $this->getconnection();
        $this->res = mysqli_query($this->con, $query);
        return $this->res;
    }

}
