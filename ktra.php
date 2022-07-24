<table class="table table-bordered showData" id="tbl">
    <thead class="table table-dark">
    <tr>
        <th>Staff Code</th>
        <th>Staff Name</th>
        <th>Department </th>
    </tr>
    </thead>
<?php
   $conn = new mysqli('localhost', 'root', '','db01');
   $key = $_POST['id'];
   $sql2 = "SELECT m_user.CODE, m_user.NAME, m_department.`DEPARTMENT_CODE`, m_department.`DEPARTMENT_NAME` 
   FROM  m_user, m_department WHERE m_user.`DEPARTMENT_CODE` =m_department.`DEPARTMENT_CODE`
   AND m_department.`DEPARTMENT_CODE` = '$key' AND  m_user.USEFLAG=1";
    $result = mysqli_query($conn, $sql2);
    $num = mysqli_num_rows($result);
    if($num > 0){
    while($row =  mysqli_fetch_assoc($result)){
?>
             <tbody id="showdata">
                <tr class="tr-hover">
                    <td><?php echo $row["CODE"];?></td>
                    <td><?php echo $row["NAME"];?></td>
                    <td><?php echo $row["DEPARTMENT_CODE"].$row["DEPARTMENT_NAME"]?> </td>
                </tr>
            </tbody>
<?php
        }
    }
?>
</table>