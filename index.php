<?php $title='Home'; include 'includes/header.php';
$slides=q("SELECT * FROM hero_slides WHERE is_active=1 ORDER BY sort_order")->fetchAll();
$svc=q("SELECT * FROM services WHERE is_active=1 ORDER BY sort_order LIMIT 6")->fetchAll();
$stats=q("SELECT * FROM about_stats ORDER BY sort_order")->fetchAll();
$tm=q("SELECT * FROM testimonials WHERE is_approved=1 LIMIT 3")->fetchAll(); ?>
<header class="hero" id="slider"><?php foreach($slides as $i=>$s): ?>
<div class="slide <?=$i?'':'active'?>" style="<?=$s['image_path']?'background-image:linear-gradient(90deg,#0a1224ee,#0a122488),url('.e($s['image_path']).')':''?>"><div class="wrap"><span class="tag">⚡ Expert automotive care</span><h1><?=e($s['headline'])?></h1><p><?=e($s['subtext'])?></p><a class="btn-g" href="book.php">Book appointment</a> <a class="btn-w" href="<?=wa()?>" target="_blank">💬 WhatsApp us</a></div></div><?php endforeach ?>
<button class="arr l" data-d="-1">←</button><button class="arr r" data-d="1">→</button><div class="dots"></div></header>
<section class="wrap strip"><?php foreach($stats as $s): ?><div><b data-n="<?=e($s['stat_value'])?>"><?=e($s['stat_value'])?></b><span><?=e($s['stat_label'])?></span></div><?php endforeach ?></section>
<section class="sec wrap" id="about"><div class="row g-5 align-items-center"><div class="col-lg-6"><h2>Your reliable workshop in Abu Dhabi</h2><p>Al Ikthibar Repair is a premier automotive workshop in the heart of Niloys Industrial Area. With two fully-equipped service centres, we provide complete repair and maintenance for all makes and models.</p><p>Our certified technicians bring years of hands-on experience in electrical systems, ECU diagnostics and airbag repair.</p><span class="chip">✓ Certified technicians</span><span class="chip">✓ Honest pricing</span><span class="chip">✓ Fast turnaround</span></div>
<div class="col-lg-6"><div class="glass why"><h3>Why drivers choose us</h3><p>🔍 Full diagnosis before any work starts</p><p>💬 Live updates on WhatsApp</p><p>💰 Price agreed before repair</p><p>🚗 All vehicle makes and models</p></div></div></div></section>
<section class="sec wrap"><h2 class="c">Our services</h2><div class="grid"><?php foreach($svc as $s): ?><a class="card-s" href="book.php?service=<?=$s['id']?>"><i><?=$s['icon']?></i><h3><?=e($s['title'])?></h3><p><?=e($s['description'])?></p></a><?php endforeach ?></div><p class="c mt-4"><a class="btn-w" href="services.php">All services</a></p></section>
<section class="sec wrap"><h2 class="c">What customers say</h2><div class="grid"><?php foreach($tm as $t): ?><div class="glass"><p class="star"><?=str_repeat('★',$t['rating'])?></p><p>“<?=e($t['comment'])?>”</p><b>— <?=e($t['customer_name'])?></b></div><?php endforeach ?></div></section>
<section class="cta"><h2>Car giving you trouble?</h2><p>Pick a time and we will be ready for you.</p><a class="btn-g" href="book.php">Book appointment</a></section>
<?php include 'includes/footer.php' ?>
