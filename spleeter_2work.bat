rem spleeter のインストール先を指定
rem cd /D F:\Git\spleeter

set OUTTYPE=wav
@if "%3" neq "" (
 set OUTTYPE=%3
)

set BITRATE=320k
@if "%4" neq "" (
 set BITRATE=%4
)

set STEMS="spleeter:2stems" 
@if "%5" neq "" (
 set STEMS=%5
)

rem ログファイル名
set logfile=%~p1\\result.txt

rem anaconda のインストール先のactivate.batを指定
call F:\Users\miniconda3\Scripts\activate.bat
 
spleeter separate --codec %OUTTYPE% --birate %BITRATE% -i %1 -o %2 -p %STEMS% > %logfile% 2>&1

set RET=%errorlevel%
type %logfile%
timeout 5
exit /b %RET%