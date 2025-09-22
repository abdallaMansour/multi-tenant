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

    'accepted' => ':attribute ফিল্ডটি গ্রহণযোগ্য হতে হবে।',
    'accepted_if' => ':other যখন :value এর সমান হয় তখন :attribute ফিল্ডটি গ্রহণযোগ্য হতে হবে।',
    'active_url' => ':attribute ফিল্ডটি একটি বৈধ URL হতে হবে।',
    'after' => ':attribute ফিল্ডটি :date এর পরের তারিখ হতে হবে।',
    'after_or_equal' => ':attribute ফিল্ডটি :date এর পরের বা সমান তারিখ হতে হবে।',
    'alpha' => ':attribute ফিল্ডে শুধুমাত্র অক্ষর থাকতে হবে।',
    'alpha_dash' => ':attribute ফিল্ডে শুধুমাত্র অক্ষর, সংখ্যা, ড্যাশ এবং আন্ডারস্কোর থাকতে হবে।',
    'alpha_num' => ':attribute ফিল্ডে শুধুমাত্র অক্ষর এবং সংখ্যা থাকতে হবে।',
    'any_of' => ':attribute ফিল্ডটি বৈধ নয়।',
    'array' => ':attribute ফিল্ডটি একটি অ্যারে হতে হবে।',
    'ascii' => ':attribute ফিল্ডে শুধুমাত্র এক-বাইট অক্ষর, সংখ্যা এবং প্রতীক থাকতে হবে।',
    'before' => ':attribute ফিল্ডটি :date এর আগের তারিখ হতে হবে।',
    'before_or_equal' => ':attribute ফিল্ডটি :date এর আগের বা সমান তারিখ হতে হবে।',
    'between' => [
        'array' => ':attribute ফিল্ডে :min এবং :max এর মধ্যে আইটেম থাকতে হবে।',
        'file' => ':attribute ফিল্ডটি :min এবং :max কিলোবাইটের মধ্যে হতে হবে।',
        'numeric' => ':attribute ফিল্ডটি :min এবং :max এর মধ্যে হতে হবে।',
        'string' => ':attribute ফিল্ডটি :min এবং :max অক্ষরের মধ্যে হতে হবে।',
    ],
    'boolean' => ':attribute ফিল্ডটি সত্য বা মিথ্যা হতে হবে।',
    'can' => ':attribute ফিল্ডে একটি অননুমোদিত মান রয়েছে।',
    'confirmed' => ':attribute নিশ্চিতকরণের সাথে মিলছে না।',
    'contains' => ':attribute ফিল্ডে একটি প্রয়োজনীয় মান নেই।',
    'current_password' => 'পাসওয়ার্ড সঠিক নয়।',
    'date' => ':attribute ফিল্ডটি একটি বৈধ তারিখ নয়।',
    'date_equals' => ':attribute ফিল্ডটি :date এর সমান তারিখ হতে হবে।',
    'date_format' => ':attribute ফিল্ডটি :format ফরম্যাটের সাথে মিলছে না।',
    'decimal' => ':attribute ফিল্ডে :decimal দশমিক স্থান থাকতে হবে।',
    'declined' => ':attribute ফিল্ডটি প্রত্যাখ্যান করতে হবে।',
    'declined_if' => ':other যখন :value এর সমান হয় তখন :attribute ফিল্ডটি প্রত্যাখ্যান করতে হবে।',
    'different' => ':attribute এবং :other আলাদা হতে হবে।',
    'digits' => ':attribute ফিল্ডে :digits সংখ্যা থাকতে হবে।',
    'digits_between' => ':attribute ফিল্ডে :min এবং :max এর মধ্যে সংখ্যা থাকতে হবে।',
    'dimensions' => ':attribute ফিল্ডে অবৈধ চিত্রের মাত্রা রয়েছে।',
    'distinct' => ':attribute ফিল্ডে একটি ডুপ্লিকেট মান রয়েছে।',
    'doesnt_contain' => ':attribute ফিল্ডে নিম্নলিখিত মানগুলির কোনটিই থাকতে পারবে না: :values।',
    'doesnt_end_with' => ':attribute ফিল্ডটি নিম্নলিখিত মানগুলির কোনটির সাথেই শেষ হতে পারবে না: :values।',
    'doesnt_start_with' => ':attribute ফিল্ডটি নিম্নলিখিত মানগুলির কোনটির সাথেই শুরু হতে পারবে না: :values।',
    'email' => ':attribute ফিল্ডটি একটি বৈধ ইমেইল ঠিকানা হতে হবে।',
    'ends_with' => ':attribute ফিল্ডটি নিম্নলিখিত মানগুলির কোনটির সাথেই শেষ হতে হবে: :values।',
    'enum' => ':attribute ফিল্ডটি বৈধ নয়।',
    'exists' => ':attribute ফিল্ডটি বৈধ নয়।',
    'extensions' => ':attribute ফিল্ডে নিম্নলিখিত এক্সটেনশনগুলির একটি থাকতে হবে: :values।',
    'file' => ':attribute ফিল্ডটি একটি ফাইল হতে হবে।',
    'filled' => ':attribute ফিল্ডে একটি মান থাকতে হবে।',
    'gt' => [
        'array' => ':attribute ফিল্ডে :value এর চেয়ে বেশি আইটেম থাকতে হবে।',
        'file' => ':attribute ফিল্ডটি :value কিলোবাইটের চেয়ে বেশি হতে হবে।',
        'numeric' => ':attribute ফিল্ডটি :value এর চেয়ে বেশি হতে হবে।',
        'string' => ':attribute ফিল্ডটি :value অক্ষরের চেয়ে বেশি হতে হবে।',
    ],
    'gte' => [
        'array' => ':attribute ফিল্ডে :value বা তার বেশি আইটেম থাকতে হবে।',
        'file' => ':attribute ফিল্ডটি :value কিলোবাইট বা তার বেশি হতে হবে।',
        'numeric' => ':attribute ফিল্ডটি :value বা তার বেশি হতে হবে।',
        'string' => ':attribute ফিল্ডটি :value অক্ষর বা তার বেশি হতে হবে।',
    ],
    'hex_color' => ':attribute ফিল্ডে একটি বৈধ হেক্সাডেসিমাল রঙ থাকতে হবে।',
    'image' => ':attribute ফিল্ডটি একটি চিত্র হতে হবে।',
    'in' => ':attribute ফিল্ডটি বৈধ নয়।',
    'in_array' => ':attribute ফিল্ডে :other থাকতে হবে।',
    'in_array_keys' => ':attribute ফিল্ডে নিম্নলিখিত কীগুলির একটি থাকতে হবে: :values।',
    'integer' => ':attribute ফিল্ডটি একটি পূর্ণসংখ্যা হতে হবে।',
    'ip' => ':attribute ফিল্ডে একটি বৈধ IP ঠিকানা থাকতে হবে।',
    'ipv4' => ':attribute ফিল্ডে একটি বৈধ IPv4 ঠিকানা থাকতে হবে।',
    'ipv6' => ':attribute ফিল্ডে একটি বৈধ IPv6 ঠিকানা থাকতে হবে।',
    'json' => ':attribute ফিল্ডে একটি বৈধ JSON স্ট্রিং থাকতে হবে।',
    'list' => ':attribute ফিল্ডে একটি তালিকা থাকতে হবে।',
    'lowercase' => ':attribute ফিল্ডে ছোট হাতের অক্ষর থাকতে হবে।',
    'lt' => [
        'array' => ':attribute ফিল্ডে :value এর চেয়ে কম আইটেম থাকতে হবে।',
        'file' => ':attribute ফিল্ডটি :value কিলোবাইটের চেয়ে কম হতে হবে।',
        'numeric' => ':attribute ফিল্ডটি :value এর চেয়ে কম হতে হবে।',
        'string' => ':attribute ফিল্ডটি :value অক্ষরের চেয়ে কম হতে হবে।',
    ],
    'lte' => [
        'array' => ':attribute ফিল্ডে :value এর বেশি আইটেম থাকতে পারবে না।',
        'file' => ':attribute ফিল্ডটি :value কিলোবাইট বা তার কম হতে হবে।',
        'numeric' => ':attribute ফিল্ডটি :value বা তার কম হতে হবে।',
        'string' => ':attribute ফিল্ডটি :value অক্ষর বা তার কম হতে হবে।',
    ],
    'mac_address' => ':attribute ফিল্ডে একটি বৈধ MAC ঠিকানা থাকতে হবে।',
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
