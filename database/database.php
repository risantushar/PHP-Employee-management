<?php


class database{
    private $host;
    private $dbusername;
    private $dbpassword;
    private $dbname;

    protected function connect(){
        $this->host= 'localhost';
        $this->dbusername= 'risantushar';
        $this->dbpassword= 'risantushar#*';
        $this->dbname= 'db_employee_management';

        $con=new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);

        return $con;
    }
}


class query extends database{
    public function getData($table,$field='*',$condition_arr='',$order_by_field='',$order_by_type='desc',$limit=''){
		$sql="select $field from $table ";
		if($condition_arr!=''){
			$sql.=' where ';
			$c=count($condition_arr);	
			$i=1;
			foreach($condition_arr as $key=>$val){
				if($i==$c){
					$sql.="$key='$val'";
				}else{
					$sql.="$key='$val' and ";
				}
				$i++;
			}
		}
		if($order_by_field!=''){
			$sql.=" order by $order_by_field $order_by_type ";
		}
		
		if($limit!=''){
			$sql.=" limit $limit ";
		}
		//die($sql);
		$result=$this->connect()->query($sql);
		if($result->num_rows>0){
			$arr=array();
			while($row=$result->fetch_assoc()){
				$arr[]=$row;
			}
			return $arr;
		}else{
			return 0;
		}
	}


    public function insertData($table,$condition_arr){
       
		if($condition_arr!=NULL){
			foreach($condition_arr as $key=>$val)
            {
				$fieldArr[]=$key;
				$valueArr[]=$val;
			}
			$field=implode(",",$fieldArr);
			$value=implode("','",$valueArr);
			$value="'".$value."'";		
            
			$sql="INSERT into $table($field) values($value) ";

			$result=$this->connect()->query($sql);
		}
	}


    public function deleteData($table,$condition_arr)
    {
        if($condition_arr!='')
        {
            $sql ="DELETE FROM $table WHERE ";

            $c=count($condition_arr);
            $i=1;

            foreach($condition_arr as $key=>$val)
            {
                if($i==$c)
                {
                    $sql.="$key='$val'";
                }
                else
                {
                    $sql.="$key='$val' and ";
                }
                $i++;
            }
            // die($sql);
            $result=$this->connect()->query($sql);
        }
    }

    public function searchData($table,$field,$like='')
    {
        if($like!='')
        {
            $sql="select $field from $table where name like '%$like%' or email like '%$like%' ";

                // die($sql);
            }
            // die($sql);
            $result=$this->connect()->query($sql);

            if(mysqli_num_rows($result>0))
            {
                echo "Yes";
            }
            else{
                echo "No";
            }
        }


    public function updateData($table,$condition_arr,$where_field,$where_value)
    {
        if($condition_arr!='')
        {
            $sql ="UPDATE $table set ";

            $c=count($condition_arr);
            $i=1;

            foreach($condition_arr as $key=>$val)
            {
                if($i==$c)
                {
                    $sql.="$key='$val'";
                }
                else
                {
                    $sql.="$key='$val',";
                }
                $i++;
            }

            $sql.=" WHERE $where_field='$where_value' ";
            // echo $sql;
            // die();
            $result=$this->connect()->query($sql);
        }
    }

    public function get_safe_str($str){
        if($str!='')
        {
            return mysqli_real_escape_string($this->connect(),$str);
        }
    }


}

?>