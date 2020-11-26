<?php
/**
 * @author: Tom
 * @day: 2020/6/24
 */

namespace app\http\validates\crm;
use think\Validate;
// use think\exception\ValidateException;
class OrderValidate extends Validate
{
    protected $regex = ['en' =>'/^[0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',//
                        'zn' =>'/^[\x7f-\xff\0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',
                        'phone' => '/^1[3456789]\d{9}$/',
    ];
    protected $rule = [
        'real_name'=>'require|regex:zn', //检测中文、英文、数字、下划线符合
        'user_phone'=>'require|regex:phone',
        'order_name'=>'require|regex:zn',
        'symptom'=>'require|regex:zn',
        'taking_quency'=>'require|chsAlphaNum',
        'taking_time'=>'chs', //检测中文
        'taking_cycle'=>'require|chsAlphaNum',
        'taking_suggest'=>'regex:zn',
        'taking_remark'=>'regex:zn',
        'idcard' =>'require|checkidcard',
        'user_phone2'=>'regex:phone',
        'user_address'=>'require|regex:zn',
        'total_num' =>'require|number',
        'price' => 'require|float',
        'total_price'=>'require|float',
        'pay_price' => 'float',
        'freight_price'=>'float',
        'pay_postage' =>'float',
        'paid'=>'require|bool',
        'pay_time'=>'number',
        'add_time'=>'number',
        'status'=>'require|en',
        'refund_status'=>'chs',
        'refund_reason_wap_explain'=>'zn',
        'refund_reason_time'=>'number',
        'refund_price'=>'float',
        'refund_reason'=>'zn',
        'delivery_name'=>'zn',
        'delivery_id'=>'alphaNum',
        'pay_type'=>'require|alpha',
        'trade_no'=>'alphaNum|max:35',

    ];
    protected $message=[
        'real_name.require'=>'患者姓名不能为空',
        'real_name.regex'=>'患者姓名输入格式不正确',
        'user_phone.require'=>'联络电话1不能为空',
        'user_phone.regex'=>'联络电话1输入格式不正确',
        'order_name.require'=>'处方名称不能为空',
        'order_name.regex'=>'处方名称输入格式不正确',
        'symptom.require'=>'症状不能为空',
        'symptom.regex'=>'症状输入格式不正确',
        'taking_quency.require'=>'服用频次不能为空',
        'taking_quency.chsAlphaNum'=>'服用频次格式错误',
        'taking_time.chs'=>'服用时间格式错误',
        'taking_cycle.require'=>'服用周期不能为空',
        'taking_cycle.chsAlphaNum'=>'服用周期格式错误',
        'taking_suggest.regex'=>'服用建议格式错误',
        'taking_remark.regex'=>'医嘱输入格式错误',
        'idcard.require'=>'身份证号码不能为空',
        'idcard.checkidcard'=>'身份证号码格式错误',
        'user_phone2.regex'=>'联络电话2输入格式不正确',
        'user_address.require'=>'地址信息不能为空',
        'user_address.regex'=>'地址信息类型错误',
        'total_num.require' =>'订单数量不能为空',
        'total_num.number'=>'订单数量格式错误',
        'price.require'=>'单剂价格不能为空',
        'price.float'=>'单剂价格类型错误',
        'total_price.require'=>'订单总价不能为空',
        'total_price.float'=>'订单总价类型错误',
        // 'pay_price.require'=>'实际支付价格不能为空',
        'pay_price.float'=>'实际支付价格类型错误',
        // 'freight_price.require'=>'运费价格不能为空',
        'freight_price.float'=>'运费价格类型错误',
        // 'pay_postage.require'=>'实际支付运费价格不能为空',
        'pay_postage.float'=>'实际支付运费价格类型错误',
        'paid.require'=>'支付状态不能为空',
        'paid.bool'=>'支付状态类型错误',
        'add_time.number'=>'添加时间格式错误',
        'pay_time.number'=>'支付时间格式错误',
        'status.require'=>'订单状态不能为空',
        'status.en'=>'订单状态格式错误',
        'refund_status.chs'=>'退款状态格式错误',
        'refund_reason_wap_explain.zn'=>'退款说明格式错误',
        'refund_reason_time.time'=>'退款时间格式错误',
        'refund_price.float'=>'退款金额类型错误',
        'refund_reason.zn'=>'不退款理由格式错误',
        // 'delivery_name.require'=>'快递名称不能为空',
        'delivery_name.zn'=>'快递名称格式错误',
        // 'delivery_id.require'=>'快递单号不能为空',
        'delivery_id.alphaNum'=>'快递单号格式错误',
        'pay_type.require'=>'支付类型不能为空',
        'pay_type.alpha'=>'支付类型格式错误',
        'trade_no.alphaNum'=>'第三方交易号格式类型错误',
        'trade_no.max'=>'第三方交易号错误',
    ];
    /**
     * 处方单
     * @return [type] [description]
     */
    public function scenePrescription()
    {
        return $this->only(['real_name','user_phone','order_name','symptom','taking_quency','taking_time','taking_cycle','taking_suggest','taking_remark','price','total_price','status']);
    }
    /**
     * 采购单
     * @return [type] [description]
     */
    public function scenePurchase(){
         return $this->only(['real_name','user_phone','user_phone2','order_name','taking_quency','taking_time','taking_cycle','taking_suggest','taking_remark','idcard','user_address','delivery_name','delivery_id','pay_type','pay_time','pay_price','trade_no','total_num','freight_price','pay_postage','paid','refund_status','refund_reason_wap_explain','refund_reason_time','refund_price','refund_reason','price','total_price','status']);
    }
    /*
     正则验证身份证号码  by雨沫
     */

