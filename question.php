<?php
    include_once(__DIR__."/includes/own/php/all_php.php");
    include_once(__DIR__."/includes/doc_header.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<style>
			body{background-color: lightblue;}
			textarea.noresize{resize:none;}
		</style>
		<title>Compilazione questionario</title>
	</head>
    <body>
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-2"></div>
    			<div class="col-sm-8">
    				<h2>REPORT DELLO STUDENTE</h2>
    			</div>
    			<div class="col-sm-2"></div>
    		</div>
    		<div class="row">
    			<form action="process_question.php" method="post" role="form">
    				<?php
    					//per salvare l'id dell'autovalutazione, da completare
    					//echo "<input type=hidden value=".$POST["id_quest"]."name=\"id_quest\">";
    				?>
    				<?php include_once( __DIR__.'/load_questions.php');?>
    				<div class="row">
    					<div class="col-sm-1"></div>
    					<div class="col-sm-10">
    						<input type="submit" class="btn btn-success btn-block" value="Invia autovalutazione">
    					</div>
    					<div class="col-sm-1"></div>
    				</div>
    			</form>
    		</div>
    	</div>
    </body>
    <script>
    </script>
</html>