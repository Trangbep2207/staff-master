<?php include("db.php"); ob_start(); ?>
<html lang="en">
    <head>
      <title>Training Program_No03</title>
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
                var codeStf = $(this).closest('.tr-hover').find('td:nth-child(1)').text();
                var nameStf = $(this).closest('.tr-hover').find('td:nth-child(2)').text();
                var birthdayStf = $(this).closest('.tr-hover').find('td:nth-child(3)').text();
                var tel1Stf = $(this).closest('.tr-hover').find('td:nth-child(4)').text();
                var tel2Stf = $(this).closest('.tr-hover').find('td:nth-child(5)').text();
                var tel3Stf = $(this).closest('.tr-hover').find('td:nth-child(6)').text();
                var zipStf = $(this).closest('.tr-hover').find('td:nth-child(7)').text();
                var address1Stf = $(this).closest('.tr-hover').find('td:nth-child(8)').text();
                var address2Stf = $(this).closest('.tr-hover').find('td:nth-child(9)').text();
                var noteStf = $(this).closest('.tr-hover').find('td:nth-child(10)').text();
                var useflagStf = $(this).closest('.tr-hover').find('td:nth-child(11)').text();

                $('#btnUpdate').click(function(e) {
                //e.preventDefault(); //==> preventDefault() không load lại form nếu làm việc với form
                $('#code').val(codeStf);
                $('#name').val(nameStf);
                $('#birthday').val(birthdayStf);
                $('#tel1').val(tel1Stf);
                $('#tel2').val(tel2Stf);
                $('#tel3').val(tel3Stf);
                $('#zip').val(zipStf);
                $('#address1').val(address1Stf);
                $('#address2').val(address2Stf);
                $('#note').val(noteStf);
                $('#useflag').val(useflagStf);
                });

                $('#btnDel').click(function(e) {
                //e.preventDefault(); //==> preventDefault() không load lại form nếu làm việc với form
                $('#s_code').val(codeStf);
                $('#s_name').val(nameStf);
                $('#s_birthday').val(birthdayStf);
                $('#s_tel1').val(tel1Stf);
                $('#s_tel2').val(tel2Stf);
                $('#s_tel3').val(tel3Stf);
                $('#s_zip').val(zipStf);
                $('#s_address1').val(address1Stf);
                $('#s_address2').val(address2Stf);
                $('#s_note').val(noteStf);
                $('#s_useflag').val(useflagStf);
                });

                $('#btnShow').click(function(e) {
                //e.preventDefault(); //==> preventDefault() không load lại form nếu làm việc với form
                $('#st_code').val(codeStf);
                $('#st_name').val(nameStf);
                $('#st_birthday').val(birthdayStf);
                $('#st_tel1').val(tel1Stf);
                $('#st_tel2').val(tel2Stf);
                $('#st_tel3').val(tel3Stf);
                $('#st_zip').val(zipStf);
                $('#st_address1').val(address1Stf);
                $('#st_address2').val(address2Stf);
                $('#st_note').val(noteStf);
                });
            });
            });
            document.refresh();
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
        // DELETE
        if (!empty($_POST["btn_Delete"])) {
            $sql2 = "UPDATE `m_user` SET `USEFLAG` = 0 where `CODE` =" .$_POST['s_code'];         
            if(mysqli_query($conn, $sql2)){
                header("location: Trainning_Program_No03.php");
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
                    <thead>
                    <p>STAFF MASTER MAINTENANCE</p>   
                        <tr>
                            <th>Staff Code</th>
                            <th>Staff Name</th>
                            <th id="hideRow">Staff Birthday</th>
                            <th id="hideRow">Staff Tel1</th>
                            <th id="hideRow">Staff Tel2</th>
                            <th id="hideRow">Staff Tel3</th>
                            <th id="hideRow">Staff Note</th>
                            <th id="hideRow">Staff Address1</th>
                            <th id="hideRow">Staff Address2</th>
                            <th id="hideRow">Staff Note</th>
                            <th id="hideRow">Staff Useflag</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM m_user";
                    $res = mysqli_query($conn, $sql);
                    while($row =  mysqli_fetch_assoc($res)){
                        $stfCode = $row["CODE"];
                        $stfName = $row["NAME"];
                        $birthDay = $row["BIRTHDAY"];
                        $tel1 = $row["TEL1"];
                        $tel2 = $row["TEL2"];
                        $tel3 = $row["TEL3"];
                        $zipNo = $row["ZIPNO"];
                        $address1 = $row["ADDRESS1"];
                        $address2 = $row["ADDRESS2"];
                        $note = $row["NOTE"];
                        $useflag = $row["USEFLAG"];
                    ?>
                        <?php if($useflag == 1): ?>
                            <tbody>
                                <tr class="tr-hover" onclick="lock();">
                                    <td><?php echo $stfCode;?></td>
                                    <td><?php echo $stfName;?></td>
                                    <td id="hideRow"><?php echo $birthDay;?></td>
                                    <td id="hideRow"><?php echo $tel1;?></td>
                                    <td id="hideRow"><?php echo $tel2;?></td>
                                    <td id="hideRow"><?php echo $tel3;?></td>
                                    <td id="hideRow"><?php echo $zipNo;?></td>
                                    <td id="hideRow"><?php echo $address1;?></td>
                                    <td id="hideRow"><?php echo $address2;?></td>
                                    <td id="hideRow"><?php echo $note;?></td>
                                    <td id="hideRow"><?php echo $useflag;?></td>
                                </tr>
                            </tbody>
                        <?php endif; ?>
                    <?php } ?>
                        <tr>
                            <td>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropShow" id="btnShow" >Show</button>
                                <button  class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>
                            </td>
                            <td>
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnUpdate" >Update</button>
                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete" id="btnDel" >Delete</button>
                            </td>
                        </tr>
                        <script type="text/javascript">
                        document.getElementById("btnUpdate").disabled = true;
                        document.getElementById("btnDel").disabled = true;
                        document.getElementById("btnShow").disabled = true;
                        function lock() {
                        document.getElementById("btnUpdate").disabled = false;
                        document.getElementById("btnDel").disabled = false;
                        document.getElementById("btnShow").disabled = false;
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
                                    $query=mysqli_query($conn,"select * from `m_user`");
                                    $row1=mysqli_fetch_assoc($query);
                                    if(isset($_POST['btn_Update'])){

                                        // thực hiện sửa loại tin
                                
                                        $stf_name = $_POST["name"];
                                        $stf_birthday = $_POST["birthday"];
                                        $stf_tel1 = $_POST["tel1"];
                                        $stf_tel2 = $_POST["tel2"];
                                        $stf_tel3 = $_POST["tel3"];
                                        $stf_zipNo = $_POST["zip"];
                                        $stf_address1 = $_POST["address1"];
                                        $stf_address2 = $_POST["address2"];
                                        $stf_note= $_POST["note"];
                                        $stf_useflag = $_POST["useflag"];
                                        $sql = "UPDATE `db01`.`m_user` SET   `NAME` = '$stf_name', `BIRTHDAY` = '$stf_birthday',
                                        `TEL1` = '$stf_tel1', `TEL2` = '$stf_tel2', `TEL3` = '$stf_tel3', `ZIPNO` = '$stf_zipNo', `ADDRESS1` = '$stf_address1',
                                        `ADDRESS2` = '$stf_address2', `NOTE` = '$stf_note', `USEFLAG` = '$stf_useflag' where `CODE` = " .$_POST['code'] ;
                                
                                        if(mysqli_query($conn, $sql)){
                                            header("location: Trainning_Program_No03.php");
                                            ob_end_flush();
                                        }else{
                                            $res = "Update Failed!".mysqli_error($conn);
                                        }
                                    }
                                ?>
            
            <tr><td>Staff Code:</td>
                                    <td><input type="text" readonly="readonly" value="<?php echo $row1["CODE"];?>" name="code" id="code">
                                </td>
                                </tr>
                                <tr><td>Staff Name:</td>
                                    <td><input type="text" required pattern="[A-Za-z].{10,50}" name="name" value="<?php echo $row1["NAME"];?>" id="name"></td>
                                </tr>
                                <tr><td>Birthday:</td>
                                    <td><input type="date" required name="birthday" value="<?php echo $row1["BIRTHDAY"];?>" id="birthday"></td>
                                </tr>
                                <tr><td>Tel 1:</td>
                                    <td><input type="tel" required pattern="[0-9].{9,20}" name="tel1" value="<?php echo $row1["TEL1"]?>" id="tel1"></td>
                                </tr>
                                <tr><td>Tel 2:</td>
                                    <td><input type="tel"  pattern="[0-9].{9,20}" name="tel2"  value="<?php echo $row1["TEL2"];?>" id="tel2"></td>
                                </tr>
                                <tr><td>Tel 3:</td>
                                    <td><input type="tel"  pattern="[0-9].{9,20}" value="<?php echo $row1["TEL3"];?>" id="tel3"></td>
                                </tr>
                                <tr><td>ZIP No:</td>
                                    <td><input type="text" name="zip" value="<?php echo $row1["ZIPNO"]?>" id="zip"></td>
                                </tr>
                                <tr><td>Address 1:</td>
                                    <td><input type="text" required pattern="[a-zA-Z0-9].{30,100}" name="address1" maxlength="100" value="<?php echo $row1["ADDRESS1"];?>" id="address1"></td>
                                </tr>
                                <tr><td>Address 2:</td>
                                    <td><input type="text" pattern="[a-zA-Z0-9].{30,100}" name="address2" maxlength="100" value="<?php echo $row1["ADDRESS2"];?>" id="address2"></td>
                                </tr>
                                <tr><td>Note:</td>
                                <td><input type="text" name="note" pattern="[a-zA-Z0-9].{0,500}" value="<?php echo $row1["NOTE"];?>" id="note"></td>
                                </tr>
                                <tr><td>USEFLAG:</td>
                                    <td><input type="text" name="useflag" value="<?php echo $row1["USEFLAG"];?>" id="useflag"></td>
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
                            $stf_code = "";
                            $stf_name = "";
                            $stf_birthday = "";
                            $stf_tel1 = "";
                            $stf_tel2 = "";
                            $stf_tel3 = "";
                            $stf_zipNo = "";
                            $stf_address1 = "";
                            $stf_address2 = "";
                            $stf_note= "";
                            $stf_useflag = "";
                        
                        //Lấy giá trị POST từ form vừa submit
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset($_POST["code"])) { $stf_code = $_POST['code']; }
                            if(isset($_POST["name"])) { $stf_name = $_POST['name']; }
                            if(isset($_POST["birthday"])) { $stf_birthday = $_POST['birthday']; }
                            if(isset($_POST["tel1"])) { $stf_tel1 = $_POST['tel1']; }
                            if(isset($_POST["tel2"])) { $stf_tel2 = $_POST['tel2']; }
                            if(isset($_POST["tel3"])) { $stf_tel3 = $_POST['tel3']; }
                            if(isset($_POST["zip"])) { $stf_zipNo = $_POST['zip']; }
                            if(isset($_POST["address1"])) { $stf_address1 = $_POST['address1']; }
                            if(isset($_POST["address2"])) { $stf_address2 = $_POST['address2']; }
                            if(isset($_POST["note"])) { $stf_note = $_POST['note']; }

                            $sql="SELECT * FROM m_user WHERE CODE='$stf_code'";
                            $res = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($res)>0){
                                echo '<script type="text/javascript"> alert("Code bị trùng lặp, vui lòng nhập lại!") </script>';
                            }else{
                                $sql1 = " INSERT INTO `db01`.`m_user` (`CODE`, `NAME`, `BIRTHDAY`, `TEL1`, `TEL2` , `TEL3`, `ZIPNO`, `ADDRESS1`, `ADDRESS2`, `NOTE`, `USEFLAG`) VALUES ('$stf_code', '$stf_name', '$stf_birthday', '$stf_tel1', '$stf_tel2', '$stf_tel3', '$stf_zipNo', '$stf_address1', '$stf_address2', '$stf_note', 1)";
                            if (mysqli_query($conn, $sql1)) {
                                echo "Thêm dữ liệu thành công";
                                header("location: Trainning_Program_No03.php");
                                ob_end_flush();
                                } else {
                                    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                                }
                                }
                            }
                            //Code xử lý, insert dữ liệu vào table
                            
                                
                        
                        ?>
                        <table class="table table-bordered">
                        <tr><td>Staff Code:</td>
                                <td><input type="text" required name="code" id="code"  pattern="[0-9].{0,11}"></td>
                            </tr>
                            <tr><td>Staff Name:</td>
                                <td><input type="text" required name="name" id="name"  pattern="[A-Za-z].{10,50}"></td>
                            </tr>
                            <tr><td>Birthday:</td>
                                <td><input type="date" required name="birthday" id="birthday"></td>
                            </tr>
                            <tr><td>Tel 1:</td>
                                <td><input type="tel" required  pattern="[0-9].{9,20}"  name="tel1" id="tel1"></td>
                            </tr>
                            <tr><td>Tel 2:</td>
                                <td><input type="tel"  pattern="[0-9].{9,20}" name="tel2" id="tel2"></td>
                            </tr>
                            <tr><td>Tel 3:</td>
                                <td><input type="tel"  pattern="[0-9].{9,20}" name="tel3" id="tel3"></td>
                            </tr>
                            <tr><td>ZIP No:</td>
                                <td><input type="text" required  pattern="[a-zA-Z0-9].{0,10}" name="zip" id="zip"></td>
                            </tr>
                            <tr><td>Address 1:</td>
                                <td><input type="text" required maxlength="100" pattern="[a-zA-Z0-9].{30,100}" value="" name="address1" id="address1"></td>
                            </tr>
                            <tr><td>Address 2:</td>
                                <td><input type="text" maxlength="100" pattern="[a-zA-Z0-9].{30,100}" value="" name="address2" id="address2"></td>
                            </tr>
                            <tr><td>Note:</td>
                                <td><input type="text" required pattern="[a-zA-Z0-9].{0,500}" value="" name="note" id="note"></td>
                            </tr>
                            <tr id="hideRow"><td>USEFLAG:</td>
                                <td><input type="text" maxlength="6" value="" name="useflag" id="useflag"></td>
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
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <table class="table table-bordered">
                                        <?php
                                            $query=mysqli_query($conn,"SELECT * FROM `m_user` WHERE USEFLAG = 1;");
                                            $row2=mysqli_fetch_assoc($query);
                                        ?>
                    
                                        <tr><td>Staff Code:</td>
                                            <td><input type="text" readonly="readonly" name="s_code" 
                                            value="<?php echo $row2["CODE"];?>" id="s_code">
                                        </td>
                                        </tr>
                                        <tr><td>Staff Name:</td>
                                            <td><input type="text" readonly="readonly" name="s_name" 
                                            value="<?php echo $row2["NAME"];?>" id="s_name"></td>
                                        </tr>
                                        <tr><td>Birthday:</td>
                                            <td><input type="text" readonly="readonly" name="s_birthday" 
                                            value="<?php echo $row2["BIRTHDAY"];?>" id="s_birthday"></td>
                                        </tr>
                                        <tr><td>Tel 1:</td>
                                            <td><input type="text" readonly="readonly" name="s_tel1" 
                                            value="<?php echo $row2["TEL1"]?>" id="s_tel1"></td>
                                        </tr>
                                        <tr><td>Tel 2:</td>
                                            <td><input type="text" readonly="readonly" name="s_tel2"
                                            value="<?php echo $row2["TEL2"];?>" id="s_tel2"></td>
                                        </tr>
                                        <tr><td>Tel 3:</td>
                                            <td><input type="text" readonly="readonly" name="s_tel3"
                                            value="<?php echo $row2["TEL3"];?>" id="s_tel3"></td>
                                        </tr>
                                        <tr><td>ZIP No:</td>
                                            <td><input type="text" readonly="readonly" name="s_zip" 
                                            value="<?php echo $row2["ZIPNO"]?>" id="s_zip"></td>
                                        </tr>
                                        <tr><td>Address 1:</td>
                                            <td><input type="text" readonly="readonly" name="s_address1" 
                                            value="<?php echo $row2["ADDRESS1"];?>" id="s_address1"></td>
                                        </tr>
                                        <tr><td>Address 2:</td>
                                            <td><input type="text" readonly="readonly" name="s_address2" 
                                            value="<?php echo $row2["ADDRESS2"];?>" id="s_address2"></td>
                                        </tr>
                                        <tr><td>Note:</td>
                                            <td><input type="text" readonly="readonly" name="s_note" 
                                            value="<?php echo $row2["NOTE"];?>" id="s_note"></td>
                                        </tr>
                                        <tr><td>USEFLAG:</td>
                                            <td><input type="text" readonly="readonly" name="s_useflag" 
                                            value="<?php echo $row2["USEFLAG"];?>" id="s_useflag"></td>
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

