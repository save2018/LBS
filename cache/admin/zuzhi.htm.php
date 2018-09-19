<?php /* Smarty version 2.6.26, created on 2018-08-28 11:48:08
         compiled from zuzhi.htm */ ?>
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
<?php echo '
$(function(){

	$("#level").change(function(){
		
		var cid=$(this).val();
	
		$.ajax({
			 
			type: "get",  //
			 url : "zuzhi.php", 
			 dataType:\'json\',// 
			 data:  \'rec=get_parent&cid=\'+cid,   
			 success: function(res){
				 
				if(res){
					 var option=\'<option value="0">请选择</option>\';
					 
					 for(var i=0;i<res.length;i++){
						 
						 
						 option+=\'<option value="\'+res[i].zid+\'">\'+res[i].code+\'-\'+res[i].zname+\'</option>\';
					 }
					
					
					$("#level_parent").html(option);
					
				}
			 }
		});
		
		/////////////
		
	});
	
	
});

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
        <a href="zzs.php" class="actionBtn" style="margin-right: 20px;">批量查组织</a>
    <?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <div class="filter" style="display:none">
    <form action="zuzhi.php" method="post">
     <select name="cat_id" style="display:none;">
      <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
      <?php $_from = $this->_tpl_vars['zuzhi_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
    <span style="display:none">
    <?php if ($this->_tpl_vars['sort']['handle']): ?>
    <a class="btnGray" href="zuzhi.php?rec=sort&act=handle"><?php echo $this->_tpl_vars['lang']['sort_close']; ?>
</a>
    <?php else: ?>
    <a class="btnGray" href="zuzhi.php?rec=sort&act=handle"><?php echo $this->_tpl_vars['lang']['sort_zuzhi']; ?>
</a>
    <?php endif; ?>
    </span>
    </div>
    <?php if ($this->_tpl_vars['sort']['handle']): ?>
    <div class="homeSortRight">
     <ul class="homeSortBg">
      <?php echo $this->_tpl_vars['sort']['bg']; ?>

     </ul>
     <ul class="homeSortList">
      <?php $_from = $this->_tpl_vars['sort']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['zuzhi']):
?>
      <li>
       <em><?php echo $this->_tpl_vars['zuzhi']['o_name']; ?>
</em>
       <a href="zuzhi.php?rec=sort&act=cancel&id=<?php echo $this->_tpl_vars['zuzhi']['id']; ?>
" title="<?php echo $this->_tpl_vars['lang']['sort_cancel']; ?>
">X</a>
      </li>
      <?php endforeach; endif; unset($_from); ?>
     </ul>
    </div>
    <?php endif; ?>
    <div id="list"<?php if ($this->_tpl_vars['sort']['handle']): ?> class="homeSortLeft"<?php endif; ?> >
    
    
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    
    <form name="action" method="post" action="zuzhi.php?rec=action" style="    display: none;">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic" style="display:none;">
     <tr>
      <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
      <th width="40" align="center"><?php echo $this->_tpl_vars['lang']['record_id']; ?>
</th>
      <th align="left"><?php echo $this->_tpl_vars['lang']['zuzhi_name']; ?>
</th>
       <!--<th width="150" align="center"><?php echo $this->_tpl_vars['lang']['zuzhi_category']; ?>
</th>
     <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['add_time']; ?>
</th>-->
     <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['zuzhi_level']; ?>
</th>
      <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['handler']; ?>
