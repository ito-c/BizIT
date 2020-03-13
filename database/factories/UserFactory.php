<?php

use Carbon\Carbon;
use Faker\Provider\DateTime;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('test123'),
        'remember_token' => str_random(10),
        'division' => $faker->randomElement(
            ['人事部', 'マーケティング部', '営業部', '財務部', '経理部', '事業企画部', '商品開発部', 'カード企画部', '決済開発部', 'システム開発部', 'システム運用部', 'システム統括部', 'イノベーション推進室', 'デジタル推進部', '加盟店営業部', '管理部', 'クレジット業務管理室', '監査部','リテール営業推進部', 'お客様サポート室', 'リテール業務運営部', '法人事務部', '法人企画部','個人企画部', 'グループ組織戦略部','スペシャルティファイナンス部', '営業第二課', '営業第一課', '法務部', '市場開発部']),
        'specialty' => $faker->randomElement(
            ['経理', '営業', '統括', '管理', 'QRコード', '業務', '庶務', 'PM', 'コード決済', '非接触', 'マーケティング', 'ビジネス戦略', '庶務', '運用企画', '営業企画','クレジットカード','ブランド', 'DX推進', 'M&A', '海外', '社長秘書', 'キャッシング', 'グループ連携']).'担当',
        'hobby' => $faker->randomElement(
            ['筋トレ', '美容', 'ヨガ', '音楽', '温泉巡り', '美術館巡り', '博物館巡り', 'お酒', 'ランニング', 'ボクシング', 'ゴルフ', 'ダーツ', 'ダンス', 'サーフィン', '野球', 'サッカー', '釣り', 'バレーボール', 'フットサル', 'ビリヤード', 'キャンプ', '散歩', 'トランプ', 'ヨーヨー', 'DIY', '料理', 'ガーデニング', '食べ歩き', '折り紙', '漫画', 'コスプレ', 'ネットサーフィン', 'ボランティア', 'インスタグラム', 'ドローン']),
        'biography' => $faker->randomElement(
            ['よろしくお願いします','初めまして','先日、異動しました。わからないことも多いですが、頑張ってます。', 'ITのことも勉強してなくてはならないと考え、登録しました','毎日大変ですが、頑張ってます', 'これからよろしくお願いします！', '毎日眠いです。', '新しいことにチャレンジしたいです。よろしくお願いします','よろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いしますよろしくお願いします']),
        'created_at' => DateTime::dateTimeThisDecade(),
        'updated_at' => Carbon::now(),
    ];
});