<!-- modal show  -->
    <div class="modal fade" id="staticBackdropShow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Show Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <table class="table table-bordered">
                                        <?php
                                            $query=mysqli_query($conn,"SELECT * FROM `m_user` WHERE USEFLAG = 1;");
                                            $row2=mysqli_fetch_assoc($query);
                                        ?>
                    
                                        <tr><td>Staff Code:</td>
                                            <td><input type="text" readonly="readonly" id="st_code" value="<?php echo $row2["CODE"];?>">
                                        </td>
                                        </tr>
                                        <tr><td>Staff Name:</td>
                                            <td><input type="text" readonly="readonly" id="st_name" value="<?php echo $row2["NAME"];?>"></td>
                                        </tr>
                                        <tr><td>Birthday:</td>
                                            <td><input type="text" readonly="readonly" id="st_birthday" value="<?php echo $row2["BIRTHDAY"];?>"></td>
                                        </tr>
                                        <tr><td>Tel 1:</td>
                                            <td><input type="text" readonly="readonly" id="st_tel1" value="<?php echo $row2["TEL1"]?>"></td>
                                        </tr>
                                        <tr><td>Tel 2:</td>
                                            <td><input type="text" readonly="readonly" id="st_tel2" value="<?php echo $row2["TEL2"];?>"></td>
                                        </tr>
                                        <tr><td>Tel 3:</td>
                                            <td><input type="text" readonly="readonly" id="st_tel3" value="<?php echo $row2["TEL3"];?>"></td>
                                        </tr>
                                        <tr><td>ZIP No:</td>
                                            <td><input type="text" readonly="readonly" id="st_zip" value="<?php echo $row2["ZIPNO"]?>"></td>
                                        </tr>
                                        <tr><td>Address 1:</td>
                                            <td><input type="text" readonly="readonly" id="st_address1" value="<?php echo $row2["ADDRESS1"];?>"></td>
                                        </tr>
                                        <tr><td>Address 2:</td>
                                            <td><input type="text" readonly="readonly" id="st_address2" value="<?php echo $row2["ADDRESS2"];?>"></td>
                                        </tr>
                                        <tr><td>Note:</td>
                                            <td><input type="text" readonly="readonly" id="st_note" value="<?php echo $row2["NOTE"];?>" ></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="button" id="btn_Show"class="btn btn-outline-danger" data-bs-dismiss="modal" value="OK"> </td>
                                            <td><input type="button" class="btn btn-outline-danger" value="Cancel"></td>
                                        </tr>
                            </table>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>