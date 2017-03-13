<?php

function getMetisVersion()
{
  exec('git describe --always',$version_mini_hash);
  exec('git rev-list HEAD | wc -l',$version_number);
  exec('git log -1',$line);
  $metisVersion['short'] = "v1.".trim($version_number[0]).".".$version_mini_hash[0];
  $metisVersion['full'] = "v1.".trim($version_number[0]).".$version_mini_hash[0] (".str_replace('commit ','',$line[0]).")";
  return $metisVersion;
}

$metisVersion = getMetisVersion();

?>
