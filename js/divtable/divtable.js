function IsDelAct(UrlStr) {
if (confirm("系统提示\n确定要删除这条信息？") == false)
return;
location.href=UrlStr;
}