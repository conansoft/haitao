<?php

/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 */
function is_login()
{
    $user = I('session.user_auth');
    if (empty($user)) {
        return 0;
    } else {
        return I('session.user_auth_sign') == data_auth_sign($user) ? $user['uid'] : 0;
    }
}

function get_catelist()
{
    $model = M("GoodsCategory");
    $list = $model->where(array(
        "is_delete" => 0,
        "catid" => 0,
        "state" => 1,
        "parent_id" => 0
    ))->order("sort desc")->select();
    return $list;
}

function md5_encrypt($str)
{
    return md5('youdb_v_coco' . $str);

}

function threedes_encrypt($plainText, $key = KEY)
{
    if ($plainText) {

        $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);
        $encryptText = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $plainText, MCRYPT_MODE_ECB, $iv);
        return trim(base64_encode($encryptText));
    }
}

function threedes_decrypt($encryptedText, $key = KEY)
{
    if ($encryptedText) {

        $cryptText = base64_decode($encryptedText);
        $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);
        $decryptText = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $cryptText, MCRYPT_MODE_ECB, $iv);
        return trim($decryptText);
    }
}


/**
 * 验证码检查
 */
function check_verify($code, $id = "")
{
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

/**
 * 数据签名认证
 * @param  array $data 被认证的数据
 * @return string       签名
 * @author zxl
 */
function data_auth_sign($data)
{
    //数据类型检测
    if (!is_array($data)) {
        $data = (array)$data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名
    return $sign;
}

/**
 * 系统加密方法
 * @param string $data 要加密的字符串
 * @param string $key 加密密钥
 * @param int $expire 过期时间 单位 秒
 * @return string
 * @author zxl
 */
function think_encrypt($data, $key = '', $expire = 0)
{
    $key = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $data = base64_encode($data);
    $x = 0;
    $len = strlen($data);
    $l = strlen($key);
    $char = '';

    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) {
            $x = 0;
        }
        $char .= substr($key, $x, 1);
        $x++;
    }

    $str = sprintf('%010d', $expire ? $expire + time() : 0);

    for ($i = 0; $i < $len; $i++) {
        $str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1))) % 256);
    }
    return str_replace(array('+', '/', '='), array('-', '_', ''), base64_encode($str));
}

/**
 * 系统解密方法
 * @param  string $data 要解密的字符串 （必须是think_encrypt方法加密的字符串）
 * @param  string $key 加密密钥
 * @return string
 * @author zxl
 */
function think_decrypt($data, $key = '')
{
    $key = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $data = str_replace(array('-', '_'), array('+', '/'), $data);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    $data = base64_decode($data);
    $expire = substr($data, 0, 10);
    $data = substr($data, 10);

    if ($expire > 0 && $expire < time()) {
        return '';
    }
    $x = 0;
    $len = strlen($data);
    $l = strlen($key);
    $char = $str = '';

    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) {
            $x = 0;
        }
        $char .= substr($key, $x, 1);
        $x++;
    }

    for ($i = 0; $i < $len; $i++) {
        if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))) {
            $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
        } else {
            $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
        }
    }
    return base64_decode($str);
}

/**
 * 发送邮件
 * @author zxl
 */
function sendmail($to_mail, $Subject = '邮件主题', $message = '发送邮箱信息', $from_mail = '')
{
    Vendor('Mailer.EMailer');
    $mailer = new EMailer();
    $mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置

    $mailer->IsSMTP();
    $mailer->SMTPAuth = C('MAIL_SMTPAUTH');
    $mailer->Host = C('MAIL_HOST');
    $mailer->Username = C('MAIL_USERNAME');  //这里输入发件地址的用户名
    $mailer->Password = C('MAIL_PASSWORD');     //这里输入发件地址的密码 

    $mailer->From = empty($from_mail) ? C('MAIL_USERNAME') : $from_mail; //设置发件地址
    $mailer->FromName = C('MAIL_FromName');   //这里设置发件人姓名

    $mailer->AddAddress($to_mail); //设置收件件地址
    $mailer->CharSet = C('MAIL_CHARSET');
    $mailer->Subject = $Subject; //设置邮件的主题
    $mailer->Body = $message;
    $result = $mailer->Send();
    return $result;
}

/**
 * 发送短信
 * @author zxl
 */
function sendsms($info)
{
    Vendor('Sms.SmsApi');
    $Sms = new SmsApi();
    $username = C('SMS_USERNAME');
    $password = C('SMS_PASSWORD');
    $pageurl = C('SMS_URL');
    $msg = $Sms->Smsaction($username, $password, $pageurl, $info);
    return $msg;
}

/**
 * 验证是否能发送短信
 * @author zxl
 */
