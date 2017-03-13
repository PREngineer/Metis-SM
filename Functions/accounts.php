<?php

function encrypt($text)
{
  return hash('sha256',SHA1(MD5($text)));
}

function checkCredentials($username, $password)
{
  $fp = fopen('Data/login.db', 'r');
  $creds = fread( $fp, filesize('Data/login.db') );
  fclose($fp);

  $creds = explode(",", $creds);

  //print "Username is: ".$creds[0];
  //print '<br>';
  //print "Password is: ".$creds[1];

  if( $creds[0] === encrypt($username) && $creds[1] === encrypt($password) )
  {
    return true;
  }
  else
  {
    return false;
  }
}

function storeCredentials($username, $password)
{
  $user = encrypt($username);
  $pass = encrypt($password);
  //print 'Username: '.$user;
  //print '<br>';
  //print 'Password: '.$pass;
  $fp = fopen('Data/login.db', 'w');
  fwrite($fp, "$user,$pass");
  fclose($fp);
}


?>
