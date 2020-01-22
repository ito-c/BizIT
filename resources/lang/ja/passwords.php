<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Password Reset Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    'password' => 'パスワードは6文字以上で、「パスワード確認」と一致する必要があります',
    'reset' => 'パスワードをリセットしました',
    'sent' => 'パスワードリセット用のメールを送信しました', // パスワードリセットページにて、登録されていないアドレスの場合に表示
    'token' => '不正なトークンです。はじめからやり直してください.',
    'user' => "メールアドレスが見つかりませんでした", // パスワードリセットページにて、登録されていないアドレスの場合に表示

];