function Verifysms($phone, $type = 1, $uid = '')
{
    $num = substr(rand(100000, 900000), 0, 6); // echo $num;
    $time = time();
    $datetime = date("Y-m-d H:i:s");
    $info = '验证码：' . $num . '，如非您本人进行操作，请忽略此信息。';
    $now = DATE("Y-m-d");
    $infoarr = array();
    $infoarr['type'] = '0';
    $infoarr['method'] = '1'; //提交方式
    $infoarr['port'] = '*';
    $infoarr['self'] = '0';
    $infoarr['phones'] = $phone;
    $infoarr['msg'] = $info;


    // 查询今天有没有10次短信记录
    $sql = "select count(id) as num from hb_verificationcode where TO_DAYS(create_time) = TO_DAYS(NOW()) and target = '" . $phone . "' ";
    $count = M()->query($sql);
    if ($count[0]['num'] < 10) { // 今天记录没有超过10条
        $sql = "select create_time from hb_verificationcode where  target  = '" . $phone . "' ORDER by id desc  limit 1";
        $data = M()->query($sql);
        if (empty($data)) { // 没有发过短信   
            $msg = sendsms($infoarr);
            $sql = "insert into hb_verificationcode (user_id,target,code,create_time,type) values ('{$uid}','" . $phone . "','" . $num . "','" . $datetime . "','{$type}') ; ";
            M()->execute($sql);
            return '1';
        } else {
            $create_time = $data[0]['create_time'];
            if (($time - strtotime($create_time)) > 90) { // 如果间隔90秒 可以再次发送
                $msg = sendsms($infoarr);
                $sql = "insert into hb_verificationcode (user_id,target,code,create_time,type) values ('{$uid}','" . $phone . "','" . $num . "','" . $datetime . "','{$type}') ; ";
                M()->execute($sql);
                return '1';
                //var_dump($num);
            } else {
                return '-1'; //-1 等待
//                    exit(json_encode('error:wait'));
            }
        }
    } else { // 今天记录超过10条 
        //return 'error:今天短信次数已经用完';
        return '0';
//            exit(json_encode('error:今天短信次数已经用完')); 
    }
}

/**
 * 验证是否能发送邮件
 * @author zxl
 */
function Verifyemail($email, $verify_type = 2, $uid = '')
{
    $hash = substr(md5(time()), 10, 15);
    switch ($verify_type) {
        case 1:
            $message = "这个是HB的找回密码邮件，请在2小时内 点击链接找回密码\r\n";
            $title = 'HB找回密码';
            $param = think_encrypt($email . '|' . $verify_type . '|' . $uid);
            $message .= C(DOMAIN) . "/User/Passport/pwdActiveEmail/type/email/param/" . $param . "/hash/" . think_encrypt($hash);
            break;
        case 2:
            $title = 'HB邮箱验证邮件';
            $message = "亲爱的用户,\r\n";
            $message .= "您好！感谢您绑定HB帐号，点击下面的链接即可完成绑定：\r\n";
            $param = think_encrypt($email . '|' . $verify_type . '|' . $uid);
            $message .= C(DOMAIN) . "/User/Passport/verifyemail/param/" . $param . "/hash/" . think_encrypt($hash);
            $message .= "\r\n(如果链接无法点击，请将它复制并粘贴到浏览器的地址栏中访问)\r\n";
            $message .= "本邮件是系统自动发送的，请勿直接回复！感谢您的访问，祝您使用愉快！\r\n";
            $message .= "HB电子商务";
            break;
        default:
            die('未知类型');
    }

    $now = DATE("Y-m-d");
    $time = time();
    // 查询今天有没有10次短信记录
    $sql = "select count(id) as num from vip_verificationcode where TO_DAYS(create_time) = TO_DAYS(NOW()) and target  = '" . $email . "'";
    $count = M()->query($sql);
    if ($count[0]['num'] <= 20) { // 今天记录没有超过10条
        $sql = "select create_time from vip_verificationcode where  target  = '" . $email . "' ORDER by id desc  limit 1  ; ";
        $data = M()->query($sql);
        if (empty($data)) { // 没有发过短信   
            if (sendmail($email, $title, $message) == true) {
                $VerifyCode = M("Verificationcode");
                $VerifyCode->user_id = $uid;
                $VerifyCode->target = $email;
                $VerifyCode->code = $hash;
                $VerifyCode->create_time = date("Y-m-d H:i:s");
                $VerifyCode->type = $verify_type;
                $result = $VerifyCode->add();
                return $result;
            }
        } else {
            $create_time = $data[0]['create_time'];
            if (($time - strtotime($create_time)) > 90) { // 如果间隔90秒 可以再次发送
                if (sendmail($email, $title, $message) == true) {
                    $VerifyCode = M("Verificationcode");
                    $VerifyCode->user_id = $uid;
                    $VerifyCode->target = $email;
                    $VerifyCode->code = $hash;
                    $VerifyCode->create_time = date("Y-m-d H:i:s");
                    $VerifyCode->type = $verify_type;
                    $result = $VerifyCode->add();
                    return $result;
                }
            } else {
                return '-1';
//                    exit(json_encode('error:wait'));
            }
        }
    } else { // 今天记录超过10条 
        return '0';
//            exit(json_encode('error:今天短信次数已经用完')); 
    }

}

