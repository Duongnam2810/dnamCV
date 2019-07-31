<?php
namespace App\Helpers\Common;

class BuildTreeCate{
	// de su? dung. phai tao. 1 Provider de bao' cho tat ca controller,home su dung. xuyen suot'
	public static function layoutTreeCategory($categories = []){
		// return "abc";
		// xu li build tree for catrgory
		$data = [];
		$arrCheck = [];
		// xu? li' tree cap' 0 (cha lon' nhat')
		foreach ($categories as $key => $val) {
			if($val['parent_id'] == 0){
				$arrCheck[] = $val['id'];
				// tao. 1 mang rong~ subchid
				$val['subChild'] = [];
				// id
				$data[$val['id']] = $val;
			}
		}
		// xu li' tree cap 1 (con nho? hon)
		foreach ($categories as $k => $item) {
			// if(!in_array($item['id'], $arrCheck)){
				// lay ra nhung thang khong bi. trung` voi' thang cha cua? no'
				// lay nhung thang` co' parent_id tu` 1
				if($item['parent_id'] > 0){
					if(isset($data[$item['parent_id']])){
						// kiem tra lai. 1 lan` nua co' ton tai. nhung~ thang` con nam` trong cha hay khong
						
						$arrCheck = $item['id'];
						$item['subChild'] = [];
						$data[$item['parent_id']]['subChild'][$item['id']] = $item;
					}
				}
			// }	
		} 
		return $data;
	}
}