<?php /* Smarty version 2.6.26, created on 2018-09-10 13:24:44
         compiled from store.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $this->_tpl_vars['lang']['home']; ?>
<?php if ($this->_tpl_vars['ur_here']): ?> - <?php echo $this->_tpl_vars['ur_here']; ?>
 <?php endif; ?></title>
<meta name="Copyright" content="Douco Design." />
<link href="templates/public.css" rel="stylesheet" type="text/css">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "javascript.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="images/jquery.autotextarea.js"></script>
<script>
var lang_city="<?php echo $this->_tpl_vars['lang']['city_select_empty']; ?>
";
var lang_district="<?php echo $this->_tpl_vars['lang']['district_select_empty']; ?>
";

<?php echo '
$(function(){
	
	$(".province,.city").change(function(){
		
		var pid=$(this).val();
		
		var option="";
		var por=$(this).attr(\'class\');
	
		if(por==\'province\'){
			var lang=lang_city;
		}if(por==\'city\'){
			
			var lang=lang_district;
		}
		
		  $.ajax({
			  
		 		 type: "get",  //
		  		 url : "store.php", 
		  		 dataType:\'json\',// 
		  		 data:  \'rec=city&pid=\'+pid,   
		  		 success: function(res){
		  			 
		  			// console.log(res);
		  			 if(res){
		  				 
		  				option+=\'<option value="0">\'+lang+\'</option>\'; 
		  				
		  				for(var i=0;i<res.length;i++){

		  					option+="<option value=\'"+res[i].region_id+"\'>"+res[i].region_name+"</option>";

		  				 }
		  				
		  				if(por==\'province\'){
		  					$(".city").html(option);
		  					$(".district").html(\'<option value="0">\'+lang_district+\'</option>\');
		  				}
		  				if(por==\'city\'){
		  					
		  					$(".district").html(option);
		  				}
		  				 
		  			 }
		  		 }
			  });
		
	});
		
	//return false;

	$(".exc_down").click(function(){
		
		
		location.href="images/example.xlsx";
		
	});
	
	
	//组织选项联动
	 //#level1_select,#level2_select,#level3_select
	$(".level_select").change(function(){
		
		var zid=$(this).val();

      	var eqm=$(this).attr("eqm");
      	//下一个
        var next=$(".level_select").eq(Number(eqm)+1);

	//return false;
		$.ajax({
			 
			type: "get",  //
			 url : "store.php", 
			 dataType:\'json\',// 
			 data:  \'rec=get_level&zid=\'+zid,   
			 success: function(res){
				 
				if(res){
					 var option=\'<option value="0">请选择</option>\';
					 
					 for(var i=0;i<res.length;i++){
						 
						 
						 option+=\'<option value="\'+res[i].code+\'">\'+res[i].code+\'-\'+res[i].zname+\'</option>\';
					 }
					
					
					 next.html(option);
					 
					 $(".level_select").eq(Number(eqm)+2).html(\'<option value="0">请选择</option>\');
					 $(".level_select").eq(Number(eqm)+3).html(\'<option value="0">请选择</option>\');
					 $(".level_select").eq(Number(eqm)+4).html(\'<option value="0">请选择</option>\');
					
				}
			 }
		});
		
		/////////////
		
	});
	
	
	
});
'; ?>

</script>

<script type="text/javascript">
<?php echo '
      //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 155; 
          var MAXHEIGHT = 127;
          var div = document.getElementById(\'preview\');
          if (file.files && file.files[0])
          {
              div.innerHTML =\'<img id=imghead>\';
              var img = document.getElementById(\'imghead\');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+\'px\';
                img.style.marginTop = rect.top+\'px\';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter=\'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="\';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = \'<img id=imghead>\';
            var img = document.getElementById(\'imghead\');
            img.filters.item(\'DXImageTransform.Microsoft.AlphaImageLoader\').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =(\'rect:\'+rect.top+\',\'+rect.left+\',\'+rect.width+\',\'+rect.height);
            div.innerHTML = "<div id=divhead style=\'width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\\"\'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
 '; ?>
       
</script>
</head>
<body>
<div id="dcWrap">
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <div id="dcLeft"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
 <div id="dcMain">
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ur_here.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <div class="mainBox" style="<?php echo $this->_tpl_vars['workspace']['height']; ?>
">
    <?php if ($this->_tpl_vars['rec'] == 'default'): ?>
    <h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn add"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a>
    <a href="zbs.php" class="actionBtn" style="margin-right: 20px;">批量查坐标</a>
    <?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <div class="filter">
    <form action="store.php" method="post">
     <select name="cat_id" style="display:none">
      <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
      <?php $_from = $this->_tpl_vars['store_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
      <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['cat_id']): ?>
      <option value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
" selected="selected"><?php echo $this->_tpl_vars['cate']['mark']; ?>
 <?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</option>
      <?php else: ?>
      <option value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
"><?php echo $this->_tpl_vars['cate']['mark']; ?>
 <?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</option>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
     </select>
     <input name="keyword" type="text" class="inpMain" value="<?php echo $this->_tpl_vars['keyword']; ?>
" size="20" />
     <input name="submit" class="btnGray" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_filter']; ?>
" />

    </form>
    <span style="display:none;">
    <a class="btnGray" href="store.php?rec=re_thumb"><?php echo $this->_tpl_vars['lang']['store_thumb']; ?>
</a>
    <?php if ($this->_tpl_vars['sort']['handle']): ?>
    <a class="btnGray" href="store.php?rec=sort&act=handle"><?php echo $this->_tpl_vars['lang']['sort_close']; ?>
</a>
    <?php else: ?>
    <a class="btnGray" href="store.php?rec=sort&act=handle"><?php echo $this->_tpl_vars['lang']['sort_store']; ?>
</a>
    <?php endif; ?>
    </span>
    <span>
  
     <input name="" type="button" class="btnGray btn-primary btn btn-xs btn-success" data-toggle="modal" data-target="#myModal" 
id="import" value="导入门店excel">
         
         </span>
    </div>
    <?php if ($this->_tpl_vars['sort']['handle']): ?>
    <div class="homeSortRight">
     <ul class="homeSortBg">
      <?php echo $this->_tpl_vars['sort']['bg']; ?>

     </ul>
     <ul class="homeSortList">
      <?php $_from = $this->_tpl_vars['sort']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['store']):
?>
      <li>
       <img src="<?php echo $this->_tpl_vars['store']['image']; ?>
" width="60" height="60">
       <a href="store.php?rec=sort&act=cancel&id=<?php echo $this->_tpl_vars['store']['id']; ?>
" title="<?php echo $this->_tpl_vars['lang']['sort_cancel']; ?>
">X</a>
      </li>
      <?php endforeach; endif; unset($_from); ?>
     </ul>
    </div>
    <?php endif; ?>
    <div id="list"<?php if ($this->_tpl_vars['sort']['handle']): ?> class="homeSortLeft"<?php endif; ?>>
    <form name="action" method="post" action="store.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
        <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
        <th width="40" align="center"><?php echo $this->_tpl_vars['lang']['record_id']; ?>
</th>
        <th width="60" align="left"><?php echo $this->_tpl_vars['lang']['store_name']; ?>
</th>
         <th width="60" align="left">门店编号</th>
        <th  width="150" align="center"><?php echo $this->_tpl_vars['lang']['store_phone']; ?>
</th>
        <th width="150" align="center" style="display:none;"><?php echo $this->_tpl_vars['lang']['store_category']; ?>
</th>
       <th width="150" align="center" style="display:none;"><?php echo $this->_tpl_vars['lang']['add_time']; ?>
</th>
       <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['store_province']; ?>
</th>
        <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['store_city']; ?>
</th>
        <th width="80" align="center">百度坐标(x,y)</th>
         <th width="150" align="center"><?php echo $this->_tpl_vars['lang']['handler']; ?>
</th>
      </tr>
      <?php $_from = $this->_tpl_vars['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['store']):
?>
      <tr>
        <td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo $this->_tpl_vars['store']['id']; ?>
" /></td>
        <td align="center"><?php echo $this->_tpl_vars['store']['id']; ?>
</td>
        <td><a href="store.php?rec=edit&id=<?php echo $this->_tpl_vars['store']['id']; ?>
"><?php echo $this->_tpl_vars['store']['name']; ?>
</a></td>
         <td align="center"><?php echo $this->_tpl_vars['store']['store_id']; ?>
</td>
        <td align="center" style="display:none;"><?php if ($this->_tpl_vars['store']['cat_name']): ?><a href="store.php?cat_id=<?php echo $this->_tpl_vars['store']['cat_id']; ?>
"><?php echo $this->_tpl_vars['store']['cat_name']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
<?php endif; ?></td>
       <?php if ($this->_tpl_vars['store']['add_time']): ?> <td align="center"><?php echo $this->_tpl_vars['store']['add_time']; ?>
</td><?php endif; ?>
        <td align="center"><?php echo $this->_tpl_vars['store']['phone']; ?>
</td>
        <td align="center"><?php echo $this->_tpl_vars['store']['province']; ?>
</td>
        <td align="center"><?php echo $this->_tpl_vars['store']['city']; ?>
</td>
        <td align="center"> <?php echo $this->_tpl_vars['store']['baidu_coordinate']; ?>
</td>
        <td align="center">
         <?php if ($this->_tpl_vars['sort']['handle']): ?>
         <a href="store.php?rec=sort&act=set&id=<?php echo $this->_tpl_vars['store']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['sort_btn']; ?>
</a>
         <?php else: ?>
         <a href="store.php?rec=edit&id=<?php echo $this->_tpl_vars['store']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <a href="store.php?rec=del&id=<?php echo $this->_tpl_vars['store']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['del']; ?>
</a>
        <?php if ($this->_tpl_vars['store']['baidu_coordinate'] == ''): ?> |<a href="javascript:void(0)"  style="" onclick="check_coordinate(<?php echo $this->_tpl_vars['store']['id']; ?>
)"> 查询坐标 </a><?php endif; ?>
         <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </table>
    <div class="action">
     <select name="action" onchange="douAction()">
      <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
      <option value="del_all"><?php echo $this->_tpl_vars['lang']['del']; ?>
</option>
    <?php echo $this->_tpl_vars['lang']['category_move']; ?>

     </select>
     <select name="new_cat_id" style="display:none">
      <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
      <?php $_from = $this->_tpl_vars['store_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
      <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['cat_id']): ?>
      <option value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
" selected="selected"><?php echo $this->_tpl_vars['cate']['mark']; ?>
 <?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</option>
      <?php else: ?>
      <option value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
"><?php echo $this->_tpl_vars['cate']['mark']; ?>
 <?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</option>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
     </select>
     <input name="submit" class="btn" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_execute']; ?>
" />
    </div>
    </form>
    </div>
    <div class="clear"></div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pager.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <div id="sout" style="display:none;text-align: center;position:fixed;	opacity: 1;top:50%;left: 0;z-index: 2050; 	right: 0;">
		<img src="images/wait.jpg"  style="width:40px;"/>
		<p style="color:white;">正在查询，请稍等</p>
	</div>
    
        <script type="text/javascript">
    <?php echo '
	 function check_coordinate(id){
		 
		 $("#sout").show();
		 $("#fadein").show();
		 
		  $.ajax({
			    //查询坐标
		 		 type: "POST",  //
		  		 url : "store.php", 
		  		 dataType:\'json\',// 
		  		 data:  \'rec=check_coordinate&id=\'+id,   
		  		 success: function(res){
		  			 
		  			 if(res.msg==0){
		  				 
		  				 $("#sout").hide();
		  				 $("#fadein").hide();
		  			 }else{
		  				 
		  				$("#sout").find(\'p\').html(res.data);
		  				setTimeout(function(){
			  				 $("#sout").hide();
			  				 $("#fadein").hide();
			  				if(res.msg==1){
			  					window.location=window.location;
			  				}
			  				 
			  				 
		  				}, 3000);
		  				
		  			 }
		  			 
		  		 }
		  
		  })
		 
	 }

    '; ?>

    </script>
    
    
    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 'add' || $this->_tpl_vars['rec'] == 'edit'): ?>
    <script  type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ycTgY5YTSnk5PsqumqZboxtXaKU6Io6K"></script>
    

    <h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <form action="store.php?rec=<?php echo $this->_tpl_vars['form_action']; ?>
" method="post" enctype="multipart/form-data">

		<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
    <tr>
        <td width="10%"><?php echo $this->_tpl_vars['lang']['store_code']; ?>
</td>
        <td width="17%"><input type="text" class="inpMain" size="15" name="store_id" <?php if ($this->_tpl_vars['rec'] == 'edit'): ?> disabled="disabled" <?php endif; ?>  value="<?php echo $this->_tpl_vars['store']['store_id']; ?>
"></td>
        <td width="10%"><?php echo $this->_tpl_vars['lang']['store_name']; ?>
</td>
        <td width="17%"><input type="text" name="name" value="<?php echo $this->_tpl_vars['store']['name']; ?>
" size="15" class="inpMain"></td>
        <td width="10%"><?php echo $this->_tpl_vars['lang']['store_phone']; ?>
</td>
        <td width="17%"><input type="text" name="phone" value="<?php echo $this->_tpl_vars['store']['phone']; ?>
" size="15" class="inpMain">
        </td>
        <td width="19%" style="border-right: 1px solid #DDD;">&nbsp;</td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lang']['store_diqu']; ?>
/<?php echo $this->_tpl_vars['lang']['store_province']; ?>
</td>
        <td>
        <select name="province" class="province">
        <option value="0"><?php echo $this->_tpl_vars['lang']['provice_select_empty']; ?>
</option>
        <?php $_from = $this->_tpl_vars['plist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plist']):
?>
        <option value="<?php echo $this->_tpl_vars['plist']['region_id']; ?>
" <?php if ($this->_tpl_vars['plist']['region_id'] == $this->_tpl_vars['store']['province']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['plist']['region_name']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
        
        </select>
        
        </td>
        <td><?php echo $this->_tpl_vars['lang']['store_diqu']; ?>
/<?php echo $this->_tpl_vars['lang']['store_city']; ?>
</td>
        <td>
        <select name="city" class="city">
        <option value="0"><?php echo $this->_tpl_vars['lang']['city_select_empty']; ?>
</option>
        <?php $_from = $this->_tpl_vars['clist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['clist']):
?>
        <option value="<?php echo $this->_tpl_vars['clist']['region_id']; ?>
" <?php if ($this->_tpl_vars['clist']['region_id'] == $this->_tpl_vars['store']['city']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['clist']['region_name']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
        
        </select>
        
        </td>
        <td><?php echo $this->_tpl_vars['lang']['store_diqu']; ?>
/<?php echo $this->_tpl_vars['lang']['store_district']; ?>
</td>
        <td>
        
         <select name="district" class="district">
        <option value="0"><?php echo $this->_tpl_vars['lang']['district_select_empty']; ?>
</option>
        <?php $_from = $this->_tpl_vars['dlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dlist']):
?>
        <option value="<?php echo $this->_tpl_vars['dlist']['region_id']; ?>
" <?php if ($this->_tpl_vars['dlist']['region_id'] == $this->_tpl_vars['store']['district']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['dlist']['region_name']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
        
        </select>
        

        </td>
        <td  rowspan="7" align="center" style="border-right: 1px solid #DDD;">
        <div id="preview">
        <img id="imghead" src="<?php if ($this->_tpl_vars['store']['image']): ?> ../<?php echo $this->_tpl_vars['store']['image']; ?>
<?php else: ?>images/img_none.png<?php endif; ?>" width="155" height="127">
       
        </div>
        <br/>
        <br/>
        
        

		<div>	
		<input class="se2" id="f_file" type="file" onchange="previewImage(this)"  name="image"/>
        <label for="f_file">
        <input class="se1"   type="button" value="上传图片" />
        </label>
       </div>

        <br/>
        <br/>
        <br/>
        <input type="checkbox" name="status"  value="0"><?php echo $this->_tpl_vars['lang']['status_stop']; ?>

        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lang']['store_address']; ?>
</td>
        <td colspan="5"><input type="text" size="80" name="address" value="<?php echo $this->_tpl_vars['store']['address']; ?>
" class="inpMain"></td>

     
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lang']['level1']; ?>
</td>
        <td colspan="2">
      <select name="level1_code" id="level1_select" eqm=0 class="level_select">
        
        <option value="0">请选择</option>
        
       <?php $_from = $this->_tpl_vars['levels']['level1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['level']):
?>
		<option value="<?php echo $this->_tpl_vars['level']['code']; ?>
" <?php if ($this->_tpl_vars['level']['code'] == $this->_tpl_vars['store']['level1_code']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['level']['code']; ?>
-<?php echo $this->_tpl_vars['level']['zname']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>

      </select>  
        </td>
        <td><?php echo $this->_tpl_vars['lang']['level2']; ?>
</td>
        <td colspan="2">
       
      <select name="level2_code" id="level2_select"  eqm=1 class="level_select">
        
        <option value="0">请选择</option>
        
       <?php $_from = $this->_tpl_vars['levels']['level2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['level']):
?>
		<option value="<?php echo $this->_tpl_vars['level']['code']; ?>
" <?php if ($this->_tpl_vars['level']['code'] == $this->_tpl_vars['store']['level2_code']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['level']['code']; ?>
-<?php echo $this->_tpl_vars['level']['zname']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>

      </select>  
        
        </td>

        
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lang']['level3']; ?>
</td>
        <td colspan="2">
        <select name="level3_code" id="level3_select"  eqm=2 class="level_select">
        
        <option value="0">请选择</option>
        
       <?php $_from = $this->_tpl_vars['levels']['level3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['level']):
?>
		<option value="<?php echo $this->_tpl_vars['level']['code']; ?>
" <?php if ($this->_tpl_vars['level']['code'] == $this->_tpl_vars['store']['level3_code']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['level']['code']; ?>
-<?php echo $this->_tpl_vars['level']['zname']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>

      </select>  
        
        </td>
        <td><?php echo $this->_tpl_vars['lang']['level4']; ?>
</td>
        <td colspan="2">
        
     <select name="level4_code" id="level4_select"  eqm=3 class="level_select" >
        
        <option value="0">请选择</option>
        
       <?php $_from = $this->_tpl_vars['levels']['level4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['level']):
?>
		<option value="<?php echo $this->_tpl_vars['level']['code']; ?>
" <?php if ($this->_tpl_vars['level']['code'] == $this->_tpl_vars['store']['level4_code']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['level']['code']; ?>
-<?php echo $this->_tpl_vars['level']['zname']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>

      </select>  
        
        
        </td>

        
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lang']['level5']; ?>
</td>
        <td colspan="2">
        
        <select name="level5_code" id="level5_select" eqm=4 class="level_select">
        
        <option value="0">请选择</option>
        
       <?php $_from = $this->_tpl_vars['levels']['level5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['level']):
?>
		<option value="<?php echo $this->_tpl_vars['level']['code']; ?>
" <?php if ($this->_tpl_vars['level']['code'] == $this->_tpl_vars['store']['level5_code']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['level']['code']; ?>
-<?php echo $this->_tpl_vars['level']['zname']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>

      </select>  
        
        </td>

        <td>&nbsp;</td>
        <td  colspan="2">&nbsp;</td>
       
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lang']['start_day']; ?>
</td>
        <td colspan="2">
        <input type="text" name="api_start_day" value="<?php echo $this->_tpl_vars['store']['api_start_day']; ?>
" size="20" class="inpMain">
        </td>
 
        <td><?php echo $this->_tpl_vars['lang']['end_day']; ?>
</td>
        <td colspan="2">
 <input type="text" name="api_end_day" value="<?php echo $this->_tpl_vars['store']['api_end_day']; ?>
" size="20" class="inpMain">
        
        </td>
       
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lang']['total_num']; ?>
</td>
        <td colspan="2">
     <input type="text" name="api_total_num" value="<?php echo $this->_tpl_vars['store']['api_total_num']; ?>
" size="20" class="inpMain">
        
		</td>
        <td><?php echo $this->_tpl_vars['lang']['total_money']; ?>
</td>
        <td colspan="2">
   <input type="text" name="api_total_money" value="<?php echo $this->_tpl_vars['store']['api_total_money']; ?>
" size="20" class="inpMain">
		</td>
       
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lang']['remark']; ?>
</td>
        <td colspan="5">
        <textarea style="width:100%" name="remark"><?php echo $this->_tpl_vars['store']['remark']; ?>
</textarea>
        </td>

        <td style="border-right: 1px solid #DDD;">
			&nbsp;
		</td>
    </tr>
        <tr>
        <td>百度坐标系x,y</td>
        <td colspan="5">
        <input type="text" name="baidu_coordinate" class="inpMain"  value="<?php echo $this->_tpl_vars['store']['baidu_coordinate']; ?>
">
       <a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">http://api.map.baidu.com/lbsapi/getpoint/index.html
        </td>

        <td style="border-right: 1px solid #DDD;">
			&nbsp;
		</td>
    </tr>
    <tr>
    <td colspan="7" align="center">		<input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['store']['id']; ?>
">
        <input name="submit" class="btn" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_submit']; ?>
" /></td>
    </tr>
</table>
		

    </form>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 're_thumb'): ?>
    <h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <script type="text/javascript">
    <?php echo '
     function mask(i) {
        document.getElementById(\'mask\').innerHTML += i;
        document.getElementById(\'mask\').scrollTop = 100000000;
     }
     function success() {
        var d=document.getElementById(\'success\');
        d.style.display="block";
     }
    '; ?>

    </script>
    <dl id="maskBox">
     <dt><em><?php echo $this->_tpl_vars['mask']['count']; ?>
</em><?php if (! $this->_tpl_vars['mask']['confirm']): ?><form action="store.php?rec=re_thumb" method="post"><input name="confirm" class="btn" type="submit" value="<?php echo $this->_tpl_vars['lang']['store_thumb_start']; ?>
" /></form><?php endif; ?></dt>
     <dd class="maskBg"><?php echo $this->_tpl_vars['mask']['bg']; ?>
<i id="success"><?php echo $this->_tpl_vars['lang']['store_thumb_succes']; ?>
</i></dd>
     <dd id="mask"></dd>
    </dl>
    <?php endif; ?>
   </div>
 </div>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 </div>
<?php if ($this->_tpl_vars['rec'] == 'default'): ?>
<script type="text/javascript">
<?php echo '
onload = function()
{
 document.forms[\'action\'].reset();
}

function douAction()
{
 var frm = document.forms[\'action\'];
 frm.elements[\'new_cat_id\'].style.display = frm.elements[\'action\'].value == \'category_move\' ? \'\' : \'none\';
}
'; ?>

</script>
<?php endif; ?>
<?php if ($this->_tpl_vars['rec'] != 're_thumb'): ?>

 <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
 <!-- 新 Bootstrap 核心 CSS 文件 -->
<link href="templates/bootstrap.min.css" rel="stylesheet" >
<!-- 
<link rel="stylesheet" type="text/css" href="templates/css/bootstrap.css" />-->

<link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="templates/css/build.css">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div style="display:none" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-horizontal ajaxForm2" id='formadd' method="post"  enctype="multipart/form-data" action="store.php?rec=excel_import">
<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"   aria-hidden="true">×
               </button>
               <h4 class="modal-title" id="myModalLabel">
                  导入EXCEL
               </h4>
            </div>
		<div class="modal-body">
		<div class="row">
		<div class="col-xs-12">
		<div class="form-group">
		<!-- <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 所属商户： </label> -->

	
	<div class="radio radio-info radio-danger">
		 <input type="radio" id="inlineRadio1" value="1" name="radioInline" checked="">
	 <label for="inlineRadio1">删除现所有数据，重新上传 </label>
	</div>
	
	<div class="radio radio-danger">
		 <input type="radio" id="inlineRadio2" value="2" name="radioInline">
		<label for="inlineRadio2"> 在现有数据基础上上传(如果数据存在会更新) </label>
	  </div>
		
		<div class="col-sm-9">
<?php echo '
 <script>
      function getFilename(){
        var filename=document.getElementById("file").value;
        if(filename==undefined||filename==""){
          document.getElementById("filename").innerHTML="点击此处上传文件";
        } else{
          var fn=filename.substring(filename.lastIndexOf("\\\\")+1);
          document.getElementById("filename").innerHTML=fn; //将截取后的文件名填充到span中
        }
      }
      $(function(){
    	  
          $("#formbtn").click(function(){
        	  
            	$("#layout").show();
            	$("#fadein").show();
            	  
              });
      });

</script>
'; ?>

		<a href="javascript:;" class="a-upload">
		   <input type="file" id="file" name="excelData"   onchange="getFilename()" datatype="*4-50" />
		   <span id="filename" style="max-width: 180px; overflow: hidden;display: block;">点击这里上传文件</span>
		</a>
		<a class="exc_down"  style="margin-left: 10px;" href="javascript:void(0)"  >点击下载excel标准数据格式</a>
		</div>
		<div style="color: #861515; text-align: center; font-size: 12px;font-weight: bold; padding-top: 10px;"> 
		注意:如果文件数据量过大,请将文件转化为.CSV文件后再上传
		</div>
          </div></div>
		</div>
		</div>
            <div class="modal-footer">
               <button type="submit" id='formbtn' class="btn btn-primary">
                  提交保存
               </button>
               <button type="button" class="btn btn-default" data-dismiss="modal">
                  关闭
               </button>
            </div>
         </div><!--/.modal-content-->
	</div><!--/.modal-dialog-->
		</form></div><!--/.modal -->
		
<div id="layout" style="display:none;text-align: center;position:fixed;	opacity: 1;top:50%;left: 0;z-index: 2050; 	right: 0;">
		<img src="images/wait.jpg" />
		<p style="color:white;">正在上传，请稍后</p>
	<!-- 	<button id="closeBtn" onclick="testBtn1()">关闭</button>-->
</div>
<div id="fadein" style="display:none;position: fixed; top: 0; right: 0; bottom: 0; left: 0; z-index: 2000; opacity: .5;  background-color: #000;"></div>		
</body>
</html>
<?php endif; ?>