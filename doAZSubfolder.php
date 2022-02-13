<?php

  $scriptbasename = basename(__FILE__);
  chdir(__DIR__);

  $curdir = glob('*');
  foreach ($curdir as $filedir)
  {
    $ufiledir = strtoupper($filedir);
    $ab       = strtoupper(substr($filedir, 0, 1));
    
    if ($ufiledir === $ab)
      continue;
    if ($scriptbasename === $filedir)
      continue;
    
    if (!is_dir($ab))
      mkdir($ab);
    
    if (isset($_SERVER['OS']) && preg_match('/windows/i', $_SERVER['OS']))
      $cmd = 'move "' . $filedir . '" "' . $ab . '/"';
    else
      $cmd = 'mv "' . $filedir . '" "' . $ab . '/"';
    
    echo $cmd . "\n";
    shell_exec($cmd);
  }
