# Introduction

hyperf框架，代码分层设计，单应用多系统设计。

# 环境要求

Hyperf has some requirements for the system environment, it can only run under Linux and Mac environment, but due to the development of Docker virtualization technology, Docker for Windows can also be used as the running environment under Windows.

The various versions of Dockerfile have been prepared for you in the [hyperf\hyperf-docker](https://github.com/hyperf/hyperf-docker) project, or directly based on the already built [hyperf\hyperf](https://hub.docker.com/r/hyperf/hyperf) Image to run.

When you don't want to use Docker as the basis for your running environment, you need to make sure that your operating environment meets the following requirements:  

 - PHP >= 7.3
 - Swoole PHP extension >= 4.4，and Disabled `Short Name`
 - OpenSSL PHP extension
 - JSON PHP extension
 - PDO PHP extension （If you need to use MySQL Client）
 - Redis PHP extension （If you need to use Redis Client）
 - Protobuf PHP extension （If you need to use gRPC Server of Client）

# 安装和使用

The easiest way to create a new Hyperf project is to use Composer. If you don't have it already installed, then please install as per the documentation.

To create your new Hyperf project:

$ composer create-project hyperf/hyperf-skeleton path/to/install

Once installed, you can run the server immediately using the command below.

$ cd path/to/install
$ php bin/hyperf.php start

This will start the cli-server on port `9501`, and bind it to all network interfaces. You can then visit the site at `http://localhost:9501/`

which will bring up Hyperf default home page.



# 代码层级说明

```
├── app					开发目录
│   ├── Amqp			        rabbitmq
│   ├── Dao				Dao层
│   ├── Exception			错误处理
│   ├── Listener			监听器
│   ├── Middleware			中间件
│   ├── Model				DB model
│   ├── Shared				service公共，各个模块共享
│   ├── System					
|   |   ├── Admin			模块 Admin
|   |   ├──├──  Controller	        Controller
|   |   ├──├──  Define		        定义请求层，类似java的vo
|   |   ├──├──  Request		        参数过滤层，处理参数过滤逻辑
|   |   ├──├──  Service		        Service层，先定义接口，类似java的分层
|   |   ├──├──├──  Impl		        Service层，实现
|   |   ├── IndexController.php         当前模块的入口，还有类似java的actuator，方便监控服务是否正常
│   └── Task				定时任务处理
├── bin
│   ├── hyperf.php
│   └── start.sh
├── composer.json
├── composer.lock
├── config
│   ├── autoload
│   ├── config.php
│   ├── constants.php
│   ├── container.php
│   ├── functions.php
│   └── routes.php
├── Dockerfile
├── phpstan.neon
├── phpunit.xml
├── README.md
├── runtime
│   ├── container
│   └── logs
├── storage
│   └── languages
├── test
│   ├── bootstrap.php
│   ├── Cases
│   └── HttpTestCase.php
├── vendor											第三方依赖
└── watch											开发环境，自动编译
```