    function checkidcard($idcard)
    {
        if(empty($idcard)){
            return false;
        }
        $City = array(11=>"北京",12=>"天津",13=>"河北",14=>"山西",15=>"内蒙古",21=>"辽宁",22=>"吉林",23=>"黑龙江",31=>"上海",32=>"江苏",33=>"浙江",34=>"安徽",35=>"福建",36=>"江西",37=>"山东",41=>"河南",42=>"湖北",43=>"湖南",44=>"广东",45=>"广西",46=>"海南",50=>"重庆",51=>"四川",52=>"贵州",53=>"云南",54=>"西藏",61=>"陕西",62=>"甘肃",63=>"青海",64=>"宁夏",65=>"新疆",71=>"台湾",81=>"香港",82=>"澳门",91=>"国外");
        $iSum = 0;
        $idCardLength = strlen($idcard);
        // 长度验证
        if(!preg_match('/^\d{17}(\d|x)$/i',$idcard) && !preg_match('/^\d{15}$/i',$idcard))
        {
            return false;
        }
        // 地区验证
        if(!array_key_exists(intval(substr($idcard,0,2)),$City))
        {
            return false;
        }
        // // 15位身份证验证生日，转换为18位
        if ($idCardLength == 15)
        {
            $sBirthday = '19'.substr($idcard,6,2).'-'.substr($idcard,8,2).'-'.substr($idcard,10,2);
            if (date('Y-m-d', strtotime($sBirthday)) != $sBirthday) return false;
            $idcard = substr($idcard,0,6)."19".substr($idcard,6,9);//15to18
            $Bit18 = self::getVerifyBit($idcard);//算出第18位校验码
            $idcard = $idcard.$Bit18;
        }
        // 判断是否大于2078年，小于1900年
        $year = substr($idcard,6,4);
        if ($year<1900 || $year>2078 )
        {
            return false;
        }
        //18位身份证处理
        $sBirthday = substr($idcard,6,4).'-'.substr($idcard,10,2).'-'.substr($idcard,12,2);
        if (date('Y-m-d', strtotime($sBirthday)) != $sBirthday) return false;
        //身份证编码规范验证
        $idcard_base = substr($idcard,0,17);
        if(strtoupper(substr($idcard,17,1)) != self::getVerifyBit($idcard_base))
        {
            return false;
        }
        return true;
    }

    // 计算身份证校验码，根据国家标准GB 11643-1999
    function getVerifyBit($idcard_base)
    {
        if(strlen($idcard_base) != 17)
        {
            return false;
        }
        //加权因子
        $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
        //校验码对应值
        $verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4','3', '2');
        $checksum = 0;
        for ($i = 0; $i < strlen($idcard_base); $i++)
        {
            $checksum += substr($idcard_base, $i, 1) * $factor[$i];
        }
        $mod = $checksum % 11;
        $verify_number = $verify_number_list[$mod];
        return $verify_number;
    }
}