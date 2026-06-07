<?php
$conect = new PDO("mysql:host=db;dbname=trabalhocruds;charset=utf8", "root", "root");
$conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
