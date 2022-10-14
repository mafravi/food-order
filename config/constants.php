<?php
session_start();

define('SITEURL', 'http://localhost/food-order/');

try {
  $conn = mysqli_connect('localhost', 'root', '', 'food-order');
} catch (Exception $e) {
  die('connection error');
}