/**
 * 检验 验证邮件 是否有效
 * @param  $verify_type 类型：1找回密码||2验证
 * @author zxl
 */
function Checkmail($email, $verify_type, $hash)
{

    $VerifyCode = M("Verificationcode");
    $msg = $VerifyCode->where("target='{$email}' and code='{$hash}' and type='{$verify_type}' and  UNIX_TIMESTAMP(create_time) >'" . (time() - 2 * 60 * 60) . "'")->order('id desc')->find();
    if (empty($msg)) {
        return false;
    }
    return $msg;
}

/**
 * 检验 短信key 是否有效
 * @author zxl
 */
function Checkmobilekey($hash)
{
    $arr = explode('|', think_decrypt($hash));
    $time = time();
    $datetime = date("Y-m-d H:i:s");
    $id = $arr['0'];
    $mobile = $arr['1'];
    $notenum = $arr['2'];
    $where['code'] = $notenum;
    $where['target'] = $mobile;
    $where['user_id'] = $id;
    $data = M(Verificationcode)->where($where)->find();
    if (empty($data)) {//短信验证码有误  
        return false;
    } else {
        $create_time = $data['create_time'];
        if (($time - strtotime($create_time)) > 600) {//这个验证码的时间过期了 
            return false;
        } else {//成功 ，可以用 
            return true;
        }
        return true;
    }
}

function CheckNotenum2($phone, $notenum, $type = 1)
{

    $time = time();
    if ($notenum == '' || $phone == '') {
        return false;
    }
    $sql = "select create_time from hb_verificationcode where type=" . $type . "   and code='" . $notenum . "' and target  = '" . $phone . "'";

    $data = M()->query($sql);

    if (empty($data)) {//短信验证码有误  
        return false;
    } else {
        $create_time = $data[0]['create_time'];

        if (($time - strtotime($create_time)) > 600) {//这个验证码的时间过期了 
            return false;
        } else {//成功 ，可以用
            return true;
        }
    }
}

function pwdrank($pwd)
{
    $score = 0;
    if (preg_match("/[0-9]+/", $pwd)) {
        $score++;
    }
    if (preg_match("/[a-z]+/", $pwd)) {
        $score++;
    }
    if (preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/", $pwd)) {
        $score++;
    }

    return $score;
}

/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 */
function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
{
    // 创建Tree
    $tree = array();
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] = &$list[$key];
        }


        foreach ($list as $key => $data) {
            // 判断是否存在parent

            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[] = &$list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent = &$refer[$parentId];
                    $parent[$child][] = &$list[$key];
                }
            }
        }
    }


    return $tree;
}

//冒泡排序

function paixu($arr)
{
    for ($i = 0, $len = count($arr); $i < $len; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$i]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $temp;
            }
        }
    }
    return $arr;
}

/*
 * $sourePic:原图路径
 * $smallFileName:小图名称
 * $width:小图宽
 * $heigh:小图高
 */

function pngthumb($sourePic, $smallFileName, $width, $heigh)
{
    $image = imagecreatefrompng($sourePic); //PNG
    imagesavealpha($image, true); //这里很重要 意思是不要丢了$sourePic图像的透明色;
    $BigWidth = imagesx($image); //大图宽度
    $BigHeigh = imagesy($image); //大图高度
    $thumb = imagecreatetruecolor($width, $heigh);
    imagealphablending($thumb, false); //这里很重要,意思是不合并颜色,直接用$img图像颜色替换,包括透明色;
    imagesavealpha($thumb, true); //这里很重要,意思是不要丢了$thumb图像的透明色;
    if (imagecopyresampled($thumb, $image, 0, 0, 0, 0, $width, $heigh, $BigWidth, $BigHeigh)) {
        imagepng($thumb, $smallFileName);
    }
    return $smallFileName; //返回小图路径
}

function mkFolder($path)
{
    if (!is_readable($path)) {
        is_file($path) or mkdir($path, 0700);
    }
}

