<?php $title='Contact'; include 'includes/header.php';
$shops=q("SELECT * FROM shops WHERE is_active=1 ORDER BY sort_order")->fetchAll(); $ok=false;
if($_SERVER['REQUEST_METHOD']=='POST'&&csrf_ok()&&trim($_POST['name']??'')&&trim($_POST['message']??'')){
 q("INSERT INTO contact_messages(name,phone,email,message) VALUES(?,?,?,?)",[$_POST['name'],$_POST['phone']??'',$_POST['email']??'',$_POST['message']]);$ok=true;} ?>
<section class="sec wrap"><h2 class="c">Contact us</h2><div class="row g-4"><div class="col-lg-6">
<?php foreach($shops as $s): ?><div class="glass mb-3"><h3><?=e($s['shop_label'])?></h3><p><?=e($s['address'])?></p><a class="btn-g sm" href="<?=wa($s['whatsapp_number'])?>" target="_blank">💬 Chat with <?=e($s['staff_name'])?></a></div><?php endforeach ?>
<?php if($ok) echo '<div class="alert alert-success">Message sent. We will reply soon.</div>'; ?>
<form method="post" class="glass form"><?=csrf_field()?><h3>Get a quote</h3><label>Name</label><input name="name" required><label>Phone</label><input name="phone"><label>Email</label><input name="email" type="email"><label>Message</label><textarea name="message" rows="3" required></textarea><button class="btn-g mt-3">Send message</button></form></div>
</iframe></div></div></section>
<?php include 'includes/footer.php' ?>
