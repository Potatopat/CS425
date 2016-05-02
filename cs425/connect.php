<?php

/*
 * 	
 * 	
 * 	
 */
 
class connect
{
	function __construct($host, $user, $pass, $db)
	{
		$con = oci_connect($host, $user, $pass);
		if (!$con)
		{
			die('Could not connect: ' . oci_error($con));
		}
			
		//mysqli_select_db($con, $db);
		
		$this->con = $con;
		
		printf($con);
	}
	
	function selectTable($table)
	{
		$sql="SELECT * FROM " . $table;
		$result = mysqli_query($this->con,$sql);
		
		$this->table = $table;
		$this->result = $result;
	}
	
	function getFullTable()
	{
		$fields = mysqli_fetch_fields($this->result);
		$arr = array(array());
		$i = 0;
		while($row = mysqli_fetch_object($this->result))
		{
			$arr[$i] = $row;
			$i++;
		}
		
		$this->fields = $fields;
		$this->arr = $arr;
	}
	
	function getSelectTable($id)
	{
		$id = mysqli_real_escape_string($this->con, $id);
		$sql="SELECT * FROM " . $this->table . " WHERE id='" . $id . "'";
		$result = mysqli_query($this->con,$sql);
		$row = mysqli_fetch_object($result);
		
		return $row;
	}
	
	function printFields()
	{
		echo "<table border='1'><tr>";
		$fields = mysqli_fetch_fields($this->result);
		for($a = 0; $a < mysqli_num_fields($this->result); $a++)
		{
			echo "<th>" . $fields[$a]->name . "</th>";
		}
		echo "</tr>";
		
		$this->fields = $fields;
		return $fields;
	}
	
	function printFullTable()
	{
		$fields = self::printFields();
		$arr = array(array());
		$i = 0;
		while($row = mysqli_fetch_object($this->result))
		{
			$arr[$i] = $row;
			echo "<tr>";
			for($a = 0; $a < count($fields); $a++)
			{
				$temp = $fields[$a]->name;
				echo "<td>" . $row->$temp . "</td>";
			}
			echo "</tr>";
			$i++;
		}
		echo "</table>";
		
		$this->arr = $arr;
	}
	
	function printSelectTable($id, $table)
	{
		$id = mysqli_real_escape_string($this->con, $id);
		$sql="SELECT * FROM " . $table . " WHERE id='" . $id . "'";
		$result = mysqli_query($this->con,$sql);
		$row = mysqli_fetch_object($result);
		
		if ($row != null)
		{
			$fields = self::printFields();
			echo "<tr>";
			for($a = 0; $a < count($fields); $a++)
			{
				$temp = $fields[$a]->name;
				echo "<td>" . $row->$temp . "</td>";
			}
			echo "</tr>";
			echo "</table>";
		}
		else echo "Data does not exist";
	}
	
	function changeStatus($id, $status)
	{
		$id = mysqli_real_escape_string($this->con, $id);
		mysqli_query($this->con, /*mysqli_escape_string($this->con,*/ "UPDATE " . $this->table . " SET status='" . $status . "' WHERE id='" . $id . "'")/*)*/;
		if (substr(mysqli_info($this->con), 14, 1) == "0")
		{
			echo "Data does not exist";
		}
	}
	
	function json()
	{
		self::selectTable($this->table);
		self::getFullTable();
		
		$r = new stdClass;
		$r->success = true;
		$r->orders = $this->arr;
		
		echo json_encode($r);
	}
	
	function jsonSelect($id)
	{
		self::selectTable($this->table);
		$temp = self::getSelectTable($id);
		
		$r = new stdClass;
		$r->success = true;
		$r->orders = $temp;
		
		echo json_encode($r);
	}
	
	function close()
	{
		mysqli_close($this->con);
	}
}

$dataBase = new connect('localhost', 'pbartman', 'cs425', 'cs425');
/*$dataBase->selectTable('orders');

if ($_GET["key"] == "123")
{
	if ($_GET["action"] == "list_orders")
	{
		$dataBase->json();
	}
	elseif ($_GET["action"] == "get_order_details")
	{
		$dataBase->jsonSelect((int)$_GET["id"]);
	}
	elseif ($_GET["action"] == "change_order_status")
	{
		if ($_GET["status"] == "paid" ||$_GET["status"] == "shipped")
		{
			$dataBase->changeStatus((int)$_GET["id"], $_GET["status"]);
			$dataBase->selectTable('orders');
			$dataBase->jsonSelect((int)$_GET["id"]);
		}
		else
		{
			echo "Not a valid option";
		}
	}
}
else echo "Incorrect Key";


$dataBase->close();*/

//a 32 character code that matches
//32 hardcoded matching characters
?>