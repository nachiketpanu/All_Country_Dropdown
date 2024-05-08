<?php
require_once "db.php";


$country_id = $_POST["country_id"];
$sql = "SELECT * FROM tblstate where country_id = :country_id";
$query = $conn -> prepare($sql);
$query ->  bindParam(':country_id', $country_id)
$query -> execute();
$row = $query -> fetchAll(PDO::FETCH_ASSOC);
?>
    <option value="">Select State</option>

<?php
foreach ($row as $result){
    ?>
    <option value="<?php echo $result["id"];?>"><?php echo $result["name"];?></option>
    <?php
}
?>