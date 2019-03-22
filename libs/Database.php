<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */


class Database extends PDO
{
	
	public function __construct()
	{
		parent::__construct(DB_TYPE.':host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PWD);
		
		parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	/**
	 * selectAll
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function selectAll($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) {
			$sth->bindValue("$key", $value);
		}
		
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}

	/**
	 * selectOne
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function selectOne($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) {
			$sth->bindValue("$key", $value);
		}
		
		$sth->execute();
		return $sth->fetch($fetchMode);
	}

    /**
     * select
     * @param $table
     * @param $what
     * @param string $where Optional
     * @param string $array
     */
	public function select($table,$what,$where='',$array='',$fetch=0){
        if(is_array($what)){
            ksort($what);
            $was = implode("`, `",$what);
            $was = "`".$was."`";
        }
	    else{
	        $was = $what;
        }
	    $query = "SELECT ".$was." FROM `".DB_PREFIX.$table."` ".$where;
	    #echo $query;
	    $sth = $this->query($query);

	    if($where!='' AND $array!=''){
	        foreach($array as $key=>$value){
	            $sth->bindValue(":$key",$value);
            }
        }
        $sth->execute();
	    $erg = $sth->rowCount();

	    if($fetch==0){
            return $sth->fetchAll();
        }elseif($fetch==1){
	        return $sth->fetch();
        }else{
	        return 0;
        }
    }

	/**
	 * insert
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 */
	public function insert($table, $data)
	{
		#ksort($data);
		
		$fieldNames = implode('`, `', array_keys($data));
		#$fieldValues = ':' . implode(', :', array_keys($data));
		$fieldValues = implode("', '", array_values($data));
		$query = "INSERT INTO ".DB_PREFIX."$table (`$fieldNames`) VALUES ('$fieldValues')";
		#echo $query;
		$sth = $this->prepare($query);

//		foreach ($data as $key => $value) {
//			$sth->bindValue(":$key", $value);
//		}
		try {
            $sth->execute();
            return 1;
        }catch(Exception $e){
		    echo $e->getMessage();
		    return 0;
        }

	}
	
	/**
	 * update
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 * @param string $where the WHERE query part
	 */
	public function update($table, $data, $where)
	{
		ksort($data);
		
		$fieldDetails = NULL;
		foreach($data as $key => $value) {
			$fieldDetails .= "`$key`= '$value',";
		}
		$fieldDetails = rtrim($fieldDetails, ',');
		$query = "UPDATE ".DB_PREFIX."$table SET $fieldDetails $where";
		#echo $query;
		$sth = $this->prepare($query);
		
//		foreach ($data as $key => $value) {
//			$sth->bindValue(":$key", $value);
//		}
		
		$sth->execute();
//        $result = $sth->fetch(PDO::FETCH_ASSOC);
//        return $result['id'];
        return $sth->errorInfo();
	}
	
	/**
	 * delete
	 * 
	 * @param string $table
	 * @param string $where
	 * @param integer $limit
	 * @return integer Affected Rows
	 */
	public function delete($table, $where='', $limit = '')
	{
		return $this->exec("DELETE FROM ".DB_PREFIX."$table $where $limit");
	}
}