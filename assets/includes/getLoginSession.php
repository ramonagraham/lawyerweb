<?php
/**
 * Created by PhpStorm.
 * User: Hillary
 * Date: 3/15/2017
 * Time: 6:55 PM
 */
  session_start();
  $currentSession = isset($_SESSION['login_user']) ? true : false;
  echo json_encode($currentSession);
 ?>