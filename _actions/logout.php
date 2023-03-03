<?php

include("../vendor/autoload.php");

use Helpers\Http;

session_start();

unset($_SESSION["user"]);

Http::redirect("/index.php");