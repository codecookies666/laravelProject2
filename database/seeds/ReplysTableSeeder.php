<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;
use App\Models\User;
use App\Models\Topic;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        //所有用户id 数组 如 [1,2,3]
        $user_ids = User::all()->pluck('id')->toArray();

        //所有话题id数组 如 [12,3,5,7]
        $topic_ids = Topic::all()->pluck('id')->toArray();

        //获取Faker 实例
        $faker = app(Faker\Generator::class);


        $replys = factory(Reply::class)
            ->times(1000)
            ->make()
            ->each(function ($reply, $index)
            use($user_ids, $topic_ids, $faker)
        {

            //从用户id数组随机取出一个并赋值
            $reply->user_id = $faker->randomElement($user_ids);

            //话题id 同上
            $reply->topic_id = $faker->randomElement($topic_ids);

        });

        // 将数据集合转换为数组，并插入到数据库中
        Reply::insert($replys->toArray());
    }

}

