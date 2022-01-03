<?php
// including constants files
include_once __DIR__ . '/../config/constants.php';

spl_autoload_register('myAutoLoader');

function myAutoLoader($classname)
{
  $full_path = CLASSPATH . $classname . 'Class.php';
  if (!file_exists($full_path)) {
    return false;
  }
  include_once $full_path;
}


/* Helper function */
function filepath($filename)
{
  return __DIR__.'/../includes/'.$filename.'.php';
}

function base_url($url)
{
  return trim(BASEURL, '/') . '/' . trim($url, '/');
}

//start session 
session_start();

function getFlashData($tag)
{
  $msg = NULL;
  if (isset($_SESSION[$tag])) {
    $msg = $_SESSION[$tag];
    unset($_SESSION[$tag]);
  }
  return $msg;
}

function setFlashData($tag, $msg)
{
  $_SESSION[$tag] = $msg;
}
