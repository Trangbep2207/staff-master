<?php
    $conn = new mysqli('localhost', 'root', '','db01');
    
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    } 
?>
<?php ob_start(); ?>
<html lang="en">
    <head>
      <title>Training Program_No04</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
        <script type="text/javascript">
            $(function() {
            $('#tbl tr').click(function(e) {

                //Backgroud Click row
                $('.tr-hover').click(function() {
                $(this).parents('#tbl').find('.tr-hover').each(function(index, element) {
                    $(element).removeClass('onColor');
                });
                $(this).addClass('onColor');
                });

                //Get values row
                var code = $(this).closest('.tr-hover').find('td:nth-child(1)').text();
                var name = $(this).closest('.tr-hover').find('td:nth-child(2)').text();
                var tel = $(this).closest('.tr-hover').find('td:nth-child(3)').text();
                var mail = $(this).closest('.tr-hover').find('td:nth-child(4)').text();
                var des = $(this).closest('.tr-hover').find('td:nth-child(5)').text();
                var note = $(this).closest('.tr-hover').find('td:nth-child(6)').text();
                var useflag = $(this).closest('.tr-hover').find('td:nth-child(7)').text();
                var status = $(this).closest('.tr-hover').find('td:nth-child(8)').text();

                $('#btnUpdate').click(function(e) {
                //e.preventDefault(); //==> preventDefault() không load lại form nếu làm việc với form
                $('#code').val(code);
                $('#name').val(name);
                $('#tel').val(tel);
                $('#mail').val(mail);
                $('#description').val(des);
                $('#note').val(note);
                $('#useflag').val(useflag);
                });

                $('#btnDel').click(function(e) {
                //e.preventDefault(); //==> preventDefault() không load lại form nếu làm việc với form
                $('#m_code').val(code);
                $('#m_name').val(name);
                $('#m_tel').val(tel);
                $('#m_mail').val(mail);
                $('#m_des').val(des);
                $('#m_note').val(note);
                $('#m_use').val(useflag);
                $('#m_status').val(status);
                });

            });
            });
        </script>
        <style>
            .onColor {
            background-color: #343A40;
            color: #fff;
            }
            #hideRow{
                display: none !important;
            }
  </style>
    </head>
    <body>  
        <?php 
        //DELETE
        if (!empty($_POST["btn_Delete"])) {
            $sql2 = "UPDATE `m_department` SET `USEFLAG` = 0 where `DEPARTMENT_CODE` =" .$_POST['m_code'];         
            if(mysqli_query($conn, $sql2)){
                header("location: Trainning_Program_No04.php");
                ob_end_flush();
            }else{
                $res = "Delete Failed!".mysqli_error($conn);
            }
        }
         ?>

<!-- Container Show Data -->
    <div class="container">
            <h2>DANH SÁCH</h2>
            <div class="container mt-3 " >
                <table class="table table-bordered" id="tbl">
                    <thead class="table-dark">
                    <p>DEPARTMENT MASTER MAINTENANCE</p>   
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th id="hideRow">Tel</th>
                            <th id="hideRow">Mail Address</th>
                            <th id="hideRow">Description</th>
                            <th id="hideRow">Note</th>
                            <th id="hideRow">Useflag</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM m_department";
                    $res = mysqli_query($conn, $sql);
                    while($row =  mysqli_fetch_assoc($res)){
                        $useflag = $row["USEFLAG"];
                    ?>
                        <?php if($useflag == 1): ?>
                            <tbody>
                                <tr class="tr-hover" onclick="lock();">
                                    <td><?php echo $row["DEPARTMENT_CODE"];?></td>
                                    <td><?php echo $row["DEPARTMENT_NAME"];?></td>
                                    <td id="hideRow"><?php echo $row["TEL"];?></td>
                                    <td id="hideRow"><?php echo $row["MAILADDRESS"]?></td>
                                    <td id="hideRow"><?php echo $row["DESCRIPTION"];?></td>
                                    <td id="hideRow"><?php echo $row["NOTE"]?></td>
                                    <td id="hideRow"><?php echo $row["USEFLAG"];?></td>
                                </tr>
                            </tbody>
                        <?php endif; ?>
                    <?php } ?>
                        <tr>
                            <td>
                                <button  class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnUpdate" >Update</button>
                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete" id="btnDel" >Delete</button>
                                <button class="btn btn-primary" onclick="window.location.href='https://internprj.inamsoft.com/19005325.trang.nt/staffmaster'">Finish</button>
                            </td>
                        </tr>
                        <script type="text/javascript">
                        document.getElementById("btnUpdate").disabled = true;
                        document.getElementById("btnDel").disabled = true;
                        function lock() {
                        document.getElementById("btnUpdate").disabled = false;
                        document.getElementById("btnDel").disabled = false;
                        }
                        </script>
                </table>
            </div>
        

