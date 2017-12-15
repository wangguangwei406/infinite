<?php

namespace app\agent\library;


use fast\Random;

use think\Cookie;
use think\Request;
use think\Session;

class Ftree 
{
    //定义一个空的数组
    static public $treeList = array();

    public function __construct()
    {
        
    }

    //接收$data二维数组,$pid默认为0，$level级别默认为1
    static public function ftree($data,$pid=0,$level = 1){
        foreach($data as $v){
            if($v['pid']==$pid){
                $v['level']=$level;
                self::$treeList[]=$v;//将结果装到$treeList中
                self::ftree($data,$v['id'],$level+1);
            }
        }
        return self::$treeList ;
    }

}
