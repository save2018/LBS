<?php /* Smarty version 2.6.26, created on 2018-08-28 16:23:43
         compiled from left.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://localhost/Mapbackstage/theme/<?php echo $this->_tpl_vars['theme_name']; ?>
/styles/general.css" rel="stylesheet" type="text/css" />
<script>


    <!--隐藏左侧菜单-->
    <?php echo '
    $(document).ready(function () {
        //eg.1

        var left_width=$(\'#left\').width();  //左边宽度

        $(\'#left\').menuToggle({
            \'ctrlBtn\':\'ctrl-btn-1\',
            \'speed\':400,
            \'width\':left_width,
        });
        /*
        //eg.2
        $(\'#menu-2\').menuToggle({
            \'ctrlBtn\':\'ctrl-btn-2\',
            \'speed\':300,
            \'width\':400,
            \'openText\':\'<<展开\',
            \'closeText\':\'关闭>>\',
        });
        //eg.3
        $(\'#menu-3\').menuToggle({
            \'ctrlBtn\':\'ctrl-btn-3\',
            \'speed\':300,
            \'height\':400,
            \'openText\':\'向下展开\',
            \'closeText\':\'关闭\',
            \'type\':\'height\',
        });
        
        //eg.4
        $(\'#menu-4\').menuToggle({
            \'ctrlBtn\':\'ctrl-btn-4\',
            \'speed\':300,
            \'height\':400,
            \'openText\':\'向上展开\',
            \'closeText\':\'关闭\',
            \'type\':\'height\',
        });
        */
		$("#pop").css("width",left_width+"px");
		
    });
    (function($){
        var main_width=($("#main").width());  //网页宽度

        $.fn.extend({\'menuToggle\':
            function(options){
                //self变量，用于函数内部调用插件参数
                var self = this;
                //默认参数
                this._default = {
                    \'ctrlBtn\':null,            //关闭&展开按钮id
                    \'speed\':400,            //展开速度
                    \'width\':400,            //展开菜单宽度
                    \'height\':400,            //展开菜单高度
                    \'openText\':\'窗口\',    //展开前文本  展开>>
                    \'closeText\':\'窗口\',    //展开后文本 <<关闭
                    \'type\':\'width\'            //width表示按宽度伸展，height表示按高度伸展
                };
                //插件初始化函数
                this.init = function(options){
                    //配置参数格式有误则提示并返回
                    if(typeof options != \'object\') {
                        self.error(\'Options is not object Error!\');
                        return false;
                    }
                    if(typeof options.ctrlBtn == \'undefined\') {
                        self.error(\'Options ctrlBtn should not be empty!\');
                        return false;
                    }
                    //存储自定义参数
                    self._default.ctrlBtn = options.ctrlBtn;
                    if(typeof options.type != \'undefined\')         self._default.type = options.type;
                    if(typeof options.width != \'undefined\')     self._default.width = options.width;
                    if(typeof options.height != \'undefined\')     self._default.height = options.height;
                    if(typeof options.speed != \'undefined\')     self._default.speed = options.speed;
                    if(typeof options.openText != \'undefined\')     self._default.openText = options.openText;
                    if(typeof options.closeText != \'undefined\') self._default.closeText = options.closeText;
                    if(self._default.type == \'width\') {
                        self._default.expandOpen     = {width: self._default.width};
                        self._default.expandClose     = {width: 0};
                       
                    }else {
                        self._default.expandOpen     = {height: self._default.height};
                        self._default.expandClose     = {height: 0};
                       
                    }
                };
                this.run = function(){
                    $("#"+self._default.ctrlBtn).click(function () {
                        if($(this).hasClass(\'closed\')){        //有closed类，表示已关闭，现在展开
                            $(this).removeClass(\'closed\').html(self._default.closeText);
                            $(self).show().animate(self._default.expandOpen, self._default.speed);
                            
                            //alert();
                            $("#divS").show(); 
                            $("#right").css("width",main_width-options.width-6);
                        }else {
                            $(this).addClass(\'closed\').html(self._default.openText);
                            $(self).animate(self._default.expandClose, self._default.speed,function(){
                                $(this).hide();
                            });
                            //右边 100%
                         
                             $("#divS").hide();  
                            $("#right").css("width",main_width);
                           
                        }
                    });
                };
                this.error = function(msg){
                    //没有错误提示DIV则自动添加
                    if(!$("#menuToggleErrorTips").size()){
                        $("<div id=\'menuToggleErrorTips\'><h2>Error</h2><div class=\'tips\'></div></div>").appendTo($("body")).hide();
                        $("#menuToggleErrorTips").css({
                            position:\'absolute\',
                            left: $("body").width()/3,
                            top: 100,
                            width:400,
                            height:200,
                            \'z-index\': 9999999,
                            \'border\': \'1px solid #000\',
                            \'background-color\': \'#ABC\',
                            \'color\': \'#CC0000\',
                            \'text-align\': \'center\'
                        });
                    }
                    //显示错误提示信息
                    $("#menuToggleErrorTips").show().children(\'.tips\').html(msg);
                }
                //Init
                this.init(options);
                this.run();
            }
        });
    })(jQuery);
    '; ?>

    </script>
<script language="JavaScript">
var page_count=<?php echo $this->_tpl_vars['pager']['page_count']; ?>
; //店铺总页码数
//alert(page_count);
</script>
<?php echo '
<style type="text/css">

</style>
<script>
$(function(){
	
	//table切换
	$(\'.tab-front\').click(function(){
		
		var n=$(this).index();
		$(\'.menu_tab\').hide();
		$(\'.tab-front\').removeClass(\'rlive\');
		$(\'.menu_tab\').eq(n).show();
		$(this).addClass(\'rlive\');
		$("#pop").hide();//左下角总信息隐藏
	});
	
});

</script>

'; ?>

</head>
<body>
<div class="left-div">
<div id="tabbar-div">
<!--<span style="float:right; padding: 3px 5px;" >

<a href="javascript:toggleCollapse();"><img id="toggleImg" src="http://localhost/Mapbackstage/theme/default/images/menu_minus.gif" width="9" height="9" border="0" alt="<?php echo $this->_tpl_vars['lang']['collapse_all']; ?>
" /></a>

</span>-->

  <div class="tab-front rlive" id="menu-tab1" style="width:34%;">选择区域</div>
  <div class="tab-front" id="menu-tab2">选择组织</div>
  <div class="tab-front " id="menu-tab">门店信息</div>

</div>






<div class="menu_tab" >
<p class="pte" style="">地理名称</p>
<div id="main-div" class="main-div" style="overflow:auto;">

<div id="menu-list">
<ul id="menu-ul">


  <li class="explode" key="1" name="menu">
     <a href="javascript:void(0)"  id="china"> <?php echo $this->_tpl_vars['country_list']['0']['region_name']; ?>
</a>

    <ul>
    <?php $_from = $this->_tpl_vars['shop_province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['province']):
?>
      <li class="menu-item">
      <img class="proimg" style="margin-right: -5px;  margin-top: -2px;" src="http://localhost/Mapbackstage/theme/default/images/arrow_right.png" />
      <a class="menu-item-a item-a" did="<?php echo $this->_tpl_vars['province']['region_id']; ?>
" pl='1'><?php echo $this->_tpl_vars['province']['region_name']; ?>
</a>
      	<ul class="tree-1" style="display:none">
      	<?php $_from = $this->_tpl_vars['province']['city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
      	<li class="menu-item-1">
      	<img class="proimg-1" style="margin-right: -5px;  margin-top: -2px;" src="http://localhost/Mapbackstage/theme/default/images/arrow_right.png" />
      	
      	 <a class="menu-item-a-1 item-a-1"  did="<?php echo $this->_tpl_vars['city']['region_id']; ?>
" pl='2'><?php echo $this->_tpl_vars['city']['region_name']; ?>
</a>
      	 <ul class="tree-1-1" style="display:none">
      	 <?php $_from = $this->_tpl_vars['city']['district']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['district']):
?>
      	 <li class="menu-item-1-1">
      	 <a class="menu-item-a-1-1 item-a-1-1"  did="<?php echo $this->_tpl_vars['district']['region_id']; ?>
" pl='3'><?php echo $this->_tpl_vars['district']['region_name']; ?>
</a>
      	 </li>
      	 <?php endforeach; endif; unset($_from); ?>
      	 </ul>
      	</li>
      	<?php endforeach; endif; unset($_from); ?>
      	</ul>
      </li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>

  </li>

</ul>
</div>




</div>

</div>

<div class="menu_tab" style="display:none">
<p class="pte" style="">组织结构</p>
<div id="main-div0" class="main-div">

<div id="menu-list0">


   
   <ul class="zui">
   
   <?php $_from = $this->_tpl_vars['zuzhi']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fuzu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fuzu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['zu']):
        $this->_foreach['fuzu']['iteration']++;
?>
   <li class="zui-item item-bg">
   <image class="zuimg" src="http://localhost/Mapbackstage/theme/default/images/arrow_right.png" />
   <a class="item-bg-a" did='1' lid='<?php echo $this->_foreach['fuzu']['iteration']; ?>
' leid="<?php echo $this->_tpl_vars['zu']['level1_code']; ?>
">   

   <?php echo $this->_tpl_vars['zu']['level1_name']; ?>
</a>
	   <ul style="display:none">
	   <?php $_from = $this->_tpl_vars['zu']['level2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['zu2']):
?>
	    <li class="zui-item-1 item-bg">
	    	    <image class="zuimg" src="http://localhost/Mapbackstage/theme/default/images/arrow_right.png"  />
	    <a href="javascript:void(0)"  lid='<?php echo $this->_foreach['fuzu']['iteration']; ?>
' class="item-bg-a" did='2' leid="<?php echo $this->_tpl_vars['zu2']['level2_code']; ?>
">

	    <?php echo $this->_tpl_vars['zu2']['level2_name']; ?>
</a>
	    
	    <ul style="display:none">
	    <?php $_from = $this->_tpl_vars['zu2']['level3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['zu3']):
?>
	    <li class="zui-item-2 item-bg">
	    	    <image class="zuimg" src="http://localhost/Mapbackstage/theme/default/images/arrow_right.png"  />
	    <a class="item-bg-a" did='3' lid='<?php echo $this->_foreach['fuzu']['iteration']; ?>
' leid="<?php echo $this->_tpl_vars['zu3']['level3_code']; ?>
">

	    <?php echo $this->_tpl_vars['zu3']['level3_name']; ?>
</a>
	    
	    	 <ul style="display:none">
	    	  <?php $_from = $this->_tpl_vars['zu3']['level4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['zu4']):
?>
	    	 <li class="item-bg">
	    	 <a class="item-bg-a" did='4'  lid='<?php echo $this->_foreach['fuzu']['iteration']; ?>
' leid="<?php echo $this->_tpl_vars['zu4']['level4_code']; ?>
">
	    	 <image class="zuimg" src="http://localhost/Mapbackstage/theme/default/images/arrow_right.png"  />
	    	 <?php echo $this->_tpl_vars['zu4']['level4_name']; ?>
</a>
	    	 
	    	 <ul style="display:none">
	    	 <?php $_from = $this->_tpl_vars['zu4']['level5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['zu5']):
?>
	    	 
	    	  <li>
	    	   <a class="item-bg-a" did='5' lid='<?php echo $this->_foreach['fuzu']['iteration']; ?>
' leid="<?php echo $this->_tpl_vars['zu5']['level5_code']; ?>
"><?php echo $this->_tpl_vars['zu5']['level5_name']; ?>
</a>
	    	  </li>
	    	 <?php endforeach; endif; unset($_from); ?>
	    	 </ul>
	    	 
	    	 
	    	 </li>
	    	 <?php endforeach; endif; unset($_from); ?>
	    	 </ul>
	    
	    </li>
	    <?php endforeach; endif; unset($_from); ?>
	    </ul>
	    </li>
	   <?php endforeach; endif; unset($_from); ?>
	   </ul>
   </li>
   <?php endforeach; endif; unset($_from); ?>
   
   </ul>


</div>

</div>

</div>


<div class="menu_tab"  id="tap1" style="display:none">
<p class="pte" ><span id="fan2" onclick="fanhui();" ><img src="http://localhost/Mapbackstage/theme/default/images/f2.png"  alt="返回"/></span>代理门店详细信息</p>
<div id="main-div1" class="main-div">

<div id="menu-list1">

<div  id="store_list">
    <div id="poi_store">
	<ul style="width:100%">

	<?php $_from = $this->_tpl_vars['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['store'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['store']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['store']):
        $this->_foreach['store']['iteration']++;
?>
	<li style="cursor: pointer;" xyid="<?php echo $this->_tpl_vars['store']['baidu_coordinate']; ?>
"   onclick="mkdetail(<?php echo $this->_tpl_vars['store']['id']; ?>
);">
		<div style="width:60%;float:left;">
		<div class="sltal" style="font-weight:bold;">编号:<span ><?php echo $this->_tpl_vars['store']['store_id']; ?>
</span></div>
		<div class="sltal">店长名:<span ><?php echo $this->_tpl_vars['store']['name']; ?>
</span>     </div>
		<div class="sltal">电话:<span ><?php echo $this->_tpl_vars['store']['phone']; ?>
</span></div>
		</div>
		<div class="srtal" style="float:right;width:40%">
		 <img src="<?php if ($this->_tpl_vars['store']['image']): ?><?php echo $this->_tpl_vars['store']['image']; ?>
<?php else: ?>./images/img_none.png<?php endif; ?>"  style="width:100%"></img>
		 </div>
		
		<p class="strop" style="">
			地址:<span ><?php echo $this->_tpl_vars['store']['address']; ?>
</span>
		</p>
		
	</li>
	<?php endforeach; endif; unset($_from); ?>

	</ul>
	</div>


	<div id="poi_page" class="poi-page">
	<p id="ppagel">总计 <?php echo $this->_tpl_vars['pager']['record_count']; ?>
 个记录，共 <?php echo $this->_tpl_vars['pager']['page_count']; ?>
页</p>
	<p class="page" id="page">
	
	<span class="spage" ><a href="javascript:void(0)" tid="toPrevPage" onclick="toPage(10);return false;">&lt;上一页</a></span>
	<span class="curPage">1</span>
	
	<span><a href="javascript:void(0)" tid="secPageNum" onclick="toPage(2);return false;">2</a></span>
	<span><a href="javascript:void(0)" onclick="toPage(this.innerHTML);return false;">3</a></span>
	<span><a href="javascript:void(0)" onclick="toPage(4);return false;">4</a></span>
	
	
	<span><a href="javascript:void(0)" tid="toNextPage" onclick="toPage(2);return false;">下一页&gt;</a></span>
	
	</p></div>
	
	

</div>



<div class="detail" id="detail" ></div>

</div>

</div>

</div>


<div class="menu_tab" id="tap4" style="display:none">
<p class="pte" id="keyword_title">搜索结果</p>
<div  class="main-div" style="overflow:auto;">

</div>





</div>



<div id="pop"  style="display:none">
  	<div id="popHead">
		<a id="popClose" title="关闭">关闭</a>
		<p>代理商汇总信息</p>
	</div>
	<div id="popContent">

	<p>总门店数:&nbsp;<em id="z_store">0</em></p>
	<p>总交易额:&nbsp;<em id="z_money">0</em></p>

	</div>
	<div style="width:100%;padding-top:20px;text-align: center;">
	   <?php $_from = $this->_tpl_vars['zuzhi']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['uzu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['uzu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uzu']):
        $this->_foreach['uzu']['iteration']++;
?>
	<div style="float:left;min-width: 40px;">
	<span style="display:block"><img src="http://localhost/Mapbackstage/theme/default/images/map_icon/st_<?php echo $this->_foreach['uzu']['iteration']; ?>
.png"></span>
	<span ><?php echo $this->_tpl_vars['uzu']['level1_name']; ?>
</span>
	</div>
  <?php endforeach; endif; unset($_from); ?>
	
	</div>
	
	
</div>





</div>


</body>
</html>