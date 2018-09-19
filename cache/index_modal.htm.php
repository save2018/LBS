<?php /* Smarty version 2.6.26, created on 2018-08-31 13:50:29
         compiled from index_modal.htm */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- 截图用js  先包括jq -->
<script language="javascript" src="./js/jquery.md5.js"></script>
<script language="javascript" src="./js/jquery.json-2.3.min.js?v=20150926"></script>
<script language="javascript" src="./js/niuniucapture.js?v=20171108"></script>
<script language="javascript" src="./js/capturewrapper.js?v=20171108"></script>
<!--
<script type="text/javascript" src="./js/laydate.js"></script>
<link href="./js/laydate.css" rel="stylesheet" type="text/css" />
-->
<script type="text/javascript" src="./js/laydate/laydate.js"></script>

<script>
<?php echo '
$(function(){
	
	
	Init();  //初始化截图
	//
	
	//截图显示
	$("#jietu_img").click(function(){
		
		StartCapture();

	});
	//保存图片到服务器
	$("#Upbtn").click(function(){
		
		var filename=$(\'#file_name\').val();
		
	    var data = "act=jietu&userid=admin&filename=" + filename + "&picdata=" + encodeURIComponent(savedPictureContent);	
        
	    $.ajax({
	            type: "POST",
	            url: "./index.php",  //upload.ashx
	            dataType: "json",
	            data: data, 
	            success: function (obj) {
	                if(obj.code==0)
			        {
				        //$(\'#show\').html(\'上传成功，图片地址：\' + obj.info);
				       // $(\'#imgshow\').show();
				        $(\'#qrimg\').val(obj.info);
				        /*if(confirm("上传成功,是否查看图片")){
				        	
				        	location.href=obj.info;
				        }
						*/
						
						$("#Modalx").modal(\'show\');
						
				        $("#myModal").modal(\'hide\');
			        }
			        else
			        {
				       // $(\'#show\').html(\'上传失败 :\' + obj.info);
				        alert("上传失败");
			        }					
	            },
				error : function(){
					//$(\'#show\').html(\'由于网络原因，上传失败。\');
					alert("由于网络原因，上传失败。");
				}
	        }); 
		
		
	});
	
	//浏览图片--
	$("#read_file").click(function(){
	
			$("#Modal_1").modal(\'show\');
	
	});
	
	//截图搜
	$("#jietu_btn").click(function(){
	alert("查询中");

			var name=$("#s_name").val();
			var start_time=$("#start_time").val();
			var end_time=$("#end_time").val();
			var user_name=$("#s_user").val();
		//alert(start_time);
		 var data="act=jietu_search&name="+name+"&start_time="+start_time+"&end_time="+end_time+"&user_name="+user_name;
		// console.log(data);
		//return false;
				    $.ajax({
	            type: "POST",
	            url: "./index.php",  //upload.ashx
	            dataType: "json",
	            data: data, 
	            success: function (res) {
	                  console.log(res);
					 
					  var t1=$(".line_table tr:first").html();
					 
					  var htm="<tbody><tr bgcolor=\'#5b9bd5\'>" +t1+"</tr>";
					if(res){

					
					$.each(res,function(i,data){
					   if(i%2==0){htm+="<tr  bgcolor=\'eaeff7\' >"; }
					   else{
						htm+="<tr  bgcolor=\'d2deef\' >"; 
					   }
						
					htm+="<td><a href=\'"+data.image+"\' target=\'_blank\'> <img src=\'"+data.image+"\' width=\'50\' height=\'50\'></a> </td>";
					    htm+="<td ><p >"+data.name+" </p></td>";
					    htm+=" <td ><p >"+data.user_name+"</p></td>";
					    htm+="<td ><p>"+data.time+"</p></td> </tr>";
					
					
					});
					
					   htm+="</tbody>";
					   //console.log(htm);
					  $(".line_table").html(htm);
					
			        }
						
	            }
	        }); 
	
	
	});
	
	$("#modal-desc").click(function(){
	
	   var  data=$("#qrimg").val();
	   
		var qrcode="index.php?act=qrcode&data="+data;
		
		$("#Modalx").modal(\'hide\');
		$("#modal-center").html("<img src=\'"+qrcode+"\'>");
		$("#Modal_qr").modal(\'show\');	
	
	});
	
});

function showbox(){
	
	$("#myModal").modal(\'show\');
}

function showmsg(){
	
	//$("#myModal").modal(\'show\');
}

'; ?>


</script>

<div style="display:none" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

<div class="modal-dialog" style="width:880px;">
		<div class="modal-content">
		<div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"   aria-hidden="true">×
               </button>
               <h4 class="modal-title" id="myModalLabel">
                 图片预览
               </h4>
            </div>
		<div class="modal-body">
		
<div id="snapImg" style="display:none;">
    <img id="imgshow" style="display:none;" border="0" />
</div>


		
		
		<div class="row">
		<div class="col-xs-12">
		
		 <div style="display:none;">
		         <input type="checkbox" id="hideCurrent" value="0"><label for="hideCurrent">自动最小化当前窗口</label>
		<input type="checkbox" id="autoupload" value="0"><label for="autoupload">截图完成后自动上传</label>
		<input type="checkbox" id="captureselectSize" value="0"><label for="captureselectSize">更多个性化截图选择</label> 
		 
		 </div>
		
		<div class="form-group" style="text-align:center;max-height:600px; overflow: auto;" >  
		<img src="http://localhost/Mapbackstage/theme/default/images/Logo1.png" id="show_img" />
		<input  type="hidden" name="base_id" id="base_id" value=""/>
		</div></div>
		</div>
		</div>
            <div class="modal-footer" style="    font-size: 14px;  text-align: center;">
    <span style="margin-right: 100px;color: #337ab7;">  当前用户:<?php echo $this->_tpl_vars['user']['user_name']; ?>
</span>     
           
             文件备注：<input type="text"  class="file_name" name="file_name" style="margin-right: 20px;" id="file_name"/>
               <button type="button" id='Upbtn' class="btn btn-primary">
                  保存上传
               </button>
               <button type="button" class="btn btn-default" data-dismiss="modal">
                  关闭
               </button>
            </div>
         </div><!--/.modal-content-->
	</div><!--/.modal-dialog-->
		</div><!--/.modal -->
		
		<!--浏览图片-->
<div style="display:none" class="modal fade" id="Modal_1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel_1" aria-hidden="true" data-backdrop="static" data-keyboard="false">

<div class="modal-dialog" style="width:780px;">
		<div class="modal-content">
		<div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"   aria-hidden="true">×
               </button>
               <h4 class="modal-title" id="ModalLabel_1">
                 文件列表
               </h4>
            </div>
		<div class="modal-body">
		
		<div class="row">
		<div class="col-xs-12">
	
			<div style="line-height: 20px; margin-bottom: 10px;">
			
			<p class="ps">按时间:
			
	<?php echo '		
<input placeholder="请输入日期" name="start_time" id="start_time" class="laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:\'YYYY-MM-DD hh:mm\'})"> ~

<input placeholder="请输入日期" name="end_time" id="end_time" class="laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:\'YYYY-MM-DD hh:mm\'})">

	'; ?>
	

<!--		
      <input type="text" name="start_time" maxlength="60" size="20" readonly="" id="start_time_id">
      <input name="start_time_btn" type="button" id="start_time_btn" onclick="return showCalendar('start_time_id', '%Y-%m-%d %H:%M', '24', false, 'start_time_btn');" value="选择" class="button">
      ~      
      <input type="text" name="end_time" maxlength="60" size="20" readonly="" id="end_time_id">
      <input name="end_time_btn" type="button" id="end_time_btn" onclick="return showCalendar('end_time_id', '%Y-%m-%d %H:%M', '24', false, 'end_time_btn');" value="选择" class="button"> 
-->	  
        </p><p  class="ps">
			备&nbsp;&nbsp;&nbsp;注:&nbsp;<input type="text" name="s_name" id="s_name">
			&nbsp;&nbsp;&nbsp;保存者:&nbsp;<input type="text" name="s_user" id="s_user">&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" id="jietu_btn" class="btn btn-primary"> 搜&nbsp;索</button>
		  </p>	
			</div>
			
		<div class="form-group" style="text-align:center;max-height:600px; overflow: auto;" >  

		
<table border="0" cellspacing="0" cellpadding="0" width="100%" class="line_table">
  <tr bgcolor="#5b9bd5">
    <td width="20%" ><p ><strong>图片预览</strong></p></td>
    <td width="30%" ><p ><strong>备注</strong></p></td>
    <td width="20%" ><p ><strong>保存者</strong></p></td>
    <td width="30%" ><p ><strong>时间</strong></p></td>
  </tr>
  <?php $_from = $this->_tpl_vars['jietu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['jietu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['jietu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['jietu']):
        $this->_foreach['jietu']['iteration']++;
?>
  <tr  <?php if (($this->_foreach['jietu']['iteration']-1) % 2 == 0): ?> bgcolor="eaeff7" <?php else: ?> bgcolor="d2deef" <?php endif; ?>>
    <td  ><?php if ($this->_tpl_vars['jietu']['image']): ?> <a href="<?php echo $this->_tpl_vars['jietu']['image']; ?>
" target="_blank"><img src='<?php echo $this->_tpl_vars['jietu']['image']; ?>
' width="50" height="50"></a> <?php endif; ?> </td>
    <td  ><p ><?php echo $this->_tpl_vars['jietu']['name']; ?>
 </p></td>
    <td  ><p ><?php echo $this->_tpl_vars['jietu']['user_name']; ?>
</p></td>
    <td  ><p><?php echo $this->_tpl_vars['jietu']['time']; ?>
</p></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>



</table>
		
		</div>
		</div>
		</div>
		</div>
            <div class="modal-footer" style="    font-size: 14px;  text-align: center;">
    <span style="margin-right: 100px;color: #337ab7;">  当前用户:<?php echo $this->_tpl_vars['user']['user_name']; ?>
</span>     
           

               <button type="button" class="btn btn-default" data-dismiss="modal">
                  关闭
               </button>
            </div>
         </div><!--/.modal-content-->
	</div><!--/.modal-dialog-->
		</div><!--/.modal -->		
		
		
<div class="modal fade in" id="Modalx" style="display: none; padding-right: 0px;" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="ModalxLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<div class="modal-title" id="ModalxLabel">
					消息提示
				</div>
			</div>
			<div class="modal-body" style="text-align:center" >
				<div class="modal-text" style="font-size: 18px;color: #ec5051;font-weight: 700;">图片保存成功！</div>
				<div class="modal-desc" id="modal-desc" style="cursor:pointer;padding-top: 6px;">
				<img src="http://localhost/Mapbackstage/theme/default/images/wechat_icon.png" style="width: 42px;"><br>点击分享</div>
				<input type="hidden" value="" id="qrimg">
			</div>
			<div class="modal-footer" style="display:none">
				<button type="button" class="btn1 btn-default" >关闭</button>
	
			</div>
		</div>
	</div>
</div>

<div class="modal fade in" id="Modal_qr" style="display: none; padding-right: 0px;" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="ModalqrLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<div class="modal-title" id="ModalqrLabel">
					扫一扫分享二维码
				</div>
			</div>
			<div class="modal-body" style="text-align:center" id="modal-center">

				
			</div>

		</div>
	</div>
</div>	
		
		

<div  id="info" style="display:none;color: red;text-align:center;position: fixed; top: 0; height: 19px;   background-color:  #000000;
    width: 100%; background-color: rgba(130, 130, 130, 0.2);"></div>