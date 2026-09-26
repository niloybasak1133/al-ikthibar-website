<?php require 'auth.php'; $S=['new','confirmed','in_progress','completed','cancelled'];
if($_SERVER['REQUEST_METHOD']=='POST'&&csrf_ok()&&in_array($_POST['status'],$S)) q("UPDATE bookings SET status=? WHERE id=?",[$_POST['status'],(int)$_POST['id']]);
$f=$_GET['s']??'';$rows=q("SELECT b.*,s.title FROM bookings b LEFT JOIN services s ON s.id=b.service_id".($f?" WHERE b.status=?":"")." ORDER BY b.booking_date DESC,b.booking_time",$f?[$f]:[])->fetchAll();
ahead('Bookings'); ?>
<h2>Bookings</h2><p><a class="chip" href="index.php">All</a><?php foreach($S as $x) echo '<a class="chip '.($f==$x?'on':'').'" href="?s='.$x.'">'.$x.'</a>'; ?></p>
<div class="table-responsive"><table class="table"><tr><th>Customer</th><th>Vehicle</th><th>Service</th><th>When</th><th>Status</th></tr>
<?php foreach($rows as $r): ?><tr><td><?=e($r['customer_name'])?><br><a href="<?=wa(preg_replace('/\D/','',$r['phone']))?>" target="_blank"><?=e($r['phone'])?></a></td><td><?=e($r['vehicle'])?></td><td><?=e($r['title'])?></td><td><?=e($r['booking_date'].' '.substr($r['booking_time'],0,5))?></td>
<td><form method="post" class="d-flex gap-2"><?=csrf_field()?><input type="hidden" name="id" value="<?=$r['id']?>"><select name="status" class="form-select form-select-sm"><?php foreach($S as $x) echo '<option '.($x==$r['status']?'selected':'').'>'.$x.'</option>'; ?></select><button class="btn btn-sm btn-warning">Save</button></form></td></tr><?php endforeach; if(!$rows) echo '<tr><td colspan=5>No bookings yet.</td></tr>'; ?></table></div></div></body></html>
