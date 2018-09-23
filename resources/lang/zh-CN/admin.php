<?php

return [

    'dashboard'             => '仪表盘',
    'product'               => '产品',
    'category'              => '分类',
    'configure'             => '配置',

    'category_parent'       => '父级分类',
    'image'                 => '图像',
    'spec'                  => '属性',
    'spec_name'             => '规格名称',
    'spec_name_new_label'   => '新增规格名称',
    'spec_name_new'         => '新规格名称',
    'spec_value'            => '规格值',
    'value'                 => '值',
    'hot'                   => '热度',
    'views'                 => '浏览',
    'likes'                 => '点赞',
    'status'                => '状态',
    'search'                => '搜索',
    'published'             => '已发布',
    'trashed'               => '已删除',
    'draft'                 => '草稿',
    'error'                 => '错误',
    'select'                => '选择',

    'erase'                 => '彻底删除',


    'online'                => '在线',
    'login'                 => '登录',
    'logout'                => '登出',
    'setting'               => '设置',
    'name'                  => '名称',
    'username'              => '用户名',
    'password'              => '密码',
    'password_confirmation' => '确认密码',
    'remember_me'           => '记住我',
    'user_setting'          => '用户设置',
    'avatar'                => '头像',

    'list'         => '列表',
    'new'          => '新增',
    'create'       => '创建',
    'delete'       => '删除',
    'remove'       => '移除',
    'edit'         => '编辑',
    'view'         => '查看',
    'browse'       => '浏览',
    'reset'        => '重置',
    'export'       => '导出',
    'batch_delete' => '批量删除',
    'save'         => '保存',
    'refresh'      => '刷新',
    'order'        => '排序',
    'expand'       => '展开',
    'collapse'     => '收起',
    'filter'       => '筛选',
    'close'        => '关闭',
    'show'         => '显示',
    'entries'      => '条',
    'captcha'      => '验证码',

    'action'            => '操作',
    'title'             => '标题',
    'description'       => '简介',
    'back'              => '返回',
    'back_to_list'      => '返回列表',
    'submit'            => '提交',
    'menu'              => '菜单',
    'input'             => '输入',
    'succeeded'         => '成功',
    'failed'            => '失败',
    'delete_confirm'    => '确认删除?',
    'delete_succeeded'  => '删除成功 !',
    'delete_failed'     => '删除失败 !',
    'update_succeeded'  => '更新成功 !',
    'save_succeeded'    => '保存成功 !',
    'refresh_succeeded' => '刷新成功 !',
    'login_successful'  => '登录成功 !',

    'choose'       => '选择',
    'choose_file'  => '选择文件',
    'choose_image' => '选择图片',

    'more' => '更多',
    'deny' => '无权访问',

    'administrator' => '管理员',
    'roles'         => '角色',
    'permissions'   => '权限',
    'slug'          => '标识',

    'created_at' => '创建时间',
    'updated_at' => '更新时间',

    'alert' => '注意',

    'parent_id' => '父级菜单',
    'icon'      => '图标',
    'uri'       => '路径',

    'operation_log'       => '操作日志',
    'parent_select_error' => '父级选择错误',

    'pagination' => [
        'range' => '从 :first 到 :last ，总共 :total 条',
    ],

    'role'       => '角色',
    'permission' => '权限',
    'route'      => '路由',
    'confirm'    => '确认',
    'cancel'     => '取消',

    'http' => [
        'method' => 'HTTP方法',
        'path'   => 'HTTP路径',
    ],
    'all_methods_if_empty' => '为空默认为所有方法',

    'all'           => '全部',
    'current_page'  => '当前页',
    'selected_rows' => '选择的行',

    'upload'     => '上传',
    'new_folder' => '新建文件夹',
    'time'       => '时间',
    'size'       => '大小',

    'listbox' => [
        'text_total'         => '总共 {0} 项',
        'text_empty'         => '空列表',
        'filtered'           => '{0} / {1}',
        'filter_clear'       => '显示全部',
        'filter_placeholder' => '过滤',
    ],

    'config' => [
        'key'   => '配置键',
        'value' => '配置值',
    ],

    'helper'    => [
        'dashboard'         => '网站信息概览和系统配置信息',
        'config'            => '前端显示配置变量',

        'product_category'  => "如果要增加分类，请到分类页面增加，<a href=':url' target='_blank'>点击这里 <i class='fa fa-external-link'></i></a> 跳转。<code>添加后需刷新此页</code>。",
        'product_title'     => '不要出现重复的产品标题，仅字母、数字和下滑线，最多:max个字符，请不要包含特殊符号。',
        'product_image'     => '要上传多张图片，上传时需要同时选中。支持<code>2M</code>内的<code>jpeg/jpg/png</code>格式的图片，<code>750*460 ~ 1000*800</code>以内(长宽比例应在1.6倍左右)。',
        'product_notice'    => "选择产品规格/属性选项（可多选）。如果要增加新的规格/属性，请到规格/属性页面下增加，<a href=':url' target='_blank'>点击这里 <i class='fa fa-external-link'></i></a> 跳转。<code>添加后需刷新此页</code>。",

        'category_parent'   => '点击下拉框选择父级分类。',
        'category'          => '分类名称最少2个字符，最多20个字符，只能字母+数字。',
        'category_icon'     => '分类图标',
        'category_notice'   => "<span class='text-warning'><i class='fa fa-exclamation'></i> 树形分类尝试不宜过大，层数过多没有实际意义。</span>",

        'spec_name'         => '规格/属性名称分类，点击下拉框选择，如果没有，点击下面的 <kbd>新建</kbd> 开关按钮添加到此栏。 ',
        'spec_new'          => '输入新的规格/属性名称后，再次点击上面的<strong>开关按钮</strong> <kbd>确认</kbd> 添加。添加后会显示在上面的规格名称下拉框内。',
        'spec_value'        => '输入规格/属性值，对应名称成对出现在产品信息中，至少2个字符，最多32个字符，只能字母+数字。',
        'spec_icon'         => '对应规格/属性值的图标。',
        'spec_notice'       => '树形分类尝试不宜过大，层数过多没有实际意义。',

        'config_name'       => '如果不知道如何修改前端显示的配置变量名，请不要修改此项。',

        'slug'              => '标识自动生成，作为url链接地址，便于搜索引擎收录(SEO)，请不要随意更改 。',
        'description'       => [
            'category'      => '分类描述（可选）。',
            'spec'          => '规格/属性描述（可选）。',
            'product'       => "<span class='help-block' style='margin-top: -10px;'><i class='fa fa-info-circle'></i> 输入产品简介：如耐久、高温、可湿性、制造工艺、材料应用、销售渠道，可定制化等内容描述。</span>",
        ],
    ]
];
