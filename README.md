smarty
==============

SmartyでViewModelを使ってテンプレート処理をするためのパッケージ。

- 素のPHPテンプレートをViewModel::forge()する時と同じように利用できる。
 - テンプレート指定時に.smartyなどといった拡張子が必要ない
- config.phpでalways_loadするだけでよい。他には何もする必要なし。
- Smartyを利用するのでparserパッケージが必要。
 - smartyパッケージはparserパッケージのあとで読み込む。

- ViewModel->viewメソッドの引数にはURLの各セグメントの値が渡される。
 - コントローラと同じように分岐処理などを行える。