<?php
session_start();
require __DIR__.'/../config/db.php';
define('WA','8801537470591'); // owner WhatsApp: +880 1537 470591
function e($s){return htmlspecialchars((string)$s,ENT_QUOTES,'UTF-8');}
function csrf(){return $_SESSION['t']??=bin2hex(random_bytes(16));}
function csrf_field(){return '<input type="hidden" name="_t" value="'.csrf().'">';}
function csrf_ok(){return hash_equals($_SESSION['t']??'',$_POST['_t']??'');}
function wa($n=WA,$m=''){return 'https://wa.me/'.$n.($m?'?text='.rawurlencode($m):'');}
function q($sql,$p=[]){global $pdo;$s=$pdo->prepare($sql);$s->execute($p);return $s;}
