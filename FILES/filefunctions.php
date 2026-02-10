<?php

echo "<h2>PHP File Functions Demo</h2>";

$file = "sample.txt";

echo "<h3>1. File Read / Write</h3>";

/* file_put_contents() - create/write file */
file_put_contents($file, "Hello Students\n");

/* fopen() and fwrite() */
$handle = fopen($file, "a");  
fwrite($handle, "This is new line using fwrite()\n");
fclose($handle);

/* fread() */
$handle = fopen($file, "r");
$content = fread($handle, filesize($file));
echo nl2br($content);
fclose($handle);

/* file_get_contents() */
echo "<br><b>Using file_get_contents():</b><br>";
echo nl2br(file_get_contents($file));

/* file() function */
echo "<br><b>Using file() function:</b><br>";
$lines = file($file);
foreach($lines as $line)
{
    echo $line."<br>";
}

echo "<hr>";

echo "<h3>2. File Information</h3>";

echo "File exists: ".(file_exists($file) ? "Yes":"No")."<br>";
echo "File size: ".filesize($file)." bytes<br>";
echo "File type: ".filetype($file)."<br>";
echo "Last access time: ".date("Y-m-d H:i:s", fileatime($file))."<br>";
echo "Last modified time: ".date("Y-m-d H:i:s", filemtime($file))."<br>";
echo "Created time: ".date("Y-m-d H:i:s", filectime($file))."<br>";
echo "Permissions: ".fileperms($file)."<br>";
echo "Owner: ".fileowner($file)."<br>";
echo "Group: ".filegroup($file)."<br>";
echo "Inode: ".fileinode($file)."<br>";

echo "<hr>";

echo "<h3>3. File & Folder Management</h3>";

/* copy file */
copy($file,"copy.txt");
echo "File copied<br>";

/* rename file */
rename("copy.txt","renamed.txt");
echo "File renamed<br>";

/* check file */
if(is_file("renamed.txt"))
{
    echo "renamed.txt is a file<br>";
}

/* create directory */
if(!is_dir("testfolder"))
{
    mkdir("testfolder");
    echo "Folder created<br>";
}

/* directory check */
if(is_dir("testfolder"))
{
    echo "testfolder is directory<br>";
}

echo "<hr>";

echo "<h3>4. Directory Handling</h3>";

/* scandir() */
$files = scandir(".");
echo "Files using scandir():<br>";

foreach($files as $f)
{
    echo $f."<br>";
}

/* opendir() */
echo "<br>Using opendir():<br>";

$dir = opendir(".");
while(($dirfile = readdir($dir)) !== false)
{
    echo $file."<br>";
}
closedir($dir);

// current directory //
echo "<br>Current working directory: ".getcwd();

// change directory example //
// chdir("testfolder");

echo "<hr>";

echo "<h3>5. File Locking</h3>";

$handle = fopen($file,"a");

if(flock($handle, LOCK_EX))
{
    fwrite($handle,"Locked writing example\n");
    flock($handle, LOCK_UN);
    echo "File locked and written successfully<br>";
}

fclose($handle);

?>
