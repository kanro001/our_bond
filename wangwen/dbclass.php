<?php
require_once '../bz/config.inc.php';
    class database
    {
        private $link;
        private $res;
        private $host = HOST;
        private $user = USER;
        private $pass = PASS;
        private $db= DB_NAME;
        
        public function setup($u, $p, $h, $db)
        {
            $this->user = $u;
            $this->pass = $p;
            $this->host = $h;
            $this->db = $db;
            
            if (isset($this->link))
            {
                $this->disconnect();
            }
            
            $this->connect();
        }
        
        public function pick_db($db)
        {
            $this->db = $db;
        }
        
        public function __destruct()
        {
            $this->disconnect();
        }
        
        public function disconnect()
        {
            if (isset($this->link)) mysql_close($this->link);
            unset($this->link);
        }
        
        public function connect()
        {
            if (!isset($this->link))
            {
                try{
                    if (!$this->link = mysql_connect($this->host, $this->user, $this->pass))
                        throw new Exception("Cannot Connect to ".$this->host);
                }
                catch (Exception $e)
                {
                    echo $e->getMessage();
                    exit;
                }
            }
            
            else
            {
                $this->disconnect();
                $this->connect();
            }
        }
        
        public function send_sql($sql)
        {
            if(!isset($this->link)) $this->connect();
            try{
                if (! $succ = mysql_select_db($this->db))
                    throw new Exception("Cannot select database ".$this->db);
                if (! $this->res = mysql_query($sql, $this->link))
                    throw new Exception("Cannot send query!");
            }catch(Exception $e)
            {
                echo $e->getMessage()."<br>";
                echo mysql_error();
                exit;
            }
            return $this->res;
        }
        
        public function printout()
        {
            if(isset($this->res) && (mysql_num_row($this->res)>0))
            {
                mysql_data_seek($this->res, 0);
                $num = mysql_num_field($this->res);
                echo "<table border=1>";
                echo "<tr>";
                for ($i=0;$i<$num;$i++)
                {
                    echo "<th>";
                    echo mysql_field_name($this-res,$i);
                    echo "</th>";
                }
                echo "</tr>";
                while ($row = mysql_fetch_row($this->res))
                {
                    echo "<tr>";
                    foreach ($row as $elecm)
                    {
                        echo "<td>$elem</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            
            else echo "There is nothing to print!<br/>";
        }
        
        public function next_row()
        {
            if (isset($this->res))
                return mysql_fetch_row($this->res);
            echo "You need to make a query first !!!";
            return false;
        }
        
        public function insert_id()
        {
            if (isset($this->link))
            {
                $id = mysql_insert_id($this->link);
                if ($id == 0)
                    echo "You did not insert an element that cause an auto-increment ID to be created!<br/>";
                return $id;
            }
            echo "You are not connected to the database!";
            return false;
        }
        
        public function new_db($name)
        {
            if (!isset($this->link)) $this->connect();
            $query = "CREATE DATABASE IF NOT EXITS ".$name;
            try{
                if (mysql_query($query, $this->link))
                    throw new Exception("Cannot create database ".$name);
                $this->db = $name;
            }catch (Exception $e)
            {
                echo $e->getMessage()."<br/>";
                echo mysql_error();
                exit;
            }
        }
    }
    
?>