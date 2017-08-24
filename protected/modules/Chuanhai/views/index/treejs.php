<?php
		echo (Pub\Fram::ReadFiles(dirname(__FILE__)."/Tree1.js"));
		//$model = new Model_User();
		$dr = Bll\User::Row(null,["ID=?",[Pub\SysFram::GetLoginID()]]);
		$LoginName = $dr["CARD_NUM"];
		$RoleName = Pub\SysFram::getLoginRoleName();
		$RolePowers = Bll\Role::Column(Pub\Fram::GetSession("SysRoleID"),"POWER_LIST");
		echo "var userloginmess = '".(($dr["NAME"] && strlen($dr["NAME"])>0)?$dr["NAME"]:$dr["NAME"])." [{$RoleName}]';";
	 
		if(Pub\SysFram::IsAct())
		    echo "var ChangeRole=1;";
		else 
		    echo "var ChangeRole=0;";
		echo "var ChangeMenu='系统菜单';";
		$TotalCount=0;
		echo Pub\Ext::GetLeftMenu(Bll\Tree::GetList(1,200,["TREE_TYPE=1 and TREE_STATE=1 and TREE_ID in(1{$RolePowers}-1)",[]],$TotalCount,"","TREE_GRADE asc,ORDER_NUM desc"));
		echo (Pub\Fram::ReadFiles(dirname(__FILE__)."/Tree2.js"));
?>