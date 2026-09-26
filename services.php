<?php $title='Services'; include 'includes/header.php';
$cats=q("SELECT * FROM service_categories")->fetchAll(); $c=$_GET['cat']??'';
$svc=q("SELECT s.*,c.slug FROM services s LEFT JOIN service_categories c ON c.id=s.category_id WHERE s.is_active=1".($c?" AND c.slug=?":"")." ORDER BY s.sort_order",$c?[$c]:[])->fetchAll(); ?>
<section class="sec wrap"><h2 class="c">Our services</h2><p class="c"><a class="chip <?=$c?'':'on'?>" href="services.php">All</a><?php foreach($cats as $k): ?><a class="chip <?=$c==$k['slug']?'on':''?>" href="?cat=<?=e($k['slug'])?>"><?=e($k['name'])?></a><?php endforeach ?></p>
<div class="grid"><?php foreach($svc as $s): ?><div class="card-s"><?php if($s['image_path']): ?><img src="<?=e($s['image_path'])?>" alt="<?=e($s['title'])?>"><?php else: ?><i><?=$s['icon']?></i><?php endif ?><h3><?=e($s['title'])?></h3><p><?=e($s['description'])?></p><a class="btn-g sm" href="book.php?service=<?=$s['id']?>">Book this service</a></div><?php endforeach; if(!$svc) echo '<p class="c">No services in this category yet.</p>'; ?></div></section>
<?php include 'includes/footer.php' ?>
