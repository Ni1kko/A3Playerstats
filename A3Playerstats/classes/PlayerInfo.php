<?php
class PlayerInfo { 
    public static function DisplayLicenses($user) { 

        $civ_licenses = $user["civ_licenses"].split("],"); 
        $filtered_licenses = array();
        $license_names = array();
        $license_states = array();
        $st_index;
        $lt_index;

        for ($i=0; $i < count($civ_licenses); $i++) {
            if($i == 0){
                $st_index = 4;
            }else{
                $st_index = 2;
            }
            if($i==count($civ_licenses)-1){
                $lt_index = count($civ_licenses[$i]) - 5;
            }
            else{
                $lt_index = count($civ_licenses[$i]) - 1;
            }
            array_push($filtered_licenses, $civ_licenses[$i].substr($st_index, $lt_index));
        }
        $temp;
        for ($i = 0; $i < count($filtered_licenses);$i++) {
            $temp = $filtered_licenses[$i].split("`,");
            array_push($license_names,$temp[0]);
            array_push($license_states,$temp[1]);
        }
        /**add license information**/
        for ($i = 0; $i < count($license_names);$i++) {
            if($license_states[$i]==1){
                echo '<span class="label label-default">'.$license_names[$i].substring(12).charAt(0).toUpperCase().$license_names[$i].substring(12).slice(1)+'</span>';
            }
        } 
    }
}
           
?>

