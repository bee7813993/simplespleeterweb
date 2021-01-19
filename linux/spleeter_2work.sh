#!/bin/bash
#
#  spleeter2_work for Linux shell
#  usage : spleeter2_work.sh [inputfilename] [outputpath] [outputtype] [outputbitrate] [outputstems]
#

# spleeter のインストール先を指定
# webサーバーownerの.local/binにspleeterがインストールされている場合以下の初期値のままで
if ! [[ "$PATH" =~ "$HOME/.local/bin:$HOME/bin:" ]]
then
    PATH="$HOME/.local/bin:$HOME/bin:$PATH"
    export PATH
fi

OUTTYPE=${3:-wav}
BITRATE=${4:-320k}
STEMS=${5:-'spleeter:2stems'}

# rem ログファイル名
# set logfile=%~p1\\result.txt
logfile=$(dirname "$1")/result.txt

spleeter separate --verbose --codec $OUTTYPE --bitrate $BITRATE -o $2 -p $STEMS "$1" > $logfile 2>&1

RET=$?
exit $RET
