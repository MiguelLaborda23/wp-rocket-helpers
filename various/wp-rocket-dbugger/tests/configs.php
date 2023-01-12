<?php

// Config files viewer
?>

<h2>Config files</h2>
<hr>

<div class="column two-cols">

<?php
 $config_files = array(
         ABSPATH.'.htaccess' => 'config',
         ABSPATH.'wp-config.php' => 'config',
         WP_CONTENT_DIR.'/advanced-cache.php' => 'config',
         WP_ROCKET_CONFIG_PATH.'*.php' => 'config',
 );

 function configs_get_files($config_file, $type)
 {
     $files = new GlobIterator($config_file);
     foreach ($files as $file) {
         if ($file->getFilename() == 'index.html') {
             continue;
         }

         if ($file->getFilename() == 'error_log' || $file->getFilename() == 'debug.log') {
             $class = 'highlighted';
         } elseif ($type == 'config') {
             $class = 'config';
         } else {
             $class = 'found';
         }

         echo "<tr class='$type'>";
         echo "<td><strong><span class='$class'>".$file->getFilename()."</span></strong></td>";
         echo "<td><a title='Load file in viewer' href='?page=wprockettoolset&mode=configs&action=view&view_file=".$file->getPath()."/".$file->getFilename()."&type=configs'>".$file->getPath()."/".$file->getFilename()."</a></td>";
         echo "<td>".gmdate("H:i:s m-d-Y", $file->getMTime())."</td>";
         echo "<td>".wpr_rocket_debug_human_filesize($file->getSize())."</td>";
         echo "<td><a class='button-secondary' title='Load file in viewer' href='?page=wprockettoolset&mode=configs&action=view&view_file=".$file->getPath()."/".$file->getFilename()."&type=configs'><span class='dashicons dashicons-visibility'></span></a> ";

         echo "</td>";

         echo "</tr>";
     }
 };



    echo  "<table class='debugger configs' border='1' cellspacing='0' cellpadding='4' '>";
    echo "<tr class='header'>
    
    <td>file</td>
    <td>path</td>
    <td>date</td>
    <td>size</td>
    <td></td>
    </tr>";

    foreach ($config_files as $config_file => $type) {
        echo configs_get_files($config_file, $type);
    }
    echo  "</table>";


if (isset($_GET['view_file'])) {
    $file = $_GET['view_file'];

    echo "<h3><a href='tools.php?page=wprockettoolset&mode=configs&type=configs'>Back</a> - Viewing <span class='highlighted'>$file</span></h3>";
    echo '<hr>';

    echo '<pre><code class="language-php">';
    echo htmlentities(file_get_contents($file));
    echo '</code></pre>';
}

?>

</div>
