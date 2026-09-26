<?php require_once __DIR__.'/functions.php'; $cur=basename($_SERVER['SCRIPT_NAME']); ?>
<!doctype html><html lang="en" data-bs-theme="dark"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=e($title??'Al Ikthibar Repair')?> | Car Repair Abu Dhabi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;800&family=Barlow:wght@400;500;600&display=swap" rel="stylesheet">
<link href="assets/style.css" rel="stylesheet"></head><body>
<nav class="nav"><div class="wrap d-flex align-items-center justify-content-between">
<a href="index.php" class="brand"><span class="logo">🔧</span><span>Al Ikthibar Repair<small>UAE car specialists</small></span></a>
<button class="burger" onclick="document.body.classList.toggle('open')" aria-label="Menu">☰</button>
<div class="links"><?php foreach(['index.php'=>'Home','index.php#about'=>'About','services.php'=>'Services','book.php'=>'Book','contact.php'=>'Contact'] as $u=>$l): ?><a href="<?=$u?>" class="<?=$cur==$u?'on':''?>"><?=$l?></a><?php endforeach ?></div></div></nav>
<div class="float"><a class="fc call" href="tel:+<?=WA?>" aria-label="Call">📞</a><a class="fc wa" href="<?=wa()?>" target="_blank" aria-label="WhatsApp">💬</a></div>
