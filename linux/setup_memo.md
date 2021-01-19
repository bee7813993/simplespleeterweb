# セットアップメモ
## spleeter セットアップ

```
[nginx@localhost ~]$ sudo dnf install libsndfile-devel libsndfile
[nginx@localhost ~]$ sudo dnf install python3.8
[nginx@localhost ~]$ python3.8 -m ensurepip --user
Looking in links: /tmp/tmph7pzwk5m
Processing /tmp/tmph7pzwk5m/setuptools-49.1.3-py3-none-any.whl
Processing /tmp/tmph7pzwk5m/pip-20.2.2-py2.py3-none-any.whl
Installing collected packages: setuptools, pip
  WARNING: The script easy_install-3.8 is installed in '/home/nginx/.local/bin' which is not on PATH.
  Consider adding this directory to PATH or, if you prefer to suppress this warning, use --no-warn-script-location.
  WARNING: The scripts pip3 and pip3.8 are installed in '/home/nginx/.local/bin' which is not on PATH.
  Consider adding this directory to PATH or, if you prefer to suppress this warning, use --no-warn-script-location.
Successfully installed pip-20.2.2 setuptools-49.1.3
[nginx@localhost ~]$ pip3.8  install spleeter
bash: pip3.8: command not found...
[nginx@localhost ~]$ cat > .bashrc
# User specific environment
if ! [[ "$PATH" =~ "$HOME/.local/bin:$HOME/bin:" ]]
then
    PATH="$HOME/.local/bin:$HOME/bin:$PATH"
fi
export PATH
^D
[nginx@localhost ~]$ source .bashrc
[nginx@localhost ~]$ /usr/bin/python3.8 -m pip install --upgrade pip
[nginx@localhost ~]$ pip3.8  install spleeter
```

## Webサーバー セットアップ

```
[nginx@localhost ~]$ sudo dnf install nginx php-fpm
```

## 設定変更

```
/etc/php-fpm.d/www.conf
user = nginx
group = nginx
listen.acl_users = nginx,nginx

/etc/nginx/nginx.conf
    server {
    
        charset UTF-8;

        autoindex on;
        autoindex_exact_size off;
        autoindex_localtime on;
        
        fastcgi_read_timeout 600;

/etc/php.ini
memory_limit = 512M
upload_max_filesize = 512M
post_max_size = 512M
```

## spleeterwork コピー (Webドキュメントルートは /opt/html とする )

```
[nginx@localhost ~]$ export DOCUMENTROOT=/opt/html
[nginx@localhost ~]$ git clone https://github.com/bee7813993/simplespleeterweb.git
[nginx@localhost ~]$ sudo mkdir $DOCUMENTROOT/spleeterwork
[nginx@localhost ~]$ sudo cp -v simplespleeterweb/linux/* $DOCUMENTROOT/spleeterwork/
[nginx@localhost ~]$ sudo chown -R nginx.nginx $DOCUMENTROOT/spleeterwork/
[nginx@localhost ~]$ sudo chmod +x $DOCUMENTROOT/spleeterwork/spleeter_2work.sh
```

