<?php 
session_start();
session_unset();
header("Location: ../userview/index.html");