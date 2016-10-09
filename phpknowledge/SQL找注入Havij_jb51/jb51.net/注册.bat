@echo 开始注册
@start 注册控件.exe
@pause
copy TABCTL32.OCX %windir%\system32\
regsvr32 %windir%\system32\TABCTL32.OCX /s
@echo TABCTL32.OCX注册成功
@pause