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
                  <li><a href="student.php">学生</a></li>
                  <li><a href="class.php">班级</a></li>
                  <li><a href="department.php">系</a></li>
                  <li class="active"><a href="institute.php">学会</a></li>
                  <li><a href="advance.php">高级</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
          </nav>

<h2 class="sub-header">学会</h2>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>学会号</th>
        <th>学会名</th>
        <th>成立年份</th>
        <th>地点</th>
        <th>人数</th>
      </tr>
    <tbody>
<?php
  $db = new mysqli('localhost', 'root', '', 'stumgmt');
  if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database. Please try again later.';
    exit;
  }
  $db->query("SET NAMES UTF8");
  $query = "SELECT * FROM institute, v_inststu WHERE institute.Iname = v_inststu.Iname";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  for ($i = 0; $i < $num_results; $i++) {
    $row = $result->fetch_assoc();
    echo "<tr>";
    echo "<td>".$row['Ino']."</td>";
    echo "<td>".$row['Iname']."</td>";
    echo "<td>".$row['Iyear']."</td>";
    echo "<td>".$row['Iaddr']."</td>";
    echo "<td>".$row['Istu']."</td>";
    echo "</tr>";
  }
?>
    </thead>
    <tbody>
  </table>
</div>
</div>
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