<!-- The Model update -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table class="table table-bordered">
                                <?php
                                    $query=mysqli_query($conn,"select * from `m_department`");
                                    $row1=mysqli_fetch_assoc($query);
                                    if(isset($_POST['btn_Update'])){
                                        $name = $_POST["name"];
                                        $tel = $_POST["tel"];
                                        $mail = $_POST["mail"];
                                        $description = $_POST["description"];
                                        $note = $_POST["note"];
                                        $sql = "UPDATE `db01`.`m_department` SET `DEPARTMENT_NAME` = '$name', `TEL` = '$tel',
                                        `MAILADDRESS` = '$mail', `DESCRIPTION` = '$description', `NOTE` = '$note', `USEFLAG` = 1 where `DEPARTMENT_CODE` = " .$_POST['code'] ;
                                
                                        if(mysqli_query($conn, $sql)){
                                            header("location: Trainning_Program_No04.php");
                                            ob_end_flush();
                                        }else{
                                            $res = "Update Failed!".mysqli_error($conn);
                                        }
                                    }
                                ?>
            
                                <tr><td>Code:</td>
                                    <td><input type="text" readonly="readonly" pattern="[0-9].{0,11}" value="<?php echo $row1["DEPARTMENT_CODE"];?>" name="code" id="code">
                                </td>
                                </tr>
                                <tr><td>Name:</td>
                                    <td><input type="text" name="name" required pattern="[A-Za-z].{10,50}" value="<?php echo $row1["DEPARTMENT_NAME"];?>" id="name"></td>
                                </tr>
                                <tr><td>Tel:</td>
                                    <td><input type="text" name="tel" required pattern="[0-9].{9,20}" value="<?php echo $row1["TEL"];?>" id="tel"></td>
                                </tr>
                                <tr><td>Mail Address:</td>
                                    <td><input type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" name="mail" value="<?php echo $row1["MAILADDRESS"]?>" id="mail"></td>
                                </tr>
                                <tr><td>Description:</td>
                                    <td><input type="text" name="description"  value="<?php echo $row1["DESCRIPTION"];?>" id="description"></td>
                                </tr>
                                <tr><td>Note:</td>
                                    <td><input type="text" name="note" required pattern="[a-zA-Z0-9].{0,500}"  value="<?php echo $row1["NOTE"]?>" id="note"></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="btn btn-outline-warning" name="btn_Update" id ="btn_Update" value="OK">Update</button></td>
                                    <td><input type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" name="btn_Cancel" value="Cancel"></td>
                                </tr>
                                <?php
                        
                        
                        ?>
                        </table>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

