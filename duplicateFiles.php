<?php
if(isset($_POST['file_prefix'])) {
	$file_prefix = $_POST['file_prefix'];
} else {
	$file_prefix = '';
}

$file_name = $_POST['file_name'];
$file_ext = trim($_POST['file_ext']);
$names = $_POST['names'];
$names = explode(PHP_EOL, $names);
$names_nb = count($names);

if($names_nb>0) {
	$folder_name = date('Y-m-d H-i-s', time());
	if (!mkdir($folder_name, 0777, true)) {
   		echo "Le dossier n'a pas pu être créé";
   		exit;
	}
}

for($i=0; $i<$names_nb; $i++) {
	$name_clean = trim($names[$i]);
	copy($file_name.$file_ext, $folder_name.'/'.$file_prefix.$name_clean.$file_ext);
}

echo "Les fichiers ont été dupliqués";
exit;
?>