</th>
     </tr>
     <?php $_from = $this->_tpl_vars['zuzhi_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['zuzhi']):
?>
     <tr>
      <td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo $this->_tpl_vars['zuzhi']['zid']; ?>
" /></td>
      <td align="center"><?php echo $this->_tpl_vars['zuzhi']['zid']; ?>
</td>
      <td><a href="zuzhi.php?rec=edit&id=<?php echo $this->_tpl_vars['zuzhi']['zid']; ?>
"><?php echo $this->_tpl_vars['zuzhi']['zname']; ?>
</a><?php if ($this->_tpl_vars['zuzhi']['image']): ?> <a href="../<?php echo $this->_tpl_vars['zuzhi']['image']; ?>
" target="_blank"><img src="images/icon_picture.png" width="16" height="16" align="absMiddle"></a><?php endif; ?></td>
    <?php echo $this->_tpl_vars['zuzhi']['add_time']; ?>

    <td align="center"><?php echo $this->_tpl_vars['zuzhi']['cid']; ?>
 </td>
      <td align="center">
       <?php if ($this->_tpl_vars['sort']['handle']): ?>
       <a href="zuzhi.php?rec=sort&act=set&id=<?php echo $this->_tpl_vars['zuzhi']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['sort_btn']; ?>
</a>
       <?php else: ?>
       <a href="zuzhi.php?rec=edit&id=<?php echo $this->_tpl_vars['zuzhi']['zid']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <a href="zuzhi.php?rec=del&id=<?php echo $this->_tpl_vars['zuzhi']['zid']; ?>
"><?php echo $this->_tpl_vars['lang']['del']; ?>
</a>
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
      <option value="category_move"><?php echo $this->_tpl_vars['lang']['category_move']; ?>
</option>
     </select>
     <select name="new_cat_id" style="display:none">
      <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
      <?php $_from = $this->_tpl_vars['zuzhi_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 'add' || $this->_tpl_vars['rec'] == 'edit'): ?>
    <h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <form action="zuzhi.php?rec=<?php echo $this->_tpl_vars['form_action']; ?>
" method="post" enctype="multipart/form-data">
     <div class="formBasic">
      <dl>
       <dt><?php echo $this->_tpl_vars['lang']['zuzhi_name']; ?>
</dt>
       <dd>
        <input type="text" name="name" value="<?php echo $this->_tpl_vars['zuzhi']['zname']; ?>
" size="50" class="inpMain" />
       </dd>
      </dl>
            <dl>
       <dt>编号</dt>
       <dd>
        <input type="text" name="code" value="<?php echo $this->_tpl_vars['zuzhi']['code']; ?>
" size="50" class="inpMain" />
       </dd>
      </dl>
      
      
      <dl>
       <dt>当前级别</dt>
       <dd>
        <select name="cat_id" style="display:none">
         <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
         <?php $_from = $this->_tpl_vars['zuzhi_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
         <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['zuzhi']['cat_id']): ?>
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
        
        <select name="cid" id="level">
        <option value="1" <?php if ($this->_tpl_vars['zuzhi']['cid'] == 1): ?> selected="selected" <?php endif; ?>>等级1</option>
        <option value="2" <?php if ($this->_tpl_vars['zuzhi']['cid'] == 2): ?> selected="selected" <?php endif; ?>>等级2</option>
        <option value="3" <?php if ($this->_tpl_vars['zuzhi']['cid'] == 3): ?> selected="selected" <?php endif; ?>>等级3</option>
        <option value="4" <?php if ($this->_tpl_vars['zuzhi']['cid'] == 4): ?> selected="selected" <?php endif; ?>>等级4</option>
        <option value="5" <?php if ($this->_tpl_vars['zuzhi']['cid'] == 5): ?> selected="selected" <?php endif; ?>>等级5</option>
        </select>
       </dd>
      </dl>
      
       <dl>
       <dt>上级分类</dt>
       <dd>
        <select name="parent_id" id="level_parent" >
        
        <option value="0">请选择</option>
        <?php if ($this->_tpl_vars['zuzhi']['parent']): ?>
		<?php $_from = $this->_tpl_vars['zuzhi']['parent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['parent']):
?>
		<option value="<?php echo $this->_tpl_vars['parent']['zid']; ?>
" <?php if ($this->_tpl_vars['parent']['zid'] == $this->_tpl_vars['zuzhi']['parent_id']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['parent']['code']; ?>
-<?php echo $this->_tpl_vars['parent']['zname']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
   	    <?php endif; ?>
        </select>
       </dd>
      </dl>
      
      
      <?php if ($this->_tpl_vars['zuzhi']['defined']): ?>
      <dl>
       <dt valign="top"><?php echo $this->_tpl_vars['lang']['zuzhi_defined']; ?>
</dt>
       <dd>
        <textarea name="defined" id="defined" cols="50" class="textAreaAuto" style="height:<?php echo $this->_tpl_vars['zuzhi']['defined_count']; ?>
0px"><?php echo $this->_tpl_vars['zuzhi']['defined']; ?>
</textarea>
        <script type="text/javascript">
         <?php echo '
          $("#defined").autoTextarea({maxHeight:300});
         '; ?>

        </script>
        </dd>
      </dl>
      <?php endif; ?>
      <dl style="display:none">
       <dt valign="top"><?php echo $this->_tpl_vars['lang']['zuzhi_content']; ?>
</dt>
       <dd >
       
        <script charset="utf-8" src="include/kindeditor/kindeditor.js"></script>
        <script charset="utf-8" src="include/kindeditor/lang/zh_CN.js"></script>
        <script>
        <?php echo '
         var editor;
         KindEditor.ready(function(K) {
             editor = K.create(\'#content\');
         });
        '; ?>

        </script>
        <!-- /KindEditor -->
        <textarea id="content" name="content" style="width:98%;height:500px;" class="textArea"><?php echo $this->_tpl_vars['zuzhi']['content']; ?>
</textarea>
       </dd>
      </dl>
      <!-- 
      <dl>
       <dt><?php echo $this->_tpl_vars['lang']['thumb']; ?>
</dt>
       <dd>
        <input type="file" name="image" size="38" class="inpFlie" />
        <?php if ($this->_tpl_vars['zuzhi']['image']): ?><a href="../<?php echo $this->_tpl_vars['zuzhi']['image']; ?>
" target="_blank"><img src="images/icon_yes.png"></a><?php else: ?><img src="images/icon_no.png"><?php endif; ?></dt>
      </dl>
      <dl>
       <dt><?php echo $this->_tpl_vars['lang']['keywords']; ?>
</dt>
       <dd>
        <input type="text" name="keywords" value="<?php echo $this->_tpl_vars['zuzhi']['keywords']; ?>
" size="135" class="inpMain" />
       </dd>
      </dl>
      <dl>
       <dt><?php echo $this->_tpl_vars['lang']['description']; ?>
</dt>
       <dd>
        <textarea name="description" cols="115" rows="3" class="textArea" /><?php echo $this->_tpl_vars['zuzhi']['description']; ?>
</textarea>
       </dd>
      </dl>
      -->
      <dl>
       <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
       <input type="hidden" name="image" value="<?php echo $this->_tpl_vars['zuzhi']['image']; ?>
">
       <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['zuzhi']['zid']; ?>
">
       <input name="submit" class="btn" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_submit']; ?>
" />
      </dl>
     </div>
    </form>
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
</body>
</html>