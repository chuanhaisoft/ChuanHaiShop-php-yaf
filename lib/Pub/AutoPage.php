<?php
namespace Pub;
class AutoPage
{

	public static function Grid($rs,$total)
	{	
	    $sb = "";
		$RowCount = count($rs);
		$CellCount = count($rs[0]);//列数
		$j = 1; //dr循环控制
		$k = 1;//列循环控制
		$sb.="{\"TotalCount\":\"".$total."\",\"Result\":[";
		if($RowCount>0)
		{
			foreach($rs as $DataRow) //foreach (DataRow dr in dt.Rows)
            {
                $k = 1;//每列开始时初始化
				$sb.="{";
				$i = 0;//列循环 标示
				foreach($DataRow as $k => $v)
				{
					$sb.="\"".$k."\":\"".self::ToJsStr($v)."\"";
                    if (($CellCount != 1) && ($i != $CellCount-1)) $sb.=",";//只有一列和最后一列不打印 ","
                    $k++;
					$i++;//列循环 加1
				}
                $sb.="}";
                if (($RowCount != 1) && ($j != $RowCount)) $sb.=",";//只有一行 和 最后一行不打印 ","
                $j++;
            }

		}
	        $sb.="]}";
			
            $scriptTag = false;
            $cb = Fram::GetValue("callback");

            if ($cb != null)
            {
                $scriptTag = true;
                header("Content-type: text/javascript");
            }
            else
            {
				header("Content-type: application/x-json");
            }
            if ($scriptTag)
            {
                //sb = cb + "(" + rt + ")";
				$sb=$cb."(".$sb;
				$sb.=");";
            }

		return $sb;
	}
	
	public static function ToJsStr($Str)
	{
		$Str = str_replace("\\","\\\\'",$Str);
		$Str = str_replace('"','\"',$Str);
		$Str = str_replace("'","\'",$Str);
		
		return $Str;
	}
	
	public static function GetLeftMenu($_dt)
	{
		//print_r($_dt);
		$sc;
		$sc_c;
		$sb;
		$RootNodeName = "";//根节点名称root
		$TreeNodeName = "";//节点名称，比如Child1
		$NodeID = "-1";//tree的id号
		$IsLeaf = 1;//0是叶子
		$i = 1;
		
		foreach($_dt as $row) 
		{
			$NodeID=$row["TREE_ID"];
			if ($i == 1)
			{
				$RootNodeName = "Child" . $NodeID;
			}
			$TreeNodeName = "Child" . $NodeID;
			$IsLeaf = $row["NODE_TYPE"];
			//生成节点
			if ($IsLeaf == 0)
			{
				$sb = $sb."var ".$TreeNodeName."=new Ext.tree.TreeNode({id : '".$TreeNodeName."',text : '".$row["TREE_NAME"]."',url : '".$row["TREE_URL"]."',"."infram:".$row["IN_IFRAME"].","."tid:".$NodeID.",leaf : true});";
			}
			else
			{
				if ($i == 1)
				{
					$sb = $sb."var ".$TreeNodeName."=new Ext.tree.TreeNode({id : 'root',text : '".$row["TREE_NAME"]."',expanded : true});";
				}
				else
				{
					$sb = $sb."var ".$TreeNodeName."=new Ext.tree.TreeNode({id : '".$TreeNodeName."',text : '".$row["TREE_NAME"]."',expanded : true});";
				}
			}
			//附件节点
			if ($row["PARENT_NUM"] != "-1")
			{
				$sc_c =  "Child" . $row["PARENT_NUM"] . ".appendChild(" . $TreeNodeName . ");";
				$sc=$sc.$sc_c;
			}
			++$i;
		}
		$sc = $sc."var Tree1=new Ext.tree.TreePanel({root : ".$RootNodeName.",autoWidth:true,autoHeight:true,bodyBorder:false,border:false,autoScroll:true});";
		return $sb.$sc;
		
	}

}
