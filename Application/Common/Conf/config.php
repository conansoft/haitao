 <?php
 return array(
     //'配置项'=>'配置值'
     'MODULE_ALLOW_LIST' => array('Home','Profile'),
     'DEFAULT_MODULE' => 'Home', // 默认模块
     'SESSION_AUTO_START' => ture,
     'URL_MODEL' => 2,
     /* 数据库配置 */
     'DB_TYPE' => 'mysql',
     'DB_DSN' => 'mysql:host=localhost;dbname=youdb;charset=utf8',
     'DB_USER' => 'root',
     'DB_PWD' => 'conansoft',
     'DB_PREFIX' => 'yy_',
     /* 异常跟踪 */
     //'TRACE_EXCEPTION' => true,
     // 'SHOW_PAGE_TRACE' => true,
     // 配置邮件发送服务器
     'MAIL_HOST' => 'smtp.163.com',
     'MAIL_SMTPAUTH' => TRUE,
     'MAIL_USERNAME' => '278543618@163.com',
     'MAIL_PASSWORD' => 'zxc123',
     'MAIL_CHARSET' => 'utf-8',
     'MAIL_FromName' => 'TOPHOME',
     // 配置短信发送服务器
     'SMS_URL' => 'http://61.145.229.29:9003/MWGate/wmgw.asmx',
     'SMS_USERNAME' => 'J01787',
     'SMS_PASSWORD' => '219842',
     /* 系统数据加密设置 */
     'DATA_AUTH_KEY' => '<60(`dTZ)O~^m[JHN+L_>iD5YS=4#R/soyla9G|X', //默认数据加密KEY
     //'配置项'=>'配置值'
     // 设置默认的模板主题
     'USER_ALLOW_REGISTER' => 'true',
     'MAIN' => $_SERVER['SERVER_NAME'],
     'DOMAIN' => "http://" . $_SERVER['SERVER_NAME'],
     'UPLOAD_PATH'=>'/Public/resource/',
     /* 模板相关配置 */
     'TMPL_PARSE_STRING' => array(
         '__PUBLIC__' =>  '/Public',
         '__IMG__' => __ROOT__ . '/Public/images',
         '__CSS__' => __ROOT__ . '/Public/css',
         '__JS__' => __ROOT__ . '/Public/js',
         '__Common__' => __ROOT__ . '/Public/Common',
     ),
 );