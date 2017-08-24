<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD colSpan=3><IMG height=32 alt="" src="/images/left_01.gif" 
            width=192></TD></TR>
        <TR>
          <TD width=10 background=/images/left_02.gif height=132>&nbsp;</TD>
          <TD vAlign=top width=174 bgColor=#e3f1fc>
            <TABLE width="100%"  border=0 cellPadding=0 cellSpacing=0> 
<?php
if($total>0)
{
	$m=new Model_Tree();
	for($i=0;$i<$total;$i++)
	{
?>
              <tr><td style="height:23px;" valign="bottom">·<a href="<?php echo Fram::CreateUrl('',array('sort'=>$HostSort[$i][$m->_TreeId->FieldName])) ?>"><?php echo $HostSort[$i][$m->_TreeName->FieldName] ?></a></td></tr>
              <tr><td height="1px" style="background-image: url(/images/line.gif);"></td></tr>  
<?php
	}
}
?>
              </TABLE></TD>
          <TD width=8 background=/images/left_04.gif>&nbsp;</TD>
        </TR>
        
        <TR>
          <TD colSpan=3><IMG height=8 alt="" src="/images/left_05.gif" 
            width=192></TD></TR></TBODY></TABLE>
      <table cellspacing="0" cellpadding="0" width="100%" border="0">
        <tbody>
          <tr>
            <td colspan="3"><img height="32" alt="" src="/images/left_01.gif" 
            width="192" /></td>
          </tr>
          <tr>
            <td width="10" background="/images/left_02.gif" height="132">&nbsp;</td>
            <td valign="top" width="174" bgcolor="#e3f1fc"><table width="100%" height="96" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td>联系qq:4232035 <br/></td>
              </tr>
              <tr>
                <td>Email:support@showni.cn</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>            </td>
            <td width="8" background="/images/left_04.gif">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><img height="8" alt="" src="/images/left_05.gif" 
            width="192" /></td>
          </tr>
        </tbody>
      </table>
      <table cellspacing="0" cellpadding="0" width="100%" border="0">
        <tbody>
          <tr>
            <td colspan="3"><img height="32" alt="" src="/images/left_01.gif" 
            width="192" /></td>
          </tr>
          <tr>
            <td width="10" background="/images/left_02.gif" height="132">&nbsp;</td>
            <td valign="top" width="174" bgcolor="#e3f1fc"><table width="100%" height="96" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>帮组中心</td>
                </tr>
                <tr>
                  <td>帮组中心</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
            </table></td>
            <td width="8" background="/images/left_04.gif">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><img height="8" alt="" src="/images/left_05.gif" 
            width="192" /></td>
          </tr>
        </tbody>
      </table>