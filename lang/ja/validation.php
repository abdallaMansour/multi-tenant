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

    'accepted' => ':attributeフィールドは受け入れられる必要があります。',
    'accepted_if' => ':otherが:valueの場合、:attributeフィールドは受け入れられる必要があります。',
    'active_url' => ':attributeフィールドは有効なURLである必要があります。',
    'after' => ':attributeフィールドは:dateより後の日付である必要があります。',
    'after_or_equal' => ':attributeフィールドは:date以降の日付である必要があります。',
    'alpha' => ':attributeフィールドには文字のみ含めることができます。',
    'alpha_dash' => ':attributeフィールドには文字、数字、ダッシュ、アンダースコアのみ含めることができます。',
    'alpha_num' => ':attributeフィールドには文字と数字のみ含めることができます。',
    'any_of' => ':attributeフィールドは有効ではありません。',
    'array' => ':attributeフィールドは配列である必要があります。',
    'ascii' => ':attributeフィールドには単一バイトの英数字文字と記号のみ含めることができます。',
    'before' => ':attributeフィールドは:dateより前の日付である必要があります。',
    'before_or_equal' => ':attributeフィールドは:date以前の日付である必要があります。',
    'between' => [
        'array' => ':attributeフィールドには:minから:maxの要素が含まれている必要があります。',
        'file' => ':attributeフィールドは:minから:maxキロバイトの間である必要があります。',
        'numeric' => ':attributeフィールドは:minから:maxの間である必要があります。',
        'string' => ':attributeフィールドには:minから:max文字が含まれている必要があります。',
    ],
    'boolean' => ':attributeフィールドは真または偽である必要があります。',
    'can' => ':attributeフィールドには許可されていない値が含まれています。',
    'confirmed' => ':attributeフィールドの確認が一致しません。',
    'contains' => ':attributeフィールドには必要な値が含まれていません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attributeフィールドは有効な日付である必要があります。',
    'date_equals' => ':attributeフィールドは:dateと等しい日付である必要があります。',
    'date_format' => ':attributeフィールドは:format形式と一致しません。',
    'decimal' => ':attributeフィールドには:decimalの小数点以下が必要です。',
    'declined' => ':attributeフィールドは拒否される必要があります。',
    'declined_if' => ':otherが:valueの場合、:attributeフィールドは拒否される必要があります。',
    'different' => ':attributeフィールドと:otherフィールドは異なる必要があります。',
    'digits' => ':attributeフィールドには:digits桁が必要です。',
    'digits_between' => ':attributeフィールドには:minから:max桁が必要です。',
    'dimensions' => ':attributeフィールドには無効な画像サイズがあります。',
    'distinct' => ':attributeフィールドには重複した値があります。',
    'doesnt_contain' => ':attributeフィールドには次の値のいずれも含めることができません: :values。',
    'doesnt_end_with' => ':attributeフィールドは次の値のいずれかで終わることはできません: :values。',
    'doesnt_start_with' => ':attributeフィールドは次の値のいずれかで始まることはできません: :values。',
    'email' => ':attributeフィールドは有効なメールアドレスである必要があります。',
    'ends_with' => ':attributeフィールドは次の値のいずれかで終わる必要があります: :values。',
    'enum' => ':attributeフィールドは有効ではありません。',
    'exists' => ':attributeフィールドは有効ではありません。',
    'extensions' => ':attributeフィールドには次の拡張子のいずれかが必要です: :values。',
    'file' => ':attributeフィールドはファイルである必要があります。',
    'filled' => ':attributeフィールドには値が必要です。',
    'gt' => [
        'array' => ':attributeフィールドには:valueより多くの要素が含まれている必要があります。',
        'file' => ':attributeフィールドは:valueキロバイトより大きい必要があります。',
        'numeric' => ':attributeフィールドは:valueより大きい必要があります。',
        'string' => ':attributeフィールドは:value文字より大きい必要があります。',
    ],
    'gte' => [
        'array' => ':attributeフィールドには:value以上の要素が含まれている必要があります。',
        'file' => ':attributeフィールドは:valueキロバイト以上である必要があります。',
        'numeric' => ':attributeフィールドは:value以上である必要があります。',
        'string' => ':attributeフィールドは:value文字以上である必要があります。',
    ],
    'hex_color' => ':attributeフィールドは有効な16進数カラーである必要があります。',
    'image' => ':attributeフィールドは画像である必要があります。',
    'in' => ':attributeフィールドは有効ではありません。',
    'in_array' => ':attributeフィールドは:otherに存在する必要があります。',
    'in_array_keys' => ':attributeフィールドには次のキーのいずれかが必要です: :values。',
    'integer' => ':attributeフィールドは整数である必要があります。',
    'ip' => ':attributeフィールドは有効なIPアドレスである必要があります。',
    'ipv4' => ':attributeフィールドは有効なIPv4アドレスである必要があります。',
    'ipv6' => ':attributeフィールドは有効なIPv6アドレスである必要があります。',
    'json' => ':attributeフィールドは有効なJSON文字列である必要があります。',
    'list' => ':attributeフィールドはリストである必要があります。',
    'lowercase' => ':attributeフィールドは小文字である必要があります。',
    'lt' => [
        'array' => ':attributeフィールドには:valueより少ない要素が含まれている必要があります。',
        'file' => ':attributeフィールドは:valueキロバイトより小さい必要があります。',
        'numeric' => ':attributeフィールドは:valueより小さい必要があります。',
        'string' => ':attributeフィールドは:value文字より小さい必要があります。',
    ],
    'lte' => [
        'array' => ':attributeフィールドには:value以下の要素が含まれている必要があります。',
        'file' => ':attributeフィールドは:valueキロバイト以下である必要があります。',
        'numeric' => ':attributeフィールドは:value以下である必要があります。',
        'string' => ':attributeフィールドは:value文字以下である必要があります。',
    ],
    'mac_address' => ':attributeフィールドは有効なMACアドレスである必要があります。',
    'max' => [
        'array' => ':attributeフィールドには:max以下の要素が含まれている必要があります。',
        'file' => ':attributeフィールドは:maxキロバイト以下である必要があります。',
        'numeric' => ':attributeフィールドは:max以下である必要があります。',
        'string' => ':attributeフィールドは:max文字以下である必要があります。',
    ],
    'max_digits' => ':attributeフィールドには:max以下の桁が必要です。',
    'mimes' => ':attributeフィールドは次のタイプのファイルである必要があります: :values。',
    'mimetypes' => ':attributeフィールドは次のタイプのファイルである必要があります: :values。',
    'min' => [
        'array' => ':attributeフィールドには少なくとも:minの要素が含まれている必要があります。',
        'file' => ':attributeフィールドは少なくとも:minキロバイトである必要があります。',
        'numeric' => ':attributeフィールドは少なくとも:minである必要があります。',
        'string' => ':attributeフィールドには少なくとも:min文字が含まれている必要があります。',
    ],
    'min_digits' => ':attributeフィールドには少なくとも:min桁が必要です。',
    'missing' => ':attributeフィールドは存在しない必要があります。',
    'missing_if' => ':otherが:valueの場合、:attributeフィールドは存在しない必要があります。',
    'missing_unless' => ':otherが:valueでない限り、:attributeフィールドは存在しない必要があります。',
    'missing_with' => ':valuesが存在する場合、:attributeフィールドは存在しない必要があります。',
    'missing_with_all' => ':valuesがすべて存在する場合、:attributeフィールドは存在しない必要があります。',
    'multiple_of' => ':attributeフィールドは:valueの倍数である必要があります。',
    'not_in' => ':attributeフィールドは有効ではありません。',
    'not_regex' => ':attributeフィールドの形式は有効ではありません。',
    'numeric' => ':attributeフィールドは数値である必要があります。',
    'password' => 'パスワードが正しくありません。',
    'present' => ':attributeフィールドは存在する必要があります。',
    'prohibited' => ':attributeフィールドは禁止されています。',
    'prohibited_if' => ':otherが:valueの場合、:attributeフィールドは禁止されています。',
    'prohibited_unless' => ':otherが:valuesにない限り、:attributeフィールドは禁止されています。',
    'prohibits' => ':attributeフィールドは:otherの存在を禁止します。',
    'regex' => ':attributeフィールドの形式は有効ではありません。',
    'required' => ':attributeフィールドは必須です。',
    'required_array_keys' => ':attributeフィールドには次のキーのエントリが必要です: :values。',
    'required_if' => ':otherが:valueの場合、:attributeフィールドは必須です。',
    'required_if_accepted' => ':otherが受け入れられた場合、:attributeフィールドは必須です。',
    'required_unless' => ':otherが:valuesにない限り、:attributeフィールドは必須です。',
    'required_with' => ':valuesが存在する場合、:attributeフィールドは必須です。',
    'required_with_all' => ':valuesがすべて存在する場合、:attributeフィールドは必須です。',
    'required_without' => ':valuesが存在しない場合、:attributeフィールドは必須です。',
    'required_without_all' => ':valuesのいずれも存在しない場合、:attributeフィールドは必須です。',
    'same' => ':attributeフィールドと:otherフィールドは一致する必要があります。',
    'size' => [
        'array' => ':attributeフィールドには:sizeの要素が含まれている必要があります。',
        'file' => ':attributeフィールドは:sizeキロバイトである必要があります。',
        'numeric' => ':attributeフィールドは:sizeである必要があります。',
        'string' => ':attributeフィールドには:size文字が含まれている必要があります。',
    ],
    'starts_with' => ':attributeフィールドは次の値のいずれかで始まる必要があります: :values。',
    'string' => ':attributeフィールドは文字列である必要があります。',
    'timezone' => ':attributeフィールドは有効なタイムゾーンである必要があります。',
    'unique' => ':attributeフィールドは既に使用されています。',
    'uploaded' => ':attributeフィールドをアップロードできませんでした。',
    'uppercase' => ':attributeフィールドは大文字である必要があります。',
    'url' => ':attributeフィールドは有効なURLである必要があります。',
    'ulid' => ':attributeフィールドは有効なULIDである必要があります。',
    'uuid' => ':attributeフィールドは有効なUUIDである必要があります。',

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
            'rule-name' => 'カスタムメッセージ',
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
        'name' => '名前',
        'username' => 'ユーザー名',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
        'city' => '都市',
        'country' => '国',
        'address' => '住所',
        'phone' => '電話',
        'mobile' => '携帯電話',
        'age' => '年齢',
        'sex' => '性別',
        'gender' => '性別',
        'day' => '日',
        'month' => '月',
        'year' => '年',
        'hour' => '時間',
        'minute' => '分',
        'second' => '秒',
        'title' => 'タイトル',
        'content' => 'コンテンツ',
        'description' => '説明',
        'excerpt' => '抜粋',
        'date' => '日付',
        'time' => '時間',
        'available' => '利用可能',
        'size' => 'サイズ',
    ],

];
