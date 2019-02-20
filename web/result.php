<?php
$db = new mysqli('localhost', 'root', '', 'stumgmt');
if (mysqli_connect_errno()) {
  echo 'Error: Could not connect to database. Please try again later.';
  exit;
}
$db->query("SET NAMES UTF8");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $Sno = $_GET['Sno'];
    $query = "SELECT * FROM v_student WHERE Sno=".$Sno;
    $result = $db->query($query);
    $row = $result->fetch_assoc();
}
else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Sno = $_POST['Sno'];
    $Sname = $_POST['Sname'];
    $Sage = $_POST['Sage'];
    $Sclass = $_POST['Sclass'];
    $query = "SELECT * FROM student WHERE Sno=".$_POST['Sno'];
    $result = $db->query($query);
    /* 如果存在则更新 */
    if ($db->affected_rows != 0) {
        $query = "UPDATE student SET Sname='".$Sname."', Sage='".$Sage."', Sclass='".$Sclass."' WHERE Sno=".$_POST['Sno'];
        $result = $db->query($query);
        /* 更新成功则显示 */
        if ($result) {
            $query = "SELECT * FROM v_student WHERE Sno=".$_POST['Sno'];
            $result = $db->query($query);
            $row = $result->fetch_assoc();
        }
    }
    /* 如果不存在就插入 */
    else {
        $query = "INSERT INTO `student` VALUES
                ('".$Sno."', '".$Sname."', '".$Sage."', '".$Sclass."')";
        $result = $db->query($query);
        if ($result) {
            $query = "SELECT * FROM v_student WHERE Sno=".$Sno;
            $result = $db->query($query);
            $row = $result->fetch_assoc();
        } else {
            echo "error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="stumgmt">
  <meta name="author" content="jaceyen">
  <link rel="icon" href="favicon.ico">
  <title>学生管理系统</title>

  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

          <!-- Static navbar -->
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">学生管理系统</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="index.php">首页</a></li>
                  <li class="active"><a href="student.php">学生</a></li>
                  <li><a href="class.php">班级</a></li>
                  <li><a href="department.php">系</a></li>
                  <li><a href="institute.php">学会</a></li>
                  <li><a href="advance.php">高级</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
          </nav>

<h2 class="sub-header">查询结果</h2>
<div class="panel panel-default">
  <div class="panel-heading">学号</div>
  <div class="panel-body">
    <?php echo $row['Sno']; ?>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">姓名</div>
  <div class="panel-body">
    <?php echo $row['Sname']; ?>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">年龄</div>
  <div class="panel-body">
    <?php echo $row['Sage']; ?>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">系名</div>
  <div class="panel-body">
    <?php echo $row['Sdept']; ?>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">班号</div>
  <div class="panel-body">
    <?php echo $row['Sclass']; ?>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">宿舍区</div>
  <div class="panel-body">
    <?php echo $row['Sdorm']; ?>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">学会</div>
  <div class="panel-body">
    <?php
    $query = "SELECT Iname FROM institute, si WHERE institute.Ino=si.Ino AND si.Sno=".$Sno;
    $instres = $db->query($query);
    $instnum =  $instres->num_rows;
    if($instres) {
        for ($i = 0; $i < $instnum; $i++) {
          $inst = $instres->fetch_assoc();
          echo "<p>".$inst['Iname']."</p>";
      }
    }
    ?>
  </div>
</div>
<span>
<?php echo "<a class=\"btn btn-primary\" href=\"edit.php?sno=".$row['Sno']."\" role=\"button\">编辑</a>"; ?>
</span>
<span>
<?php echo "<a class=\"btn btn-danger\" href=\"delete.php?sno=".$row['Sno']."\" role=\"button\">删除</a>"; ?>
</span>
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
