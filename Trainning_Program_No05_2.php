<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .onColor {
            background-color: #343A40;
            color: #fff;
            }
            #hideRow{
                display: none !important;
            }
  </style>
    <title>Department</title>
</head>
<body>
<div class="container">
            <h2>DANH SÁCH</h2>
            <div class="container mt-3 " >
                <table class="table table-bordered" id="tbl">
                    <thead class="table table-dark">
                    <p>DEPARTMENT MASTER MAINTENANCE</p>   
                        <tr>
                            <th>Department Code</th>
                            <th>Department Name</th>
                            <th>Number of people</th>
                            <th id="hideRow">Department Tel</th>
                            <th id="hideRow">Mail Address</th>
                            <th id="hideRow">Description</th>
                            <th id="hideRow">Department Note</th>
                            <th id="hideRow">Department Useflag</th>
                        </tr>
                    </thead>
                    <?php
                    include("db.php");
                    $sql = "SELECT m_user.DEPARTMENT_CODE,m_department.DEPARTMENT_NAME, COUNT(m_user.DEPARTMENT_CODE) AS 'Tong so nguoi' FROM m_user,m_department WHERE m_user.DEPARTMENT_CODE = m_department.DEPARTMENT_CODE GROUP BY DEPARTMENT_CODE";
                    $res = mysqli_query($conn, $sql);
                    while($row =  mysqli_fetch_assoc($res)){
                    ?>
                            <tbody>
                                <tr class="tr-hover">
                                    <td><?php echo $row["DEPARTMENT_CODE"];?></td>
                                    <td><?php echo $row["DEPARTMENT_NAME"];?></td>
                                    <td><?php echo $row["Tong so nguoi"];?></td>
                                </tr>
                            </tbody>
                    <?php } ?>
                        <tr>
                            <td>
                            <button class="btn btn-primary" onclick="window.location.href='https://internprj.inamsoft.com/19005325.trang.nt/staffmaster'">Finish</button>
                        </tr>
                </table>
            </div>
</body>
</html>