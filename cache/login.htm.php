<?php /* Smarty version 2.6.26, created on 2018-08-29 10:02:58
         compiled from login.htm */ ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>登录</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://localhost/Mapbackstage/theme/<?php echo $this->_tpl_vars['theme_name']; ?>
/styles/general.css" rel="stylesheet" type="text/css" />

<?php echo '
<style type="text/css">
.div1{margin-top: 60px;
    margin-left: 33px;
    font-size: 14px;}
	.div2{
	
	margin-top: 20px;
    margin-left: 33px;
    font-size: 14px;
	}
	.input{
	    color: #333;
    border: 1px solid #BBBBBB;
    background-color: #EEEEEE;
    padding: 8px 8px;
	width:200px;
	
	}
	.btn{display: inline-block;
    background-color: #0072C6;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border: 0;
    color: #FFF;
    font-size: 14px;
    padding: 8px 55px;
    font-weight: bold;
    text-transform: capitalize;
    cursor: pointer;
    -webkit-appearance: none;
	width: 210px;
    margin-bottom: 20px;
	 margin-top: 20px;
	 
	
	}
</style>
<script>
$(function(){
	

	
});

</script>

'; ?>

</head>
<body>
<div style="padding-top:20%">

<?php echo '

 <div class="login-div" style="border:1px solid #bbbbbb;width:350px;  margin:0 auto; height:250px;">
 
			<form action="login.php?rec=login"  method="post">
			<div class="div1">
			
			<div style="width: 39px; float: left;"><img src="http://localhost/Mapbackstage/theme/default/images/d1.png"> </div>
			<div>
			<input type="text" name="user_name" class="input" value="USERID"  onfocus="if(value==\'USERID\'){value=\'\'}" onblur="if(this.value==\'\'){value=\'USERID\'}" onclick="javascript:if(this.value==\'\')this.value=\'\'">
			</div>
			</div>

			
			
			<div class="div2">
			<div style="width: 39px; float: left;">
			<img src="http://localhost/Mapbackstage/theme/default/images/d2.png">
			 </div>
			 <div>
			<input type="password" name="password" class="input" value="PASSWORD" onfocus="if(value==\'PASSWORD\'){value=\'\'}" onblur="if(this.value==\'\'){value=\'PASSWORD\'}" onclick="javascript:if(this.value==\'\')this.value=\'\'">
			</div>
			</div>
			
			
			<div class="btnBox">
     <input type="submit" name="submit" class="btn" value="登录">
     <div class="action" style="display:none;text-align: center;">忘记密码？<a href="login.php?rec=password_reset">立即找回</a></div> 
    </div>
			
			
		

  </form>
 
 
 </div>
'; ?>


</div>

</body>
</html>