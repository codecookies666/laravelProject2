<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //获取faker实例
        $faker = app(Faker\Generator::class);

        //头像假数据
        $avatars = [
            'https://cdn.learnku.com/uploads/avatars/45630_1563762252.jpeg!/both/400x400',
            'https://cdn.learnku.com/uploads/images/201801/03/1/8uNnIba2M2.jpg',
            'https://cdn.learnku.com/uploads/avatars/16293_1572980060.png!/both/400x400',
            'https://cdn.learnku.com/uploads/avatars/39566_1556008477.jpg!/both/400x400',
            'https://cdn.learnku.com/uploads/avatars/26855_1530498539.jpeg!/both/400x400',
        ];

        // 生成数据集合
        $users = factory(User::class)
            ->times(10)
            ->make()
            ->each(function ($user, $index)
            use ($faker, $avatars)
            {
                // 从头像数组中随机取出一个并赋值
                $user->avatar = $faker->randomElement($avatars);
            });
        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();
        // 插入到数据库中
        User::insert($user_array);
        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'Summer';
        $user->email = 'summer@example.com';
        $user->avatar = 'https://cdn.learnku.com/uploads/avatars/26855_1530498539.jpeg!/both/400x400';
        $user->save();

    }
}
