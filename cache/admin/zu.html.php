<?php /* Smarty version 2.6.26, created on 2018-08-28 11:48:08
         compiled from zu.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php echo '
  <!--[imcss] *** Infinite Menus Core CSS: Keep this section in the document head for full validation. -->
<style type="text/css">.imcm ul,.imcm li,.imcm div,.imcm span,.imcm a{text-align:left;vertical-align:top;padding:0px;margin:0;list-style:none outside none;border-style:none;background-image:none;clear:none;float:none;display:block;position:static;overflow:visible;line-height:normal;}.imcm li a img{display:inline;border-width:0px;}.imcm span{display:inline;}.imcm .imclear,.imclear{clear:both;height:0px;visibility:hidden;line-height:0px;font-size:1px;}.imcm .imsc{position:relative;}.imcm .imsubc{position:absolute;visibility:hidden;}.imcm li{list-style:none;font-size:1px;float:left;}.imcm ul ul li{width:100%;float:none !important;}.imcm a{display:block;position:relative;}.imcm ul .imsc,.imcm ul .imsubc {z-index:10;}.imcm ul ul .imsc,.imcm ul ul .imsubc{z-index:20;}.imcm ul ul ul .imsc,.imcm ul ul ul .imsubc{z-index:30;}.imde ul li:hover .imsubc{visibility:visible;}.imde ul ul li:hover  .imsubc{visibility:visible;}.imde ul ul ul li:hover  .imsubc{visibility:visible;}.imde li:hover ul  .imsubc{visibility:hidden;}.imde li:hover ul ul .imsubc{visibility:hidden;}.imde li:hover ul ul ul  .imsubc{visibility:hidden;}.imcm .imea{display:block;position:relative;left:0px;font-size:1px;line-height:1px;height:0px;width:1px;float:right;}.imcm .imea span{display:block;position:relative;font-size:1px;line-height:0px;}.dvs,.dvm{border-width:0px}/*\\*//*/.imcm .imea{visibility:hidden;}/**/</style>


<!--[imstyles] *** Infinite Menu Styles: Keep this section in the document head for full validation. -->
<style type="text/css">


	/* --[[ Main Expand Icons ]]-- */
	#imenus0 .imeam span,#imenus0 .imeamj span {background-image:url(templates/shu/light_arrow_right.gif); width:6px; height:9px; left:-6px; top:5px; background-repeat:no-repeat;background-position:top left;}
	#imenus0 li:hover .imeam span,#imenus0 li a.iactive .imeamj span {background-image:url(templates/shu/light_arrow_right.gif); background-repeat:no-repeat;background-position:top left;}


	/* --[[ Sub Expand Icons ]]-- */
	#imenus0 ul .imeas span,#imenus0 ul .imeasj span {background-image:url(templates/shu/medium_purple_right.gif); width:6px; height:9px; left:-6px; top:3px; background-repeat:no-repeat;background-position:top left;}
	#imenus0 ul li:hover .imeas span,#imenus0 ul li a.iactive .imeasj span {background-image:url(templates/shu/medium_purple_right.gif); background-repeat:no-repeat;background-position:top left;}


	/* --[[ Main Container ]]-- */
	#imouter0 {border-style:none; border-color:#6a6a6a; border-width:1px; padding:0px; margin:0px; }


	/* --[[ Sub Container ]]-- */
	#imenus0 li ul {background-color:#d3d2df; border-style:solid; border-color:#333333; border-width:1px; padding:5px; margin:4px 0px 0px; }


	/* --[[ Main Items ]]-- */
	#imenus0 li a, #imenus0 .imctitle {height:20px; background-color:#585575; color:#dddddd; text-align:left; font-family:Arial; font-size:12px; font-weight:normal; text-decoration:none; border-style:none; border-color:#ffffff; border-width:1px; padding:2px 8px; margin:0px 0px 2px; }

		/* [hover] - These settings must be duplicated for IE compatibility.*/
	/*	#imenus0 li:hover>a {text-decoration:underline; }
	#imenus0 li a.ihover, .imde imenus0 a:hover {text-decoration:underline; }
*/
		/* [active] */
		#imenus0 li a.iactive {}


	/* --[[ Sub Items ]]-- */
	#imenus0 ul a, #imenus0 .imsubc li .imctitle  {height:auto; background-color:transparent; color:#555555; text-align:left; font-size:11px; font-weight:normal; text-decoration:none; border-style:none; border-color:#000000; border-width:1px; padding:2px 5px; margin:0px; }

		/* [hover] - These settings must be duplicated for IE comptatibility.*/
		#imenus0 ul li:hover>a {color:#000000; text-decoration:underline; }
		#imenus0 ul li a.ihover {color:#000000; text-decoration:underline; }

		/* [active] */
		#imenus0 ul li a.iactive {background-color:#ffffff; }

