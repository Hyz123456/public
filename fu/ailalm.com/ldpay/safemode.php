<?php
/**************************************

*作者：马 犇

*使用方法：放在公共类库的最前端即可

**************************************/

foreach ($_GET as $get_key=>$get_var) 
{ 
if (is_numeric($get_var)) { 
$get[strtolower($get_key)] = get_int($get_var); 
} else { 
$get[strtolower($get_key)] = get_str($get_var); 
} 
} 
/* 过滤所有POST过来的变量 */ 
foreach ($_POST as $post_key=>$post_var) 
{ 
if (is_numeric($post_var)) { 
$post[strtolower($post_key)] = get_int($post_var); 
} else { 
$post[strtolower($post_key)] = get_str($post_var); 
} 
} 
/* 过滤函数 */ 
//整型过滤函数 
function get_int($number) 
{ 
return intval($number); 
} 
//字符串型过滤函数 
function get_str($string) 
{ 
if (!get_magic_quotes_gpc()) { 
return addslashes($string); 
} 
return $string; 
}

/**
 * 安全模块
 * Email:zhangyuan@tieyou.com
 * 主要针对xss跨站攻击、sql注入等敏感字符串进行过滤
 * @author hkshadow
 */
class safeMode{
     
    /**
     * 执行过滤
     * @param 1 linux/2 http/3 Db/ $group
     * @param 保存路径以及文件名/文件名/null $projectName
     */
    public function xss($group = 1,$projectName = NULL){
        //正则条件
        $referer = empty ( $_SERVER ['HTTP_REFERER'] ) ? array () : array ($_SERVER ['HTTP_REFERER'] );
        $getfilter = "'|<[^>]*?>|^\\+\/v(8|9)|\\b(and|or)\\b.+?(>|<|=|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
        $postfilter = "^\\+\/v(8|9)|\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|<\\s*img\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
        $cookiefilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
 
        // $ArrPGC=array_merge($_GET,$_POST,$_COOKIE);
 
        //遍历过滤
        foreach ( $_GET as $key => $value ) {
            $this->stopAttack ( $key, $value, $getfilter ,$group , $projectName);
        }
        //遍历过滤
        foreach ( $_POST as $key => $value ) {
            $this->stopAttack ( $key, $value, $postfilter ,$group , $projectName);
        }
        //遍历过滤
        foreach ( $_COOKIE as $key => $value ) {
            $this->stopAttack ( $key, $value, $cookiefilter ,$group , $projectName);
        }
        //遍历过滤
        foreach ( $referer as $key => $value ) {
            $this->stopAttack ( $key, $value, $getfilter ,$group , $projectName);
        }
    }
     
