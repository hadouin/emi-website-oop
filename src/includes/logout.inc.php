<?php
error_reporting(0);

session_start();
session_unset();
session_destroy();
header("location: /");
