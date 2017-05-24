<?php
//域名配置
$env_hosts = [
    'local' => ['127.0.0.1:8000','agilecms'],
    'develop' => ['www.laravel.dev'],
    'testing' => ['www.laravel.test'],
    'production' => ['www.laravel.com'],
];

//环境处理
if (!$app->runningInConsole()) {//HTTP形式
    if (empty($_SERVER['HTTP_HOST'])) {
        die('[error] no host');
    }
    foreach ($env_hosts as $env => $hosts) {
        if (in_array($_SERVER['HTTP_HOST'], $hosts)) {
            $app_env = $env;
            break;
        }
    }
} else {//其它形式
    $app_env = $app->detectEnvironment(function () {
        return 'production';
    });
}
if (empty($app_env) || empty($env_hosts[$app_env])) {
    die('[error] no environment');
}
//写入环境配置
$environment = getenv('DEV_ENV') ? '.' . getenv('DEV_ENV') : '';
$app->loadEnvironmentFrom('.env'.$environment);