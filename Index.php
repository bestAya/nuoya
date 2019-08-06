<?php
namespace app\web\controller;

use app\common\model\Bbs;
use app\common\model\Product;
use \think\Controller;

class Index extends Controller
{
    protected $Product;
    protected $Bbs;

    public function _initialize()
    {
        parent::_initialize();
        $this->Product = new Product();
        $this->Bbs = new Bbs();
    }

    //首页
    public function index()
    {
        //团购产品
        $mapB['P_state'] = 1;
        $mapB['status'] = 1;
        $mapB['P_TYPE1'] = 'B';
        $proB = $this->Product->getDataList($mapB, '*', 'ctime desc', 3);

        //卡片产品
        $mapA['P_state'] = 1;
        $mapA['status'] = 1;
        $mapA['P_TYPE1'] = 'A';
        $proA = $this->Product->getDataList($mapA, '*', 'ctime desc', 1);

        //团购产品
        $mapC['P_state'] = 1;
        $mapC['status'] = 1;
        $mapC['P_TYPE1'] = 'C';
        $proC = $this->Product->getDataList($mapC, '*', 'ctime desc', 1);

        //团购留言
        $mapBbsC['P_TYPE1'] = 'B';
        $bbsC = $this->Bbs->getDataList($mapBbsC, '*', 'ctime desc', 5);

        //团购倒计时
        if (!empty($proB[0]['P_EndDay'])) {
            $endtime = $proB[0]['P_EndDay'];
        } else {
            $endtime = 0;
        }
        //批量渲染赋值
        $this->assign([
            'title' => '首页',
            'proA' => $proA,
            'proB' => $proB,
            'proC' => $proC,
            'bbsC' => $bbsC,
            'endtime' => $endtime,
        ]);
        return $this->fetch('Index/index');
    }

//套餐
    public function taocan()
    {

        return $this->fetch('Index/taocan');
    }
    //修改
    public function tancanUpdata()
    {

        return $this->fetch('Index/tancanUpdata');
    }
    //礼品卡
    public function lipingka()
    {

        return $this->fetch('Index/lipingka');
    }
    //个人中心
    public function gerenhzongxin()
    {

        return $this->fetch('Index/gerenhzongxin');
    }
    //bangdin
    public function bangdin()
    {

        return $this->fetch('Index/bangdin');
    }
    //xiugai
    public function xiugai()
    {

        return $this->fetch('Index/xiugai');
    }
    //dizhi
    public function dizhi()
    {

        return $this->fetch('Index/dizhi');
    }
    //order
    public function order()
    {

        return $this->fetch('Index/order');
    }

//order
    public function orderplay()
    {

        return $this->fetch('Index/orderplay');
    }
}
