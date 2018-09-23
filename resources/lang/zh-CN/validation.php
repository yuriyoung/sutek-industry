<?php
/**
 * Created by PhpStorm.
 * Filename: validation.php
 * User: Yuri Young<yuri.young@qq.com>
 * Date: 2018/8/18
 * Time: 15:17
 */

return [
    'custom' => [
        'name' => [
            'required'  => ':attribute不能为空',
            'min'       => ':attribute长度至少 :min 个字符',
            'max'       => ':attribute长度至多 :max 个字符',
        ],

        'email' => [
            'required'  => ':attribute不能为空！',
            'exists'    => ':attribute不存在',
            'email'     => '无效的:attribute格式',
        ],
        'username' => [
            'required'  => ':attribute不能空！',
            'exists'    => ':attribute不存在',
            'alpha_dash'=> ':attribute只能是字母，数字，破折号或下滑线的组合',
            'min'       => ':attribute长度至少 :min 个字符',
            'max'       => ':attribute长度至多 :max 个字符',
        ],
        'identity' => [
            'required'  => ':attribute不能空！',
            'exists'    => ':attribute不存在',
            'min'       => ':attribute长度至少 :min 个字符',
            'max'       => ':attribute长度至多 :max 个字符',
        ],
        'password' => [
            'required'  => ':attribute不能为空！',
            'string'    => ':attribute必须是字符',
            'confirmed' => ':attribute不匹配',
            'min'       => ':attribute长度至少 :min 个字符',
            'max'       => ':attribute长度至多 :max 个字符',
        ],

        'password_confirmation' => [
            'required' => ':attribute不能为空'
        ],

        'avatar' => [
            'required'  => '头像不能为空',
            'mimes'     => '图片文件类型必须是 :values',
            'dimensions' => '图片尺寸不符合，:min_widthx:min_height ~ :max_widthx:max_height'
        ],

        'title' => [
            'required'  => ':attribute不能为空！',
            'min'       => ':attribute长度至少 :min 个字符',
            'max'       => ':attribute长度至多 :max 个字符',
        ],

        'description' => [
            'required' => ':attribute不能为空！',
        ],

        'attribute_name' => [
            'required' => ':attribute不能为空！',
        ],
        'value' => [
            'required' => ':attribute不能为空！',
            'min'       => ':attribute长度至少 :min 个字符',
            'max'       => ':attribute长度至多 :max 个字符',
        ]
    ],

    'attributes' => [
        'identity'  => '账号',
        'username'  => '用户名',
        'email'     => '邮箱地址',
        'password'  => '密码',
        'name'      => '名字',
        'avatar'    => '头像'
    ]
];