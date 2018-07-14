<?php

/*
 * baseClass short summary.
 *
 * baseClass description.
 *
 * @version 1.0
 * @author M-H-KARAMI
 */

class baseClass extends db
{
    private $Query;

    public function NormalQuery($query, $param= null){

        if(is_null($param)){

            $this->Query= $this->con->prepare($query);
            return $this->Query->execute();
        }
        else{

            $this->Query= $this->con->prepare($query);
            return $this->Query->execute($param);
        }
    }

    public function CountRows(){

        return $this->Query->rowCount();
    }

    public function FetchAll(){

        return $this->Query->fetchAll();
    }

    public function SingleResult(){

        return $this->Query->fetch(PDO::FETCH_OBJ);
    }

    public function Security($data){

        return trim(strip_tags($data));
    }

    public function CreateSession($session_name, $session_value){

        $_SESSION[$session_name]= $session_value;
    }

    public function TimeAgo($db_msg_time){

        date_default_timezone_set("Asia/Tehran");

        $db_time= strtotime($db_msg_time);
        $currect_time= time();

        $second= $currect_time - $db_time;
        $minutes= floor($second/60);
        $hours= floor($second/3600);
        $days= floor($second/86400);
        $weeks= floor($second/604800);
        $month= floor($second/2592000);
        $year= floor($second/31536000);

        if($second <= 60){

            return "هم اکنون";
        }
        elseif($minutes <= 60){

            return $minutes." دقیقه قبل";
        }
        elseif($hours <= 24){

            return $hours." ساعت قبل";
        }
        elseif($days <= 7){

            return $days." روز قبل";
        }
        elseif($weeks <= 4.3){

            return $weeks." هفته قبل";
        }
        elseif($month <= 12){

            return $month." ماه قبل";
        }
        else{

            return $year." سال قبل";
        }
    }
}

?>