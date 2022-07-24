<?php include("db.php"); ob_start(); ?>
<html lang="en">
    <head>
      <title>Department</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".loadData").change(function(){
                    var did = $(".loadData").val();
                    $.post("ktra.php",{id: did},function(data){
                        $(".showdata").html(data);
                    })
                })
            })
        </script>
        <style>
            select#d_department {
                margin: 16px;
            }
            .select_department {
            float: right;
            }
            h2 {
            margin-top: 30px;
            }
         </style>
    </head>
    <body>  
    <div class="container">
    
            
            <h2>DANH SÁCH</h2>
            <div class="container mt-3 " >
            <div class="select_department ">
            <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
            <select id="filter" class="loadData" >
                <option value="all"> -- Chọn -- </option>
                <?php
                     $sql1 = "SELECT * FROM m_department";
                     $result = mysqli_query($conn, $sql1);
                     $num = mysqli_num_rows($result);
                     if($num > 0){
                         while($row =  mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['DEPARTMENT_CODE']?>"><?php echo $row['DEPARTMENT_NAME']?></option>
                <?php
                    }
                }
                ?>
             </select>
            </div>
            </div>
        </div>
                <table class="table table-bordered showData" id="tbl">
                    <thead class="table table-dark">
                    <p>STAFF MASTER MAINTENANCE</p>   
                        <tr>
                            <th>Staff Code</th>
                            <th>Staff Name</th>
                            <th>Department </th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT m_department.`DEPARTMENT_CODE`, m_department.`DEPARTMENT_NAME`, m_user.CODE, m_user.NAME FROM m_department, m_user WHERE  m_department.DEPARTMENT_CODE=m_user.DEPARTMENT_CODE;";
                    $res = mysqli_query($conn, $sql);
                    while($row =  mysqli_fetch_assoc($res)){
                    ?>
                            <tbody id="showdata">
                                <tr class="tr-hover">
                                    <td><?php echo $row["CODE"];?></td>
                                    <td><?php echo $row["NAME"];?></td>
                                    <td><?php echo $row["DEPARTMENT_CODE"].$row["DEPARTMENT_NAME"]?> </td>
                                </tr>
                            </tbody>
                    <?php } ?>
                </table>
            </div>
    </div>
