<?php 

class MyLib
{
    public function getFileContents($filename)
    {
        if ($filename == '') {
            echo 'Error: no filename given!' . PHP_EOL;
            die();
        }
        $handle = fopen($filename, 'r');
        if ($handle === false) {
            echo "Error: cant find $filename\n";
            die();
        }
        $contents = trim(fread($handle, filesize($filename) ) );
        fclose($handle);
        return $contents;
    }

    public function getQueryResults($dbc, $query)
    {
        return $dbc->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function escape($string)
    {
        return htmlspecialchars(strip_tags($string));
    }
}

