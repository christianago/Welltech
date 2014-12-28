<?php 
if ( !isset($_GET['user']) || $_GET['user'] != 'mK98wmEh8KG9MUUL' ){
	header('Location: index.php');
	exit(0);
}

require_once 'config.php';
$stmt = $dbh->prepare("SELECT id, title, lang FROM pages ORDER BY filename");
$stmt->execute();
$result = $stmt->fetchAll();
$titles = array();
$ids = array();

foreach($result as $k=>$v){
	$lang = 'ENGLISH';
	if ( $v['lang'] == 1 ) $lang = 'ΕΛΛΗΝΙΚΑ';
	$titles[] = $v['title'].' - '.$lang;
	$ids[] = $v['id'];
}

$dbh = null;

?>

<!DOCTYPE html>
<head>
<title>Admin</title>
<meta charset="UTF-8" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/admin.css" />

</head>
<body>

<div class="container">

<table id="header" height="67" border="0" cellpadding="0" cellspacing="0">
	<tr><td width="380" height="67"><div align="left"><img src="image/logo.gif" width="165" height="50" border="0"></td></tr>
</table>
	
<br/>

	<div class="row">
	
		<div class="form-group col-xs-6">
		
			<label for="select-text" class="col-xs-12">Επιλέξτε σελίδα:</label>
			<select class="form-control" id="select-text" name="select-text">
				<option value="0">-</option>
	        	<?php foreach($titles as $k=>$v){ echo "<option value=".$ids[$k].">$v</option>"; } ?>  
	         </select>
	         
	         <br/>
	     </div>
         
         <div class="form-group col-xs-12">
		     <textarea class="form-control" name="update-text" rows="22"></textarea>
		 </div>
		 
		 <div class="form-group col-xs-12" align="right">
		 	<button type="button" id="submit-text" class="btn btn-default submit-btn">Αποθήκευση</button>
		 </div>
	
	</div>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

tinymce.init({
	selector: "textarea",
	entity_encoding: "raw"
});

$(document).ready(function(){
	
	$(this).on('change', '#select-text', function(){
		var opt = parseInt($(this).find('option:selected').val());
		if ( opt == 0 ) return; 
		
		 $.ajax({
             data:{'mode':1, 'option': opt},
             type: 'post',
             url: 'admin-option.php',
             success: function(data){   
                 //console.log('success: '+data);
                 tinyMCE.activeEditor.setContent(data);
             }
         });
	});


	$(this).on('click', '#submit-text', function(){
		var opt = parseInt($('#select-text').find('option:selected').val());
		if ( opt == 0 ) return; 

		var text = tinyMCE.activeEditor.getContent();

		$.ajax({
            data:{'mode':2, 'text': text, 'option': opt},
            type: 'post',
            url: 'admin-option.php',
            success: function(data){ 
                console.log(data);
                if ( data == '1' ) {
                    var d = new Date();
                    document.title = 'Saved '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
                } else{
                	console.log('error: '+data);
                }
            }, 
            error: function(data){ 
            	console.log('error: '+data);
            }
            
        });

	});

});
		         	

</script>
</body>
</html>

