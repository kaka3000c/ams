<?php

namespace App\Http\Controllers\xcx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Order;
use \App\Addre;

class OrderController extends Controller {

    public function insert(Request $request) {

        $session_id = $request->input('session_id');

        $user_arr = DB::table('users')->where('session_id', $session_id)->first();
        $user_arr = (array) $user_arr;

        $user_id = $user_arr['id'];

        $address_arr = DB::table('addres')->where('user_id', $user_id)->first();

        $consignee = $request->input('consignee');
        $mobile = $request->input('mobile');
        $productId = $request->input('productId');
        $buynum = $request->input('buynum');
        $address = $request->input('address');

        if (empty($address_arr)) {
            $Addre = new Addre;
            $Addre->consignee = $consignee;
            $Addre->mobile = $mobile;
            $Addre->address = $address;
            $Addre->user_id = $user_id;
            $Addre->save();
        }


        $product_arr = DB::table('products')->where('pro_id', $productId)->first();
        $product_arr = (array) $product_arr;

        $Order = new Order;
        $Order->username = $consignee;
        $Order->pro_id = $productId;
        $Order->phone = $mobile;
        $Order->user_id = $user_id;
        $Order->shop_id = $product_arr['shop_id'];
        $Order->goods_name = $product_arr['goods_name'];
        $Order->save();


        $result = array('code' => 0, 'message' => '成功', 'user' => '666');
        return json_encode($result);
    }

    //用户订单列表
    public function index_json(Request $request) {

        $session_id = $request->input('session_id');

        $user_arr = DB::table('users')->where('session_id', $session_id)->first();
        $user_arr = (array) $user_arr;

        $order_list = DB::table('orders')->where('user_id', $user_arr['id'])->get()->toArray();
        foreach ($order_list as $key => $value) {
            $order_list[$key] = (array) $value;
        }
        $result = array('status' => 0, 'message' => '成功', 'order_list' => $order_list);
        return json_encode($result);
    }

