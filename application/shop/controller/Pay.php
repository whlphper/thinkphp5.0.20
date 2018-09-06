<?php
// +----------------------------------------------------------------------
// | IUBO    PHP
// +----------------------------------------------------------------------
// | Time  : 19:52  2018/9/3/003
// +----------------------------------------------------------------------
// | Author: whlphper  备注:
// +----------------------------------------------------------------------
namespace app\shop\controller;
use app\shop\controller\Shopbase;
use think\Exception;
use think\Db;

class Pay extends Shopbase{

    protected $beforeActionList = [
        'checkUserSession',
    ];

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->models['order'] = model('ShopOrder');
        $this->models['product'] = model('ShopProduct');
        $this->models['orderDetail'] = model('ShopOrderDetail');
        $this->models['address'] = model('ShopAddress');
        $this->models['carts'] = model('ShopCarts');
    }

    public function check($product_id,$number)
    {
        Db::startTrans();
        try{
            $address = $this->models['address']
                ->where('user_id',session("shopUserId"))
                ->order('is_default desc,create_time desc')
                ->select();
            $product_id = explode('.',str_replace(',','.',$product_id));
            $number = explode('.',str_replace(',','.',$number));
            $orderAmount = 0;
            $total = count($product_id);
            $desc = '';
            $details = [];
            if(count($number) < $total){
                throw new Exception('请选择商品和购买数量');
            }
            foreach ($product_id as $k=>$proID)
            {
                $curPro = $this->models['product']
                    ->alias('a')
                    ->where('a.id',$proID)
                    ->field('a.id,a.name,a.shop_price,a.market_price,a.stock,b.path')
                    ->join([['system_file b','a.posters = b.id','left']])
                    ->find()->toArray();
                if(!$curPro){
                    throw new Exception('商品" '.$curPro['name'].'" 不存在或者已经下架');
                }
                if($number[$k] > $curPro['stock']){
                    throw new Exception('商品" '.$curPro['name'].'" 库存不足');
                }
                $detail['name'] = $curPro['name'];
                $detail['product_id'] = $proID;
                $detail['shop_price'] = $curPro['shop_price'];
                $detail['market_price'] = $curPro['market_price'];
                $detail['number'] = $number[$k];
                $detail['path'] = $curPro['path'];
                $details[] = $detail;
                $orderAmount += $curPro['shop_price']*$number[$k];
                $desc .= $curPro['name'].' * '.$number[$k].';';
            }
            // 生成订单
            $order['order_no'] = date('YmdHis').mt_rand(999,99999);
            $order['user_id'] = session("shopUserId");
            $order['desc'] = $desc;
            $order['order_amount'] = $orderAmount;
            $res = $this->models['order']->saveData('用户下单',$order,[],'order');
            $orderId = $res['data'];
            $order['id'] = $orderId;
            foreach ($details as $k=>$v){
                $details[$k]['order_id'] = $orderId;
            }
            $this->models['orderDetail']->saveAll($details);
            /*foreach ($product_id as $k=>$proID){
                // 减少库存
                $this->models['product']->where('id',$proID)->setDec('stock',$number[$k]);
                // 增加销量
                $this->models['product']->where('id',$proID)->setInc('sale_number',$number[$k]);
            }*/
            // 销毁购物车
            $this->models['carts']->where('user_id',session("shopUserId"))->where('product_id','in',$product_id)->delete();
            $assign = compact('order','details','address');
            Db::commit();
            // 生成订单详情
            return view('',$assign);
        }catch (Exception $e){
            Db::rollback();
            $this->error($e->getMessage());
        }
    }

    public function detail()
    {
        $data = $this->request->post();
        $save['pay_type'] = $data['payType'];
        $save['address_id'] = $data['address'];
        $save['id'] = $data['orderNo'];
        $save['confirm'] = 1;
        return $this->models['order']->saveData('完善订单信息',$save,[],'check');
    }
}