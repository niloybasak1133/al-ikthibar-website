<?php $title='Book Appointment'; include 'includes/header.php';
$svcs=q("SELECT id,title FROM services WHERE is_active=1 ORDER BY sort_order")->fetchAll();
$shops=q("SELECT * FROM shops WHERE is_active=1 ORDER BY sort_order")->fetchAll();
$err=[];$done=null;$v=$_POST;
if($_SERVER['REQUEST_METHOD']=='POST'){
 if(!csrf_ok())$err[]='Session expired. Please try again.';
 $n=trim($v['name']??'');$p=trim($v['phone']??'');$d=$v['date']??'';$t=$v['time']??'';
 if(strlen($n)<2)$err[]='Enter your name.';
 if(!preg_match('/^\+?[0-9 ]{7,16}$/',$p))$err[]='Enter a valid phone number.';
 if(!preg_match('/^\d{4}-\d{2}-\d{2}$/',$d)||$d<date('Y-m-d'))$err[]='Choose a date from today onwards.';
 if(!preg_match('/^\d{2}:\d{2}$/',$t)||$t<'09:00'||$t>'20:00')$err[]='Choose a time between 9 AM and 8 PM.';
 if(!$err){
  q("INSERT INTO bookings(customer_name,phone,email,vehicle,service_id,shop_id,booking_date,booking_time,notes) VALUES(?,?,?,?,?,?,?,?,?)",[$n,$p,$v['email']??'',$v['vehicle']??'',(int)$v['service']?:null,(int)$v['shop']?:null,$d,$t,$v['notes']??'']);
  $sn=q("SELECT title FROM services WHERE id=?",[(int)$v['service']])->fetchColumn();
  $done=wa(WA,"New booking #".$GLOBALS['pdo']->lastInsertId()."\nName: $n\nPhone: $p\nVehicle: ".($v['vehicle']??'')."\nService: $sn\nDate: $d $t\nNotes: ".($v['notes']??''));
 }}
$sel=(int)($_GET['service']??$v['service']??0); ?>
<section class="sec wrap narrow"><h2 class="c">Book an appointment</h2>
<?php if($done): ?><div class="glass c"><h3>✅ Booking received</h3><p>Tap below to send the details to our team on WhatsApp so we can confirm quickly.</p><a class="btn-g" id="wa-go" href="<?=e($done)?>" target="_blank">Send on WhatsApp</a></div>
<?php else: foreach($err as $x) echo '<div class="alert alert-danger">'.e($x).'</div>'; ?>
<form method="post" class="glass form" novalidate><?=csrf_field()?><div class="row g-3">
<div class="col-md-6"><label>Name</label><input name="name" required value="<?=e($v['name']??'')?>"></div>
<div class="col-md-6"><label>Phone</label><input name="phone" required value="<?=e($v['phone']??'')?>"></div>
<div class="col-md-6"><label>Email (optional)</label><input type="email" name="email" value="<?=e($v['email']??'')?>"></div>
<div class="col-md-6"><label>Vehicle (make, model, year)</label><input name="vehicle" value="<?=e($v['vehicle']??'')?>"></div>
<div class="col-md-6"><label>Service</label><select name="service"><?php foreach($svcs as $s): ?><option value="<?=$s['id']?>" <?=$sel==$s['id']?'selected':''?>><?=e($s['title'])?></option><?php endforeach ?></select></div>
<div class="col-md-6"><label>Shop</label><select name="shop"><?php foreach($shops as $s): ?><option value="<?=$s['id']?>"><?=e($s['shop_label'])?></option><?php endforeach ?></select></div>
<div class="col-md-6"><label>Date</label><input name="date" id="date" placeholder="Select date" value="<?=e($v['date']??'')?>"></div>
<div class="col-md-6"><label>Time (9 AM – 8 PM)</label><input name="time" id="time" placeholder="Select time" value="<?=e($v['time']??'')?>"></div>
<div class="col-12"><label>Notes (optional)</label><textarea name="notes" rows="3"><?=e($v['notes']??'')?></textarea></div>
<div class="col-12"><button class="btn-g w-100">Confirm booking</button></div></div></form><?php endif ?></section>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"><script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>flatpickr('#date',{minDate:'today',dateFormat:'Y-m-d'});flatpickr('#time',{enableTime:true,noCalendar:true,dateFormat:'H:i',minTime:'09:00',maxTime:'20:00',time_24hr:false});</script>
<?php include 'includes/footer.php' ?>
