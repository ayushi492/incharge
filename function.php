<?php
include('config.php');

class FetchData extends Database{
    private $con;
    private $where;
    private $orderby;
    private $tbl;
    private $join;

    function __construct() {
        $this->con = $this->connection();
    }

    public function set_where($search = array()){
        foreach($search as $key => $val){
            $this->where .= " AND ".mysqli_real_escape_string($this->con,$key)." = '".mysqli_real_escape_string($this->con,$val)."'";
        }
    }

    public function set_where_like($search = array()){
        foreach($search as $key => $val){
            $this->where .= " AND ".mysqli_real_escape_string($this->con,$key)." LIKE '%".mysqli_real_escape_string($this->con,$val)."%'";
        }
    }

    public function set_where_between_dates($search = array()){
        foreach($search as $dates){
            $clms = array_keys($dates);
            $firstClm = mysqli_real_escape_string($this->con,$dates['alias']).".".mysqli_real_escape_string($this->con,$clms[0]);
            $secClm = mysqli_real_escape_string($this->con,$dates['alias']).".".mysqli_real_escape_string($this->con,$clms[1]);
            $firstVal = mysqli_real_escape_string($this->con,$dates[$clms[0]]);
            $secVal = mysqli_real_escape_string($this->con,$dates[$clms[1]]);

            $this->where .= " AND ((STR_TO_DATE(".$firstClm.", '%Y-%m-%d') BETWEEN '".$firstVal."' AND '".$secVal."') OR (STR_TO_DATE(".$secClm.", '%Y-%m-%d') BETWEEN '".$firstVal."' AND '".$secVal."'))";
        }
    }

    public function set_join($tbl,$join,$on){
        $this->join .= " ".mysqli_real_escape_string($this->con,$join)." ".mysqli_real_escape_string($this->con,$tbl)." ON ".mysqli_real_escape_string($this->con,$on);
    }

    public function set_orderby($clm,$orderby){
        $this->orderby .= " ORDER BY ".mysqli_real_escape_string($this->con,$clm)." ".mysqli_real_escape_string($this->con,$orderby);
    }

    public function total_count($tbl,$idalias = ''){
        if($tbl != ''){
            $this->tbl = mysqli_real_escape_string($this->con,$tbl);
        }
        $id = 'id';
        if($idalias != ''){
            $id = $idalias;
        }
        return mysqli_num_rows(mysqli_query($this->con,"SELECT ".$id." FROM ".$this->tbl." ".$this->join." WHERE 1 ".$this->where));
    }

    public function fetch_data($tbl,$params = array(),$limit='',$start=''){
        if($tbl != ''){
            $this->tbl = mysqli_real_escape_string($this->con,$tbl);
        }
        $clms = '';
        foreach($params as $clm){
            $clms .= mysqli_real_escape_string($this->con,$clm).",";
        }
        $clms = preg_replace('/,$/','',$clms);

        $setlimit = '';
        if($limit != ''){
            $setlimit = " LIMIT ".mysqli_real_escape_string($this->con,$start).",".mysqli_real_escape_string($this->con,$limit);
        }
        $row = mysqli_query($this->con,"SELECT ".$clms." FROM ".$this->tbl." ".$this->join." WHERE 1 ". $this->where . $this->orderby . $setlimit);
        return $row;
    }

}

class AddDetails extends Database{
    private $con;
    function __construct() {
        $this->con = $this->connection();
    }

    public function add_details($tbl,$params){
        $clms = '';
        $values = '';
        foreach($params as $clm => $val){
            $clms .= mysqli_real_escape_string($this->con,$clm).",";
            $values .= "'".mysqli_real_escape_string($this->con,$val)."',";
        }
        $clms = preg_replace('/,$/','',$clms);
        $values = preg_replace('/,$/','',$values);
        if(!mysqli_query($this->con,"INSERT INTO ".$tbl." (".$clms.") VALUES (".$values.")")){
            return false;
        }
        else{
            return true;
        }
    }
}

class EditDetails extends Database{
    private $con;
    function __construct() {
        $this->con = $this->connection();
    }

    public function edit_details($tbl,$params,$id){
        $clmsValues = '';
        foreach($params as $clm => $val){
            $clmsValues .= mysqli_real_escape_string($this->con,$clm)." = '".mysqli_real_escape_string($this->con,$val)."',";
        }
        $clmsValues = preg_replace('/,$/','',$clmsValues);

        $id = mysqli_real_escape_string($this->con,$id);

        if(!mysqli_query($this->con,"UPDATE ".$tbl." SET ".$clmsValues." WHERE id = ".$id)){
            return false;
        }
        else{
            return true;
        }
    }
}

class DeleteDetails extends Database{
    private $con;
    function __construct() {
        $this->con = $this->connection();
    }

    public function delete_details($tbl,$id){
        $id = mysqli_real_escape_string($this->con,$id);

        if(!mysqli_query($this->con,"UPDATE ".$tbl." SET isDeleted = 1 WHERE id = ".$id)){
            return false;
        }
        else{
            return true;
        }
    }
}

class FetchChargerDetailsApi extends Database{
    private $con;
    function __construct() {
        $this->con = $this->connection();
    }

    public function fetch_charger_details($cpiId,$chargerName){
        $cpiId = mysqli_real_escape_string($this->con,$cpiId);
        $getAuthSql = mysqli_query($this->con,"SELECT username,password,apiUrl FROM tbl_apiinfo WHERE cpoId = ".$cpiId);
        if(mysqli_num_rows($getAuthSql) > 0){
            $getAuthRow = mysqli_fetch_assoc($getAuthSql);
            $Auth = base64_encode($getAuthRow['username'].':'.$getAuthRow['password']);
            $ApiUrl = $getAuthRow['apiUrl'];
            $curl = $ApiUrl.$chargerName;
            $headers = array(
                'Content-Type: application/json',
                'Authorization:Basic '.$Auth
            );
            $ch = curl_init($curl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($result,true);
            if(isset($data['code']) && $data['code'] == '404'){
                return 'CHARGER_DETAILS_NOT_FOUND';
            }
            elseif(isset($data['fault_code'])){
                return 'CHARGER_DETAILS_NOT_FOUND';
            }
            elseif($data['name'] == $chargerName){
                return $data;
            }
        }
        else{
            return 'PLEASE_ADD_API_DETAILS';
        }
    }
}
?>