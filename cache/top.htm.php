<?php /* Smarty version 2.6.26, created on 2018-08-29 17:15:42
         compiled from top.htm */ ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<div style="padding:15px;">
	<div class="logodiv" style="">
	<a href="."><img src="http://localhost/Mapbackstage/theme/default/images/Logo1.png"  height="40"/></a>
    </div>
	<input type="text" id="suggestId"  value="Search people & places" 	 />
	<img src="http://localhost/Mapbackstage/theme/default/images/search.png" width="22" id="search_store">
	<div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
	<?php if ($this->_tpl_vars['user']): ?>
	<div style="float:right;width:100px;margin-top: 8px;
    text-align: right;"><?php echo $this->_tpl_vars['user']['user_name']; ?>
 &nbsp;<a href="login.php?rec=logout">退出</a></div>
    <?php endif; ?>
    
	<div class="toptu">

		    <div class="tlist" >
			<p class="imgp" onclick="ctrclick()"><img src="http://localhost/Mapbackstage/theme/default/images/ck_icon.png" width="25"></p>
			<a href="javascript:void(0)" id="ctrl-btn-1" >窗口</a>
			</div>
	
			<div class="tlist"  onclick="myDis.open();">
			<p class="imgp">
			<a href="javascript:void(0);" onclick="myDis.open();">
			<img src="http://localhost/Mapbackstage/theme/default/images/juli_icon.png" width="25">
			</a></p>
			
			<a href="javascript:void(0);" >测距</a>
			</div>
	         <!--
		    <div class="tlist" >
			<img src="http://localhost/Mapbackstage/theme/default/images/edit.png" width="22"><br>
			<a href="javascript:void(0);">编辑</a>
			</div>
			-->
	
			<div class="tlist"  id="zhexian">
			<p class="imgp"><img src="http://localhost/Mapbackstage/theme/default/images/zhexian_icon.png" width="31"></p>
			<a href="javascript:void(0);">折线图</a>
			</div>
			
			<!--
			<div class="tlist"  id="weizhi">
			<p class="imgp"><img src="http://localhost/Mapbackstage/theme/default/images/dingwei_icon.png" width="26"></p>
			<a href="javascript:void(0);">位置</a>
			</div>-->
	
			
			<div class="tlist" id="qingchu">
			<p class="imgp"><img src="http://localhost/Mapbackstage/theme/default/images/qingchu_icon.png" width="32"></p>
			<a href="javascript:void(0);">清除</a>
			</div>
			
			<!--
			<div class="tlist" >
			<img src="http://localhost/Mapbackstage/theme/default/images/bianji.png" width="22"><br>
			<a href="javascript:void(0);">编辑</a>
			</div>-->			
	
			<div class="tlist" id="biaoji" style="">
			<p class="imgp"><img src="http://localhost/Mapbackstage/theme/default/images/biaoji_icon.png" width="20" height="30"></p>
			<a href="javascript:void(0);">标  记</a>
			</div>
			<div class="tlist" id="fanwei" style="margin-right:40px;">
			<p class="imgp"><img src="http://localhost/Mapbackstage/theme/default/images/fanwei_icon.png" width="25"></p>
			<a href="javascript:void(0);">范围</a>
			</div>
	  <!--
			<div class="tlist" id="qingup" onclick="qingup()">
			<img src="http://localhost/Mapbackstage/theme/default/images/eraser.png" width="22"><br>
			<a href="javascript:void(0);">清除上一步</a>
			</div>
	     -->
	
			<div class="tlist" id="jietu_img">
			<p class="imgp"><img src="http://localhost/Mapbackstage/theme/default/images/save_icon.png" width="25"></p>
			<a href="javascript:void(0);" id="">保存图片</a>
			</div>
			<div class="tlist">
			<p class="imgp"><img src="http://localhost/Mapbackstage/theme/default/images/wechat_icon.png" width="28"></p>
			<a href="javascript:void(0);">微 信</a>
			</div>
			
			<div class="tlist" id="read_file">
			<p class="imgp"><img src="http://localhost/Mapbackstage/theme/default/images/folder_icon.png" width="25"></p>
			<a href="javascript:void(0);">浏览文件</a>
			</div>
			
	</div>
	

	</div>
	<script type="text/javascript">
	<?php echo '
	$(function(){
		


		
		
		
		
	});
	//触发点击事件
	function ctrclick(){
		
		$("#ctrl-btn-1").trigger(\'click\');
		
	}
	'; ?>

	</script>