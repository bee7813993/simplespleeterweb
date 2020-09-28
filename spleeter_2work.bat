rem spleeter �̃C���X�g�[������w��
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

rem ���O�t�@�C����
set logfile=%~p1\\result.txt

rem anaconda �̃C���X�g�[�����activate.bat���w��
call F:\Users\miniconda3\Scripts\activate.bat
 
spleeter separate --codec %OUTTYPE% --birate %BITRATE% -i %1 -o %2 -p %STEMS% > %logfile% 2>&1

set RET=%errorlevel%
type %logfile%
timeout 5
exit /b %RET%