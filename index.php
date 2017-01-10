<?php
    session_start();
    
    if(!isset($_SESSION['ready']))
    {
        $_SESSION['ready'] = false;
        $_SESSION['array'] = array();
    }
    
    if(isset($_POST['reset']))
    {
        $_SESSION = array();
        session_destroy();
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
    					
                        <div class="col-sm-12">
        					<div class="form-group">
                                <?php
                                    
                                    if(!isset($_POST['reset']))
                                    {
                                        if($_SESSION['ready'])
                                        {
                                            echo "<div><h3>Accessi precedenti</h3></div>";
                                            foreach($_SESSION['array'] as &$data)
                                                    echo "<div class='alert alert-info'>" . $data . "</div>";
                                                    
                                            echo "<div><h3>Accesso corrente</h3></div>";
                                            echo "<div class='alert alert-success'>" . date('l jS \of F Y h:i:s A') . "</div>";
                                        }
                                        else
                                            $_SESSION['ready'] = true;
                                            
                                            
                                        array_push($_SESSION['array'], date('l jS \of F Y h:i:s A'));
                                    }
                                
                                ?>
                                <input class="btn btn-default" align="center" type="submit" name="reset" value="reset">
                                <input class="btn btn-default" align="center" type="submit" name="si" value="aggiorna">
                            </div>
                        </div>
                        
    				</div>		
				
				</form>
			
            </div>
	</body>
</html>
