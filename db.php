<?php
define("DB_DSN", "mysql:host=db;dbname=db_student");
define("DB_USERNAME", "raut");
define("DB_PASSWORD", "raut");
define('DB_CHARACSET', 'utf8');

class DB
{
    protected $pdo;
    public function __construct()
    {
        try {
            $this->pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '" . DB_CHARACSET . "';"));
            $this->pdo->exec("SET CHARACTER SET " . DB_CHARACSET);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->query("set names " . DB_CHARACSET);
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }
    public function getRows($table, $conditions = array())
    {
        $sql = 'SELECT ';
        $sql .= array_key_exists("select", $conditions) ? $conditions['select'] : '*';
        $sql .= ' FROM ' . $table;
        if (array_key_exists("where", $conditions)) {
            $sql .= ' WHERE ';
            $i = 0;
            foreach ($conditions['where'] as $key => $value) {
                $pre = ($i > 0) ? ' AND ' : '';
                $sql .= $pre . $key . "='" . $value . "'";
                $i++;
            }
        }
        if (array_key_exists("order_by", $conditions)) {
            $sql .= ' ORDER BY ' . $conditions['order_by'];
        }
        if (array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT ' . $conditions['start'] . ',' . $conditions['limit'];
        } elseif (!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT ' . $conditions['limit'];
        }
        // echo $sql;
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        $data = $query->fetchAll();
        $result = array();
        $result = array('count' => $count, 'data' => $data);
        return !empty($data) ? $result : false;
    }
    public function runSql($query)
    {
        $sel = $this->pdo->prepare($query);
        $sel->execute();
        $data = $sel->fetchAll();
        return $data;
    }
    public function update($table, $data, $conditions)
    {
        if (!empty($data) && is_array($data)) {
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            foreach ($data as $key => $val) {
                $pre = ($i > 0) ? ', ' : '';
                $colvalSet .= $pre . $key . "=" . $this->pdo->quote($val) . "";
                $i++;
            }
            if (!empty($conditions) && is_array($conditions)) {
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach ($conditions as $key => $value) {
                    $pre = ($i > 0) ? ' AND ' : '';
                    $whereSql .= $pre . $key . " = '" . $value . "'";
                    $i++;
                }
            }
            $sql = "UPDATE " . $table . " SET " . $colvalSet . $whereSql;
            // echo $sql;
            $query = $this->pdo->prepare($sql);
            $update = $query->execute();
            return $update ? $query->rowCount() : false;
        } else {
            return false;
        }
    }

    function insert($table, $data)
    {
        if (!empty($data) && is_array($data)) {
            $columnString = implode(',', array_keys($data));
            $valueString = ":" . implode(',:', array_keys($data));
            $sql = "INSERT INTO " . $table . " (" . $columnString . ") VALUES (" . $valueString . ")";
            //  echo $sql;
            //  die();
            // exit();
            $query = $this->pdo->prepare($sql);
            foreach ($data as $key => $val) {
                $query->bindValue(':' . $key, $val);
            }
            $insert = $query->execute();
            // $query->debugDumpParams();

            return $insert ? $this->pdo->lastInsertId() : false;
        } else {
            return false;
        }
    }
}
