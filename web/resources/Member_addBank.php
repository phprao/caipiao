<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>{:GetVar('webtitle')}</title>
	<meta name="keywords" content="{:GetVar('keywords')}" />
	<meta name="description" content="{:GetVar('description')}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >

	<link rel="stylesheet" href="__CSS2__/bootstrap.min.css">
	<link rel="stylesheet" href="__CSS2__/reset.css">
	<link rel="stylesheet" href="__CSS2__/icon.css">
	<link rel="stylesheet" href="__CSS2__/header.css">
	<link rel="stylesheet" href="__CSS2__/updatePass.css">
	<link rel="stylesheet" href="__CSS2__/footer.css">
	<link rel="stylesheet" href="__JS2__/layer/skin/default/layer.css">
	<link rel="stylesheet" href="//at.alicdn.com/t/font_bnvu6xzx1198uxr.css">

</head>
<body>
 <include file="Public/header" />
 <script src="__JS2__/require.js" data-main="__JS2__/homePage"></script>

	<div class="update_pass">
	<div class="container-fluid">
		<form action="{:U('Member/addBank')}" class="update_form" method="post" style="margin-top:50px;">
			<div class="clearfix drop_menu" style="margin-bottom:22px;">
				<div>
					<span class="">持卡人姓名：</span>
					<div class="form-group accountname">
						 {$userinfo.userbankname}
					</div>
				</div>
				<div>
				<span class="">开户银行：</span>
				<div class="form-group">
					<select name="bankname"  id="sysBankCard" class="form-control">
						<option value="">请选择银行</option>
						<volist name="Allbank" id="value">
							<option value="{$value['bankcode']}">{$value['bankname']}</option>
						</volist>
					</select>
				</div>
				</div>
			</div>
			<div class="clearfix drop_menu" style="margin-bottom:12px;">
				<div>
				<span class="">开户城市：</span>
				<div class="form-group s_group clearfix">
					<select id="s_province" class="pull-left"  name="province" data-shen="省份"></select>  
					<select id="s_city" class="pull-right"   name="city" data-shi="地级市"></select>  
				</div>
				</div>
			</div>
			<div class="clearfix drop_menu">
			<div class="clearfix drop_menu">
				<div class="answer">
					<span>开户网点：</span>
					<input type="text" id="bankBranch" name="accountname">
				</div>
			</div>
			</div>
			<div class="clearfix drop_menu">
			<div class="answer">
					<span>银行卡号：</span>
					<input type="text"  id="bankCardNum" name="banknumber">
			</div>
			</div>
			<div class="clearfix drop_menu">
			<div class="answer">
				<span>确认卡号：</span>
				<input type="text"  id="regBankCardNum" name="rebanknumber">
			</div>
			</div>
			<div class="clearfix drop_menu">
			<div class="answer">
					<span>资金密码：</span>
					<input type="password" id="bankTradPwd" name="safepass">
			</div>
			</div>
			<button class="btn common_btn save_pass" onclick="userbindbankcard();" type="button">提交</button>
		</form>
	</div>
	</div>
 <include file="Public/footer" />
 <script>
	 var userbindbankcard = function(){

		 var url = '__ROOT__/Apijiekou.' + 'userbindbankcard'; 
				 var bankCode = $("#sysBankCard").val();
		         var accountname = $(".accountname").html();
				 var bankCardNumber = $("#bankCardNum").val();
				 var regbankCardNumber = $("#regBankCardNum").val();
				 var province = $("#s_province").val();
				 var city = $("#s_city").val();
		 
				 var bankTradPwd = $("#bankTradPwd").val();
				 // 07-11 add 开户行网点
				 var bankBranch = $("#bankBranch").val();
				 bankBranch = bankBranch?bankBranch:"";
				 if (bankCode.length < 1) {
					 alt("请选择银行卡");return false;
				 } else if (province=="省份" || city=="地级市") {
					 alt("请选择开户省市");return false;

				 } else if (bankCardNumber.length < 1) {
					 alt("请输入银行卡号");return false;

				 } else if (regbankCardNumber.length < 1) {
					 alt("请输入确认银行卡号");return false;
				 } else if (regbankCardNumber != bankCardNumber) {
					 alt("两次卡号输入的不一致，请重新输入");return false;
				 } else if (bankTradPwd.length < 1) {
					 alt("请输入资金密码");return false;
				 }
				 var bankAddress = province + "-" + city;
				 $.post(url,{
					 "bankCardNumber": bankCardNumber,
					 "accountname": accountname,
					 "bankAddress": bankAddress,
					 "bankTradPwd": bankTradPwd,
					 "bankCode": bankCode,
					 "regbankCardNumber": regbankCardNumber,
					 "bankBranch": bankBranch
				 }, function(json){
					 if(json.sign){
						 alt('银行绑定成功',1);
						 window.location.href="{:U('Member/bankcard')}";
					 }else{
						 alt(json.message,-1);
						 return false;
					 }
					 return false;
				 },'json');

/*			 },
			 lock:true
		 });*/
	 }
 </script>
<!--	<div class="modal fade update_pass_success" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">温馨提示</h4>
	      </div>
	      <div class="modal-body">
	        绑定成功
	      </div>
	      <div class="modal-footer">
	        <a href="bankCard.html" class="btn common_btn">确定</a>
	      </div>
	    </div>
	  </div>
	</div>-->

</body>
</html>