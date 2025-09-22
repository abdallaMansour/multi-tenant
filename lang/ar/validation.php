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

    'accepted' => 'يجب أن يكون الحقل :attribute مقبول.',
    'accepted_if' => 'يجب أن يكون الحقل :attribute مقبول عندما يكون :other يساوي :value.',
    'active_url' => 'يجب أن يكون الحقل :attribute URL صالح.',
    'after' => 'يجب أن يكون الحقل :attribute تاريخ بعد :date.',
    'after_or_equal' => 'يجب أن يكون الحقل :attribute تاريخ بعد أو يساوي :date.',
    'alpha' => 'يجب أن يكون الحقل :attribute يحتوي فقط على أحرف.',
    'alpha_dash' => 'يجب أن يكون الحقل :attribute يحتوي فقط على أحرف, أرقام, أحرف, وأحرف.',
    'alpha_num' => 'يجب أن يكون الحقل :attribute يحتوي فقط على أحرف وأرقام.',
    'any_of' => 'يجب أن يكون الحقل :attribute غير صالح.',
    'array' => 'يجب أن يكون الحقل :attribute مصفوفة.',
    'ascii' => 'يجب أن يكون الحقل :attribute يحتوي فقط على أحرف وأرقام ورموز.',
    'before' => 'يجب أن يكون الحقل :attribute تاريخ قبل :date.',
    'before_or_equal' => 'يجب أن يكون الحقل :attribute تاريخ قبل أو يساوي :date.',
    'between' => [
        'array' => 'يجب أن يكون الحقل :attribute يحتوي بين :min و :max عناصر.',
        'file' => 'يجب أن يكون الحقل :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن يكون الحقل :attribute بين :min و :max.',
        'string' => 'يجب أن يكون الحقل :attribute بين :min و :max أحرف.',
    ],
    'boolean' => 'يجب أن يكون الحقل :attribute true أو false.',
    'can' => 'يجب أن يكون الحقل :attribute يحتوي على قيمة غير مخولة.',
    'confirmed' => 'يجب أن يكون الحقل :attribute يطابق التأكيد.',
    'contains' => 'يجب أن يكون الحقل :attribute يحتوي على قيمة مطلوبة.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'يجب أن يكون الحقل :attribute تاريخ صالح.',
    'date_equals' => 'يجب أن يكون الحقل :attribute تاريخ يساوي :date.',
    'date_format' => 'يجب أن يكون الحقل :attribute يطابق التنسيق :format.',
    'decimal' => 'يجب أن يكون الحقل :attribute يحتوي على :decimal منازل عشرية.',
    'declined' => 'يجب أن يكون الحقل :attribute مرفوض.',
    'declined_if' => 'يجب أن يكون الحقل :attribute مرفوض عندما يكون :other يساوي :value.',
    'different' => 'يجب أن يكون الحقل :attribute و :other مختلف.',
    'digits' => 'يجب أن يكون الحقل :attribute يحتوي على :digits رقم.',
    'digits_between' => 'يجب أن يكون الحقل :attribute بين :min و :max رقم.',
    'dimensions' => 'يجب أن يكون الحقل :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'يجب أن يكون الحقل :attribute يحتوي على قيمة مكررة.',
    'doesnt_contain' => 'يجب أن يكون الحقل :attribute لا يحتوي على أي من القيم التالية: :values.',
    'doesnt_end_with' => 'يجب أن يكون الحقل :attribute لا ينتهي بأي من القيم التالية: :values.',
    'doesnt_start_with' => 'يجب أن يكون الحقل :attribute لا يبدأ بأي من القيم التالية: :values.',
    'email' => 'يجب أن يكون الحقل :attribute بريد إلكتروني صالح.',
    'ends_with' => 'يجب أن يكون الحقل :attribute ينتهي بأي من القيم التالية: :values.',
    'enum' => 'يجب أن يكون الحقل :attribute غير صالح.',
    'exists' => 'يجب أن يكون الحقل :attribute غير صالح.',
    'extensions' => 'يجب أن يكون الحقل :attribute يحتوي على أحد الامتدادات التالية: :values.',
    'file' => 'يجب أن يكون الحقل :attribute ملف.',
    'filled' => 'يجب أن يكون الحقل :attribute يحتوي على قيمة.',
    'gt' => [
        'array' => 'يجب أن يكون الحقل :attribute يحتوي على أكثر من :value عناصر.',
        'file' => 'يجب أن يكون الحقل :attribute أكثر من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون الحقل :attribute أكثر من :value.',
        'string' => 'يجب أن يكون الحقل :attribute أكثر من :value أحرف.',
    ],
    'gte' => [
        'array' => 'يجب أن يكون الحقل :attribute يحتوي على :value عناصر أو أكثر.',
        'file' => 'يجب أن يكون الحقل :attribute أكثر من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون الحقل :attribute أكثر من أو يساوي :value.',
        'string' => 'يجب أن يكون الحقل :attribute أكثر من أو يساوي :value أحرف.',
    ],
    'hex_color' => 'يجب أن يكون الحقل :attribute يحتوي على لون هيكساديمال صالح.',
    'image' => 'يجب أن يكون الحقل :attribute صورة.',
    'in' => 'يجب أن يكون الحقل :attribute غير صالح.',
    'in_array' => 'يجب أن يكون الحقل :attribute يحتوي على :other.',
    'in_array_keys' => 'يجب أن يكون الحقل :attribute يحتوي على أحد المفاتيح التالية: :values.',
    'integer' => 'يجب أن يكون الحقل :attribute عدد صحيح.',
    'ip' => 'يجب أن يكون الحقل :attribute يحتوي على عنوان IP صالح.',
    'ipv4' => 'يجب أن يكون الحقل :attribute يحتوي على عنوان IP صالح.',
    'ipv6' => 'يجب أن يكون الحقل :attribute يحتوي على عنوان IP صالح.',
    'json' => 'يجب أن يكون الحقل :attribute يحتوي على سلسلة JSON صالحة.',
    'list' => 'يجب أن يكون الحقل :attribute يحتوي على قائمة.',
    'lowercase' => 'يجب أن يكون الحقل :attribute يحتوي على أحرف صغيرة.',
    'lt' => [
        'array' => 'يجب أن يكون الحقل :attribute يحتوي على أقل من :value عناصر.',
        'file' => 'يجب أن يكون الحقل :attribute أقل من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون الحقل :attribute أقل من :value.',
        'string' => 'يجب أن يكون الحقل :attribute أقل من :value أحرف.',
    ],
    'lte' => [
        'array' => 'يجب أن يكون الحقل :attribute لا يحتوي على أكثر من :value عناصر.',
        'file' => 'يجب أن يكون الحقل :attribute أقل من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون الحقل :attribute أقل من أو يساوي :value.',
        'string' => 'يجب أن يكون الحقل :attribute أقل من أو يساوي :value أحرف.',
    ],
    'mac_address' => 'يجب أن يكون الحقل :attribute يحتوي على عنوان MAC صالح.',
    'max' => [
        'array' => 'يجب أن يكون الحقل :attribute لا يحتوي على أكثر من :max عناصر.',
        'file' => 'يجب أن يكون الحقل :attribute لا يحتوي على أكثر من :max كيلوبايت.',
        'numeric' => 'يجب أن يكون الحقل :attribute لا يحتوي على أكثر من :max.',
        'string' => 'يجب أن يكون الحقل :attribute لا يحتوي على أكثر من :max أحرف.',
    ],
    'max_digits' => 'يجب أن يكون الحقل :attribute لا يحتوي على أكثر من :max رقم.',
    'mimes' => 'يجب أن يكون الحقل :attribute ملف من النوع: :values.',
    'mimetypes' => 'يجب أن يكون الحقل :attribute ملف من النوع: :values.',
    'min' => [
        'array' => 'يجب أن يكون الحقل :attribute يحتوي على أقل من :min عناصر.',
        'file' => 'يجب أن يكون الحقل :attribute أقل من :min كيلوبايت.',
        'numeric' => 'يجب أن يكون الحقل :attribute أقل من :min.',
        'string' => 'يجب أن يكون الحقل :attribute أقل من :min أحرف.',
    ],
    'min_digits' => 'يجب أن يكون الحقل :attribute يحتوي على أقل من :min رقم.',
    'missing' => 'يجب أن يكون الحقل :attribute مفقود.',
    'missing_if' => 'يجب أن يكون الحقل :attribute مفقود عندما يكون :other يساوي :value.',
    'missing_unless' => 'يجب أن يكون الحقل :attribute مفقود عندما يكون :other يساوي :value.',
    'missing_with' => 'يجب أن يكون الحقل :attribute مفقود عندما يكون :values موجود.',
    'missing_with_all' => 'يجب أن يكون الحقل :attribute مفقود عندما يكون :values موجود.',
    'multiple_of' => 'يجب أن يكون الحقل :attribute مضاعف للقيمة :value.',
    'not_in' => 'يجب أن يكون الحقل :attribute غير صالح.',
    'not_regex' => 'يجب أن يكون الحقل :attribute يحتوي على تنسيق غير صالح.',
    'numeric' => 'يجب أن يكون الحقل :attribute رقم.',
    'password' => [
        'letters' => 'يجب أن يكون الحقل :attribute يحتوي على أقل من :min أحرف.',
        'mixed' => 'يجب أن يكون الحقل :attribute يحتوي على أقل من :min أحرف.',
        'numbers' => 'يجب أن يكون الحقل :attribute يحتوي على أقل من :min رقم.',
        'symbols' => 'يجب أن يكون الحقل :attribute يحتوي على أقل من :min رمز.',
        'uncompromised' => 'يجب أن يكون الحقل :attribute يحتوي على أقل من :min رمز.',
    ],
    'present' => 'يجب أن يكون الحقل :attribute موجود.',
    'present_if' => 'يجب أن يكون الحقل :attribute موجود عندما يكون :other يساوي :value.',
    'present_unless' => 'يجب أن يكون الحقل :attribute موجود عندما يكون :other يساوي :value.',
    'present_with' => 'يجب أن يكون الحقل :attribute موجود عندما يكون :values موجود.',
    'present_with_all' => 'يجب أن يكون الحقل :attribute موجود عندما يكون :values موجود.',
    'prohibited' => 'يجب أن يكون الحقل :attribute محظور.',
    'prohibited_if' => 'يجب أن يكون الحقل :attribute محظور عندما يكون :other يساوي :value.',
    'prohibited_if_accepted' => 'يجب أن يكون الحقل :attribute محظور عندما يكون :other مقبول.',
    'prohibited_if_declined' => 'يجب أن يكون الحقل :attribute محظور عندما يكون :other مرفوض.',
    'prohibited_unless' => 'يجب أن يكون الحقل :attribute محظور عندما يكون :other في :values.',
    'prohibits' => 'يجب أن يكون الحقل :attribute محظور من :other من أن يكون موجود.',
    'regex' => 'يجب أن يكون الحقل :attribute يحتوي على تنسيق غير صالح.',
    'required' => 'يجب أن يكون الحقل :attribute مطلوب.',
    'required_array_keys' => 'يجب أن يكون الحقل :attribute يحتوي على مدخلات للقيم التالية: :values.',
    'required_if' => 'يجب أن يكون الحقل :attribute مطلوب عندما يكون :other يساوي :value.',
    'required_if_accepted' => 'يجب أن يكون الحقل :attribute مطلوب عندما يكون :other مقبول.',
    'required_if_declined' => 'يجب أن يكون الحقل :attribute مطلوب عندما يكون :other مرفوض.',
    'required_unless' => 'يجب أن يكون الحقل :attribute مطلوب عندما يكون :other في :values.',
    'required_with' => 'يجب أن يكون الحقل :attribute مطلوب عندما يكون :values موجود.',
    'required_with_all' => 'يجب أن يكون الحقل :attribute مطلوب عندما يكون :values موجود.',
    'required_without' => 'يجب أن يكون الحقل :attribute مطلوب عندما يكون :values موجود.',
    'required_without_all' => 'يجب أن يكون الحقل :attribute مطلوب عندما لا يكون :values موجود.',
    'same' => 'يجب أن يكون الحقل :attribute يطابق :other.',
    'size' => [
        'array' => 'يجب أن يكون الحقل :attribute يحتوي على :size عناصر.',
        'file' => 'يجب أن يكون الحقل :attribute يحتوي على :size كيلوبايت.',
        'numeric' => 'يجب أن يكون الحقل :attribute يحتوي على :size.',
        'string' => 'يجب أن يكون الحقل :attribute يحتوي على :size أحرف.',
    ],
    'starts_with' => 'يجب أن يكون الحقل :attribute يبدأ بأي من القيم التالية: :values.',
    'string' => 'يجب أن يكون الحقل :attribute يحتوي على سلسلة.',
    'timezone' => 'يجب أن يكون الحقل :attribute يحتوي على توقيت صالح.',
    'unique' => 'يجب أن يكون الحقل :attribute موجود.',
    'uploaded' => 'يجب أن يكون الحقل :attribute مرفوض.',
    'uppercase' => 'يجب أن يكون الحقل :attribute يحتوي على أحرف كبيرة.',
    'url' => 'يجب أن يكون الحقل :attribute يحتوي على URL صالح.',
    'ulid' => 'يجب أن يكون الحقل :attribute يحتوي على ULID صالح.',
    'uuid' => 'يجب أن يكون الحقل :attribute يحتوي على UUID صالح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة تخصيصية',
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
        'title_ar'              => 'العنوان بالعربية',
        'title_en'              => 'العنوان  بالإنجليزية',
        'description_ar'        => 'الوصف بالعربية',
        'description_en'        => 'الوصف بالإنجليزية',
        'name'                  => 'الاسم',
        'name_ar'               => 'الاسم بالعربية',
        'name_en'               => 'الاسم بالإنجليزية',
        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم الأول',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة السر',
        'password_confirmation' => 'تأكيد كلمة السر',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'عنوان السكن',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'title'                 => 'العنوان',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
        'roles'                 => 'القواعد',
        'roles.*'               => 'من القواعد',
        'image'                 => 'الصورة',
        'category_id'           => 'رقم النوع',
        'sub_category_id'       => 'رقم النوع الفرعي',
        'offer'                 => 'رعض',
        'offer_ar'              => 'العرض باللغة العربية',
        'offer_en'              => 'العرض باللغة الإنجليزية',

        'site_name_en'          => 'إسم الموقع بالإنجليزي',
        'site_name_ar'          => 'إسم الموقع بالعربي',
        'keyword_en'            => 'الكلمات المفتاحية بالإنجليزي',
        'keyword_ar'            => 'الكلمات المفتاحية بالعربي',
        'rate'                  => 'التقييم',
        'message_ar'            => 'رسالتنا بالعربية',
        'message_en'            => 'رسالتنا بالإنجليزية',
        'vision_ar'             => 'رؤيتنا بالعربية',
        'vision_en'             => 'رؤيتنا بالإنجليزية',
        'principle_ar'          => 'مبادئنا بالعربية',
        'principle_en'          => 'مبادئنا بالإنجليزية',
        'owner_ar'              => 'المالك بالعربية'
    ],

];
