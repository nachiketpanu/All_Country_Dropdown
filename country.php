<?php
    require_once 'conn.php';
?>
<html>
<head>
    <title>Get city by state by country</title>
</head>

<body>
    <form method="post">


        <select name="country">
            <option name="">Country</option>
            <?php
                $sql = "select * from tblcountry";
                $query = $conn -> prepare($sql);
                if($query -> execute()){
                    $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                    foreach ($row as $result){
            ?>
            <option value="<?php echo $id = $result['id']; ?>"><?php echo $result['name']; ?></option>
            <?php
                    }
                }else{
                    echo "no";
                }
            ?>
        </select>

        <select name="state">
            <option name=""></option>
            <?php
                if (isset($_REQUEST['id'])){
                    $country_id=$_REQUEST['id'];
                    $sql = "select * from tblstate where country_id=:id;";
                    $query = $conn -> prepare($sql);
                    $query -> bindParam(':id',$country_id);
                    if($query -> execute()){
                        $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                        foreach ($row as $result){
            ?>
            <option value="<?php echo $sid=$result['id']; ?>" ><?php echo $result['name']; ?></option>
            <?php
                        }
                    }else{
                        echo "no";
                    }
                }
            ?>
        </select>
      <select name="city" id="city_dropdown">
          <option name="country" value="" ></option>
          <?php
          if (isset($_GET['sid'])){
              $state_id = $_GET['sid'];
          $sql = "select name from tblcity where state_id=:sid;";
          $query = $conn -> prepare($sql);
          $query -> bindParam(':sid', $state_id);
          if($query -> execute()){
              $row = $query -> fetchAll(PDO::FETCH_ASSOC);
              foreach ($row as $result){
                  ?>
                  <option name="country" value="<?php echo $result['id']; ?>" ><?php echo $result ['name']; ?></option>
              <?php }
          }else{
              echo "no";
          }
          }
          ?>
      </select>
        <!--        <lable for="state">State</lable>-->
<!--        <input type="submit" name="submit" value="Submit"/>-->
<!--      <script>-->
<!--          $(document).ready(function() {-->
<!--              $('#country_dropdown').on('change', function() {-->
<!--                  var country_id = this.value;-->
<!--                  $.ajax({-->
<!--                      url: "states-by-country.php",-->
<!--                      type: "POST",-->
<!--                      data: {-->
<!--                          country_id: country_id-->
<!--                      },-->
<!--                      cache: false,-->
<!--                      success: function(result){-->
<!--                          $("#state_dropdown").html(result);-->
<!--                          $('#city_dropdown').html('<option value="">Select State First</option>');-->
<!--                      }-->
<!--                  });-->
<!--              });-->

<!--              $('#state_dropdown').on('change', function() {-->
<!--                  var state_id = this.value;-->
<!--                  $.ajax({-->
<!--                      url: "cities-by-state.php",-->
<!--                      type: "POST",-->
<!--                      data: {-->
<!--                          state_id: state_id-->
<!--                      },-->
<!--                      cache: false,-->
<!--                      success: function(result){-->
<!--                          $("#city_dropdown").html(result);-->
<!--                      }-->
<!--                  });-->
<!--              });-->
<!--          });-->
<!--      </script>-->
  </form>
</body>
</html>