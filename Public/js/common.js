/**
 * Created by conan on 16/4/10.
 */
String.prototype.Trim = function()
{
    var m = this.match(/^\s*(\S+(\s+\S+)*)\s*$/);
    return (m == null) ? "" : m[1];
}

String.prototype.isMobile = function()
{
    return (/^(?:13\d|15[89])-?\d{5}(\d{3}|\*{3})$/.test(this.Trim()));
}

String.prototype.isTel = function()
{
    return (/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/.test(this.Trim()));
}

String.prototype.isMobileTel = function()
{
    return (this.isTel()||this.isMobile());
}

String.prototype.isEmail = function()
{
    return (/^(\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*)$/.test(this.Trim()));
}

String.prototype.isNumber = function()
{
    return (!isNaN(this.Trim()));
}

String.prototype.isInt = function()
{
    return (/^(-?[0-9]\d*)$/.test(this.Trim()));
}

String.prototype.isFloat = function()
{
    return (/^(-?([0-9]\d*\.\d*|0\.\d*[1-9]\d*|0?\.0+|0))$/.test(this.Trim()));
}

String.prototype.isPwd = function()
{
    return (/^[\w+]{6,20}$/.test(this.Trim()));
}

String.prototype.isChineseFirstName = function()
{
    return (/^[\u4e00-\u9fa5]{1,2}$/.test(this.Trim()));
}

String.prototype.isChineseLastName = function()
{
    return (/^[\u4e00-\u9fa5]{1,15}$/.test(this.Trim()));
}

String.prototype.isEmpty = function()
{
    return (this.Trim()==""||this==null);
}

String.prototype.isDate = function()
{
    return /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$/.test(this.Trim());
}

String.prototype.isMoney = function()
{
    return (/^(-?\d+)(\.\d+)?$/.test(this.Trim()));
}

function isNumber(s)
{
    return (!isNaN(s.Trim()));
}

function isDate(str)
{
    var reg = /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$/
    if (reg.test(str)) return true;
    return false;
}


/*---常用其它函数---*/

function openWin(theURL,winName,features, myWidth, myHeight, isCenter)
{
    if(window.screen)if(isCenter)if(isCenter=="true")
    {
        var myLeft = (screen.width-myWidth)/2;
        var myTop = (screen.height-myHeight)/2;
        features+=(features!='')?',':'';
        features+=',left='+myLeft+',top='+myTop;
    }
    window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
}


//左填充,示例:document.write(lpad("1","0",2))返回01
function lpad(desstr,padchar,lenint)
{
    var result="";
    for(var i=1;i<=lenint-desstr.length;i++)
    {
        result += padchar
        //document.write("result=" + result + "<br/>")
    }
    result += desstr
    return result;
}

//获取当前时间(不含日期部分)
function GetTime(){
    var today = new Date()
    var strD = String(today.getHours());
    var strH = String(today.getMinutes());
    var strS = String(today.getSeconds());
    return(lpad(strD,"0",2) + ":" + lpad(strH,"0",2) + ":" + lpad(strS,"0",2));
}

//获取当前时间(参数DateTimeDiff 时差)
function GetTimeDiff(DateTimeDiff){
    var today = new Date()
    var i = today.getHours()+DateTimeDiff;
    i = i % 24

    var strD = String(i);
    var strH = String(today.getMinutes());
    var strS = String(today.getSeconds());

    return(lpad(strD,"0",2) + ":" + lpad(strH,"0",2) + ":" + lpad(strS,"0",2));
}


//获取当前时间(不含日期部分)
function GetTimeNoSecond(){
    var today = new Date()
    var strD = String(today.getHours());
    var strH = String(today.getMinutes());
    return(lpad(strD,"0",2) + ":" + lpad(strH,"0",2) );
}

//获取当前时间(参数DateTimeDiff 时差)
function GetTimeNoSecondDiff(DateTimeDiff){
    var today = new Date()
    var i = today.getHours()+DateTimeDiff;
    i = i % 24

    var strD = String(i);
    var strH = String(today.getMinutes());

    return(lpad(strD,"0",2) + ":" + lpad(strH,"0",2) );
}


//checkBox全选功能(allChkId为全选checkBox的ID,chkId为要操作checkbox组的ID)
function checkAll(allChkId,chkId){
    try
    {
        var chkObj = eval("document.all." + chkId);

        var chkAllObj = eval("document.all." + allChkId);

        if (chkObj.length==undefined){
            chkObj.checked = chkAllObj.checked;
            return;
        }

        for (var i=0;i<chkObj.length;i++){
            chkObj[i].checked = chkAllObj.checked;
        }
    }
    catch(err)
    {
        alert("当前没有任何信息,请销后操作.");
    }
}


