<?php
// Include the database config file
include_once 'conn.php';

if(!empty($_POST["country_id"])){
    $country_id=$_POST['country_id'];
    $sql = "select * from tblstate where country_id=:country_id;";
    $query = $conn -> prepare($sql);
    $query -> bindParam(':country_id',$country_id);
    if($query -> execute()) {
        $row = $query->fetchAll(PDO::FETCH_ASSOC);

        // Fetch state data based on the specific country
//    $query = "SELECT * FROM tblstate WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC";
//    $result = $db->query($query);

        // Generate HTML of state options list

        echo '<option value="">Select State</option>';
            foreach ($row as $result) {

                echo '<option value="' . $result['id'] . '">' . $result['name'] . '</option>';
            }


    }
}elseif(!empty($_POST["state_id"])){
        $state_id = $_POST['state_id'];
        $sql = "select name from tblcity where state_id=:state_id;";
        $query = $conn -> prepare($sql);
        $query -> bindParam(':state_id', $state_id);
        if($query -> execute()) {
            $row = $query->fetchAll(PDO::FETCH_ASSOC);

            // Fetch city data based on the specific state
//    $query = "SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC";
//    $result = $db->query($query);

            // Generate HTML of city options list
            echo '<option value="">Select City</option>';
                foreach ($row as $result) {

                    echo '<option value="' . $result['id'] . '">' . $result['name'] . '</option>';
                }

        }
}
?>