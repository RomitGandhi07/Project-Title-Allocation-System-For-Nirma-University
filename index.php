<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <style>
		.margin-zero{
			margin: 0px;
		}
		body, html {
          height: 100%;
        }

		.bg-image{
			background-image: url("road2.jpg");
			height:100%;        
			background-repeat: no-repeat;
			background-size: cover;
		}
		.box {
			width:32%;
			height:auto;
			background:#FFF;
			position: absolute;
			left: 50%;
			top: 50%;
			-webkit-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
			padding: 30px;
            opacity: 0.9;
		}
		.effect1{
			-webkit-box-shadow: 0 10px 6px -6px #777;
			   -moz-box-shadow: 0 10px 6px -6px #777;
					box-shadow: 0 10px 6px -6px #777;
		}
		.box-heading{
			text-align: center;
			margin-bottom: 12px;
		}
		.bg { 
            /* The image used */
            background-image: url("road2.jpg");
        
             /* Full height */
            height: 100%; 
        
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
             background-size: cover;
        }
        footer {
           position: fixed;
           left: 0;
           bottom: 0;
           width: 100%;
           color: white;
           text-align: center;
        }
        @media only screen and (max-width: 768px) {
          .box {
            width:80%;
          }
        }
	</style>
    </head>
    <body class="img-responsive">
        <div class="bg">
            <header class="main-header">
                <div class="float-right d-none d-sm-block">
                </div>
                <br>
                <center><strong><b></b><h1>Project Title Allocation System</h1></b></center>
            </header>
            <div class="box effect1">
        		<div class="form">
                <h2 class="box-heading">Login</h2><br>
                <div class="form-group">
                <form action="student/login.php" method="post">
                <button type="submit" class="btn btn-info btn-block" id="btnSubmit">Student Login</button>
            	</form>
            	</div>

            	<div class="form-group">
            	<form action="faculty/login.php" method="post">
                <button type="submit" class="btn btn-info btn-block" id="btnSubmit">Faculty Login</button>
            	</form>
            	</div>

            	<div class="form-group">
            	<form action="coordinator/login.php" method="post">
                <button type="submit" class="btn btn-info btn-block" id="btnSubmit">Coordinator Login</button>
            	</form>
            	</div>
            </form>
            </div>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            </div>
            <strong class="footer"><h5><b>&nbsp;Guided By : Prof. Daiwat Amit Vyas(CSE Department) | Developed By : Romit Gandhi(18BCE358), Nimit Kansagra(18BCE360)</h5></b>
        </footer>
        </div>
    </body>
</html>
