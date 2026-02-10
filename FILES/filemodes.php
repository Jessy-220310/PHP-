<?php

echo "<h2>PHP File Operation Modes Demo</h2>";

$file = "modefile.txt";



// 1. w mode

echo "<h3>1. w mode (Write only - overwrite)</h3>";

$h = fopen($file, "w") or die("Cannot open file");
fwrite($h, "Using w mode\n");
fclose($h);

echo "File created/overwritten using w mode<br><br>";



// 2. a mode

echo "<h3>2. a mode (Append)</h3>";

$h = fopen($file, "a") or die("Cannot open file");
fwrite($h, "Using a mode\n");
fclose($h);

echo "Data appended<br><br>";



// 3. r mode

echo "<h3>3. r mode (Read only)</h3>";

$h = fopen($file, "r") or die("File does not exist");
$content = fread($h, filesize($file));
echo nl2br($content);
fclose($h);

echo "<br><br>";



// 4. x mode

echo "<h3>4. x mode (Create new file only)</h3>";

$newfile = "newmodefile.txt";

if(!file_exists($newfile))
{
    $h = fopen($newfile, "x") or die("Cannot create file");
    fwrite($h, "Created using x mode");
    fclose($h);
    echo "New file created using x mode<br><br>";
}
else
{
    echo "File already exists, x mode skipped<br><br>";
}



// 5. r+ mode

echo "<h3>5. r+ mode (Read & Write)</h3>";

$h = fopen($file, "r+") or die("Cannot open file");
fwrite($h, "R+ start\n");
fclose($h);

echo "r+ mode used<br><br>";



// 6. w+ mode

echo "<h3>6. w+ mode (Read & Write - overwrite)</h3>";

$h = fopen($file, "w+") or die("Cannot open file");
fwrite($h, "Using w+ mode\n");
fclose($h);

echo "w+ overwrote file<br><br>";



// 7. a+ mode

echo "<h3>7. a+ mode (Read & Append)</h3>";

$h = fopen($file, "a+") or die("Cannot open file");
fwrite($h, "Using a+ mode\n");
fclose($h);

echo "a+ appended data<br><br>";



// 8. x+ mode

echo "<h3>8. x+ mode (Create new read/write file)</h3>";

$newfile2 = "newmodefile2.txt";

if(!file_exists($newfile2))
{
    $h = fopen($newfile2, "x+") or die("Cannot create file");
    fwrite($h, "Created with x+ mode");
    fclose($h);
    echo "x+ created new file<br>";
}
else
{
    echo "File already exists, x+ mode skipped<br>";
}

?>
