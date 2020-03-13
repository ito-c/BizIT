<?php

use Carbon\Carbon;
use Faker\Provider\DateTime;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'category_id' => $faker->numberBetween($min = 1, $max = 4),
        'title' => $faker->randomElement(
            ['永久凍土にオープンソースのコードを1000年保存' ,'Emotet（エモテット）とは何ですか？', 'DX推進の次世代ビジネスモデルについて', '5Gのビジネス活用について', 'サイバー攻撃について', '顔認証によるセキュリティ高度化について', 'AIをビジネスに生かすためには？', '2020年にサポートが終わるマイクロソフト製品について', 'AIベンチャーとのミーティングについて', 'IoTについて', '5Gスマホって売れますか？', 'DXセミナーに一緒に参加しませんか？', 'RPAのシナリオの組み方について教えてください', 'ARとVRの違い、特徴について教えてください', 'この記事にビジネスのタネはありますか？', '営業管理ツールの導入支援について', 'ビジネスに必要なITの素養について', '今度の社長プレゼンで使用するドローンについての資料の内容をどなたか添削いただけませんか？', 'スーパーアプリって？', 'AWS S3の可用性について', 'Open APIって・・・', '短期的にビジネスチャンスがありそうなテクノロジーって何でしょう。', 'ビジネスモデルについて、教えてください', 'AIによる社内業務効率化と、ビジネスメリットについて', 'IoT市場の行先', 'マーケティングオートメーションについて', 'IT人材育成について', 'イノベーションについて', 'マーケティングって、何だろう', '営業交渉同行依頼']),
        'description' => $faker->paragraph,
        'created_at' => DateTime::dateTimeThisDecade(),
        'updated_at' => Carbon::now(),
    ];
});
