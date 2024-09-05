<?php 

require_once("securePassGenerator.php");

if(isset($_POST['export']) && $_POST['export'] == "yes"){

	$file = export_as_txt($_POST["generated_password"],$_POST["generated_username"]);

}

if(isset($_POST['total_length'])){
	$generated = index($_POST['total_length']);

}else{
	$generated = index(10);
}
$username = generateUsername();


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Generatore di Password</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


		<link href="bootstrap.min.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity=" sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-8808111-6', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>
	
	

	<body>
		
		<div class="container">

	      <form class="form-signin" style="text-align: center" method="POST">
	       
	        <h3 >Generatore di Password</h3>
	        <h5>Benvenuto, clicca sul pulsante per generare una nuova password. Specifica la lunghezza desiderata, la lunghezza predefinita è 10 </h5>
	        <div class="col-sm-5" style="margin-bottom: 5px;">
	        <?php if(isset($_POST['total_length'])){
	        	$length = $_POST['total_length']; 
	        	} else{
	        		$length = 10;
	        		} ?>
	      	<h5>Lunghezza totale:</h5> <input type="text" name="total_length" value="<?php echo $length ?>" size="10" style="text-align: center; font-size: 25px;" class="form-control">
	      	</div>
	        <input type="text" disabled value="<?php  echo $generated; ?>" class="form-control" style="text-align: center; font-size: 25px;">
	        	       
	       <p>

	        <button class="btn btn-lg btn-primary btn-block" type="submit">Genera</button>
	        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="showExportForm()">Esporta</button>
	       
	        </p>
	      </form>
	      <div style="display: none;" id="export_form" >

		      <form class="form-signin" style="text-align: center" method="POST" >
		       <p class="text-info">La Password sarà esportata in un file di testo.</p>
		      	 <input type="text" name="generated_username" value="<?php  echo $username; ?>" class="form-control" style="text-align: center; font-size: 25px;">
		      	 <input type="text" name="generated_password" readonly value="<?php  echo $generated; ?>" class="form-control" style="text-align: center; font-size: 25px;">
		      	 <input type="hidden" value="yes" name="export">
		      	 <button class="btn btn-lg btn-primary btn-block" type="submit">Export</button>
		      </form>
	      </div>
	     </div> <!-- /container -->
	     <p class="form-signin" style="text-align: center">
	     	<?php if(isset($file) && $file != "") { ?>
	     	<a href="<?php echo $file ?>" download>Il tuo file è pronto, clicca qui per scaricarlo.</a>
	     	<?php } ?>
	     </p>

	     <p class="form-signin" style="text-align: center">
	     Sviluppato da Domenico Ceccarelli: <br>
	     	<a href="https://github.com/riddik14" target="_blank"><img src="https://opengraph.githubassets.com/bb8c745e5950a6cc143c2bd45f2d54b33d831776d08b2f34e0788da701b1b2e4/riddik14/hassio-package-consumi" style="width: 100%"></a>

	     </p>
	     <script>
	     	
	     	function showExportForm(){

	     		$("#export_form").slideToggle();

	     	}     	


	     </script>

  	</body>
</html>