<!-- Modal Add -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title"  id="staticBackdropLabel">Add</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                            $add_code = "";
                            $add_name = "";
                            $add_tel = "";
                            $add_mail = "";
                            $add_des = "";
                            $add_note = "";
                            $add_useflag= "";
                        //Lấy giá trị POST từ form vừa submit
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset($_POST["code"])) { $add_code = $_POST['code']; }
                            if(isset($_POST["name"])) { $add_name = $_POST['name']; }
                            if(isset($_POST["tel"])) { $add_tel = $_POST['tel']; }
                            if(isset($_POST["mail"])) { $add_mail = $_POST['mail']; }
                            if(isset($_POST["des"])) { $add_des = $_POST['des']; }
                            if(isset($_POST["note"])) { $add_note = $_POST['note']; }
                            $sql="SELECT * FROM m_department WHERE `DEPARTMENT_CODE` = '$add_code'";
                            $test_sql="SELECT * FROM m_department WHERE `DEPARTMENT_NAME` = '$add_name'";
                            $res = mysqli_query($conn, $sql);
                            $result = mysqli_query($conn, $test_sql);
                            if(mysqli_num_rows($res)>0){
                                echo '<script type="text/javascript"> alert("Code bị trùng lặp, vui lòng nhập lại!") </script>';
                            }
                            else if(mysqli_num_rows($result)>0){
                                echo '<script type="text/javascript"> alert("Tên bị trùng lặp, vui lòng nhập lại!") </script>';
                            }else{
                                $sql1 = " INSERT INTO `m_department`(`DEPARTMENT_CODE`, `DEPARTMENT_NAME`, `TEL`, `MAILADDRESS`, `DESCRIPTION`, `NOTE`, `USEFLAG`) VALUES ('$add_code','$add_name','$add_tel','$add_mail','$add_des','$add_note',1)";
                            if (mysqli_query($conn, $sql1)) {
                                echo "Thêm dữ liệu thành công";
                                header("location: Trainning_Program_No04.php");
                                ob_end_flush();
                                } else {
                                    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                                }
                                }
                            }
                            //Code xử lý, insert dữ liệu vào table
                            
                                
                        
                        ?>
                        <table class="table table-bordered">
                            <tr><td>Code:</td>
                                <td><input type="text" value="" required pattern="[0-9].{0,11}" name="code" id="code"></td>
                            </tr>
                            <tr><td>Name:</td>
                                <td><input type="text"  value="" pattern="[A-Za-z].{10,50}" name="name" id="name"></td>
                            </tr>
                            <tr><td>Tel:</td>
                                <td><input type="text" value="" required pattern="[0-9].{9,20}"  name="tel" id="tel"></td>
                            </tr>
                            <tr><td>Mail Address:</td>
                                <td><input type="email"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" value="" name="mail" id="mail"></td>
                            </tr>
                            <tr><td>Description:</td>
                                <td><input type="text" value="" name="des" id="des"></td>
                            </tr>
                            <tr><td>Note:</td>
                                <td><input type="text" value="" name="note" id="note"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="btn btn-outline-success" name="btn_Save" id ="btn_Save" value="OK"></td>
                                <td> <input type="button"class="btn btn-secondary" name="btn_Cancel" data-bs-dismiss="modal" value="Cancel"></td>
                            </tr>
                        </table>
                    </div>
            </form>
            </div>
        </div>
    </div>

<!-- Model Delete -->
    <div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <table class="table table-bordered">
                                        <?php
                                            $query=mysqli_query($conn,"SELECT * FROM `m_department` WHERE `USEFLAG` = 1;");
                                            $row2=mysqli_fetch_assoc($query);
                                        ?>
                    
                                        <tr><td>Code:</td>
                                            <td><input type="text" readonly="readonly" name="m_code" 
                                            value="<?php echo $row2["DEPARTMENT_CODE"];?>" id="m_code">
                                        </td>
                                        </tr>
                                        <tr><td>Name:</td>
                                            <td><input type="text" readonly="readonly" name="m_name" 
                                            value="<?php echo $row2["DEPARTMENT_NAME"];?>" id="m_name"></td>
                                        </tr>
                                        <tr><td>Tel:</td>
                                            <td><input type="text" readonly="readonly" name="m_tel" 
                                            value="<?php echo $row2["TEL"];?>" id="m_tel"></td>
                                        </tr>
                                        <tr><td>Mail Address:</td>
                                            <td><input type="text" readonly="readonly" name="m_mail" 
                                            value="<?php echo $row2["MAILADDRESS"]?>" id="m_mail"></td>
                                        </tr>
                                        <tr><td>Description:</td>
                                            <td><input type="text" readonly="readonly" name="m_des"
                                            value="<?php echo $row2["DESCRIPTION"];?>" id="m_des"></td>
                                        </tr>
                                        <tr><td>Note:</td>
                                            <td><input type="text" readonly="readonly" name="m_note" 
                                            value="<?php echo $row2["NOTE"]?>" id="m_note"></td>
                                        </tr>
                                        <tr id="hideRow"><td>Useflag:</td>
                                            <td><input type="text" readonly="readonly" name="m_use" 
                                            value="<?php echo $row2["USEFLAG"];?>" id="m_use"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button type="submit" class="btn btn-outline-danger" name="btn_Delete" id ="btn_Delete" value="OK">
                                                Delete</button></td>
                                            <td><input type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" name="btn_Cancel" value="Cancel"></td>
                                        </tr>
                            </table>
                        </div>
                    </form>
                </div>
        </div>
    </div>

</body>
</html>