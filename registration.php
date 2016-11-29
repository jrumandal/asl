<?php
    //pagina php non utilizzata in questo progetto. Ignorare.
    include_once(__DIR__."/includes/own/php/all_php.php");
    include_once(__DIR__."/includes/doc_header.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Registrazione</title>
		<script>
			function showClasses(str) {
			    if (str == "") {
			        document.getElementById("classe").innerHTML = "";
			        return;
			    } else { 
			        if (window.XMLHttpRequest) {
			            // code for IE7+, Firefox, Chrome, Opera, Safari
			            xmlhttp = new XMLHttpRequest();
			        } else {
			            // code for IE6, IE5
			            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			        }
			        xmlhttp.onreadystatechange = function() {
			            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			                document.getElementById("classe").innerHTML = xmlhttp.responseText;
			            }
			        };
			        xmlhttp.open("GET","ajax_get_class.php?q="+str,true);
			        xmlhttp.send();
			    }
			}
		</script>
	</head>
    <body>
    	<div class="content">
    		<div class="col-sm-11 col-sm-offset-1">
    			<form class="form-inline" role="form">
    			<fieldset class="fieldset">
    				<div class="row">
    					<div class="col-sm-6 form-group">
					  		<label for="user" class="col-sm-4">Username:</label>
					  		<input type="text" class="col-sm-2 form-control" name="user" id="user" required>
						</div>
						<div class="col-sm-6 form-group">
					  		<label for="pwd" class="col-sm-4">Password:</label>
							<input type="password" class="col-sm-2 form-control" name="password" id="pwd" required>
						</div>	
    				</div>
    				
					<?php 
						$reg_detail="";
						/*switch($_POST["reg_mode"]){
							// Studenti
							case 1:{
								$reg_detail.=
									"<div class=\"form-group\">".
									"<label for=\"name\">Nome:</label>".
									"<input type=\"text\" class=\"form-control\" name=\"nome\" id=\"name\">".
									"</div>".
									"<div class=\"form-group\">".
									"<label for=\"surname\">Cognome:</label>".
									"<input type=\"password\" class=\"form-control\" name=\"cognome\" id=\"surname\">".
									"</div>";
								$reg_detail.=
								"<div class=\"form-group\">".
								"<label for=\"specializzazione\">Specializzazione:</label>".
								"<select class=\"form-control\" name=\"specializzazione\" id=\"specializzazione\">";
								
								$query = "SELECT * FROM Specializzazioni";
								$result = $conn->query($query);
								while($row = $result->fetch_assoc()){
									echo "<select value=".$row["ID_Specializzazione"].">".$row["Descrizione"]."</select>";
								}
								
								$reg_detail.="</select></div>";
								
								break;
							}
							// Docenti
							case 2:{
								//$reg_detail=
									"<div class=\"form-group\">".
									"<label for=\"name\">Username:</label>".
									"<input type=\"text\" class=\"form-control\" name=\"nome\" id=\"name\">".
									"</div>".
									"<div class=\"form-group\">".
									"<label for=\"surname\">Password:</label>".
									"<input type=\"password\" class=\"form-control\" name=\"cognome\" id=\"surname\">".
									"</div>";
								break;
							}
							// Enti/Aziende
							case 3:{
								break;
							}
							default:{
								break;
							}
						}*/
                        ?>
						<?php // NOME COGNOME?>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label for="name" class="col-sm-4">Nome:</label>
								<input type="text" class="col-sm-2 form-control" name="nome" id="name" required>
							</div>
							<div class="col-sm-6 form-group">
								<label for="surname" class="col-sm-4">Cognome:</label>
								<input type="text" class="col-sm-2 form-control" name="cognome" id="surname" required>
							</div>
						</div>

						<?php // SPECIALIZZAZIONE ?>
                        <div class="row">
            				<div class="col-sm-6 form-group">
            					<label for="specializzazione" class="col-sm-4">
            					    Specializzazione:
                                </label>
            					<select class="col-sm-2 form-control" name="specializzazione" id="specializzazione" onchange="showClasses(this.value)" required>
            						<option selected="selected"></option>
                                <?php
                        		$query = "SELECT * FROM specializzazioni";
                        		$result = $conn->query($query);

                        		foreach($result as $row){   ?>
                                    <option value="<?=$row["ID_Specializzazione"]?>"><?=$row["Descrizione"]?></option>
                        	    <?php
                            	}
                                ?>
                                </select>
                            </div>

						<?php // CLASSE?>
						    <div class="col-sm-6 form-group">
    							<label for="classe" class="col-sm-4">
    							    Classe:
                                </label>
    							<select class="col-sm-2 form-control" name="classe" id="classe" required>
    								<option selected="selected"></option>

                            <?
                            /*
    						$query = "SELECT * FROM Classi";
    						$result = $conn->query($query);
    						while($row = $result->fetch_assoc()){
    							$reg_detail.= "<option value=".$row["ID_Classe"].">".$row["ID_Classe"]."</option>";
    						}
    						*/
                            ?>
						        </select>
                            </div>
                        </div>
				    </fieldset>
    			</form>
    		</div>
    	</div>
    </body>
    <script>
    </script>
</html>