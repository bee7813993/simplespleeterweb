# simplespleeterweb
自宅のPCで動作させている deezer spleeter をWeb上で動かすしくみ

## 準備

1.  PCにdeezer spleeter をセットアップする

   ```
   ウチでの実行例
   minicondaをセットアップした後、gitコマンドにPATHを通しておき
   Anaconda Powershell promptにて、以下のコマンドを実行
   git clone https://github.com/deezer/spleeter 
   conda install -c conda-forge spleeter-gpu
   conda install -c conda-forge librosa 
   ```

   

2. PHPが使用できるWebサーバーを立ち上げる。（Windowsならxampp）

3. 本プロジェクトの全ファイルをWebサーバーの特定のディレクトリーに置く。

4. 「spleeter_2work.bat」をdeezer spleeter のインストールフォルダーに置き、内容を修正する。
   修正内容  
   ・spleeter のインストール先  
   ・anaconda のインストール先

5. 「spleeter_result.php」の内容を修正する。
   修正内容  
   ・spleeter をインストールしたフォルダ



## 起動

Webサーバーを起動し、ネット上に公開する。

本プロジェクトの置いたフォルダーのトップ画面をブラウザで表示



## 使い方

本プロジェクトのWiki参照

https://github.com/bee7813993/simplespleeterweb/wiki



