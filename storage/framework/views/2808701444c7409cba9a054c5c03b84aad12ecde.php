<?php /* D:\xampp\htdocs\batdongsan\resources\views/admin/pages/tintuc/sua.blade.php */ ?>
<?php $__env->startSection('contentadmin'); ?>
<?php if(\Session::has('success')): ?>
      <div class="alert alert-success">
        <p><?php echo e(\Session::get('success')); ?></p>
      </div><br />
     <?php endif; ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(asset('admin/tintuc')); ?>"><button type="button" class="btn btn-secondary">&laquo; Quay lại</button></a>
<p>
<form method="POST" action="<?php echo e(asset('/admin/tintuc/sua')); ?>" enctype="multipart/form-data">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<input type="hidden" id="id" name="id" value="<?php echo e($tintuc->id); ?>">
  <div class="form-group">
    <label>Chọn danh mục tin đăng</label>
  <select class="form-control" id="dmtin" name="dmtin">
    <option value="0">---Chọn danh mục tin đăng---</option>
    <option id="dmtin1" value="Căn hộ/Chung cư">Căn hộ/Chung cư</option>
    <option id="dmtin2" value="Nhà ở">Nhà ở</option>
    <option id="dmtin3" value="Đất">Đất</option>
    <option id="dmtin4" value="Văn phòng, mặt bằng kinh doanh">Văn phòng, mặt bằng kinh doanh</option>
    <option id="dmtin5" value="Phòng trọ">Phòng trọ</option>
  </select>
</div>
<div class="form-group" id="divloaitin" >
  <label>Chọn loại tin đăng</label>
  <select class="form-control" id="loaitin" name="loaitin">
    <option value="0">---Chọn loại tin đăng---</option>
    <option id="loaitincanban" value="Cần bán">Cần bán</option>
    <option id="loaitin2" value="Cho thuê">Cho thuê</option>
    <option id="loaitincanmua" value="Cần mua">Cần mua</option>
    <option id="loaitin4" value="Cần thuê">Cần thuê</option>
  </select>
</div>
<div class="form-group" id="divtinh" >
  <label>Chọn tỉnh thành</label>
  <select class="form-control" id="tinh" name="tinh">
    <option value="0">---Chọn tỉnh thành---</option>
    <?php $__currentLoopData = $tinh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($t->ten == $tintuc->tinh): ?>
      <option id="tinh<?php echo e($t->id); ?>" value="<?php echo e($t->id); ?>" selected="selected" ><?php echo e($t->ten); ?></option>
      <?php else: ?> 
      <option id="tinh<?php echo e($t->id); ?>" value="<?php echo e($t->id); ?>" ><?php echo e($t->ten); ?></option>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>
<div class="form-group" id="divhuyen">
  <label>Chọn quận, huyện</label>
  <select class="form-control" id="huyen" name="huyen">
    <?php $__currentLoopData = $tinh->where('ten',$tintuc->tinh)->first()->dshuyen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($h->ten == $tintuc->huyen): ?>
      <option id="huyen<?php echo e($h->id); ?>" value="<?php echo e($h->id); ?>" selected="selected" ><?php echo e($h->ten); ?></option>
      <?php else: ?> 
      <option id="huyen<?php echo e($h->id); ?>" value="<?php echo e($h->id); ?>" ><?php echo e($h->ten); ?></option>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>
<div class="form-group" id="divxa" >
  <label>Chọn phường, xã</label>
  <select class="form-control" id="xa" name="xa">
     <?php $__currentLoopData = $tinh->where('ten',$tintuc->tinh)->first()->dshuyen->where('ten',$tintuc->huyen)->first()->dsxa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($x->ten == $tintuc->xa): ?>
      <option id="xa<?php echo e($x->id); ?>" value="<?php echo e($x->id); ?>" selected="selected" ><?php echo e($x->ten); ?></option>
      <?php else: ?> 
      <option id="xa<?php echo e($x->id); ?>" value="<?php echo e($x->id); ?>" ><?php echo e($x->ten); ?></option>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>
  <div class="form-group" id="divtenduong" >
    <label>Số nhà, tên đường</label>
    <input type="text" class="form-control" id="tenduong" name="tenduong" value="<?php echo e($tintuc->tenduong); ?>">
  </div>
  <div class="form-group"  id="divloaihinhcanho" style="display: none;">
  <label>Chọn loại hình căn hộ</label>
  <select class="form-control" id="loaihinhcanho" name="loaihinhcanho">
    <option value="0">---Chọn loại hình căn hộ---</option>
    <option value="1">Căn hộ</option>
    <option value="2">Condotel</option>
    <option value="3">Duplex</option>
    <option value="4">Penthouse</option>
  </select>
