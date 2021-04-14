<?php
/**
 * Created by PhpStorm.
 * User: Paul Mutai
 * Date: 03/25/2021
 * Time: 6:46 AM
 */

session_start();//session is a way to store information (in variables) to be used across multiple pages.
session_destroy();
header("Location: index.php");//use for the redirection to some page
?>
