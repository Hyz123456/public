<style>
 .Hyzx-right .Hyzx-content {
    padding: 20px;
    padding-bottom: 0;
}
</style>
<div class="Hyzx-body">
    <div class="Hyzx-right">
        <h3 class="nav2">
            <span class="flt">额度转换</span>
            <a href="javascript: f_com.MChgPager({method: 'gameSwitch'}, {type: 'banktrans'});" data="bank_transf_index" class="Hyzx-btn flt active">额度转换</a>
            <a href="javascript: f_com.MChgPager({method: 'bankATM1'});" data="bank_onlinein_index" class="Hyzx-btn flt">线上存款</a>
            <a href="javascript: f_com.MChgPager({method: 'bankTake'});" data="bank_onlineout_index" class="Hyzx-btn flt">线上取款</a>
        </h3>
        <div class="Hyzx-content iframe_por">
            <iframe class="iframe" width="920" height="550" src="../../moneychange4.php" frameborder="0" scrolling="no"  ></iframe>
        </div>
    </div>
</div>
<script type="text/javascript">
$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script> 

