<?php

session_start();

unset($_SESSION['login']);
header('location:/gerenciador/paginas/login');
