/**
 * @author zen
 */
//设为首页&加入收藏
var bookmarkname='115工具大全';

String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g, '');
}

function addBookmark(title,url) {
    if( document.all ) {
        window.external.AddFavorite( url, title);
    }else if (window.sidebar) {
        window.sidebar.addPanel(title, url,"");
    } else if( window.opera && window.print ) {
        return true;
    }
}
function setHomePage(url){
    if (window.sidebar)
    {
        try { 
           netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); 
        } 
        catch (e) 
        {  
           alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将[signed.applets.codebase_principal_support]设置为'true'"); 
        } 
        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
            prefs.setCharPref('browser.startup.homepage',url);

    }
}

var tab_content = function(pBtnList,pActiveStyle,pDisableStyle){
	var _obj = {
		List: pBtnList,
		ActiveStyle: pActiveStyle,
		DisableStyle: pDisableStyle
	};
	var _ChangeHandler;

	var init = function(){
		var time ;
		var overObj;
		function display(){
			for(var j = 0; j < _obj.List.length; j++){
				var ele = $("#" +  _obj.List[j].TabId);
				ele.removeClass(_obj.ActiveStyle);
				ele.addClass(_obj.DisableStyle);
				$("#" + _obj.List[j].ContentId).hide();
			}
			$("#" + overObj.TabId).addClass(_obj.ActiveStyle);
			$("#" + overObj.ContentId).show();
			if(_ChangeHandler){
				_ChangeHandler(overObj);
			}
		}
		for(var i = 0; i < _obj.List.length; i++){
			var item = _obj.List[i];
			$("#" + item.TabId).bind("mouseover",item,function(e){
				overObj = e.data;
				time = window.setTimeout(display,400);
			});
			$("#" + item.TabId).bind("click",item,function(e){
				overObj = e.data;
				if(time != undefined){
					window.clearTimeout(time);
				}
				display();
				this.blur();
			});
			$("#" + item.TabId).bind("mouseout",function(){
				if(time != undefined){
					window.clearTimeout(time);
				}
			});
		}
	}
	this.SetChangeHandler = function(pHandler){
		_ChangeHandler = pHandler;
	}
	init();
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////
var grid_obj,drag_box,blank_box;
var start_x=0,start_y=0,css_left,css_top;
var moveimg=0;	
	
function get_local(o){		//获取坐标
	var a={};
	a.x0=o.offset().left;
	a.y0=o.offset().top;
	a.x1=a.x0+o.width();
	a.y1=a.y0+o.height();
	a.h=o.height();
	a.w=o.width();
	return a;
}

function isOver(o,e){		//判断是否在坐标范围内
	var a=get_local(o);
	var x=e.clientX,y=e.clientY;	
	if(x>a.x0){
		if(x<a.x1){
			if(y>a.y0){
				if(y<a.y1){
					if(x<a.x0+a.w/2){
						return 1;
					}
					return 2
				}
			}
		}
	}
	return 0;
}

function mouse_down(e){
	$("body").addClass("dragable");
	var o=drag_box=e.data.obj;
	if(!o){
		return;
	} 
	start_x=e.clientX;
	start_y=e.clientY;
	css_left=o.offset().left;
	css_top=o.offset().top
	//document.onselectstart=function(){return false};
	//var widths=o.width(),heights=o.height();
	blank_box.insertAfter(o)
		 	  .show();
	o.addClass("draging")
	 .css({
	 	left:css_left,
		top:css_top
	 });
	$(document).bind("mousemove",mouse_move);
	$(document).bind("mouseup",mouse_up);
	return false;
}

function mouse_move(e){
	var o=drag_box;
	if(o){
		var current_x=e.clientX,current_y=e.clientY;
		var new_css_left=css_left+current_x-start_x,new_css_top=css_top+current_y-start_y;
		o.css({
			left:new_css_left,
			top:new_css_top
		});	
		for (var i = 0, j = grid_obj.length; i < j; i++) {
			var target=grid_obj.eq(i);
			if(target.attr("id")==o.attr("id")){
				continue;
			} 
			var is_over=isOver(target,e);
			if(is_over==0) continue;
			else{
				if(is_over==1){
					blank_box.insertBefore(target);
				}else{
					blank_box.insertAfter(target);
				}
				return false;	
			}	
		}
		return false;
	}
}

var MouseUpHandler;

function mouse_up(e){
	if (drag_box) {
		var a=get_local(blank_box);
		blank_box.css({
			visibility:"hidden"
		});	
		drag_box.animate({
					left:a.x0,
					top:a.y0
				},{
					duration: 100,
					queue: false,
					complete: function(){
						drag_box.removeClass("draging").insertAfter(blank_box).css({
							left: 0,
							top: 0
						});
						blank_box.hide()
								 .css({
									visibility:"inherit"
								  });
						drag_box = null;
						grid_obj=$("#my_tools li").not($("#blank")[0]);
						var id_list=[];
						grid_obj.each(function(){
							id_list.push(this.id);
						})
						$("body").removeClass("dragable");
						document.onselectstart=function(){return true};
						
						if(MouseUpHandler != undefined){
							MouseUpHandler();
						}
						//alert(id_list)
					}
		});
				
		
	}
	$(document).unbind("mousemove");
	$(document).unbind("mouseup");
}

var PageResult = {TimeOut:4000};
PageResult.Show = function(msg,isSuccess,timeOut,isHide){
	if(PageResult.ControlObject == undefined){
		PageResult.ControlObject = new PageResult.ShowResultObject({
			Top:"150px"
		});
	}
    PageResult.ControlObject.ShowMessage(msg,isSuccess);
	var time = PageResult.TimeOut;
	if(timeOut){
		time = timeOut
	}
	if(isHide == undefined || isHide == true){
		window.clearTimeout(PageResult.Timer);
    	PageResult.Timer = window.setTimeout("PageResult.Hide()",time);
	}
}

PageResult.Hide = function(){
	PageResult.ControlObject.Hide();
	window.clearTimeout(PageResult.Timer);
}

/**
 * 显示结果静态方法
 * ResultControl.TimeOut = 4000;	//设置信息隐藏时间
 * ResultControl.Show(msg,isSuccess); //(msg: 内容; isSuccess： true成功操作，false失败操作)
 */
PageResult.ShowResultObject = function(obj){
    var _ResultBpx;
	var _obj = obj == undefined?{}:obj;
    var _DisplayTextBox;
    if(_obj.BoxID !=undefined){
        _ResultBpx = document.getElementById(_obj.BoxID);
    }
    else{
        _ResultBpx = document.createElement("div");
        document.body.appendChild(_ResultBpx);
    }
    if(_obj.DisplayBoxId != undefined){
        _DisplayTextBox = document.getElementById(_obj.DisplayBoxId);
    }
    else{
        _DisplayTextBox = document.createElement("span");
        _ResultBpx.appendChild(_DisplayTextBox);
    }

    var setStyle = function(isPerfect){
        _DisplayTextBox.style.color = isPerfect?"#48A01B" : "#FF0000";
        var  resultStyle = _ResultBpx.style;
        resultStyle.backgroundColor =  "#FFF8CC";
        resultStyle.position = "absolute";
        resultStyle.zIndex = 1000;
        resultStyle.padding = "1px 6px";
        var l = document.documentElement.clientWidth * 44/100;
        resultStyle.left = _obj.Left == undefined? (l + "px") : _obj.Left;
		resultStyle.top = _obj.Top == undefined? "0px" : _obj.Top;
    }

    this.getResultBox = _ResultBpx;
    this.getDisplayBox = _DisplayTextBox;
    this.Hide = function(){
        this.getResultBox.style.display = "none";
		this.getDisplayBox.innerHTML =  "";
    },
    this.ShowMessage = function(text,isSuccess){
        setStyle(isSuccess);
        this.getDisplayBox.innerHTML = text;
        this.getResultBox.style.display = "";
    }
}

Function.prototype.bindevent = function(scope, args){
		var method = this;
		if(args === undefined){
			args = [];
		}
		return function() {
			return method.apply(scope, args.concat(arguments));
		}
	}

/**
 * TextBox 提示
 */
var TextBoxDrop = function(pInputId,pContentId){
	var _self = this;
	var _EnterHandler;
	var _AjaxMethod;
	var _input = document.getElementById(pInputId);;
	var _ContentBox = document.getElementById(pContentId);
	var _Data;
	var _activeItemStyle = "active";
	var _activeId = -1;
	var _mouseInContent = false;
	var _DisplayContentHandler;	//显示事件
	var _SetContentStyle;
	var _url = "";	//查询地址
	var _oldStr = "";	
	var _timer;
	var _oldData;
	this.GetUrlHandler;
	this.KeyFeild;
	this.TextFeild;

	var bindevents = function(){
		_input.onkeyup = keyUpFun;
		_input.onkeydown = keyDownFun;
		_input.onfocus = function(){
			_input.select();
			getDataFun();
		};
		_input.onblur = function(){
			clearTimer();
			if(!_mouseInContent){
				hideBox();
			}
		};
		_ContentBox.onmousemove = function(){
			_mouseInContent = true;
		};
		_ContentBox.onmouseout = function(){
			_mouseInContent = false;
		};
	}
	
	/*Event*/
	this.ActiveItem;
	var keyDownFun = function(e){
		var key = window.event ? event.keyCode : e.which;
		switch(key){
			case 13:
				if(!isHiden()){
					clearTimer();
					hideBox();
				}
				else{
					return true;
				}
				if(_EnterHandler){
					_EnterHandler(_input.value);
				}
				//Enter
				return false;
			case 40:
				//Down
				_activeId += 1;
				hoverItem();
				return;
			case 38:
				//UP
				_activeId -= 1;
				hoverItem();
				return;
		}
	}
	
	var keyUpFun = function(e){
		var key = window.event ? event.keyCode : e.which;
		switch(key){
			case 13:
				if(!isHiden()){
					clearTimer();
					hideBox();
				}
				else{
					return true;
				}
				return false;
			case 40:
				return;
			case 38:
				return;
			default:
				_activeId = -1;
				getDataFun();
				break;
		}
	}

	var clearTimer = function(){
		if(_timer){
			window.clearTimeout(_timer);
			_timer = null;
		}
	}
	
	/*/Event*/
	var getDataFun = function(){
		clearTimer();
		_timer = window.setTimeout(searchFun,400);
	}
	
	var searchFun = function(){
		if(_input.value != ""){
			if(_oldStr != _input.value.trim() || _oldStr == ""){
				var url = _url + encodeURIComponent(_input.value.trim());
				if(_self.GetUrlHandler){
					url = _self.GetUrlHandler();
				}
				if(_AjaxMethod){
					_oldStr = _input.value.trim();
					_AjaxMethod(url,function(data){
						var arr = eval(data);
						_oldData = arr;
						if(arr && arr.length > 0){
							showBox();
							displayContent(arr);
						}
						else{
							hideBox();
						}
					});
				}
			}
			else{
				if(_oldData && _oldData.length > 0){
					showBox();
					displayContent(_oldData);
				}
			}
		}
		else{
			_oldStr = "";
			hideBox();
		}
	}
	
	var hoverItem = function(){
		var liArr = _ContentBox.getElementsByTagName("li");
		if(_activeId > liArr.length-1){
			_activeId = 0;
		}
		if(_activeId < 0){
			_activeId = liArr.length-1;
		}
		for(var i = 0; i < liArr.length; i++){
			var item = liArr[i];
			if(i == _activeId){
				item.className = _activeItemStyle;
				setInputValue(item);
				_self.ActiveItem = item;
			}
			else{
				item.className = "";
			}
		}
	}
	
	var setInputValue = function(ele){
		if(_isArray){
			_input.value = ele.innerHTML;
		}
		else{
			
			if(_self.ShowKey){
				_input.value = ele.getAttribute("rel");
			}
			else{
				_input.value = ele.innerHTML;
			}
		}
	}
	
	this.ShowKey = false;
	var _isArray = true;
	var displayContent = function(arr){
		var html = "";
		if(_activeId > arr.length-1){
			_activeId = arr.length-1;
		}
		if(_activeId < -1){
			_activeId = -1;
		}
		_ContentBox.innerHTML = "";
		_self.ActiveItem = null;
		for(var i = 0; i < arr.length; i++){
			var item = document.createElement("li");
			if(typeof arr[i] == "string"){
				item.innerHTML = arr[i];
				_isArray = true;
			}
			else if(typeof arr[i] == "object"){
				if(_self.KeyFeild){
					item.innerHTML = arr[i][_self.TextFeild];
					item.setAttribute("rel",arr[i][_self.KeyFeild]);
				}
				_isArray = false;
			}
			item.onmouseover = mOver.bindevent(this,[item]);
			item.onmouseout = mOut.bindevent(this,[item]);
			item.onclick = mClick.bindevent(this,[item]);
			_ContentBox.appendChild(item);
		}
		if(_DisplayContentHandler){
			_DisplayContentHandler(_input,_ContentBox);
		}
		if(_SetContentStyle){
			_SetContentStyle(_input,_ContentBox);
		}
	}
	
	var mOver = function(ele){
		_activeId = -1;
		ele.className = _activeItemStyle;
	}
	
	var mOut = function(ele){
		ele.className = "";
	}
	
	var mClick =  function(ele){
		 setInputValue(ele);
		 _self.ActiveItem = ele;
		 if(_EnterHandler){
			_EnterHandler(_input.value);
		 }
		 
		 hideBox();
	}
	
	var isHiden = function(){
		return _ContentBox.style.display == "none";
	}
	
	var showBox = function(){
		_ContentBox.style.display = "block";
	}
	
	var hideBox = function(){
		_ContentBox.style.display = "none";
		_ContentBox.innerHTML = "";
	}

	var init = function(){
		bindevents();
	}
	
	this.SetEnterHandler = function(pHandler){
		_EnterHandler = pHandler;
	},
	this.SetAjaxMethod = function(pMethod){
		_AjaxMethod = pMethod;
	},
	this.SetContentStyle = function(callback){
		if(callback){
			_SetContentStyle = callback;
			_SetContentStyle(_input,_ContentBox);
		}
	},
	this.DisplayContentHandler = function(pHandler){
		_DisplayContentHandler = pHandler;
	},
	this.Url = function(pUrl){
		if(pUrl){
			_url = pUrl;
		}
	}
	init();
}

//提示框加提示信息
var Common_SetInputTips = function(box_id,text){
	var box = document.getElementById(box_id);
	
	var isHasValue = function(){
		return box.value != text;
	}
	
	box.rel=false;
	if(box.value == ""){
		box.value = text;
		box.style.color = "#ccc";
	}
	else{
		if(isHasValue()){
			box.style.color = "#000";
			box.rel = true;
		}
		else{
			box.style.color = "#ccc";
		}
	}
	
	box.getValue = function(){
		if(isHasValue()){
			return box.value;
		}
		else{
			return '';
		}
	}
	box.onfocus = function(){
		box.style.color = "#000";
		if(box.value == text){
			box.value = '';
			box.rel = false;
		}
		else{
			box.rel = true;
		}
	}
	box.onblur = function(){
		if(box.value == ""){
			box.value = text;
			box.style.color = "#ccc";
		}
		else{
			box.rel = true;
		}
	}
	return box;
}

function selectTag(showContent,selfObj){
	// 标签
	var tag = document.getElementById("menu").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
	tag[i].className = "";
	}
	selfObj.parentNode.className = "current";
	// 标签内容
	for(i=0; j=document.getElementById("main"+i); i++){
	j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}

function selectTag1(showContent,selfObj){
	// 标签
	var tag = document.getElementById("tools_all_class").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
	tag[i].className = "";
	}
	selfObj.parentNode.className = "current";
	// 标签内容
	for(i=0; j=document.getElementById("all_tools"+i); i++){
	j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}
function google(){
var gurl = 'http://www.google.cn/search?hl=zh-CN&q='+document.getElementById('tool_kw').value;
window.open(gurl,"_blank");
                             }