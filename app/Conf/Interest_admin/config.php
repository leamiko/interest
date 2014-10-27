<?php

/**
 * 后台配置文件
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
return array(
    'menu' => array(
        'Administrator' => array(
            'text' => '管理员',
            'default' => 'index',
            'children' => array(
                'index' => array(
                    'text' => '管理员一览',
                    'url' => U('administrator/index')
                )
            )
        ),
        'Servie' => array(
            'text' => '服务中心',
            'default' => 'index',
            'children' => array(
                'index' => array(
                    'text' => '服务类型',
                    'url' => U('service/index')
                )
            )
        ),
        'Case' => array(
            'text' => '案例中心',
            'default' => 'index',
            'children' => array(
                'index' => array(
                    'text' => '所有案例',
                    'url' => U('case/index')
                ),
                'type' => array(
                    'text' => '案例分类',
                    'url' => U('case/type')
                )
            )
        ),
        'News' => array(
            'text' => '资讯',
            'default' => 'index',
            'children' => array(
                'index' => array(
                    'text' => '资讯分类',
                    'url' => U('news/category')
                ),
                'type' => array(
                    'text' => '所有资讯',
                    'url' => U('news/index')
                ),
                'add' => array(
                    'text' => '添加资讯',
                    'url' => U('news/add')
                )
            )
        ),
        'Cooperation' => array(
            'text' => '申请合作',
            'default' => 'index',
            'children' => array(
                'index' => array(
                    'text' => '合作申请一览',
                    'url' => U('cooperation/index')
                ),
                'greeting' => array(
                    'text' => '致客户',
                    'url' => U('cooperation/to_customer')
                )
            )
        ),
        'Contact' => array(
            'text' => '联系方式',
            'default' => 'index',
            'children' => array(
                'index' => array(
                    'text' => '联系方式设置',
                    'url' => U('contact/index')
                )
            )
        ),
        'Setting' => array(
            'text' => '基本设置',
            'default' => 'right',
            'children' => array(
                'right' => array(
                    'text' => '右边悬浮窗设置',
                    'url' => U('setting/right')
                ),
                'flash' => array(
                    'text' => '焦点图广告',
                    'url' => U('setting/flash')
                ),
                'tdk' => array(
                    'text' => 'TDK管理',
                    'url' => U('setting/tdk')
                ),
                'copyright' => array(
                    'text' => '版权信息设置',
                    'url' => U('setting/copyright')
                )
            )
        )
    ),
    'MAX_SIZE' => 2097152,
    'ALLOW_EXTENSIONS' => array(
        'jpg',
        'jpeg',
        'png'
    )
);