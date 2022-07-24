<?php
   $conn = new mysqli('localhost', 'root', '','db01');
    $a = $_POST['data'];
    $sql = "SELECT `NAME` FROM `m_user` WHERE `NAME` LIKE '%$a%'";
    $query = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);
    if($num > 0){
        while($row = mysqli_fetch_assoc($query)){
?>
             <span class="spanName" id="result" name="result"><?php echo $row["NAME"];?> </span><br>
<?php
        }
    }
?>