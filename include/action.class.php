<?php
/**
 * DouPHP
 * --------------------------------------------------------------------------------------------------
 * 版权所有 2013-2018 漳州豆壳网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.douco.com
 * --------------------------------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在遵守授权协议前提下对程序代码进行修改和使用；不允许对程序代码以任何形式任何目的的再发布。
 * 授权协议：http://www.douco.com/license.html
 * --------------------------------------------------------------------------------------------------
 * Author: DouCo
 * Release Date: 2018-05-23
 */
if (!defined('IN_DOUCO')) {
    die('Hacking attempt');
}
class Action extends Common {
    /**
     * +----------------------------------------------------------
     * 当前位置
     * +----------------------------------------------------------
     * $module 模块名称
     * $class 分类ID或模块子栏目
     * $title 信息标题
     * +----------------------------------------------------------
     */
    function ur_here($module, $class = '', $title = '') {
        if ($module == 'page') {
            // 如果是单页面，则只显示单页面名称
            $ur_here = $title;
        } elseif (!$class) {
            // 模块主页
            $ur_here = $GLOBALS['_LANG'][$module];
        } else {
            // 模块名称
            $main = '<a href=' . $this->rewrite_url($module) . '>' . $GLOBALS['_LANG'][$module] . '</a>';
            
            // 如果存在分类
            if ($class) {
                $cat_name = is_numeric($class) ? $this->get_one("SELECT cat_name FROM " . $this->table($module) . " WHERE cat_id = '$class'") : $GLOBALS['_LANG'][$class];
                
                // 如果存在标题
                if ($title) {
                    $category = '<b>></b><a href=' . $this->rewrite_url($module, $class) . '>' . $cat_name . '</a>';
                } else {
                    $category = "<b>></b>$cat_name";
                }
            }
            
            // 如果存在标题
            if ($title)
                $title = '<b>></b>' . $title;
            
            $ur_here = $main . $category . $title;
        }
        
        return $ur_here;
    }
    
    /**
     * +----------------------------------------------------------
     * 标题
     * +----------------------------------------------------------
     * $module 模块名称
     * $class 分类ID或模块子栏目
     * $title 信息标题
     * +----------------------------------------------------------
     */
    function page_title($module, $class = '', $title = '') {
        // 如果是单页面，则只执行这一句
        if ($module == 'page') {
            $titles = $title . ' | ';
        } elseif ($module) {
            // 模块名称
            $main = $GLOBALS['_LANG'][$module] . ' | ';
            
            // 如果存在分类
            if ($class) {
                $cat_name = is_numeric($class) ? $this->get_one("SELECT cat_name FROM " . $this->table($module) . " WHERE cat_id = '$class'") : $GLOBALS['_LANG'][$class];
                $cat_name = $cat_name . ' | ';
            }
            
            // 如果存在标题
            if ($title)
                $title = $title . ' | ';
            
            $titles = $title . $cat_name . $main;
        }
        
        $page_title = ($titles ? $titles . $GLOBALS['_CFG']['site_name'] : $GLOBALS['_CFG']['site_title']) . ' - Powered by DouPHP';
        
        return $page_title;
    }
    
    /**
     * +----------------------------------------------------------
     * 判断是否是移动客户端
     * +----------------------------------------------------------
     */
    function is_mobile() {
        static $is_mobile;
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        
        if (isset($is_mobile))
            return $is_mobile;
        
        if (empty($user_agent)) {
            $is_mobile = false;
        } else {
            // 移动端UA关键字
            $mobile_agents = array (
                    'Mobile',
                    'Android',
                    'Silk/',
                    'Kindle',
                    'BlackBerry',
                    'Opera Mini',
                    'Opera Mobi' 
            );
            $is_mobile = false;
            
            foreach ($mobile_agents as $device) {
                if (strpos($user_agent, $device) !== false) {
                    $is_mobile = true;
                    break;
                }
            }
        }
        
        return $is_mobile;
    }
    
    /**
     * +----------------------------------------------------------
     * 信息提示
     * +----------------------------------------------------------
     * $text 提示的内容
     * $url 提示后要跳转的网址
     * $time 多久时间跳转
     * +----------------------------------------------------------
     */
    function dou_msg($text, $url = '', $time = 3) {
        if (!$text) {
            $text = $GLOBALS['_LANG']['dou_msg_success'];
        }
        
        /* 获取meta和title信息 */
        $GLOBALS['smarty']->assign('page_title', $GLOBALS['_CFG']['site_title']);
        $GLOBALS['smarty']->assign('keywords', $GLOBALS['_CFG']['site_keywords']);
        $GLOBALS['smarty']->assign('description', $GLOBALS['_CFG']['site_description']);
        
        /* 初始化导航栏 */
        $data = $this->fetch_array_all($this->table('nav'), 'sort ASC');
        $GLOBALS['smarty']->assign('nav_top_list', $this->get_nav('top'));
        $GLOBALS['smarty']->assign('nav_middle_list', $this->get_nav('middle'));
        $GLOBALS['smarty']->assign('nav_bottom_list', $this->get_nav('bottom'));
        
        /* 初始化数据 */
        $GLOBALS['smarty']->assign('ur_here', $GLOBALS['_LANG']['dou_msg']);
        $GLOBALS['smarty']->assign('text', $text);
        $GLOBALS['smarty']->assign('url', $url);
        $GLOBALS['smarty']->assign('time', $time);
        
        // 根据跳转时间生成跳转提示
        $cue = preg_replace('/d%/Ums', $time, $GLOBALS['_LANG']['dou_msg_cue']);
        $GLOBALS['smarty']->assign('cue', $cue);
        
        $GLOBALS['smarty']->display('dou_msg.dwt');
        
        exit();
    }
    

    
    
    
    /**
     * +----------------------------------------------------------
     * 用户权限判断
     * +----------------------------------------------------------
     * $user_id 管理员ID
     * $shell 登录标识
     * $action_list 管理员权限
     * +----------------------------------------------------------
     */
    function admin_check($user_id, $shell, $action_list = 'ALL') {
    	if (!defined('NO_CHECK')) { // 有定义NO_CHECK常量的页面无需管理员权限
    		if ($row = $this->admin_info($user_id, $shell)) {
    			$this->admin_ontime(); // 登录超时默认为3小时(10800秒)
    			$admin_info = array ( // 全局管理员信息
    					'user_id' => $row['user_id'],
    					'user_name' => $row['user_name'],
    					'email' => $row['email'],
    					'action_list' => $row['action_list']
    			);
    
    			return $admin_info;
    		} else {
    			$this->dou_header(ROOT_URL  . 'login.php');
    		}
    	}
    }
    
