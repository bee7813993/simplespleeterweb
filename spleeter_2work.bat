rem spleeter のインストール先を指定
cd F:\Git\spleeter

set OUTTYPE=wav
@if "%3" neq "" (
 set OUTTYPE=%3
)

set BITRATE=320k
@if "%4" neq "" (
 set BITRATE=%4
)


rem anaconda のインストール先のactivate.batを指定
call F:\Users\miniconda3\Scripts\activate.bat
 
spleeter separate --codec %OUTTYPE% --birate %BITRATE% -i %1 -o %2
rem spleeter separate --codec %OUTTYPE% -i %1 -o %2
set RET=%errorlevel%
timeout 5
exit /b %RET%