function getHttpResponsePOST($url, $cacert_url, $para)
{
    $curl = curl_init($url);
    if (!empty($cacert_url)) {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); //SSL证书认证
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); //严格认证
        curl_setopt($curl, CURLOPT_CAINFO, $cacert_url); //证书地址
    }
    curl_setopt($curl, CURLOPT_HEADER, 0); // 过滤HTTP头
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 显示输出结果
    curl_setopt($curl, CURLOPT_POST, true); // post传输数据
    curl_setopt($curl, CURLOPT_POSTFIELDS, $para); // post传输数据
    $responseText = curl_exec($curl);
    //var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
    curl_close($curl);

    return $responseText;
}

function randCode($length = 5, $type = 2)
{
    $arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz", 3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    if ($type == 0) {
        array_pop($arr);
        $string = implode("", $arr);
    } elseif ($type == "-1") {
        $string = implode("", $arr);
    } else {
        $string = $arr[$type];
    }
    $count = strlen($string) - 1;
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $string[rand(0, $count)];
    }
    return ucwords($code);
}

function writelog($con)
{
    $filedir = "D:\\log.txt";
    $dir = dirname($filedir);
    $file = fopen($filedir, 'a+');
    $fileval = $con;
    fwrite($file, $fileval);
    fclose($filedir);
}

function count_cart($cart_array)
{
    $num = 0;
    foreach ($cart_array as $cart) {
        $num += intval($cart["num"]);
    }
    return $num;
}

function getDateTime()
{
    return date("Y-m-d H:i:s");
}

function getImgPath($path)
{
    return $path = empty($path) ? '/image/default.jpg' : $path;
}

function strLL($str, $len)
{
    if (mb_strlen($str) < $len) {
        return $str;
    }
    $str = substr($str, 0, $len, 'utf-8');
    $str .= '.....';
    return $str;
}

//以不同尺寸显示图片,$pre表示尺寸前缀，如：100_50_  表示以100*50大小显示
function showImageFit($filepath, $pre = "")
{
    if (empty($filepath)) {
        return "";
    }
    $imgserver = C("IMGSERVER");
    $filepath = $imgserver . $filepath;
    $arr = explode("/", $filepath);
    $fname = $arr[count($arr) - 1];
    $arr[count($arr) - 1] = $pre . $fname;
    return implode("/", $arr);
}

//获取分词后结果
function get_tags_arr($title, $num = 4)
{
    require(LIB_PATH . 'Com/Fenci/pscws4.class.php');
    $pscws = new PSCWS4();
    $pscws->set_dict(LIB_PATH . 'Com/Fenci/scws/dict.utf8.xdb');
    $pscws->set_rule(LIB_PATH . 'Com/Fenci/scws/rules.utf8.ini');
    $pscws->set_ignore(true);
    $pscws->send_text($title);
    $words = $pscws->get_tops($num);
    $tags = array();
    foreach ($words as $val) {
        $tags[] = $val['word'];
    }
    $tags[] = $title;
    $retWords = array_unique($tags);
    $pscws->close();
    return $retWords;
}

function unicodeDecode($data)
{
    function replace_unicode_escape_sequence($match)
    {
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
    }

    $rs = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $data);

    return $rs;
}


//过滤标签
function fliter($str = '')
{
    $str = preg_replace("@<script[\s]*>(.*?)</script>@is", " $1 ", $str);
    $str = preg_replace("@<iframe[\s]*>(.*?)</iframe>@is", " $1 ", $str);
    $str = preg_replace("@<style[\s]*>(.*?)</style>@is", " $1 ", $str);
    $str = preg_replace("@<[\s]*>(.*?)>@is", " $1 ", $str);
    return $str;
}

function getSeo($locationid)
{
    $s = M("Seo");
    $seo = $s->where("locationid=" . $locationid)->find();
    return $seo;
}

function get_real_ip()
{
    $ip = false;
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = false;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi("^(10|172\.16|192\.168)\.", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

function getDisplay($flag)
{
    if (empty($flag == 1)) {
        echo 'style="display:block"';
    } else {
        echo 'style="display:none"';
    }
}

function time_tran($the_time)
{
    $now_time = date("Y-m-d H:i:s", time());
    $now_time = strtotime($now_time);
    $show_time = strtotime($the_time);
    $dur = $now_time - $show_time;
    if ($dur < 0) {
        return $the_time;
    } else {
        if ($dur < 60) {
            return $dur . '秒前';
        } else {
            if ($dur < 3600) {
                return floor($dur / 60) . '分钟前';
            } else {
                if ($dur < 86400) {
                    return floor($dur / 3600) . '小时前';
                } else {
                    if ($dur < 259200) {//3天内
                        return floor($dur / 86400) . '天前';
                    } else {
                        return $the_time;
                    }
                }
            }
        }
    }
}

?>
