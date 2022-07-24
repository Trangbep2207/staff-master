<?php
        $db = new mysqli('localhost', 'root', '','db01');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["code"])) { $stf_code = $_POST['code']; }
            if(isset($_POST["code2"])) { $stf_code2 = $_POST['code2']; }
            if($stf_code =='' && $stf_code2 ==''){
                echo ("Vui lòng nhập dữ liệu!");
            }
                // else if (isset($stf_code) || isset($stf_code2)){
                //     $query = $db->query("SELECT * FROM `m_user` WHERE CODE = '$stf_code' OR CODE = '$stf_code2'"); 
        
                //     if($query->num_rows > 0){ 
                //     $delimiter = ","; 
                //     $filename = "members-data_" . date('Y-m-d') . ".csv"; 
                    
                //     // Create a file pointer 
                //     $f = fopen('php://memory', 'w'); 
                    
                //     // Set column headers 
                //     $fields = array('CODE', 'NAME', 'BIRTHDAY', 'TEL1', 'TEL2' , 'TEL3' ,' ZIPNO', 'ADDRESS1', 'ADDRESS2', 'NOTE'); 
                //     fputcsv($f, $fields, $delimiter); 
                    
                //     // Output each row of the data, format line as csv and write to file pointer 
                //     while($row = $query->fetch_assoc()){ 
                //         $lineData = array($row['CODE'], $row['NAME'], $row['BIRTHDAY'], $row['TEL1'], $row['TEL2'], $row['ZIPNO'], $row['ADDRESS1'], $row['ADDRESS2'], $row['NOTE']); 
                //         fputcsv($f, $lineData, $delimiter); 
                //     } 
                    
                //     // Move back to beginning of file 
                //     fseek($f, 0); 
                    
                //     // Set headers to download file rather than displayed 
                //     header('Content-Type: text/csv'); 
                //     header('Content-Disposition: attachment; filename="' . $filename . '";'); 
                    
                //     //output all remaining data on a file pointer 
                //     fpassthru($f); 
                // } 
                // exit;    
                // }
                else if (!isset($_POST["s"])){
                        $query = $db->query("SELECT * FROM `m_user` WHERE CODE BETWEEN '$stf_code' AND '$stf_code2'"); 
            
                        if($query->num_rows > 0){ 
                        $delimiter = ","; 
                        $filename = "members-data_" . date('Y-m-d') . ".csv"; 
                        
                        // Create a file pointer 
                        $f = fopen('php://memory', 'w'); 
                        
                        // Set column headers 
                        $fields = array('CODE', 'NAME', 'BIRTHDAY', 'TEL1', 'TEL2' , 'TEL3' ,' ZIPNO', 'ADDRESS1', 'ADDRESS2', 'NOTE'); 
                        fputcsv($f, $fields, $delimiter); 
                        
                        // Output each row of the data, format line as csv and write to file pointer
                        while($row = $query->fetch_assoc()){ 
                            $lineData = array($row['CODE'], $row['NAME'], $row['BIRTHDAY'], $row['TEL1'], $row['TEL2'], $row['ZIPNO'], $row['ADDRESS1'], $row['ADDRESS2'], $row['NOTE']); 
                            fputcsv($f, $lineData, $delimiter); 
                        } 
                        
                        // Move back to beginning of file 
                        fseek($f, 0); 
                        
                        // Set headers to download file rather than displayed 
                        header('Content-Type: text/csv'); 
                        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
                        
                        //output all remaining data on a file pointer 
                        fpassthru($f); 
                    } 
                    exit;    
                    }else{
                        $query = $db->query("SELECT * FROM `m_user` WHERE CODE BETWEEN '$stf_code' AND '$stf_code2' AND USEFLAG = 1"); 
            
                        if($query->num_rows > 0){ 
                        $delimiter = ","; 
                        $filename = "members-data_" . date('Y-m-d') . ".csv"; 
                        
                        // Create a file pointer 
                        $f = fopen('php://memory', 'w'); 
                        
                        // Set column headers 
                        $fields = array('CODE', 'NAME', 'BIRTHDAY', 'TEL1', 'TEL2' ,' ZIPNO', 'ADDRESS1', 'ADDRESS2', 'NOTE'); 
                        fputcsv($f, $fields, $delimiter); 
                        
                        // Output each row of the data, format line as csv and write to file pointer 
                        while($row = $query->fetch_assoc()){ 
                            $lineData = array($row['CODE'], $row['NAME'], $row['BIRTHDAY'], $row['TEL1'], $row['TEL2'], $row['ZIPNO'], $row['ADDRESS1'], $row['ADDRESS2'], $row['NOTE']); 
                            fputcsv($f, $lineData, $delimiter); 
                        } 
                        
                        // Move back to beginning of file 
                        fseek($f, 0); 
                        
                        // Set headers to download file rather than displayed 
                        header('Content-Type: text/csv'); 
                        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
                        
                        //output all remaining data on a file pointer 
                        fpassthru($f); 
                    } 
                    exit;    
                    }
                }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
    <title>Training Program_No02</title>
    <script type="text/javascript">
            $(document).ready(function(){
                $(".timkiem").keyup(function(){
                var txt = ($('.timkiem').val());
                $.post('ajax.php',{data: txt},function(data){
                    $('.spanName').html(data);
                })
            })
            })
    </script>
</head>
<body>  
    
    <div class="container mt-2 ">
    <form action="" method="POST">
        <h2>Staff Master CSV Export</h2>
        <table class="table table-bordered show">
        <br>
        <tr><h6  class="h6 text-center">Export Staff Master với những điều kiện như sau:</h6></tr>
            <tr>
                <td>Staff Code:</td>
                <td><input class="form-control" type="text" pattern="[0-9].{0,11}" name="code" id="code"></td>
                <td><input class="form-control" type="text" pattern="[0-9].{0,11}" name="code2" id="code2"></td>
            
            </tr>
            <tr><td >Name:</td>
                <td><form action="" method="post"><input type="text" pattern="[A-Za-z]" class="timkiem form-control"  placeholder="Tìm kiếm theo tên"></form>
                    <span class="spanName"></span>
                </td>
            </tr>
            <?php
                   $conn = new mysqli('localhost', 'root', '','db01');
            ?>
            
            <tr><td>Delete flag:</td>
                <td><input type="checkbox" name="s" id="s"> <span>Không xuất data đã xóa!</span></td>
            </tr>
            <tr>
            <td></td>
            <script>
                var alt = document.getElementById("btn_load");
                function alertTB() {
                    var from=document.getElementById("code").value;
                    var to=document.getElementById("code2").value;
                     if(Number(from)>Number(to))
                    {
                        alt = document.write("Lỗi nhập. Yêu cầu nhập lại!");
                        window.location('Trainning_Program_No02.php');
                    }
                    else{
                        alt= alert("Bạn có muốn export dữ liệu không?");
                    }
                    }
                 </script>
            <td><input type="submit" class="btn btn-outline-success" onclick="alertTB();" name="btn_load" id ="btn_load" value="Export"></td>
            <td><input type="button" class="btn btn-danger" onclick="window.location.href='https://internprj.inamsoft.com/19005325.trang.nt/staffmaster'" name="btn_Cancel" value="Cancel"></td>
            </tr>
           
        </table>
    </form>
</body>
</html>