<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => '字段 :attribute 必须被接受。',
    'accepted_if' => '当 :other 为 :value 时，字段 :attribute 必须被接受。',
    'active_url' => '字段 :attribute 必须是有效的 URL。',
    'after' => '字段 :attribute 必须是 :date 之后的日期。',
    'after_or_equal' => '字段 :attribute 必须是 :date 之后或相等的日期。',
    'alpha' => '字段 :attribute 只能包含字母。',
    'alpha_dash' => '字段 :attribute 只能包含字母、数字、破折号和下划线。',
    'alpha_num' => '字段 :attribute 只能包含字母和数字。',
    'any_of' => '字段 :attribute 无效。',
    'array' => '字段 :attribute 必须是数组。',
    'ascii' => '字段 :attribute 只能包含单字节字母数字字符和符号。',
    'before' => '字段 :attribute 必须是 :date 之前的日期。',
    'before_or_equal' => '字段 :attribute 必须是 :date 之前或相等的日期。',
    'between' => [
        'array' => '字段 :attribute 必须包含 :min 到 :max 个元素。',
        'file' => '字段 :attribute 必须在 :min 到 :max 千字节之间。',
        'numeric' => '字段 :attribute 必须在 :min 到 :max 之间。',
        'string' => '字段 :attribute 必须在 :min 到 :max 个字符之间。',
    ],
    'boolean' => '字段 :attribute 必须是真或假。',
    'can' => '字段 :attribute 包含未授权的值。',
    'confirmed' => '字段 :attribute 的确认不匹配。',
    'contains' => '字段 :attribute 不包含必需的值。',
    'current_password' => '密码不正确。',
    'date' => '字段 :attribute 必须是有效的日期。',
    'date_equals' => '字段 :attribute 必须是等于 :date 的日期。',
    'date_format' => '字段 :attribute 不匹配 :format 格式。',
    'decimal' => '字段 :attribute 必须有 :decimal 个小数位。',
    'declined' => '字段 :attribute 必须被拒绝。',
    'declined_if' => '当 :other 为 :value 时，字段 :attribute 必须被拒绝。',
    'different' => '字段 :attribute 和 :other 必须不同。',
    'digits' => '字段 :attribute 必须有 :digits 位数字。',
    'digits_between' => '字段 :attribute 必须在 :min 到 :max 位数字之间。',
    'dimensions' => '字段 :attribute 具有无效的图像尺寸。',
    'distinct' => '字段 :attribute 有重复值。',
    'doesnt_contain' => '字段 :attribute 不能包含以下任何值：:values。',
    'doesnt_end_with' => '字段 :attribute 不能以以下任何值结尾：:values。',
    'doesnt_start_with' => '字段 :attribute 不能以以下任何值开头：:values。',
    'email' => '字段 :attribute 必须是有效的电子邮件地址。',
    'ends_with' => '字段 :attribute 必须以以下值之一结尾：:values。',
    'enum' => '字段 :attribute 无效。',
    'exists' => '字段 :attribute 无效。',
    'extensions' => '字段 :attribute 必须具有以下扩展名之一：:values。',
    'file' => '字段 :attribute 必须是文件。',
    'filled' => '字段 :attribute 必须有值。',
    'gt' => [
        'array' => '字段 :attribute 必须包含超过 :value 个元素。',
        'file' => '字段 :attribute 必须大于 :value 千字节。',
        'numeric' => '字段 :attribute 必须大于 :value。',
        'string' => '字段 :attribute 必须大于 :value 个字符。',
    ],
    'gte' => [
        'array' => '字段 :attribute 必须包含 :value 个或更多元素。',
        'file' => '字段 :attribute 必须大于或等于 :value 千字节。',
        'numeric' => '字段 :attribute 必须大于或等于 :value。',
        'string' => '字段 :attribute 必须大于或等于 :value 个字符。',
    ],
    'hex_color' => '字段 :attribute 必须是有效的十六进制颜色。',
    'image' => '字段 :attribute 必须是图像。',
    'in' => '字段 :attribute 无效。',
    'in_array' => '字段 :attribute 必须存在于 :other 中。',
    'in_array_keys' => '字段 :attribute 必须包含以下键之一：:values。',
    'integer' => '字段 :attribute 必须是整数。',
    'ip' => '字段 :attribute 必须是有效的 IP 地址。',
    'ipv4' => '字段 :attribute 必须是有效的 IPv4 地址。',
    'ipv6' => '字段 :attribute 必须是有效的 IPv6 地址。',
    'json' => '字段 :attribute 必须是有效的 JSON 字符串。',
    'list' => '字段 :attribute 必须是列表。',
    'lowercase' => '字段 :attribute 必须是小写。',
    'lt' => [
        'array' => '字段 :attribute 必须包含少于 :value 个元素。',
        'file' => '字段 :attribute 必须小于 :value 千字节。',
        'numeric' => '字段 :attribute 必须小于 :value。',
        'string' => '字段 :attribute 必须小于 :value 个字符。',
    ],
    'lte' => [
        'array' => '字段 :attribute 不能包含超过 :value 个元素。',
        'file' => '字段 :attribute 必须小于或等于 :value 千字节。',
        'numeric' => '字段 :attribute 必须小于或等于 :value。',
        'string' => '字段 :attribute 必须小于或等于 :value 个字符。',
    ],
    'mac_address' => '字段 :attribute 必须是有效的 MAC 地址。',
    'max' => [
        'array' => '字段 :attribute 不能包含超过 :max 个元素。',
        'file' => '字段 :attribute 不能大于 :max 千字节。',
        'numeric' => '字段 :attribute 不能大于 :max。',
        'string' => '字段 :attribute 不能大于 :max 个字符。',
    ],
    'max_digits' => '字段 :attribute 不能超过 :max 位数字。',
    'mimes' => '字段 :attribute 必须是以下类型的文件：:values。',
    'mimetypes' => '字段 :attribute 必须是以下类型的文件：:values。',
    'min' => [
        'array' => '字段 :attribute 必须至少包含 :min 个元素。',
        'file' => '字段 :attribute 必须至少 :min 千字节。',
        'numeric' => '字段 :attribute 必须至少 :min。',
        'string' => '字段 :attribute 必须至少 :min 个字符。',
    ],
    'min_digits' => '字段 :attribute 必须至少 :min 位数字。',
    'missing' => '字段 :attribute 必须缺失。',
    'missing_if' => '当 :other 为 :value 时，字段 :attribute 必须缺失。',
    'missing_unless' => '除非 :other 为 :value，否则字段 :attribute 必须缺失。',
    'missing_with' => '当 :values 存在时，字段 :attribute 必须缺失。',
    'missing_with_all' => '当 :values 全部存在时，字段 :attribute 必须缺失。',
    'multiple_of' => '字段 :attribute 必须是 :value 的倍数。',
    'not_in' => '字段 :attribute 无效。',
    'not_regex' => '字段 :attribute 的格式无效。',
    'numeric' => '字段 :attribute 必须是数字。',
    'password' => '密码不正确。',
    'present' => '字段 :attribute 必须存在。',
    'prohibited' => '字段 :attribute 被禁止。',
    'prohibited_if' => '当 :other 为 :value 时，字段 :attribute 被禁止。',
    'prohibited_unless' => '除非 :other 在 :values 中，否则字段 :attribute 被禁止。',
    'prohibits' => '字段 :attribute 禁止 :other 存在。',
    'regex' => '字段 :attribute 的格式无效。',
    'required' => '字段 :attribute 是必需的。',
    'required_array_keys' => '字段 :attribute 必须包含以下键的条目：:values。',
    'required_if' => '当 :other 为 :value 时，字段 :attribute 是必需的。',
    'required_if_accepted' => '当 :other 被接受时，字段 :attribute 是必需的。',
    'required_unless' => '除非 :other 在 :values 中，否则字段 :attribute 是必需的。',
    'required_with' => '当 :values 存在时，字段 :attribute 是必需的。',
    'required_with_all' => '当 :values 全部存在时，字段 :attribute 是必需的。',
    'required_without' => '当 :values 不存在时，字段 :attribute 是必需的。',
    'required_without_all' => '当 :values 全部不存在时，字段 :attribute 是必需的。',
    'same' => '字段 :attribute 和 :other 必须匹配。',
    'size' => [
        'array' => '字段 :attribute 必须包含 :size 个元素。',
        'file' => '字段 :attribute 必须是 :size 千字节。',
        'numeric' => '字段 :attribute 必须是 :size。',
        'string' => '字段 :attribute 必须是 :size 个字符。',
    ],
    'starts_with' => '字段 :attribute 必须以以下值之一开头：:values。',
    'string' => '字段 :attribute 必须是字符串。',
    'timezone' => '字段 :attribute 必须是有效的时区。',
    'unique' => '字段 :attribute 已被占用。',
    'uploaded' => '字段 :attribute 无法上传。',
    'uppercase' => '字段 :attribute 必须是大写。',
    'url' => '字段 :attribute 必须是有效的 URL。',
    'ulid' => '字段 :attribute 必须是有效的 ULID。',
    'uuid' => '字段 :attribute 必须是有效的 UUID。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "rule.attribute" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => '自定义消息',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => '姓名',
        'username' => '用户名',
        'email' => '电子邮件地址',
        'password' => '密码',
        'password_confirmation' => '密码确认',
        'city' => '城市',
        'country' => '国家',
        'address' => '地址',
        'phone' => '电话',
        'mobile' => '手机',
        'age' => '年龄',
        'sex' => '性别',
        'gender' => '性别',
        'day' => '日',
        'month' => '月',
        'year' => '年',
        'hour' => '小时',
        'minute' => '分钟',
        'second' => '秒',
        'title' => '标题',
        'content' => '内容',
        'description' => '描述',
        'excerpt' => '摘要',
        'date' => '日期',
        'time' => '时间',
        'available' => '可用',
        'size' => '大小',
    ],

];