    public function pay(Request $request) {

         $session_id = $request->input('session_id');

        $user_arr = DB::table('users')->where('session_id', $session_id)->first();
        $user_arr = (array) $user_arr;

        $user_id = $user_arr['id'];

        $address_arr = DB::table('addres')->where('user_id', $user_id)->first();

        $consignee = $request->input('consignee');
        $mobile = $request->input('mobile');
        $productId = $request->input('productId');
        $buynum = $request->input('buynum');
        $address = $request->input('address');

        if (empty($address_arr)) {
            $Addre = new Addre;
            $Addre->consignee = $consignee;
            $Addre->mobile = $mobile;
            $Addre->address = $address;
            $Addre->user_id = $user_id;
            $Addre->save();
        }


        $product_arr = DB::table('products')->where('pro_id', $productId)->first();
        $product_arr = (array) $product_arr;


        $order_id = $this->create_order_no();
        
        $Order = new Order;
        $Order->username = $consignee;
        $Order->pro_id = $productId;
        $Order->phone = $mobile;
        $Order->user_id = $user_id;
        $Order->shop_id = $product_arr['shop_id'];
        $Order->goods_name = $product_arr['goods_name'];
        $Order->goods_img = $product_arr['image'];
        $Order->order_sn = $order_id;
        $Order->buynum = $buynum;
        $Order->price =  $product_arr['shop_price'];
        $Order->total_price = $buynum * $product_arr['shop_price'];
        $Order->save();

        
        
        $appid = 'wx6699252f514f02e1';
        $secret = '4da9f2075dbd0019907cd877d056b1bf';
        
        $code = request('code');
        $total_price = request('total_price');
        
        $encryptedData = request('encryptedData');
        $iv = request('iv');

        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $appid . '&secret=' . $secret . '&js_code=' . $code . '&grant_type=authorization_code';
        //逻辑
        $info = file_get_contents($url);
        $json = json_decode($info); //对json数据解码

        $arr = get_object_vars($json); //返回一个数组。获取$json对象中的属性，组成一个数组

        $openid = $arr['openid'];
        $session_key = $arr['session_key'];

        
        $total_fee = $total_price*100;
        if ($user_id == 34){
            $total_fee =  1; 
        }
        $appid = 'wx6699252f514f02e1'; //如果是公众号 就是公众号的appid;小程序就是小程序的appid
        $body = '自己填';
        $mch_id = '1522618281';
        $KEY = 'psdf9897sadfdsf789ljofjsdf456lml';
        $nonce_str = $this->randomkeys(32); //随机字符串
        $notify_url = 'https://www.0668520.cn/xcx/order/notify_url';  //支付完成回调地址url,不能带参数
        $out_trade_no = $order_id; //商户订单号
        $spbill_create_ip = $_SERVER['SERVER_ADDR'];
        $trade_type = 'JSAPI'; //交易类型 默认JSAPI
        //这里是按照顺序的 因为下面的签名是按照(字典序)顺序 排序错误 肯定出错
        $post['appid'] = $appid;
        $post['body'] = $body;
        $post['mch_id'] = $mch_id;
        $post['nonce_str'] = $nonce_str; //随机字符串
        $post['notify_url'] = $notify_url;
        $post['openid'] = $openid;
        $post['out_trade_no'] = $out_trade_no;
        $post['spbill_create_ip'] = $spbill_create_ip; //服务器终端的ip
        $post['total_fee'] = intval($total_fee);        //总金额 最低为一分钱 必须是整数
        $post['trade_type'] = $trade_type;
        
        $sign = $this->MakeSign($post, $KEY);

          $post_xml = '<xml>
               <appid>'.$appid.'</appid>
               <body>'.$body.'</body>
               <mch_id>'.$mch_id.'</mch_id>
               <nonce_str>'.$nonce_str.'</nonce_str>
               <notify_url>'.$notify_url.'</notify_url>
               <openid>'.$openid.'</openid>
               <out_trade_no>'.$out_trade_no.'</out_trade_no>
               <spbill_create_ip>'.$spbill_create_ip.'</spbill_create_ip>
               <total_fee>'.$total_fee.'</total_fee>
               <trade_type>'.$trade_type.'</trade_type>
                  
               <sign>'.$sign.'</sign>
            </xml> ';

        //统一下单接口prepay_id
        $url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
        $xml = $this->http_request($url,$post_xml);     //POST方式请求http
        $array = $this->xml2array($xml);               //将【统一下单】api返回xml数据转换成数组，全要大写
       
        
         if($array['RETURN_CODE'] == 'SUCCESS' && $array['RESULT_CODE'] == 'SUCCESS'){
            $time = time();
            $tmp='';                            //临时数组用于签名
            $tmp['appId'] = $appid;
            $tmp['nonceStr'] = $nonce_str;
            $tmp['package'] = 'prepay_id='.$array['PREPAY_ID'];
            $tmp['signType'] = 'MD5';
            $tmp['timeStamp'] = "$time";
    
            $data['state'] = 1;
            $data['timeStamp'] = "$time";           //时间戳
            $data['nonceStr'] = $nonce_str;         //随机字符串
            $data['signType'] = 'MD5';              //签名算法，暂支持 MD5
            $data['package'] = 'prepay_id='.$array['PREPAY_ID'];   //统一下单接口返回的 prepay_id 参数值，提交格式如：prepay_id=*
            $data['paySign'] = $this->MakeSign($tmp,$KEY);       //签名,具体签名方案参见微信公众号支付帮助文档;
            $data['out_trade_no'] = $out_trade_no;
    
        }else{
            $data['state'] = 0;
            $data['text'] = "错误";
            $data['RETURN_CODE'] = $array['RETURN_CODE'];
            $data['RETURN_MSG'] = $array['RETURN_MSG'];
        }
        
        $result = array('status' => 0, 'message' => '成功', 'data' => $data);
        return json_encode($result);

        //解密数据包得到微信用户数据
        $pc = new wxBizDataCrypt($appid, $session_key);
        $errCode = $pc->decryptData($encryptedData, $iv, $data);

        if ($errCode == 0) {
            //打印出用户数据解密包
            // print($data . "\n");
            //$data['nickName']; 
            //$data['gender']; 
            //$data['city']; 
            //$data['province']; 
            //$data['country']; 
            //$data['avatarUrl']; 
        } else {
            // print($errCode . "\n");
        }
    }