//初始化CheckBox组(strValue以"|"分隔，例如:initCheck("UserRight","aaa|ccc"))
function initCheck(ChkId,strValue)
{
    var chkObj = eval("document.all." + ChkId);
    var ArrT = strValue.split("|");
    for (var i=0;i<chkObj.length;i++)
    {
        for (var j=0;j<ArrT.length;j++)
        {
            if (chkObj[i].value==ArrT[j])
            {
                chkObj[i].checked = true;
            }
        }
    }
}

//检测checkbox组是否有选择
function checkId(chkId)
{
    try
    {
        var chkobj = eval("document.all." + chkId);
        var result = false;

        if (chkobj.length==undefined)
        {
            if (chkobj.checked)
            {
                result = true;
            }
        }
        else
        {
            for(var i=0;i<chkobj.length;i++)
            {
                if (chkobj[i].checked)
                {
                    result = true;
                    break;
                }
            }
        }

        if (!result)
        {
            alert("请选中要操作的记录!");
            try
            {
                chkobj[0].focus();
            }
            catch(ex){}
        }
        return result;
    }
    catch(err)
    {
        alert("当前没有任何信息,请销后操作");
        return false;
    }
}

function checkAll(allChkId,chkId)
{
    try
    {
        var chkObj = eval("document.all." + chkId);

        var chkAllObj = eval("document.all." + allChkId);

        if (chkObj.length==undefined)
        {
            chkObj.checked = chkAllObj.checked;
            return;
        }

        for (var i=0;i<chkObj.length;i++)
        {
            chkObj[i].checked = chkAllObj.checked;
        }
    }
    catch(err)
    {
        alert("当前没有任何信息,请稍后操作.");
    }
}


//身份证号码验证
function isIdCardNo(num)
{
    if (isNaN(num))
    {
        //alert("输入的不是数字！");
        return false;
    }
    var len = num.length, re;
    if (len == 15)
        re = new RegExp(/^(\d{6})()?(\d{2})(\d{2})(\d{2})(\d{3})$/);
    else if (len == 18)
        re = new RegExp(/^(\d{6})()?(\d{4})(\d{2})(\d{2})(\d{3})(\d)$/);
    else
    {
        //alert("输入的数字位数不对！");
        return false;
    }
    var a = num.match(re);
    if (a != null)
    {
        if (len==15)
        {
            var D = new Date("19"+a[3]+"/"+a[4]+"/"+a[5]);
            var B = D.getYear()==a[3]&&(D.getMonth()+1)==a[4]&&D.getDate()==a[5];
        }
        else
        {
            var D = new Date(a[3]+"/"+a[4]+"/"+a[5]);
            var B = D.getFullYear()==a[3]&&(D.getMonth()+1)==a[4]&&D.getDate()==a[5];
        }
        if (!B) {
            //alert("输入的身份证号 "+ a[0] +" 里出生日期不对！");
            return false;
        }
    }
    return true;
}


//将页面中的关键字高亮显示,在body的onload中使用
function HighLight(nWord)
{
    var oRange = document.body.createTextRange();
    //var Arr = nWord.split(" ")
    //for(var i=0;i<Arr.length;i++){
    //while(oRange.findText(Arr[i])){
    while(oRange.findText(nWord))
    {
        oRange.pasteHTML("<span style='background-color:yellow;color:#ff0000'>" + oRange.text + "</span>");
        oRange.moveStart('character',1);
        //}
    }
}


//将页面中的关键字高亮显示,在body的onload中使用(支持多个关键字，多个关键字用空格分开)
function highword(nWord)
{
    //将全角空格(逗号)转半角空格
    nWord = nWord.replace("　"," ").replace(","," ").replace("，"," ")

    var Arr = nWord.split(" ");
    for(var i=0;i<Arr.length;i++)
    {
        HighLight(Arr[i]);
    }
}

//html中向aspx页面转递中文参数时js方法
function urlParm(TypeName)
{
    return encodeURIComponent(TypeName);
}


//重新按比例显示图片(img onload="DrewImage(this,300,400)")
function DrawImage(ImgD,xx,yy)
{
    var image=new Image();
    image.src=ImgD.src;
    //document.frmupload.f_width.value=image.width;
    //document.frmupload.f_height.value=image.height;
    if(image.width>0 && image.height>0)
    {
        flag=true;
        if(image.width/image.height>= xx/yy)
        {
            if(image.width>xx)
            {
                ImgD.width=xx;
                ImgD.height=(image.height*xx)/image.width;
            }
            else
            {
                ImgD.width=image.width;
                ImgD.height=image.height;
            }
            //ImgD.alt=image.width+"X"+image.height;
        }
        else
        {
            if(image.height>yy)
            {
                ImgD.height=yy;
                ImgD.width=(image.width*yy)/image.height;
            }
            else
            {
                ImgD.width=image.width;
                ImgD.height=image.height;
            }
            //ImgD.alt=image.width+"X"+image.height;
        }
    }
}