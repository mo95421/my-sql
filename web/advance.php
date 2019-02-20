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
                  <li><a href="institute.php">学会</a></li>
                  <li class="active"><a href="advance.php">高级</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
          </nav>

<h2 class="sub-header">高级</h2>
<h3>批量修改班号</h3>
<form class="navbar-form navbar-left" role="search" action="changecno.php" method="post">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="请输入旧班号" name="oCno">
    <input type="text" class="form-control" placeholder="请输入新班号" name="nCno">
  </div>
  <button type="submit" class="btn btn-default">修改</button>
</form>
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