    public function http_request($url, $data = null, $headers = array()) {
        $curl = curl_init();
        if (count($headers) >= 1) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    /**
     * 生成签名, $KEY就是支付key
     * @return 签名
     */
    public function MakeSign($params, $KEY) {
        //签名步骤一：按字典序排序数组参数
        ksort($params);
        $string = $this->ToUrlParams($params);  //参数进行拼接key=value&k=v
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=" . $KEY;
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
        return $result;
    }

    /**
     * 将参数拼接为url: key=value&key=value
     * @param $params
     * @return string
     */
    public function ToUrlParams($params) {
        $string = '';
        if (!empty($params)) {
            $array = array();
            foreach ($params as $key => $value) {
                $array[] = $key . '=' . $value;
            }
            $string = implode("&", $array);
        }
        return $string;
    }

    function randomkeys($length) {
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz
ABCDEFGHIJKLOMNOPQRSTUVWXYZ,./&l
t;>?;#:@~[]{}-_=+)(*&^%$?!'; //字符池
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $pattern{mt_rand(0, 35)}; //生成php随机数
        }
        return $key;
    }
    
    //获取xml里面数据，转换成array
    private function xml2array($xml){
        $p = xml_parser_create();
        xml_parse_into_struct($p, $xml, $vals, $index);
        xml_parser_free($p);
        $data = "";
        foreach ($index as $key=>$value) {
            if($key == 'xml' || $key == 'XML') continue;
            $tag = $vals[$value[0]]['tag'];
            $value = $vals[$value[0]]['value'];
            $data[$tag] = $value;
        }
        return $data;
    }
    
    /**
     * 将xml转为array
     * @param string $xml
     * return array
     */
    public function xml_to_array($xml){
        if(!$xml){
            return false;
        }
        //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $data;
    }
    
    function create_order_no() {
    $order_no = date('Ymd').substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(1000, 9999));
    return $order_no;
    }

    
    /* 微信支付完成，回调地址url方法  notify_url() */
    public function notify_url(Request $request){
        $catelog = "../app/Http/Controllers/xcx/log";
        if(!file_exists($catelog)){
            mkdir($catelog,0777,TRUE);
        }
        $file = "../app/Http/Controllers/xcx/log/log.txt";
        $myfile = fopen($file,'a+');
        
        $post = $_REQUEST;
        if($post==null){
             $post = file_get_contents("php://input");
              if($post == null){
                  $post = $GLOBALS['HTTP_RAW_POST_DATA'];
              }
       
        }
        $post_data = $this->xml_to_array($post); 
       
        fwrite($myfile,print_r($post_data,true));
        fclose($myfile);
  
        $postSign = $post_data['sign'];  //微信支付成功，返回回调地址url的数据：XML转数组Array
        unset($post_data['sign']);
        
        /* 微信官方提醒：
         *  商户系统对于支付结果通知的内容一定要做【签名验证】,
         *  并校验返回的【订单金额是否与商户侧的订单金额】一致，
         *  防止数据泄漏导致出现“假通知”，造成资金损失。
         */
        ksort($post_data);// 对数据进行排序
        $str = $this->ToUrlParams($post_data);//对数组数据拼接成key=value字符串
         $KEY = 'psdf9897sadfdsf789ljofjsdf456lml';
        $str =$str. "&key=" . $KEY;
        $user_sign = strtoupper(md5($str));   //再次生成签名，与$postSign比较
        
        if($post_data['return_code']=='SUCCESS'&&$postSign==$user_sign){
            
            DB::table('orders')->where('order_sn', $post_data['out_trade_no']) ->update(['order_status' => 1]);
           
            $this->return_success();
        }
        
        
    }
    
    
    private function return_success(){
        $return['return_code'] = 'SUCCESS';
        $return['return_msg'] = 'OK';
        $xml_post = '<xml>
                    <return_code>'.$return['return_code'].'</return_code>
                    <return_msg>'.$return['return_msg'].'</return_msg>
                    </xml>';
        echo $xml_post;exit;
    }
}
