<?php
session_start();
if(session_destroy())
{
header("Location:index1.html");
exit;
}
?>