<?php require 'auth.php';
if($_SERVER['REQUEST_METHOD']=='POST'&&csrf_ok()){
 if(isset($_POST['del'])) q("DELETE FROM services WHERE id=?",[(int)$_POST['del']]);
 elseif(trim($_POST['title']??'')){$img=null;
  if(!empty($_FILES['photo']['tmp_name'])&&$_FILES['photo']['size']<3e6&&in_array(mime_content_type($_FILES['photo']['tmp_name']),['image/jpeg','image/png','image/webp'])){
   $ext=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'][mime_content_type($_FILES['photo']['tmp_name'])];$fn='uploads/services/'.bin2hex(random_bytes(6)).'.'.$ext;move_uploaded_file($_FILES['photo']['tmp_name'],'../'.$fn);$img=$fn;}
  q("INSERT INTO services(category_id,title,icon,description,image_path) VALUES(?,?,?,?,?)",[(int)$_POST['cat']?:null,$_POST['title'],$_POST['icon']?:'🔧',$_POST['description'],$img]);}}
$rows=q("SELECT * FROM services ORDER BY sort_order,id")->fetchAll();$cats=q("SELECT * FROM service_categories")->fetchAll();ahead('Services'); ?>
<h2>Services</h2><form method="post" enctype="multipart/form-data" class="glass form mb-4"><?=csrf_field()?><div class="row g-2"><div class="col-md-5"><input name="title" placeholder="Title" required></div><div class="col-md-2"><input name="icon" placeholder="Emoji"></div><div class="col-md-5"><select name="cat"><?php foreach($cats as $c) echo '<option value="'.$c['id'].'">'.e($c['name']).'</option>'; ?></select></div><div class="col-12"><textarea name="description" rows="2" placeholder="Description"></textarea></div><div class="col-md-8"><input type="file" name="photo" accept="image/*"></div><div class="col-md-4"><button class="btn-g w-100">Add service</button></div></div></form>
<table class="table"><?php foreach($rows as $r): ?><tr><td><?=$r['icon']?> <?=e($r['title'])?></td><td><form method="post" onsubmit="return confirm('Delete this service?')"><?=csrf_field()?><button name="del" value="<?=$r['id']?>" class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr><?php endforeach ?></table></div></body></html>
