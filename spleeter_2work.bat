rem spleeter �̃C���X�g�[������w��
cd F:\Git\spleeter

set OUTTYPE=wav
@if "%3" neq "" (
 set OUTTYPE=%3
)
rem anaconda �̃C���X�g�[�����activate.bat���w��
call F:\Users\miniconda3\Scripts\activate.bat

spleeter separate --codec %OUTTYPE% -i %1 -o %2
set RET=%errorlevel%
timeout 5
exit /b %RET%