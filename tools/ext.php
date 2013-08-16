<?PHP
// create object
$zip = new ZipArchive();   
// open archive 
if ($zip->open('dede.zip') !== TRUE) {
    die ("Could not open archive");
}


// extract contents to destination directory
$zip->extractTo('/home/vol11/0fees.net/fees0_12560993/htdocs/dede/');

// close archive
// print success message
$zip->close();    
echo "Archive extracted to directory";
?>
