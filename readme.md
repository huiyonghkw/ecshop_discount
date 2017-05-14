# ecshop_discount

商品折扣小程序，一家超市需要为部分商品设置折扣信息，并在指定的时间段内进行商品促销。


## Feature

- Laravel 5.4.*
    + laravel/passport 实现OAuth2.0 私人秘钥授权
    + Laravel Mix 实现前端资源构建
    + Laravel Valet实现项目环境快速搭建
    + Composer 安装并管理后端资源依赖
    + fzaninotto/faker 完成测试数据自动填充
- Vue 2
    + vue-select 实现异步筛选商品
- Yarn 安装并管理前端资源依赖
- macOS Shadowsocks 搭建收费VPN

## 项目运行流程

1.克隆远程仓库地址

```bash

$ git clone https://github.com/bravist/ecshop_discount.git

```

2.进入项目目录，安装项目依赖

```bash

$ cd ecshop_discount

$ composer install -vvv

$ yarn install

$ npm run prod

```

3.创建.env文件并修改数据库连接创建数据库结构

```bash

$ cp .env.example .env

$ php artisan migrate

```

4.自动随机生成50条商品数据

```bash

$ php artisan db:seed

$ php artisan migrate:refresh

$ php artisan db:seed

```
5.生成OAuth2.0私人访问令牌

```bash

$ php artisan passport:client --personal

```

6. 运行你的项目，在Valet环境下，快速访问http://ecshop_discount.dev


更多参考[这里](https://shimo.im/doc/TYouPIm1azY58tIH)
