# 環境構築手順
1. composerでLaravelをインストール
```
composer create-project --prefer-dist "laravel/laravel=7.*" laravel
```
2. docker-compose でイメージ作成〜コンテナ作成
```
docker-compose up -d
```
# AWS ECR用のイメージビルド手順
1. phpコンテナ  
ECRリポジトリ名が下記の場合  
109041373323.dkr.ecr.ap-northeast-1.amazonaws.com/mrtn-php74fpm
```
docker build -t 109041373323.dkr.ecr.ap-northeast-1.amazonaws.com/mrtn-php74fpm:1.0 -f ./Dockerfile-php74fpm .
```
2. Nginxコンテナ  
ECRリポジトリ名が下記の場合  
109041373323.dkr.ecr.ap-northeast-1.amazonaws.com/mrtn-nginx
```
docker build -t 109041373323.dkr.ecr.ap-northeast-1.amazonaws.com/mrtn-nginx:1.0 -f ./Dockerfile-nginx .
```