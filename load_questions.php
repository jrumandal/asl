<?php
	//CARICA LE DOMANDE/RECORD DELLA TABELLA Domande.
	require 'connection.php';

	
	$query = "SELECT * FROM domande";
	$result = $conn->query($query);
	
	while($row = $result->fetch_assoc()){
		//creo riga contenente domanda | input(radio button o textarea)
		$div_row = "<div class=\"row\">";
		
		//se la domanda non è DA(domanda aperta)
		if($row["Tipo"]!="DA"){
			$div_row .= "<div class=\"col-sm-12\">";
			$div_row .= "<div class=\"panel panel-info\"><div class=\"panel-heading\"><strong>" .$row["Descrizione"]. "<strong></div>";
			$div_row .= "<div class=\"panel-body\">";
			//crea domanda con i radiobutton
			$radio = "
				<div class=\"form-group \">
					<div class=\"row\">
						<div class=\"col-sm-6\">
		  					<label class=\"radio-inline\"><input type=\"radio\" name=\"q".$row["ID_Domanda"]."\" value=1 checked>Per niente</label>
		  					<label class=\"radio-inline\"><input type=\"radio\" name=\"q".$row["ID_Domanda"]."\" value=2>Poco</label>				
  						</div>
		  				<div class=\"col-sm-6\">
		  					<label class=\"radio-inline\"><input type=\"radio\" name=\"q".$row["ID_Domanda"]."\" value=3>Abbastanza</label>				
		  					<label class=\"radio-inline\"><input type=\"radio\" name=\"q".$row["ID_Domanda"]."\" value=4>Si, molto</label>
  						</div>
	  				</div>";
			$div_row .= $radio ."</div></div></div></div>"; 
		}else{
			//sennò crea domanda | textarea
			$div_row .="<div class=\"col-sm-12\"><div class=\"panel-group\">";
			$div_row .="
				<div class=\"form-group\">
					<div class=\"panel panel-info\">
						<div class=\"panel panel-heading\">
							<label for=\"q".$row["ID_Domanda"]."\">".$row["Descrizione"]."</label>
						<div>
							<textarea class=\"form-control noresize\" maxlength=\"255\" rows=\"5\" id=\"q".$row["ID_Domanda"]."\" name=\"q".$row["ID_Domanda"]."\"></textarea>		
					</div>
      			</div>";
			$div_row .="</div></div></div></div>";
		}
		
		$div_row .="<hr>";
		$div_row .= "</div>";
		
		//stampa domanda costruita
		echo $div_row;
	}
	