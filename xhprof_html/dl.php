<?php

function done() {
  header("Location: index.php");
  exit();
}

$dir = ini_get('xhprof.output_dir');

if(!is_dir($dir) || empty($_REQUEST['f'])) {
        done();
}

$f = "$dir/".basename($_REQUEST['f']);
if(!file_exists($f)) {
	done();
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".basename($_REQUEST['f']));
fpassthru($f);

