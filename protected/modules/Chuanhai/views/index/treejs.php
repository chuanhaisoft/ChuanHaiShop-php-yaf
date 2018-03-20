<?php
		
		//$model = new Model_User();
		$dr = Bll\User::Row(null,["ID=?",[Pub\SysFram::GetLoginID()]]);
		$LoginName = $dr["CARD_NUM"];
		$RoleName = Pub\SysFram::getLoginRoleName();
		$RolePowers = Bll\Role::Column(Pub\Fram::GetSession("SysRoleID"),"POWER_LIST");
		echo "var userloginmess = '".(($dr["NAME"] && strlen($dr["NAME"])>0)?$dr["NAME"]:$dr["NAME"])." [{$RoleName}]';";
	 

		$TotalCount=0;
		$tree=Bll\Tree::GetList(1,300,["TREE_TYPE=1 and TREE_STATE=1 and TREE_ID in(-1{$RolePowers}-1)",[]],$TotalCount,"TREE_ID as id ,PARENT_NUM as pid,TREE_NAME as node,TREE_URL as url","TREE_GRADE asc,ORDER_NUM desc");
		$str='';
		$i=0;
		echo 'var tree_data='.str_replace('"pid":"1"', '"pid":"0"', json_encode($tree)).';';
		//echo (Pub\Fram::ReadFiles(dirname(__FILE__)."/Tree2.js"));
?>