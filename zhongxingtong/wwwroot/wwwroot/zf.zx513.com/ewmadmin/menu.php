<?php
include_once 'inc/conn.php';
?>
<div class="left1">
<a class="button button-block button-rounded button-highlight button-large">&#21830;&#25143;&#31649;&#29702;</a>
<a href="/<?php echo $ewmadminurl; ?>/" class="button button-block button-rounded button-larg">&#20108;&#32500;&#30721;&#31649;&#29702;&#31995;&#32479;</a>
<br>
<a href="urledit.php" class="button button-block button-rounded button-larg">&#20462;&#25913;&#37197;&#32622;</a>
<br>
<a href="admin_pw.php" class="button button-block button-rounded button-larg">&#23494;&#30721;&#20462;&#25913;</a>
<br>
<a href="paylist.php" class="button button-block button-rounded button-larg">&#35746;&#21333;&#25968;&#25454;&#31649;&#29702;</a>
<br>
<a href="tongji.php" class="button button-block button-rounded button-larg">&#32479;&#35745;&#20449;&#24687;</a>
<br>
<a href="delryewm.php" target="_blank" class="button button-block button-rounded button-larg">&#28165;&#38500;&#33258;&#21160;&#29983;&#25104;&#30340;&#20108;&#32500;&#30721;&#35760;&#24405;</a>
<br>
	<?php
	if($xianail==1){
	?>
<a href="news-20.php" target="_blank" class="button button-block button-rounded button-larg">&#25903;&#20184;&#23453;&#20108;&#32500;&#30721;&#21046;&#20316;</a>
<br>
	<?php
	}
	if($xiancft==1){
	?>	
<a href="news-34.php" target="_blank" class="button button-block button-rounded button-larg">&#81;&#81;&#38065;&#21253;&#20108;&#32500;&#30721;&#21046;&#20316;</a>
<br>
	<?php
	}
	if($xianwx==1){
	?>
<a href="news-38.php" target="_blank" class="button button-block button-rounded button-larg">&#24494;&#20449;&#20108;&#32500;&#30721;&#21046;&#20316;</a>
<br>
	<?php
	}
	?>
</div>