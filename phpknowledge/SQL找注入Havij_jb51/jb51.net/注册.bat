@echo ��ʼע��
@start ע��ؼ�.exe
@pause
copy TABCTL32.OCX %windir%\system32\
regsvr32 %windir%\system32\TABCTL32.OCX /s
@echo TABCTL32.OCXע��ɹ�
@pause