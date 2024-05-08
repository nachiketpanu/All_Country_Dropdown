<?php
// Include the database config file
require_once 'conn.php';

// Fetch all the country data

?>

<!-- Country dropdown -->
<select id="country">
    <option value="">Select Country</option>
    <?php
    $sql = "SELECT * FROM tblcountry";
    $query = $conn -> prepare($sql);
    if($query -> execute()){
        $row = $query -> fetchAll(PDO::FETCH_ASSOC);


    foreach($row as $result){
            echo '<option value="'.$result['id'].'">'.$result['name'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }

    ?>
</select>

<!-- State dropdown -->
<select id="state">
    <option value="">Select country first</option>
</select>

<!-- City dropdown -->
<select id="city">
    <option value="">Select state first</option>
</select>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#country').on('change', function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'POST',
                    url:'ajaxData.php',
                    data:'country_id='+countryID,
                    success:function(html){
                        $('#state').html(html);
                        $('#city').html('<option value="">Select state first</option>');
                    }
                });
            }else{
                $('#state').html('<option value="">Select country first</option>');
                $('#city').html('<option value="">Select state first</option>');
            }
        });

        $('#state').on('change', function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    type:'POST',
                    url:'ajaxData.php',
                    data:'state_id='+stateID,
                    success:function(html){
                        $('#city').html(html);
                    }
                });
            }else{
                $('#city').html('<option value="">Select state first</option>');
            }
        });
    });
</script>