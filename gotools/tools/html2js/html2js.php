<SCRIPT> 
function change(){ 
oResult.value="document.writeln(\""+oSource.value.replace(/\\/g,"\\\\").replace(/\//g,"\\/").replace(/\'/g,"\\\'").replace(/\"/g,"\\\"").split('\r\n').join("\");\ndocument.writeln(\"")+"\");" 
}  
  
function rechange(){ 
Re.value=oResul.value.replace(/document.writeln\("/g,"").replace(/"\);/g,"").replace(/\\\"/g,"\"").replace(/\\\'/g,"\"").replace(/\\\//g,"\/").replace(/\\\\/g,"\\")
}
</script>

<br><br>
<TABLE style="BORDER: #c2d6e0 1px solid;" cellSpacing=0 cellPadding=0 width="90%" align=center border=0>
<TBODY>
<TR>
<TD style="background-color :#c2d6e0"> <B>HTML源代码转换JavaScript代码工具(仅支持IE)</B></TD></TR>
<TR>
<TD style="PADDING: 10px;">请将<STRONG>HTML</STRONG>源代码拷贝到下面表单中：<BR><TEXTAREA id=oSource style="MARGIN-BOTTOM: 6px; WIDTH: 100%" onpropertychange=change() name=textarea rows=6></TEXTAREA> 下面表单中是相应的<STRONG>JavaScript</STRONG>代码：<BR><TEXTAREA id=oResult ondblclick='this.select();oResult.createTextRange().execCommand("Copy")' title=双击复制 style="WIDTH: 100%" name=textarea2 rows=6></TEXTAREA> </TD></TR></TBODY></TABLE><BR><BR>
<TABLE style="BORDER: #c2d6e0 1px solid;" cellSpacing=0 cellPadding=0 width="90%" align=center border=0>
<TBODY>
<TR>
<TD style="background-color :#c2d6e0"> <B>JavaScript源代码转换HTML代码工具(仅支持IE)</B></TD></TR>
<TR>
<TD style="PADDING: 10px;">请将<STRONG>JavaScript</STRONG>源代码拷贝到下面表单中：<BR><TEXTAREA id=oResul ondblclick='this.select();oResul.createTextRange().execCommand("Copy")' title=双击复制 style="MARGIN-BOTTOM: 6px; WIDTH: 100%" onpropertychange=rechange() name=textarea3 rows=6></TEXTAREA> 下面表单中是相应的<STRONG>HTML</STRONG>代码：<BR><TEXTAREA id=Re ondblclick='this.select();this.createTextRange().execCommand("Copy")' title=双击复制 style="WIDTH: 100%" name=textarea3 rows=6></TEXTAREA> </TD></TR></TBODY></TABLE>
<br><br>