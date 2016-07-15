<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder{

    public function run(){
        $config = [
            [
                'name'=>'title',
                'value'=>'网站标题'
            ],
            [
                'name'=>'subheading',
                'value'=>'副标题'
            ],
            [
                'name'=>'put_on_record',
                'value'=>'国安 00009'
            ],
            [
                'name'=>'all_ow_access',
                'value'=>1
            ],
            [
                'name'=>'allow_comments',
                'value'=>1
            ],
            [
                'name'=>'seo_key',
                'value'=>'seo 关键字'
            ],
            [
                'name'=>'seo_desc',
                'value'=>'seo 描述'
            ],
            [
                'name'=>'copyright',
                'value'=>'版权申明'
            ]
        ];
        DB::table('settings')->insert($config);
    }

}