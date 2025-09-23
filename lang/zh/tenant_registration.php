<?php

return [
    // Page Title
    'page_title' => '租户注册',

    // Step Titles
    'step_email' => '电子邮件',
    'step_verify_otp' => '验证OTP',
    'step_user_info' => '用户信息',

    // Step 1: Email
    'email_title' => '输入您的电子邮件地址',
    'email_description' => '我们将向您发送验证码以确认您的电子邮件。',
    'email_label' => '电子邮件地址',
    'email_placeholder' => '输入您的电子邮件地址',
    'email_sending' => '发送中...',
    'email_button' => '发送验证码',

    // Step 2: OTP Verification
    'otp_title' => '验证您的电子邮件',
    'otp_description' => '输入发送到您电子邮件地址的4位数字代码。',
    'otp_verifying' => '验证中...',
    'otp_button' => '验证代码',
    'otp_resend' => '重新发送代码',
    'otp_resending' => '重新发送中...',
    'otp_invalid' => '请输入有效的4位数字代码。',

    // Step 3: User Information
    'user_info_title' => '完成您的个人资料',
    'user_info_description' => '请提供您的信息以完成注册。',
    'name_label' => '全名',
    'name_placeholder' => '输入您的全名',
    'phone_label' => '电话号码',
    'phone_placeholder' => '输入您的电话号码',
    'business_activity_label' => '商业活动',
    'main_language_label' => '网站主要语言',
    'sub_language_label' => '网站次要语言',
    'admin_main_language_label' => '管理面板主要语言',
    'admin_sub_language_label' => '管理面板次要语言',
    'completing' => '完成中...',
    'complete_registration' => '完成注册',
    'previous' => '上一步',
    'select_all_required' => '请选择所有必需选项。',

    // Success Step
    'success_title' => '注册成功！',
    'success_description' => '您的租户账户已成功创建。现在您可以访问您的仪表板。',
    'go_to_login' => '前往登录',

    // Language Options
    'language_english' => '英语',
    'language_arabic' => '阿拉伯语',
    'language_french' => '法语',
    'language_spanish' => '西班牙语',
    'language_bengali' => '孟加拉语',
    'language_hindi' => '印地语',
    'language_japanese' => '日语',
    'language_korean' => '韩语',
    'language_malayalam' => '马拉雅拉姆语',
    'language_portuguese' => '葡萄牙语',
    'language_chinese' => '中文',

    // Controller Messages
    'mail_sent' => '邮件已发送',
    'invalid_otp' => '无效的OTP代码',
    'otp_expired' => 'OTP代码已过期',
    'email_verified' => '电子邮件验证成功',
    'no_database_credential' => '未找到活动的数据库凭据',
    'invalid_otp_expired' => '无效的OTP代码或已过期',
    'username_exists' => '用户名已存在',
    'registration_completed' => '注册成功完成',

    // Error Messages
    'error_occurred' => '发生错误',
    'network_error' => '发生网络错误',
    'validation_error' => '验证错误',
    'server_error' => '发生服务器错误',

    // Form Validation
    'email_required' => '电子邮件地址是必需的',
    'email_invalid' => '请输入有效的电子邮件地址',
    'name_required' => '全名是必需的',
    'phone_required' => '电话号码是必需的',
    'business_activity_required' => '商业活动是必需的',
    'main_language_required' => '主要语言是必需的',
    'sub_language_required' => '次要语言是必需的',
    'admin_main_language_required' => '管理主要语言是必需的',
    'admin_sub_language_required' => '管理次要语言是必需的',

    // Additional Messages
    'loading' => '加载中...',
    'please_wait' => '请稍候...',
    'try_again' => '重试',
    'contact_support' => '联系支持',
];
