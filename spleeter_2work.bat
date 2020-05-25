rem spleeter のインストール先を指定
cd F:\Git\spleeter

rem anaconda のインストール先のactivate.batを指定
call F:\Users\miniconda3\Scripts\activate.bat

spleeter separate -i %1 -o %2
set RET=%errorlevel%
timeout 5
exit /b %RET%