    /**
     * +----------------------------------------------------------
     * 管理员信息
     * +----------------------------------------------------------
     * $user_id 管理员ID
     * $shell 登录标识
     * +----------------------------------------------------------
     */
    function admin_info($user_id, $shell) {
    	// 获取对应ID的会员信息
    	$user = $this->fetch_array($this->select($this->table('admin'), '*', "user_id = '$user_id'"));
    
    	// 如果存在$user且$shell吻合，则返回会员信息，否则返回空
    	if (is_array($user) && $shell == md5($user['user_name'] . $user['password'] . DOU_SHELL)) {
    		return $user;
    	} else {
    		return null;
    	}
    }
    
    /**
     * +----------------------------------------------------------
     * 登录超时默认为3小时(10800秒)
     * +----------------------------------------------------------
     * $timeout 登录超时时间
     * +----------------------------------------------------------
     */
    function admin_ontime($timeout = '10800') {
    	$ontime = $_SESSION[DOU_ID]['ontime']; // 登录时间
    	$cur_time = time(); // 当前时间
    	if ($cur_time - $ontime > $timeout) {
    		unset($_SESSION[DOU_ID]); // 在线时间如果大于超时时间则清除登录缓存
    	} else {
    		$_SESSION[DOU_ID]['ontime'] = time(); // 如果未登录超时则重新设定登录时间
    	}
    }
    
    /**
     * +----------------------------------------------------------
     * 找回密码验证
     * +----------------------------------------------------------
     * $user_id 会员ID
     * $code 密码找回码
     * $timeout 默认为24小时(86400秒)
     * +----------------------------------------------------------
     */
    function check_password_reset($user_id, $code, $timeout = 86400) {
    	if ($this->value_exist('admin', 'user_id', $user_id)) {
    		$user = $this->fetch_array($this->select($this->table('admin'), '*', "user_id = '$user_id'"));
    
    		// 初始化
    		$get_code = substr($code , 0 , 16);
    		$get_time = substr($code , 16 , 26);
    		$code = substr(md5($user['user_name'] . $user['email'] . $user['password'] . $get_time . $user['last_login'] . DOU_SHELL) , 0 , 16);
    
    		// 验证链接有效性
    		if (time() - $get_time < $timeout && $code == $get_code) return true;
    	}
    }
    
    /**
     * +----------------------------------------------------------
     * 获取管理员日志
     * +----------------------------------------------------------
     * $action 管理员操作的内容
     * +----------------------------------------------------------
     */
    function create_admin_log($action) {
    	$create_time = time();
    	$ip = $this->get_ip();
    	$action = $GLOBALS['firewall']->dou_foreground($action);
    
    	$sql = "INSERT INTO " . $this->table('admin_log') . " (id, create_time, user_id, action ,ip)" . " VALUES (NULL, '$create_time', " . $_SESSION[DOU_ID]['user_id'] . ", '$action', '$ip')";
    	$this->query($sql);
    }
    
    /**
     * +----------------------------------------------------------
     * 获取管理员日志
     * +----------------------------------------------------------
     * $user_id 管理员ID
     * $num 调用日志数量
     * +----------------------------------------------------------
     */
    function get_admin_log($user_id = '', $num = '') {
    	if ($user_id) {
    		$where = " WHERE user_id = '$user_id'";
    	}
    	if ($num) {
    		$limit = " LIMIT $num";
    	}
    
    	$sql = "SELECT * FROM " . $this->table('admin_log') . $where . " ORDER BY id DESC" . $limit;
    	$query = $this->query($sql);
    	while ($row = $this->fetch_array($query)) {
    		$create_time = date("Y-m-d H:i:s", $row['create_time']);
    		$user_name = $this->get_one("SELECT user_name FROM " . $this->table('admin') . " WHERE user_id = " . $row['user_id']);
    
    		$log_list[] = array (
    				"id" => $row['id'],
    				"create_time" => $create_time,
    				"user_name" => $user_name,
    				"action" => $row['action'],
    				"ip" => $row['ip']
    		);
    	}
    
    	return $log_list;
    }
    
}
?>