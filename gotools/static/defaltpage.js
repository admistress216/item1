var AddTool = function(pToolId){
	var state = DefaultPage.MarkTool(pToolId);
	if(state == 1){
		PageResult.Show("成功添加到我的工具",true);
	}
	else{
		PageResult.Show("已添加过此工具",false);
	}
	return false;
}

var DeleteTool = function(pToolId){
	var result = window.confirm("确定要移除此工具吗? ");
	if(result){
		var state = DefaultPage.DeleteTool(pToolId);
		if(state == 1){
			PageResult.Show("移除成功",true);
			return true;
		}
		else{
			PageResult.Show("我的工具中没有这个工具",false);
		}
	}
	return false;
}

var DefaultPage = {};
DefaultPage.Sort = function(col){
	DefaultPage.Cookie.Set("tools_my",col.toString(),30*24);
}

DefaultPage.MarkTool = function(pToolId){
	var name = "tools_my";
	var v = DefaultPage.Cookie.Get(name);
	var col;
	if(v != ""){
		col = v.split(',');
	}
	else{
		col = [];
	}
	var exist = false;
	for(var i = 0; i < col.length; i++){
		if(col[i] == pToolId.toString()){
			exist = true;
			break;
		}
	}
	var state = 1;
	if(!exist){
		col.push(pToolId);
		DefaultPage.Cookie.Set(name,col.toString(),30*24);
	}
	else{
		state = 0;
	}
	return state;
}

DefaultPage.DeleteTool = function(pToolId){
	var v = DefaultPage.Cookie.Get("tools_my");
	var col;
	if(v != ""){
		col = v.split(',');
	}
	else{
		col = [];
	}
	var index = -1;
	for(var i = 0; i < col.length; i++){
		if(col[i] == pToolId.toString()){
			index = i;
			break;
		}
	}
	if(index != -1){
		col.splice(index,1);
		DefaultPage.Cookie.Set("tools_my",col.toString(),30*24);
		return 1;
	}
	else{
		return 0;
	}
}

DefaultPage.Cookie = {};
DefaultPage.Cookie.Set = function(name, value, hours){
  var expire = "";
  if(hours != null){
    expire = new Date((new Date()).getTime() + hours * 3600000);
    expire = "; expires=" + expire.toGMTString();
  }
  document.cookie = name + "=" + escape(value) + expire;
}

DefaultPage.Cookie.Get = function(name){
  var cookieValue = "";
  var search = name + "=";
  if(document.cookie.length > 0){ 
    offset = document.cookie.indexOf(search);
    if (offset != -1){ 
      offset += search.length;
      end = document.cookie.indexOf(";", offset);
      if (end == -1) end = document.cookie.length;
      cookieValue = unescape(document.cookie.substring(offset, end))
    }
  }
  return cookieValue;
}