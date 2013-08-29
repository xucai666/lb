<?PHP
// create object
$zip = new ZipArchive();   
// open archive 
$path = realpath(dirname(__file__).'/..');

if ($zip->open($path.DIRECTORY_SEPARATOR.'lb.zip') !== TRUE) {
    die ("Could not open archive");
}


// extract contents to destination directory
$zip->extractTo($path);

// close archive
// print success message
$zip->close();    
echo "Archive extracted to directory";
?>
