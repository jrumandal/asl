<?php
	include_once(__DIR__."/includes/own/php/all_php.php");

	$query = "SELECT * FROM domande";
	$result = $conn->query($query);

	foreach($result as $row){
		//creo riga contenente domanda | input(radio button o textarea)
    ?>
		<div class="row">
	<?php
		//se la domanda non è DA(domanda aperta)
		if($row["Tipo"]!="DA"){ ?>
			<div class="col-sm-12">
    			<div class="panel panel-info">
    			    <div class="panel-heading">
    			        <strong><?=$row["Descrizione"]?></strong>
                    </div>
			        <div class="panel-body">
				        <div class="form-group">
					        <div class="row">
						        <div class="col-sm-6">
        		  					<label class="radio-inline">
        		  					    <input type="radio" name="q<?=$row["ID_Domanda"]?>" value=1 checked>
                                        Per niente
                                    </label>
        		  					<label class="radio-inline">
        		  					    <input type="radio" name="q<?=$row["ID_Domanda"]?>" value=2>
                                        Poco
                                    </label>
          						</div>
        		  				<div class="col-sm-6">
        		  					<label class="radio-inline">
        		  					    <input type="radio" name="q<?=$row["ID_Domanda"]?>" value=3>
                                        Abbastanza
                                    </label>
        		  					<label class="radio-inline">
        		  					    <input type="radio" name="q<?=$row["ID_Domanda"]?>" value=4>
                                        Si, molto
                                    </label>
          						</div>
	  				        </div>
			            </div>
                    </div>
                </div>
            </div>
    <?php
        }else{
			//sennò crea domanda | textarea
    ?>
			<div class="col-sm-12">
			    <div class="panel-group">
                    <div class="form-group">
    					<div class="panel panel-info">
    						<div class="panel panel-heading">
    							<label for="q<?=$row["ID_Domanda"]?>"><?=$row["Descrizione"]?></label>
        						<div>
        							<textarea class="form-control noresize\" maxlength="255" rows="5" id="q".$row["ID_Domanda"]."" name="q".$row["ID_Domanda"].""></textarea>
            					</div>
              			    </div>
        			    </div>
                    </div>
                </div>
            </div>
    	<?php
        	}
        ?>
		    <hr>
		</div>
    <?php
        }
    ?>