</div>  
<div class="form-group" id="divloaihinhnhao" style="display: none;">
  <label>Chọn loại hình nhà ở</label>
  <select class="form-control" id="loaihinhnhao" name="loaihinhnhao">
    <option value="0">---Chọn loại hình nhà ở---</option>
    <option value="Nhà ở">Nhà ở</option>
    <option value="Biệt thự">Biệt thự</option>
    <option value="Duplex">Duplex</option>
    <option value="Penthouse">Penthouse</option>
  </select>
</div>
  <div class="form-group"  id="divloaihinhvanphong" style="display: none;">
  <label>Chọn loại hình văn phòng</label>
  <select class="form-control" id="loaihinhvanphong" name="loaihinhvanphong">
    <option value="0">---Chọn loại hình văn phòng---</option>
    <option value="1">Shophouse</option>
    <option value="2">Officetel</option>
    <option value="3">Văn phòng, mặt bằng kinh doanh</option>
  </select>
</div>
<div class="form-group" id="divnohau" style="display: none;">
<label class="checkbox-inline">
  <?php if($tintuc->nohau =="Nở hậu" ): ?>
  <input type="checkbox" name="nohau" value="Nở hậu" checked="checked"> Nở hậu</label>
  <?php else: ?>  
  <input type="checkbox" name="nohau" value="Nở hậu"> Nở hậu</label>
  <?php endif; ?>
</div>
  <div class="form-group" id="divbanla" style="display: none;">
  <label>Bạn là</label><br>
  <label class="radio-inline">
    <?php if($tintuc->banla == 'Cá nhân'): ?>
    <input type="radio" name="banla" value="Cá nhân" checked="checked" > Cá nhân</label><br>
    <?php else: ?>
    <input type="radio" name="banla" value="Cá nhân" > Cá nhân</label><br>
    <?php endif; ?>
  <label class="radio-inline">
    <?php if($tintuc->banla == 'Môi giới'): ?>
    <input type="radio" name="banla" value="Môi giới" checked="checked"> Môi giới</label>
    <?php else: ?>
    <input type="radio" name="banla" value="Môi giới"> Môi giới</label>
    <?php endif; ?>
</div>
    <div class="form-group" id="divgia" >
    <label>Giá</label>
    <input type="number" class="form-control col-sm-3 col-md-6 col-lg-4" name="gia" value="<?php echo e($tintuc->gia); ?>">
  </div>
<div class="form-group" id="divpngu">
    <label>Số phòng ngủ</label>
    <input type="number" class="form-control col-sm-3 col-md-6 col-lg-4" name="pngu" value="<?php echo e($tintuc->pngu); ?>">
  </div>
  <div class="form-group" id="divpvsinh" >
    <label>Số phòng vệ sinh</label>
    <input type="number" class="form-control col-sm-3 col-md-6 col-lg-4" name="pvsinh" value="<?php echo e($tintuc->pvsinh); ?>">
  </div>
  <div class="form-group"  id="divdientich">
    <label>Diện tích</label>
    <input type="number" class="form-control col-sm-3 col-md-6 col-lg-4" name="dientich" value="<?php echo e($tintuc->dientich); ?>">
  </div>
<div class="form-group" id="divddnhadat">
  <label>Đặc điểm nhà đất</label> <br>
  <label class="radio-inline">
    <?php if($tintuc->ddnhadat == "Hẻm xe hơi"): ?>
    <input type="radio" name="ddnhadat" value="Hẻm xe hơi" checked="checked"> Hẻm xe hơi</label><br>
    <?php else: ?>
    <input type="radio" name="ddnhadat" value="Hẻm xe hơi"> Hẻm xe hơi</label><br>
    <?php endif; ?>
  <label class="radio-inline">
    <?php if($tintuc->ddnhadat == "Mặt tiền"): ?>
    <input type="radio" name="ddnhadat" value="Mặt tiền" checked="checked"> Mặt tiền</label>
    <?php else: ?>
    <input type="radio" name="ddnhadat" value="Mặt tiền"> Mặt tiền</label>
    <?php endif; ?>