.imatm{height:35px;line-height:35px;}
.pager{display: none;}
</style><!--end-->
'; ?>

</head>
  <body>







<!--|**START IMENUS**|imenus0,inline-->

<!--  ****** Infinite Menus Structure & Links ***** -->
<div class="imrcmain0 imgl" style="width:149px; margin-top:35px;z-index:999999;position:relative;"><div class="imcm imde" id="imouter0"><ul id="imenus0">
<?php $_from = $this->_tpl_vars['tree_zuzhi']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tree']):
?>
<li class="imatm"  style="width:100%;">
<a class="" href="zuzhi.php?rec=edit&id=<?php echo $this->_tpl_vars['tree']['zid']; ?>
"><span class="imea imeam"><span></span></span><?php echo $this->_tpl_vars['tree']['code']; ?>
-<?php echo $this->_tpl_vars['tree']['zname']; ?>
</a>

	<div class="imsc"><div class="imsubc" style="width:145px;top:-30px;left:159px;">
	<div class="imunder"></div><div></div>
	<ul style="">
<?php $_from = $this->_tpl_vars['tree']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tree1']):
?>
	<li><a href="zuzhi.php?rec=edit&id=<?php echo $this->_tpl_vars['tree1']['zid']; ?>
"><span class="imea imeas"><span></span></span><?php echo $this->_tpl_vars['tree1']['code']; ?>
-<?php echo $this->_tpl_vars['tree1']['zname']; ?>
</a>

		<div class="imsc">
		<div class="imsubc" style="width:140px;top:-23px;left:138px;"><div class="imunder"></div><div></div><ul style="">
		<?php $_from = $this->_tpl_vars['tree1']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tree2']):
?>
		
		<li><a href="zuzhi.php?rec=edit&id=<?php echo $this->_tpl_vars['tree2']['zid']; ?>
"><span class="imea imeas"><span></span></span><?php echo $this->_tpl_vars['tree2']['code']; ?>
-<?php echo $this->_tpl_vars['tree2']['zname']; ?>
</a>
		
				<div class="imsc">
		<div class="imsubc" style="width:140px;top:-23px;left:138px;"><div class="imunder"></div><div></div><ul style="">
		
		<?php $_from = $this->_tpl_vars['tree2']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tree3']):
?>
		<li><a href="zuzhi.php?rec=edit&id=<?php echo $this->_tpl_vars['tree3']['zid']; ?>
"><span class="imea imeas"><span></span></span><?php echo $this->_tpl_vars['tree3']['code']; ?>
-<?php echo $this->_tpl_vars['tree3']['zname']; ?>
</a>
		
							<div class="imsc">
		<div class="imsubc" style="width:140px;top:-23px;left:138px;"><div class="imunder"></div><div></div><ul style="">
		<?php $_from = $this->_tpl_vars['tree3']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tree4']):
?>
		<li><a href="zuzhi.php?rec=edit&id=<?php echo $this->_tpl_vars['tree4']['zid']; ?>
"><?php echo $this->_tpl_vars['tree4']['code']; ?>
-<?php echo $this->_tpl_vars['tree4']['zname']; ?>
</a></li>
		<?php endforeach; endif; unset($_from); ?>
		
		</ul></div></div>
		
		</li>
		<?php endforeach; endif; unset($_from); ?>
		
		</ul></div></div>
		</li>
		<?php endforeach; endif; unset($_from); ?>

		
		
		</ul></div></div></li>
<?php endforeach; endif; unset($_from); ?>



	</ul></div></div></li>

<?php endforeach; endif; unset($_from); ?>







</ul><div class="imclear">&nbsp;</div></div></div>



<!--|**END IMENUS**|-->







  

<!--[imcode]*** Infinite Menus Settings / Code - This script reference must appear last. ***

      *Note: This script is required for scripted add on support and IE 6 sub menu functionality.
      *Note: This menu will fully function in all CSS2 browsers with the script removed.-->

<script language="JavaScript" src="templates/shu/ocscript.js" type="text/javascript"></script>
