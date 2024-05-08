<?php
require_once "conn.php";

$state_id = $_POST["state_id"];

$sql = "SELECT * FROM tblcity where state_id = :state_id";
$query = $conn -> prepare($sql);
$query -> bindParam(':state_id', $state_id);
$query -> execute();
$row = $query -> fetchAll(PDO::FETCH_ASSOC);
?>
    <option value="">Select City</option>

<?php
foreach ($row as $result){
    ?>
    <option value="<?php echo $result["id"];?>"><?php echo $result["name"];?></option>
    <?php
}
?>