</div>

  <div class="form-group"  id="divhuong" style="display: none;">
  <label>Chọn hướng</label>
  <select class="form-control" id="huong" name="huong">
    <option value="0">---Chọn hướng---</option>
    <option value="Đông">Đông</option>
    <option value="Tây">Tây</option>
    <option value="Nam">Nam</option>
    <option value="Bắc">Bắc</option>
  </select>
</div>
  <div class="form-group"  id="divgtpl" style="display: none;">
  <label>Chọn giấy tờ pháp lý</label>
  <select class="form-control" id="gtpl" name="gtpl">
    <option value="0">---Chọn giấy tờ pháp lý---</option>
    <option value="Đã có sổ đỏ/sổ hồng">Đã có sổ đỏ/sổ hồng</option>
    <option value="Đang chờ bàn giao sổ">Đang chờ bàn giao sổ</option>
    <option value="Giấy tay, giấy tờ khác">Giấy tay, giấy tờ khác</option>
  </select>
</div>
  <div class="form-group">
    <label>Tiêu đề tin</label>
    <input type="text" class="form-control" name="tieude" value="<?php echo e($tintuc->tieude); ?>">
  </div>
  <div class="form-group">
    <label>Nội dung tin</label>
    <textarea class="form-control" rows="5" id="noidung" name="noidung"><?php echo e($tintuc->noidung); ?></textarea>
  </div>

  <div class="form-group">
    <label>Hình ảnh tin</label>
    <div class="row" id="hinhanh">
    <?php if(isset($tintuc->hinhanh)): ?>
    <?php $i=0; ?>
    <?php $__currentLoopData = $tintuc->hinhanh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hinh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div  class="column" style="margin: 0px 10px 10px 10px;">
        <img width="200px" height="100px" src="data:image/x-icon;base64, <?php echo e($hinh); ?> "/>
        <p><button type="button" class="btn btn-danger" style="width: 100%;margin-top: 5px;" value="<?php echo e($i++); ?>" onclick="xoahinh(this)">Xóa hình</button></p>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </div>
    <p></p>
    <input type="file" class="form-control" name="hinhanh[]" multiple="true">
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  var dmtin,loaitin,tinh,huyen,xa;
  //--------------------------------------
  function xoahinh(e){
    var tin = $('#id').val();
    if(confirm("Bạn chắc chắn muốn xóa hình này không?") == true){
      var url = base_url+'/admin/tintuc/xoahinh/'+tin+'/'+e.value;
      $.ajax({
        type : 'get',
        url : url,
        // data : data,
        dataType : 'json',    
        success:function(data)
        {
          if($.isEmptyObject(data.error)){
            alert("Xóa thành công");
            document.getElementById('hinhanh').innerHTML = '';
            for (var i = 0; i < data.length; i++) {
              document.getElementById('hinhanh').innerHTML += 
              "<div class='column' style='margin: 0px 10px 10px 10px;'>"+
              "<img width='200px' height='100px' src='data:image/x-icon;base64, "+data[i]+ "'/><br>"+
        "<button type='button' class='btn btn-danger' style='width: 100%;margin-top: 5px;' value='"+i+"' onclick='xoahinh(this)''>Xóa</button></div>";   
            }
          }else{
            alert('Lỗi! Không thể xóa');
          }
          
        }
      });
    }
  }
