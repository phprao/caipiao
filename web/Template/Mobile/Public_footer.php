	<php>
	$a=1;
	$b=2;
	$c=3;
	$d=4;
		if(strstr($_SERVER['REQUEST_URI'],"Activity")) {
			$c='33';
		}
		else if(strstr($_SERVER['REQUEST_URI'],"betRecord")) {
			$b='22';
		}
		else if(strstr($_SERVER['REQUEST_URI'],"Member")) {
			$d='44';
		}else{
			$a='11';
		}
		
	</php>
<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default bottom_navbar" >
  <ul class="am-navbar-nav am-cf am-avg-sm-4">
    <li>
      <a href="__ROOT__/" class="bottom_navbar_list">
						<i class="iconfont" style="color:#07b39e"><img src="/app/{$a}.png" /></i>
        <span class="am-navbar-label">首页</span> 
      </a>
    </li>

    <li>
      <a href="{:U('Member/betRecord')}" class="bottom_navbar_list">
						<i class="iconfont" style="color:#07b39e"><img src="/app/{$b}.png" /></i>
        <span class="am-navbar-label">记录</span>
      </a>
    </li>
	<li>
      <a href="{:U('/Activity.index.do')}" class="bottom_navbar_list">
						<i class="iconfont" style="color:#07b39e"><img src="/app/{$c}.png" /></i>
        <span class="am-navbar-label">活动</span>
      </a>
    </li>
    <li>
      <a href="{:U('Member/index')}" class="bottom_navbar_list">
						<i class="iconfont" style="color:#07b39e"><img src="/app/{$d}.png" /></i>
        <span class="am-navbar-label">会员</span>
      </a>
    </li>
  </ul>
</div>
<script>	
var cpname="{:I('code')}"; 
function Order_chedan(id,trano,obj){
				artDialog({
					content:'确定撤单吗',
					cancel:function(){},
					ok:function(){
					$.post('/Apijiekou.chedan',{'id':id,'trano':trano}, function(json){
							if(json.sign==true){
								//alt('撤单成功','success');
								art.dialog({
									time: 2,
									content:'撤单成功',
									lock:true
								});
								$(obj).html('<span style="color:grey">已撤单</span>');
							}else{
								alt(json.message);
							}
						},'json'); 

					},
					lock:true
				})
				
	};</script>