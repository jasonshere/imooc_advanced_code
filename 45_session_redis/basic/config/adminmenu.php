<?php
return [
    ['label' => '后台首页', 'url' => 'default/index', 'module' => 'default', 'icon' => 'icon-home', 'submenu' => []],
    ['label' => '管理员管理', 'url' => '#', 'module' => 'manage', 'icon' => 'icon-user', 'submenu' => [
        ['label' => '管理员列表', 'url' => 'managers'],
        ['label' => '添加管理员', 'url' => 'reg'],
    ]],
    ['label' => '用户管理', 'url' => '#', 'module' => 'user', 'icon' => 'icon-group', 'submenu' => [
        ['label' => '用户列表', 'url' => 'users'],
        ['label' => '添加用户', 'url' => 'reg'],
    ]],
    ['label' => '分类管理', 'url' => '#', 'module' => 'category', 'icon' => 'icon-list', 'submenu' => [
        ['label' => '分类列表', 'url' => 'list'],
        ['label' => '添加分类', 'url' => 'add'],
    ]],
    ['label' => '商品管理', 'url' => '#', 'module' => 'product', 'icon' => 'icon-glass', 'submenu' => [
        ['label' => '商品列表', 'url' => 'list'],
        ['label' => '添加商品', 'url' => 'add'],
    ]],
    ['label' => '订单管理', 'url' => '#', 'module' => 'order', 'icon' => 'icon-edit', 'submenu' => [
        ['label' => '订单列表', 'url' => 'list'],
    ]],
    ['label' => '权限管理', 'url' => '#', 'module' => 'rbac', 'icon' => 'icon-group', 'submenu' => [
        ['label' => '创建角色', 'url' => 'createrole'],
        ['label' => '角色列表', 'url' => 'roles'],
        ['label' => '创建规则', 'url' => 'createrule'],
    ]],
];
