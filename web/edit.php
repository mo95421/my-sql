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

<h2 class="sub-header">编辑</h2>
<?php
    $db = new mysqli('localhost', 'root', '', 'stumgmt');
    $db->query("SET NAMES UTF8");
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }
    $db->query("SET NAMES UTF8");
    $sno = $_GET['sno'];
    $query = "SELECT * FROM student WHERE Sno = ".$sno;
    $result = $db->query($query);
    $row = $result->fetch_assoc();
?>

<form method="post" action="result.php">
  <div class="form-group">
    <label>学号</label>
    <?php echo "<input type=\"text\" name=\"Sno\" class=\"form-control\" value=\"".$row['Sno']."\">"; ?>
  </div>
  <div class="form-group">
    <label>姓名</label>
    <?php echo "<input type=\"text\" name=\"Sname\" class=\"form-control\" value=\"".$row['Sname']."\">"; ?>
  </div>
  <div class="form-group">
    <label>年龄</label>
    <?php echo "<input type=\"text\" name=\"Sage\" class=\"form-control\" value=\"".$row['Sage']."\">"; ?>
  </div>
  <div class="form-group">
    <label>班级</label>
    <?php echo "<input type=\"text\" name=\"Sclass\" class=\"form-control\" value=\"".$row['Sclass']."\">"; ?>
  </div>
  <button type="submit" class="btn btn-default">确定</button>
</form>
</div>
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
