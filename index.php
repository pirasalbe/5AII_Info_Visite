<?php
    session_start();
    
    if(!isset($_SESSION))
    {
        echo "ciao";
        $_SESSION['ready'] = false;
        $_SESSION['number'] = 1;
    }
    
    if(isset($_POST['reset']))
    {
        echo "ciaone";
        session_destroy();
        $_SESSION = array();
    }
?>

<html>
<head>
            <title>
                Last Seen
            </title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>
            <div class="table-responsive">
			
				<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
				
    				<div class="container">
    					<div class="row">
    						<div class="jumbotron text-center"><h2>Benvenuto!</h2></div>
    					</div>
    					
                        <div class="col-sm-2">
        					<div class="form-group">
                                <?php
                                    
                                    $_SESSION[$_SESSION['number']]=date('l jS \of F Y h:i:s A');
                                    $_SESSION['number']++;
                                
                                    if($_SESSION['ready'])
                                    {
                                        echo "<div><h3>Accessi precedenti</h3></div>";
                                        foreach($_SESSION as &$data)
                                            if($data != $_SESSION['ready'])
                                                echo "<div class='alert alert-info'>" . $data . "</div>";
                                                
                                        echo "<div><h3>Accesso corrente</h3></div>";
                                        echo "<div class='alert alert-success'>" . $data . "</div>";
                                    }
                                    else
                                        $_SESSION['ready'] = true;
                                
                                ?>
                                <input class="btn btn-default" align="center" type="submit" name="log" value="reset">
                            </div>
                        </div>
                        
    				</div>		
				
				</form>
			
            </div>
	</body>
</html>