    /**
     * 匹配敏感字符串，并处理
     * @param 参数key $strFiltKey
     * @param 参数value $strFiltValue
     * @param 正则条件 $arrFiltReq
     * @param 项目名 $joinName
     * @param 1 linux/2 http/3 Db/ $group
     * @param 项目名/文件名/null $projectName
     */
    public function stopAttack($strFiltKey, $strFiltValue, $arrFiltReq,$group = 1,$projectName = NULL) {
         
            $strFiltValue = $this->arr_foreach ( $strFiltValue );
            //匹配参数值是否合法
            if (preg_match ( "/" . $arrFiltReq . "/is", $strFiltValue ) == 1) {
                //记录ip
                $ip = "操作IP: ".$_SERVER["REMOTE_ADDR"];
                //记录操作时间
                $time = " 操作时间: ".strftime("%Y-%m-%d %H:%M:%S");
                //记录详细页面带参数
                $thePage = " 操作页面: ".$this->request_uri();
                //记录提交方式
                $type = " 提交方式: ".$_SERVER["REQUEST_METHOD"];
                //记录提交参数
                $key = " 提交参数: ".$strFiltKey;
                //记录参数
                $value = " 提交数据: ".htmlspecialchars($strFiltValue);
                //写入日志
                $strWord = $ip.$time.$thePage.$type.$key.$value;
                //保存为linux类型
                if($group == 1){
                    $this->log_result_common($strWord,$projectName);
                }
                //保存为可web浏览
                if($group == 2){
                    $strWord .= "<br>";
                    $this->slog($strWord,$projectName);
                }
                //保存至数据库
                if($group == 3){
                    $this->sDb($strWord);   
                }
                //过滤参数
                $_REQUEST[$strFiltKey] = '';
                //这里不作退出处理
                //exit;
            }
             
            //匹配参数是否合法
            if (preg_match ( "/" . $arrFiltReq . "/is", $strFiltKey ) == 1) {
                //记录ip
                $ip = "操作IP: ".$_SERVER["REMOTE_ADDR"];
                //记录操作时间
                $time = " 操作时间: ".strftime("%Y-%m-%d %H:%M:%S");
                //记录详细页面带参数
                $thePage = " 操作页面: ".$this->request_uri();
                //记录提交方式
                $type = " 提交方式: ".$_SERVER["REQUEST_METHOD"];
                //记录提交参数
                $key = " 提交参数: ".$strFiltKey;
                //记录参数
                $value = " 提交数据: ".htmlspecialchars($strFiltValue);
                //写入日志
                $strWord = $ip.$time.$thePage.$type.$key.$value;
                //保存为linux类型
                if($group == 1){
                    $this->log_result_common($strWord,$projectName);
                }
                //保存为可web浏览
                if($group == 2){
                    $strWord .= "<br>";
                    $this->slog($strWord,$projectName);
                }
                //保存至数据库
                if($group == 3){
                    $this->sDb($strWord);   
                }
                //过滤参数
                $_REQUEST[$strFiltKey] = '';
                //这里不作退出处理
                //exit;
            }
        }
     
    /**
     * 获取当前url带具体参数
     * @return string
     */
    public function request_uri() {
        if (isset ( $_SERVER ['REQUEST_URI'] )) {
            $uri = $_SERVER ['REQUEST_URI'];
        } else {
            if (isset ( $_SERVER ['argv'] )) {
                $uri = $_SERVER ['PHP_SELF'] . '?' . $_SERVER ['argv'] [0];
            } else {
                $uri = $_SERVER ['PHP_SELF'] . '?' . $_SERVER ['QUERY_STRING'];
            }
        }
        return $uri;
    }
     
 
    /**
     * 日志记录(linux模式)
     * @param 保存内容 $strWord
     * @param 保存文件名$strPathName
     */
    public function log_result_common($strWord, $strPathName = NULL) {
        if($strPathName == NULL){
            $strPath = "/var/tmp/";
            $strDay = date('Y-m-d');
            $strPathName = $strPath."common_log_".$strDay.'.log';
        }
     
        $fp = fopen($strPathName,"a");
        flock($fp, LOCK_EX) ;
        fwrite($fp,$strWord." date ".date('Y-m-d H:i:s',time())."\t\n");
        flock($fp, LOCK_UN);
        fclose($fp);
    }  
     
    /**
     * 写入日志(支持http查看)
     * @param 日志内容 $strWord
     * @param web页面文件名 $fileName
     */
    public function slog($strWord,$fileName = NULL) {
        if($fileName == NULL){
            $toppath = $_SERVER ["DOCUMENT_ROOT"] . "/log.htm";
        }else{
            $toppath = $_SERVER ["DOCUMENT_ROOT"] .'/'. $fileName;
        }
        $Ts = fopen ( $toppath, "a+" );
        fputs ( $Ts, $strWord . "\r\n" );
        fclose ( $Ts );
    }
     
    /**
     * 写入日志(数据库)
     * @param 日志内容 $strWord
     */
    public function sDb($strWord){
        //....
    }
     
    /**
     * 递归数组
     * @param array $arr
     * @return unknown|string
     */
    public function arr_foreach($arr) {
        static $str = '';
        if (! is_array ( $arr )) {
            return $arr;
        }
        foreach ( $arr as $key => $val ) {
            if (is_array ( $val )) {
                $this->arr_foreach ( $val );
            } else {
                $str [] = $val;
            }
        }
        return implode ( $str );
    }
}

//实例类库
$safeMode = new safeMode();
//这里的参数指的的时 类型，保存的文件名，具体请看类注视。
$safeMode->xss(2,'test.html');
?>