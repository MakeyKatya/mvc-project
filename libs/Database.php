<?php

class Database extends PDO {

    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME , $DB_USER, $DB_PASS);
        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * select
     * @param string $sql An SQL string
     * @param array $data Parameters to bind
     * @param mixed $fetchMode PDO Fetch Mode
     * @return mixed
     */
    public function select($sql, $data = array(), $fetchMode = PDO::FETCH_ASSOC){

        $sth = $this->prepare($sql);
        foreach($data as $key=>$value){
            $sth->bindValue(":$key",$value);
        }
        $sth->execute();

        return $sth->fetchAll($fetchMode);
    }

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param array $data An associative array
     */
    public function insert($table, array $data){
        ksort($data);
        $fieldNames = implode('`, `',array_keys($data));
        $fieldValues = ':'.implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach($data as $key=>$value){
            $sth->bindValue(":$key",$value);
        }

        $sth->execute();
    }

    /**
     * update
     * @param string $table A name of table to insert into
     * @param array $data An associative array
     * @param string $where The where query part
     */
    public function update($table, array $data, $where){
        ksort($data);
        $fieldDetails = "";

        foreach($data as $key => $value){
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails,',');

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach($data as $key=>$value){
            $sth->bindValue(":$key",$value);
        }

        $sth->execute();
    }

    /**
     * delete
     * @param string $table A name of table to insert into
     * @param string $where The where query part
     * @param integer $limit The limit of results
     * @return integer Affected rows
     */
    public function delete($table, $where, $limit=1){
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }

}