// --------------------------------------
 $("#dmtin").change(function(){
  dmtin = $("#dmtin").val();
  if(dmtin != 0){
    $("#loaitin").val("0");
    document.getElementById("divloaitin").style.display = "";
    document.getElementById("divnohau").style.display = "";
    document.getElementById("divhuong").style.display = "";
    document.getElementById("divgtpl").style.display = "";
    document.getElementById("divpngu").style.display = "";
    document.getElementById("divpvsinh").style.display = "";
    document.getElementById("divddnhadat").style.display = "";
    if(dmtin == 'Phòng trọ'){
      document.getElementById("loaitincanban").style.display = "none";
      document.getElementById("loaitincanmua").style.display = "none";
      document.getElementById("divloaihinhcanho").style.display = "none";
      document.getElementById("divloaihinhnhao").style.display = "none";
      document.getElementById("divloaihinhvanphong").style.display = "none";
      document.getElementById("divpngu").style.display = "none";
      document.getElementById("divpvsinh").style.display = "none";
    }else{
      document.getElementById("loaitincanban").style.display = "";
      document.getElementById("loaitincanmua").style.display = "";
    }
    if(dmtin == 'Căn hộ/Chung cư'){
      document.getElementById("divloaihinhcanho").style.display = "";
      document.getElementById("divloaihinhnhao").style.display = "none";
      document.getElementById("divloaihinhvanphong").style.display = "none";
    }
    else if(dmtin == 'Nhà ở'){
      document.getElementById("divloaihinhnhao").style.display = "";
      document.getElementById("divloaihinhcanho").style.display = "none";
      document.getElementById("divloaihinhvanphong").style.display = "none";
    }
    else if(dmtin == 'Văn phòng, mặt bằng kinh doanh'){
      document.getElementById("divloaihinhvanphong").style.display = "";
      document.getElementById("divloaihinhcanho").style.display = "none";
      document.getElementById("divloaihinhnhao").style.display = "none";
    }
    else if(dmtin == 'Đất'){
      document.getElementById("divloaihinhvanphong").style.display = "none";
      document.getElementById("divloaihinhcanho").style.display = "none";
      document.getElementById("divloaihinhnhao").style.display = "none";
      document.getElementById("divddnhadat").style.display = "";
    }
  }else{
    document.getElementById("divloaitin").style.display = "none";
  }  
}); 
 // --------------------------------------
 $("#loaitin").change(function(){
  loaitin = $("#loaitin").val();
  if(loaitin != 0){
    document.getElementById("divtinh").style.display = "";
  }else{
    document.getElementById("divtinh").style.display = "none";
  }  
});
// --------------------------------------
 $("#tinh").change(function(){
  tinh = $('#tinh').val();
  var url = base_url+'admin/diadiem/getdshuyen/'+tinh;
  if(tinh != 0){
    $.ajax({
      type : 'get',
      url : url,
      // data : data,
      dataType : 'json',    
      success:function(data)
      {
        console.log(data);
        if($.isEmptyObject(data.error))
        {
          $('#huyen').empty();
          var huyen = document.getElementById("huyen");
          var option = document.createElement("option");
          option.text = "---Chọn quận, huyện---";
          option.value = '0';
          huyen.add(option);
          for (i = 0; i < data.length; i++) { 
            option = document.createElement("option");
            option.text = data[i]['ten'];
            option.value = data[i]['id'];
            huyen.add(option);
          }
          document.getElementById("divhuyen").style.display = "";
        }
     }
   });
    
  }else{
    document.getElementById("divhuyen").style.display = "none";
  }
});
 $("#huyen").change(function(){
  huyen = $("#huyen").val();
  var url = base_url+'/admin/diadiem/getdsxa/'+tinh+'/'+huyen;
  if(huyen != 0){
    $.ajax({
      type : 'get',
      url : url,
      // data : data,
      dataType : 'json',    
      success:function(data)
      {
        console.log(data);
        if($.isEmptyObject(data.error))
        {
          $('#xa').empty();
          var xa = document.getElementById("xa");
          var option = document.createElement("option");
          option.text = "---Chọn phường, xã---";
          option.value = '0';
          xa.add(option);
          for (i = 0; i < data.length; i++) { 
            option = document.createElement("option");
            option.text = data[i]['ten'];
            option.value = data[i]['id'];
            xa.add(option);
          }
          document.getElementById("divxa").style.display = "";
        }
     }
   });    
  }else{
    document.getElementById("divxa").style.display = "none";
  }
});
 $("#xa").change(function(){
    xa = $("#xa").val();
    if(xa != 0){
      document.getElementById("divtenduong").style.display = "";
    }else{
      document.getElementById("divtenduong").style.display = "none";
    }
});
 $("#tenduong").change(function(){
    tenduong = $("#tenduong").val();
    if(tenduong.length != 0){
      document.getElementById("divbanla").style.display = "";
      document.getElementById("divgia").style.display = "";
      document.getElementById("divpngu").style.display = "";
      document.getElementById("divpvsinh").style.display = "";
      document.getElementById("divdientich").style.display = "";
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>