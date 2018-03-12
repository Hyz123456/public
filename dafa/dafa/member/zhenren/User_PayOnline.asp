<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%option explicit%>
<!--#include file="../Conn.asp"-->
<!--#include file="../Plus/md5.asp"-->
<!--#include file="../KS_Cls/Kesion.MemberCls.asp"-->
<!--#include file="../KS_Cls/Kesion.Label.CommonCls.asp"-->
<!--#include file="payfunction.asp"-->
<%
'******************************************************************
' Software name:KesionCMS X1.0
' Email: service@kesion.com . 营销QQ:4000080263  Tel:400-008-0263
' Web: http://www.kesion.com http://www.kesion.cn
' Copyright (C) Kesion Network All Rights Reserved.
'******************************************************************
Dim KSCls
Set KSCls = New User_PayOnline
KSCls.Kesion()
Set KSCls = Nothing

Class User_PayOnline
        Private KS,KSUser
		Private Sub Class_Initialize()
		  Set KS=New PublicCls
		  Set KSUser = New UserCls
		End Sub
        Private Sub Class_Terminate()
		 Set KS=Nothing
		 Set KSUser=Nothing
		End Sub
		%>
		<!--#include file="../KS_Cls/UserFunction.asp"-->
		<%
		Public Sub LoadMain()
		IF Cbool(KSUser.UserLoginChecked)=false Then
		  Response.Write "<script>top.location.href='Login';</script>"
		  Exit Sub
		End If
		Call KSUser.Head()
		Call KSUser.InnerLocation("在线支付")
		Response.Write "<div class=""tabs"">"
		Response.Write " <ul class="""">"
		Response.Write " <li class='puton'><a href=""User_PayOnline.asp"">在线支付买分</a></li>"
		Response.Write " <li style=""display:none""><a href=""user_recharge.asp"">充值卡充值</a></li>"
		If Mid(KS.Setting(170),1,1)="1" or Mid(KS.Setting(170),2,1)="1" Then
		Response.Write " <li style=""display:none""><a href=""user_exchange.asp?Action=Point"">兑换" & KS.Setting(45) & "</a></li>"
		End If
		If Mid(KS.Setting(170),3,1)="1" or Mid(KS.Setting(170),4,1)="1" Then
		Response.Write " <li style=""display:none""><a href=""user_exchange.asp?Action=Edays"">兑换有效期</a></li>"
		End If
		If Mid(KS.Setting(170),5,1)="1" Then
		Response.Write " <li style=""display:none""><a href=""user_exchange.asp?Action=Money"">" & KS.Setting(45) & "兑换账户资金</a></li>"
		End If
		Response.Write "</ul>"
		Response.Write "</div>"
		Select Case KS.S("Action")
		 Case "PayStep2"
		    Call PayStep2()
		 Case "PayStep3"
		    Call PayStep3()
		 Case "Payonline"
		    Call PayShopOrder()
	     Case Else
		    Call PayOnline()
		End Select
       End Sub
	  
	   
	   Sub PayOnline()
	    %>
	   <script type="text/javascript">
	     function Confirm(v)
		 {
		  $("#paytype").val(v);
		  if (v==1){
		    return(confirm('此操作不可逆，确定使用余额支付购买吗？'));
		  }
		  if (document.myform.Money.value=="")
		  {
		   alert('请输入你要充值的金额!')
		   document.myform.Money.focus();
		   return false;
		  }
		  return true;
		  }
	   </script>
		<FORM name=myform action="User_PayOnline.asp" method="post">
		  <table class=border cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
			<tr>
			  <td class="title" colSpan=2 height=25>&nbsp;在线充值</td>
			</tr>
            <tr class=tdbg>
			  <td align=right width=213>买分域名：</td>
			  <td width="754"><span style="color:#F00;font-size:16px;font-weight:500;font-family:'微软雅黑';"><%=KSUser.UserName%></span></td>
			</tr>
            <tr class=tdbg>
			  <td align=right width=213>温馨提示：</td>
			  <td width="754"><span style="color:#F00;font-size:16px;font-weight:700;font-family:'微软雅黑';">请您先确认域名后开始买分，购买分后30分钟内到账，晚上和周末买分二小时内到账。</span></td>
			</tr>
            
		
			<tr class=tdbg style="display:none;">
            
			  <!--<td width="213" align=right>计费方式：</td>
			  <td><%if KSUser.ChargeType=1 Then 
		  Response.Write "扣点数</font>计费用户"
		  ElseIf KSUser.ChargeType=2 Then
		   Response.Write "有效期</font>计费用户,到期时间：" & cdate(KSUser.GetUserInfo("BeginDate"))+KSUser.GetUserInfo("Edays") & ","
		  ElseIf KSUser.ChargeType=3 Then
		   Response.Write "无限期</font>计费用户"
		  End If
		  %>&nbsp;</td>-->
          
		    </tr>
			<tr class=tdbg style="display:none;">
			  <td align=right width=213>资金余额：</td>
			  <td><input type='hidden' value='<%=KSUser.GetUserInfo("Money")%>' name='Premoney'><%=formatnumber(KSUser.GetUserInfo("Money"),2,-1)%> 元</td>
			</tr>
			<%If KSUser.ChargeType=1 then%>
			<tr class=tdbg style="display:none;">
			  <td align=right width=213>可用<%=KS.Setting(45)%>：</td>
			  <td><%=KSUser.GetUserInfo("Point")%>&nbsp;<%=KS.Setting(46)%></td>
			</tr>
			<%end if%>
			<%If KSUser.ChargeType=2 then%>
			<tr class=tdbg style="display:none;">
			  <td align=right width=213>剩余天数：</td>
			  <td>
			  <%if KSUser.ChargeType=3 Then%>
			  无限期
			  <%else%>
			  <%=KSUser.GetEdays%>&nbsp;天
			  <%end if%></td>
			</tr>
		   <%end if%>
			<tr class=tdbg style="display:none;">
			  <td align=right>当前级别：</td>
			  <td><%=KS.U_G(KSUser.GroupID,"groupname")%></td>
		    </tr>
			<tr>
			  <td class="title" colSpan=2 height=25>&nbsp;选择在线充值方式</td>
			</tr>

			<tr class=tdbg>
			  <td colspan="2">
			  <%
			   Dim HasCard:HasCard=false
			   Dim RSC,AllowGroupID:Set RSC=Conn.Execute("Select ID,GroupName,Money,AllowGroupID From KS_UserCard Where CardType=1 and DateDiff(" & DataPart_S & ",EndDate," & SqlNowString& ")<0")
			   Do While NOt RSC.Eof 
			      HasCard=true
			      AllowGroupID=RSC("AllowGroupID") : If IsNull(AllowGroupID) Then AllowGroupID=" "
			     If KS.IsNul(AllowGroupID) Or KS.FoundInArr(AllowGroupID,KSUser.GroupID,",")=true Then
			    response.write "&nbsp;&nbsp; <label><input checked name=""UserCardID"" onclick=""$('#m').hide();$('#paybutton').attr('disabled',false);"" type=""radio"" value=""" & rsc("ID") & """/>" & rsc(1) & " (需要花费 <span style='color:red'>" & formatnumber(RSC(2),2,-1) & "</span> 元)</label><br/>"
				End If
			    RSC.MoveNext
			   Loop
			   RSC.Close
			   Set RSC=Nothing
			  %>
			  <%If Mid(KS.Setting(170),6,1)="1" Then%>
			  &nbsp;&nbsp; <label><input <%if HasCard=false Then response.write " checked"%> onClick="$('#m').show();$('#paybutton').attr('disabled',true);" type="radio" value="0" name="UserCardID"> 自 由 买 分</label><br/>
			  <%end if%>
              <span style='margin-left:15px;'>选择接口:</span>
			  <select id='beishu' onchange='caculate($("#shuliang").val())'>
				<option value='1000'>AG</option>
				<option value='1000'>BBIN</option>
				<option value='1200'>MG</option>
				<option value='1200'>DS</option>
				<option value='1200'>HG</option>
				<option value='1800'>PT</option>
				<option value='1100'>NA</option>
                <option value='1200'>欧博</option>
                <option value='1200'>申博</option>
			  </select>
				倍数
			  <input type='text' id='shuliang' value='1' onkeyup='caculate(this.value)' style='width:50px;' />
			  <span id='shuoming' style='color:red'></span>
			  <br>
			 
              <span id='m'<%if HasCard=true Then response.write " style=""display:none"""%>> &nbsp;&nbsp;&nbsp;&nbsp;请输入你要买分的金额：&nbsp;<input style="text-align:center;line-height:22px" name="Money" id="Money" readonly='readonly' type="text" class="textbox" value="1000" size="10" maxlength="10"> 元</span><span id='tishi' style='margin-left:20px; '></span>
              
              <script>
				function caculate(points){
					if(!points){
						points = 0;
					}
					if(parseFloat(points)<1){
						//$('#shuliang').val(0);
						points = 0;
					}else{
						$('#shuliang').val(parseInt(points));
						points = parseInt(points);
					}

					$('#Money').val(points*$('#beishu').val());
					//$('#tishi').text('您将获得'+$('#beishu').find("option:selected").text()+'积分'+10000*points);
					$('#tishi').text('您将获得'+10000*points+'元游戏额度');
					$('#shuoming').text($('#beishu').val()+'元 =' + '10000' +$( '#beishu' ).find( "option:selected" ).text()+ '分');
				}
				caculate(1);
			  </script>
			  </td>
		    </tr>
			<tr class=tdbg>
			  <td align=middle colSpan=2 height=40>
		        <Input id="Action" type="hidden" value="PayStep2" name="Action"> 
				<Input class="button" id=Submit type=submit value=" 进入在线支付 " onClick="return(Confirm(0))" name=Submit>
				<%if HasCard then%>
				<input type='hidden' name='paytype' id='paytype' value='1'/>
				<Input class="button" id="paybutton" type=submit value=" 使用余额支付 " onClick="return(Confirm(1))"  name=Submit>
				<%end if%>
				 </td>
			</tr>
		  </table>
		</FORM>
		<br/><br/>
	   <%
	   End Sub
	   
	   Sub PayStep2()
	    Dim UserCardID:UserCardID=KS.ChkClng(KS.G("UserCardID"))
	   	Dim Money:Money=KS.S("Money")
		Dim Title,PayType,ValidUnit
		PayType=KS.ChkClng(KS.S("PayType"))
		
		If UserCardID<>0 Then
		   Dim RS:Set RS=Conn.Execute("Select Top 1 Money,GroupName,ValidUnit From KS_UserCard Where ID=" & UserCardID)
		   If Not RS.Eof Then
		    Title=RS(1)
		    Money=RS(0)
			ValidUnit=RS(2)
			RS.Close : Set RS=Nothing
		   Else
		    RS.Close : Set RS=Nothing
		    Call KS.AlertHistory("出错啦！",-1)
			Exit Sub 
		   End If
		   '判断用户有没有选择按余额购买
		   If PayType=1 Then
		     If KS.ChkClng(ValidUnit)=3 Then
		      Call KS.AlertHistory("对不起，本充值卡不能用余额支付！",-1)
			 End If
		     If round(KSUser.GetUserInfo("money"),2)<round(Money,2) Then
		      Call KS.AlertHistory("对不起，您可用金额不足，本充值卡需要消费" & Money & "元，您当前的可用余额为" & Formatnumber(KSUser.GetUserInfo("money"),2,-1,-1) & "元，请选择按在线购买支付！",-1)
			  Exit Sub
			 End If
			 Call UpdateByCard(1,UserCardID,KSUser.UserName,KSUser.GetUserInfo("RealName"),KSUser.GetUserInfo("Edays"),KSUser.GetUserInfo("BeginDate"),UserCardID,"")
			 Session(KS.SiteSN&"UserInfo")=empty
			 Response.Write("<script>alert('恭喜，[" & title & "]购买成功！');location.href='user_logmoney.asp';</script>")
			 response.End()
		   End If 
		   
		   
		ElseIf Mid(KS.Setting(170),6,1)="0" Then
		  KS.AlertHintScript "对不起，本站不允许会员自由充值！"
		  Exit Sub
		Else
		   Title="为自己的账户充值"
		End If

		If Not IsNumeric(Money) Then
		  Call KS.AlertHistory("对不起，您输入的充值金额不正确！",-1)
		  exit sub
		End If
		
		If Money=0 Then
		  Call KS.AlertHistory("对不起，充值金额最低为0.01元！",-1)
		  exit sub
		End If
		Dim OrderID:OrderID=KS.Setting(72) & Year(Now)&right("0"&Month(Now),2)&right("0"&Day(Now),2)&hour(Now)&minute(Now)&second(Now)
		
		%>
	   <FORM name=myform action="User_PayOnline.asp" method="post">
		  <table id="c1" class=border cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
			<tr class=title>
			  <td align=middle colSpan=2 height=22><B> 确 认 款 项</B></td>
			</tr>
			<tr class=tdbg>
			  <td align=right width=167>用户名：</td>
			  <td width="505"><%=KSUser.UserName%></td>
			</tr>
			<tr class=tdbg>
			  <td width="167" align=right>支付编号：</td>
			  <td><input type='hidden' value='<%=OrderID%>' name='OrderID'><%=OrderID%>&nbsp;</td>
		    </tr>
			<tr class=tdbg>
			  <td align=right width=167>支付金额：</td>
			  <td><input type='hidden' value='<%=Money%>' name='Money'><%=FormatNumber(Money,2,-1)%> 元</td>
			</tr>
			<%If title<>"" then%>
			<tr class=tdbg style="display:none;">
			  <td align=right width=167>支付用途：</td>
			  <td style="color:red">“<%=title%>”</td>
			</tr>
			<%end if%>

			<tr class=tdbg>
			  <td align=right width=167>选择在线支付平台：</td>
			  <td>
			  <%
			   Dim SQL,K,Param
			   If UserCardID<>0 Then
			    Param=" and id in(1,10,6,7,12,13,14)"
			   End IF
			   Set RS=Server.CreateOBject("ADODB.RECORDSET")
			   RS.Open "Select ID,PlatName,Note,IsDefault From KS_PaymentPlat Where IsDisabled=1 " & Param & " Order By OrderID",conn,1,1
			   If Not RS.Eof Then SQL=RS.GetRows(-1)
			   RS.Close:Set RS=Nothing
			   If Not IsArray(SQL) Then
			    Response.Write "<font color='red'>对不起，本站暂不开通在线支付功能！</font>"
			   Else
			     For K=0 To Ubound(SQL,2)
				   Response.Write "<input type='radio' value='" & SQL(0,K) & "' name='PaymentPlat'"
				   If SQL(3,K)="1" Then Response.Write " checked"
				   Response.Write ">"& SQL(1,K) & "(" & SQL(2,K) &")<br>"
				 Next
			   End If
			  %>
			  </td>
			</tr>
			
			<tr class=tdbg>
			  <td align=middle colSpan=2 height=40>
		        <Input id=Action type=hidden value="PayStep3" name="Action"> 
		        <Input id=Action type=hidden value="<%=UserCardID%>" name="UserCardID"> 
		        <Input type=hidden value="user" name="PayFrom"> 
				<Input class="button" id="Submit" type="submit" value=" 下一步 " onclick="return(check());" name="Submit">
				<input class="button" type="button" value=" 上一步 " onClick="javascript:history.back();"> 
				</td>
			</tr>
		  </table>
		</FORM>
         <script>
		 function check(){
		  var PaymentPlat=$("input[name='PaymentPlat']:checked").val();
		  if (PaymentPlat==undefined){
		   alert('选择支付方式!');
		   return false;
		  }
		 }
		</script>
		<%
	   End Sub
	   
	   
	   '支付商城订单
	   Sub PayShopOrder()
	  	 Dim ID:ID=KS.ChkClng(KS.S("ID"))
		 Dim RS:Set RS=Server.CreateObject("ADODB.RECORDSET")
		 RS.Open "Select top 1 OrderID,MoneyTotal,DeliverType,Status,OrderType From KS_Order Where ID="& ID,Conn,1,1
		 If RS.Eof Then
		  rs.close:set rs=nothing
		  KS.Die "<script>alert('出错啦!');history.back();</script>"
		 End If 
		If KS.ChkCLng(KS.Setting(49))=1 Then
		  If RS("Status")=0 Then
		    RS.Close:Set RS=Nothing
		   	KS.Die "<script>alert('对不起，该订单还未确认，本站启用只有后台确认过的订单才能在线支付!');history.back();</script>"
		  End If
		End If
		
		Dim OrderID:OrderID=RS("OrderID")
	   	Dim Money:Money=RS("MoneyTotal")
		Dim DeliverType:DeliverType=RS("DeliverType")
		Dim OrderType:OrderType=RS("OrderType")
		RS.Close
		Dim DeliverName,ProductName
		RS.Open "Select Top 1 TypeName From KS_Delivery Where Typeid=" & DeliverType,conn,1,1
		If Not RS.Eof Then
		 DeliverName=RS(0)
		End IF
		RS.Close
		If OrderType=1 Then
		RS.Open "Select top 10 subject as title From KS_GroupBuy Where ID in(Select proid From KS_OrderItem Where OrderID='" & OrderID& "')",conn,1,1
		Else
		RS.Open "Select top 10 Title From KS_Product Where ID in(Select proid From KS_OrderItem Where OrderID='" & OrderID& "')",conn,1,1
		End If
		If RS.Eof And RS.Bof Then
		 ProductName=OrderID
		Else
			Do While Not RS.Eof
			 if ProductName="" Then
			   ProductName=rs(0)
			 Else
			   ProductName=ProductName&","&rs(0)
			 End If
			 RS.MoveNext
			Loop
		End If
		RS.Close
		
		If Not IsNumeric(Money) Then
		  Call KS.AlertHistory("对不起，订单金额不正确！",-1)
		  exit sub
		End If
		If Money=0 Then
		  Call KS.AlertHistory("对不起，订单金额最低为0.01元！",-1)
		  exit sub
		End If
		%>
	   <FORM name=myform action="User_PayOnline.asp" method="post">
		  <table id="c1" class=border cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
			<tr class=title>
			  <td align=middle colSpan=2 height=22><B> 确 认 款 项</B></td>
			</tr>
			<tr class=tdbg>
			  <td align=right width=167>用户名：</td>
			  <td width="505"><%=KSUser.UserName%></td>
			</tr>
			<tr class=tdbg>
			  <td width="167" align=right>商品名称：</td>
			  <td><input type='hidden' value='<%=ProductName%>' name='ProductName'><%=ProductName%>&nbsp;
			  <input type='hidden' value='<%=DeliverName%>' name='DeliverName'>
			  </td>
		    </tr>
			<tr class=tdbg>
			  <td width="167" align=right>支付编号：</td>
			  <td><input type='hidden' value='<%=OrderID%>' name='OrderID'><%=OrderID%>&nbsp;</td>
		    </tr>
			<tr class=tdbg>
			  <td align=right width=167>支付金额：</td>
			  <td>
			  <%
			   Dim LessPayMoeny:LessPayMoeny=0
			   Dim PArr:Parr=Split(KS.Setting(82)&"||||||||","|")
			  If Parr(0)="1" Then
			  %><input type='hidden' value='<%=Money%>' name='Money'><%=Money%> 元<%
			  ElseIf Parr(0)="2" Then
			   LessPayMoeny=round(Parr(1),2)/100*Money
			   if ks.chkclng(Parr(3))<>0 and Money<ks.chkclng(Parr(3)) then
				  LessPayMoeny=Money
			   end if
			  %>
			  <input type='hidden' value="1" name="zfdj" />
			  <strong>预交<input type='hidden' value='<%=Parr(1)%>' name='Money'><%=LessPayMoeny%> 元定金</strong><%
			  Else %>
			   <input type='hidden' value="1" name="zfdj" />
			   <input type='text' size='8' style="text-align:center;height:21px;line-height:21px" name='money' value='<%=Money%>'/> 元
			 <%
			  End If
			 %>
			  </td>
			</tr>
			
			<tr class=tdbg>
			  <td align=right width=167>选择在线支付平台：</td>
			  <td>
			  <%
			   Dim SQL,K
			   RS.Open "Select ID,PlatName,Note,IsDefault From KS_PaymentPlat Where IsDisabled=1 Order By OrderID",conn,1,1
			   If Not RS.Eof Then SQL=RS.GetRows(-1)
			   RS.Close:Set RS=Nothing
			   If Not IsArray(SQL) Then
			    Response.Write "<font color='red'>对不起，本站暂不开通在线支付功能！</font>"
			   Else
			     For K=0 To Ubound(SQL,2)
				   Response.Write "<input type='radio' value='" & SQL(0,K) & "' name='PaymentPlat'"
				   If SQL(3,K)="1" And KS.ChkClng(KS.S("PaymentPlat"))=0 Then Response.Write " checked"
				   iF KS.ChkClng(SQL(0,K))=KS.ChkClng(KS.S("PaymentPlat")) Then Response.Write " checked"
				   Response.Write ">"& SQL(1,K) & "(" & SQL(2,K) &")<br>"
				 Next
			   End If
			  %>
			  </td>
			</tr>
			
			<tr class=tdbg>
			  <td align=middle colSpan=2 height=40>
	            <input type="hidden" name="oid" value="<%=id%>"/>
		        <Input id=Action type=hidden value="PayStep3" name="Action"> 
		        <Input type=hidden value="shop" name="PayFrom"> 
				<Input class="button" id="Submit" type="submit" value=" 下一步 "  onclick="return(check());" name="Submit"/>
				<input class="button" type="button" value=" 上一步 " onClick="javascript:history.back();"/> </td>
			</tr>
		  </table>
		</FORM>
        <script>
		 function check(){
		  var PaymentPlat=$("input[name='PaymentPlat']:checked").val();
		  if (PaymentPlat==undefined){
		   alert('选择支付方式!');
		   return false;
		  }
		 }
		</script>
		<%
	   End Sub
	   
	   Sub PayStep3()
	    Dim UserCardID,Title
		UserCardID=KS.ChkClng(KS.S("UserCardID"))
	    Dim Money:Money=KS.S("Money")
		Dim MoneyTotal:MoneyTotal=0
		Dim Oid:Oid=KS.ChkClng(request("oid"))
		if oid<>0 then
		  dim rs:set rs=conn.execute("select top 1 MoneyTotal from ks_order where id=" & oid)
		  if not rs.eof then
		    MoneyTotal=rs(0)
		  end if
		  rs.close:set rs=nothing
		end if
		Dim LessPayMoney:LessPayMoney=0
		If KS.S("zfdj")="1" Then
			Dim PArr:Parr=Split(KS.Setting(82)&"||||||||","|")
			If Parr(0)="1" Then
			ElseIf Parr(0)="2" Then
			 if ks.chkclng(Parr(3))<>0 and MoneyTotal<ks.chkclng(Parr(3)) then
			  money=MoneyTotal
			 end if
			Else 
			 Money=KS.S("Money"): If Not Isnumeric(Parr(2)) Then Parr(2)=0
			 If Not IsNumerIc(Money) Then
				KS.Die "<script>alert('对不起，订单金额不正确！');history.back();</script>"
			 End If
			 
			 	 If Parr(2)<>0 then  lessPayMoney=round(Parr(2),2)/100*MoneyTotal
				 If Not IsNumerIc(Money) Then  KS.Die "<script>$.dialog.tips('对不起，订单金额不正确！',1,'error.gif',function(){window.close();});</script>"
				 
				if ks.chkclng(Parr(3))<>0 and round(money,2)<ks.chkclng(Parr(3)) and MoneyTotal>ks.chkclng(Parr(3)) then KS.Die "<script>$.dialog.tips('对不起，支付金额不能少于" & ks.chkclng(Parr(3)) & "元！',1,'error.gif',function(){window.close();});</script>"
				
				If (LessPayMoney<>0 and Round(Money,2)<round(LessPayMoney,2)) Or Money="0" Then KS.Die "<script>$.dialog.tips('对不起，支付金额必须大于订单总额的" & parr(2) & "%,即不能少于" & round(LessPayMoney,2) & "元！',1,'error.gif',function(){window.close();});</script>"

			End If
		End If
		Dim OrderID:OrderID=KS.S("OrderID")
		Dim ProductName:ProductName=KS.CheckXSS(KS.S("ProductName"))
		Dim PaymentPlat:PaymentPlat=KS.ChkClng(KS.S("PaymentPlat"))
		Dim PayUrl,PayMentField,ReturnUrl,RealPayMoney,RealPayUSDMoney,RateByUser,PayOnlineRate
        Call GetPayMentField(OrderID,PaymentPlat,Money,UserCardID,ProductName,KS.S("PayFrom"),KSUser,PayMentField,PayUrl,ReturnUrl,Title,RealPayMoney,RealPayUSDMoney,RateByUser,PayOnlineRate)
		
		 %>
	   	  <FORM name="myform"  id="myform" action="<%=PayUrl%>" <%if PaymentPlat=11 or PaymentPlat=9 then response.write "method=""get""" else response.write "method=""post"""%>  target="_blank">
		  <table id="c1" class=border cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
			<tr class=title>
			  <td align=middle colSpan=2 height=22><B> 确 认 款 项</B></td>
			</tr>
			<tr class=tdbg>
			  <td align=right width=167>用户名：</td>
			  <td width="505"><%=KSUser.UserName%></td>
			</tr>
			<tr class=tdbg>
			  <td width="167" align=right>支付编号：</td>
			  <td><%=OrderID%>&nbsp;</td>
		    </tr>
			<tr class=tdbg>
			  <td align=right width=167>支付金额：</td>
			  <td><%=formatnumber(Money,2,-1)%> 元</td>
			</tr>
			<%if title<>"" then%>
			<tr class=tdbg style="display:none;">
			  <td align=right width=167 >支付用途：</td>
			  <td style="color:red">“<%=title%>”</td>
			</tr>
			<%end if%>
			<%
			if RateByUser=1 then
			%>
			<tr class=tdbg>
			  <td align=right width=167>国际收账手续费：</td>
			  <td><%=PayOnlineRate%>%</td>
			</tr>
			<%end if%>
			<tr class=tdbg>
			  <td align=right width=167>实际支付金额：</td>
			  <td>
			  <%=formatnumber(RealPayMoney,2,-1)%></td>
			</tr>
			<%If PaymentPlat=12 Then%>
			<tr class=tdbg>
			  <td align=right width=167>实际支付美金：</td>
			  <td style="color:#FF6600;font-weight:bold">
			  $<%=formatnumber(RealPayUSDMoney,2,-1)%> USD</td>
			</tr>
			<%End If%>
			<tr class=tdbg style="display:none;">
			  <td colspan=2>点击“确认支付”按钮后，将进入在线支付界面，在此页面选择您的银行卡。</td>
		    </tr>
			<tr class=tdbg>
			  <td align=middle colSpan=2 height=40>
			    <%=PayMentField%>
				<%if PaymentPlat=9 then%>
				<Input class="button" id=Submit type=button onClick="$('#myform').submit()" value=" 确定支付 ">
				<%else%>
				<Input class="button" id=Submit type=submit value=" 确定支付 ">
				<%end if%>
				<input class="button" type="button" value=" 上一步 " onClick="javascript:history.back();"> </td>
			</tr>
		  </table>
		</FORM>
		  
	   <%
	   End Sub
		
End Class
%> 
