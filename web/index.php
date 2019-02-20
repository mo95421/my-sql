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
                  <li class="active"><a href="index.php">首页</a></li>
                  <li><a href="student.php">学生</a></li>
                  <li><a href="class.php">班级</a></li>
                  <li><a href="department.php">系</a></li>
                  <li><a href="institute.php">学会</a></li>
                  <li><a href="advance.php">高级</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
          </nav>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>学生管理系统</h1>
        <p class="lead">这是一个面向西安电子科技大学学生的学生管理系统。</p>
        <p><a class="btn btn-lg btn-success" href="index.php" role="button">现在开始</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>学生</h2>
          <p>添加学生或者根据学号查询某同学的详细信息。</p>
          <p><a class="btn btn-primary" href="student.php" role="button">查看详情 &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>班级</h2>
          <p>查看各个班级专业、人数等信息。</p>
          <p><a class="btn btn-primary" href="class.php" role="button">查看详情 &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>系</h2>
          <p>查看各个系办公地点、总人数等信息。</p>
          <p><a class="btn btn-primary" href="department.php" role="button">查看详情 &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>学会</h2>
          <p>查看学校内各个学会的介绍、人数等信息。</p>
          <p><a class="btn btn-primary" href="institute.php" role="button">查看详情 &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>高级</h2>
          <p>一些高级功能。</p>
          <p><a class="btn btn-primary" href="advance.php" role="button">查看详情 &raquo;</a></p>
        </div>
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 阮思捷 姜喆 苏奇 穆丹 2015</p>
      </footer>

    </div> <!-- /container -->
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
