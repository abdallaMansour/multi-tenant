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

    'accepted' => 'फ़ील्ड :attribute को स्वीकार किया जाना चाहिए।',
    'accepted_if' => 'फ़ील्ड :attribute को स्वीकार किया जाना चाहिए जब :other :value हो।',
    'active_url' => 'फ़ील्ड :attribute एक वैध URL होना चाहिए।',
    'after' => 'फ़ील्ड :attribute :date के बाद की तारीख होनी चाहिए।',
    'after_or_equal' => 'फ़ील्ड :attribute :date के बाद या उसके बराबर की तारीख होनी चाहिए।',
    'alpha' => 'फ़ील्ड :attribute में केवल अक्षर हो सकते हैं।',
    'alpha_dash' => 'फ़ील्ड :attribute में केवल अक्षर, संख्याएं, डैश और अंडरस्कोर हो सकते हैं।',
    'alpha_num' => 'फ़ील्ड :attribute में केवल अक्षर और संख्याएं हो सकती हैं।',
    'any_of' => 'फ़ील्ड :attribute वैध नहीं है।',
    'array' => 'फ़ील्ड :attribute एक सरणी होना चाहिए।',
    'ascii' => 'फ़ील्ड :attribute में केवल एकल-बाइट अल्फ़ान्यूमेरिक वर्ण और प्रतीक हो सकते हैं।',
    'before' => 'फ़ील्ड :attribute :date से पहले की तारीख होनी चाहिए।',
    'before_or_equal' => 'फ़ील्ड :attribute :date से पहले या उसके बराबर की तारीख होनी चाहिए।',
    'between' => [
        'array' => 'फ़ील्ड :attribute में :min और :max के बीच तत्व होने चाहिए।',
        'file' => 'फ़ील्ड :attribute का आकार :min और :max किलोबाइट के बीच होना चाहिए।',
        'numeric' => 'फ़ील्ड :attribute :min और :max के बीच होना चाहिए।',
        'string' => 'फ़ील्ड :attribute में :min और :max के बीच वर्ण होने चाहिए।',
    ],
    'boolean' => 'फ़ील्ड :attribute सत्य या असत्य होना चाहिए।',
    'can' => 'फ़ील्ड :attribute में एक अनधिकृत मान है।',
    'confirmed' => 'फ़ील्ड :attribute की पुष्टि मेल नहीं खाती।',
    'contains' => 'फ़ील्ड :attribute में आवश्यक मान नहीं है।',
    'current_password' => 'पासवर्ड गलत है।',
    'date' => 'फ़ील्ड :attribute एक वैध तारीख होनी चाहिए।',
    'date_equals' => 'फ़ील्ड :attribute :date के बराबर तारीख होनी चाहिए।',
    'date_format' => 'फ़ील्ड :attribute :format प्रारूप से मेल नहीं खाता।',
    'decimal' => 'फ़ील्ड :attribute में :decimal दशमलव स्थान होने चाहिए।',
    'declined' => 'फ़ील्ड :attribute को अस्वीकार किया जाना चाहिए।',
    'declined_if' => 'फ़ील्ड :attribute को अस्वीकार किया जाना चाहिए जब :other :value हो।',
    'different' => 'फ़ील्ड :attribute और :other अलग होने चाहिए।',
    'digits' => 'फ़ील्ड :attribute में :digits अंक होने चाहिए।',
    'digits_between' => 'फ़ील्ड :attribute में :min और :max के बीच अंक होने चाहिए।',
    'dimensions' => 'फ़ील्ड :attribute में अमान्य छवि आयाम हैं।',
    'distinct' => 'फ़ील्ड :attribute में एक डुप्लिकेट मान है।',
    'doesnt_contain' => 'फ़ील्ड :attribute में निम्नलिखित मानों में से कोई भी नहीं हो सकता: :values।',
    'doesnt_end_with' => 'फ़ील्ड :attribute निम्नलिखित मानों में से किसी के साथ समाप्त नहीं हो सकता: :values।',
    'doesnt_start_with' => 'फ़ील्ड :attribute निम्नलिखित मानों में से किसी के साथ शुरू नहीं हो सकता: :values।',
    'email' => 'फ़ील्ड :attribute एक वैध ईमेल पता होना चाहिए।',
    'ends_with' => 'फ़ील्ड :attribute निम्नलिखित मानों में से किसी के साथ समाप्त होना चाहिए: :values।',
    'enum' => 'फ़ील्ड :attribute वैध नहीं है।',
    'exists' => 'फ़ील्ड :attribute वैध नहीं है।',
    'extensions' => 'फ़ील्ड :attribute में निम्नलिखित एक्सटेंशन में से एक होना चाहिए: :values।',
    'file' => 'फ़ील्ड :attribute एक फ़ाइल होनी चाहिए।',
    'filled' => 'फ़ील्ड :attribute का मान होना चाहिए।',
    'gt' => [
        'array' => 'फ़ील्ड :attribute में :value से अधिक तत्व होने चाहिए।',
        'file' => 'फ़ील्ड :attribute :value किलोबाइट से बड़ा होना चाहिए।',
        'numeric' => 'फ़ील्ड :attribute :value से बड़ा होना चाहिए।',
        'string' => 'फ़ील्ड :attribute :value वर्णों से बड़ा होना चाहिए।',
    ],
    'gte' => [
        'array' => 'फ़ील्ड :attribute में :value या अधिक तत्व होने चाहिए।',
        'file' => 'फ़ील्ड :attribute :value किलोबाइट से बड़ा या बराबर होना चाहिए।',
        'numeric' => 'फ़ील्ड :attribute :value से बड़ा या बराबर होना चाहिए।',
        'string' => 'फ़ील्ड :attribute :value वर्णों से बड़ा या बराबर होना चाहिए।',
    ],
    'hex_color' => 'फ़ील्ड :attribute एक वैध हेक्स रंग होना चाहिए।',
    'image' => 'फ़ील्ड :attribute एक छवि होनी चाहिए।',
    'in' => 'फ़ील्ड :attribute वैध नहीं है।',
    'in_array' => 'फ़ील्ड :attribute :other में मौजूद होना चाहिए।',
    'in_array_keys' => 'फ़ील्ड :attribute में निम्नलिखित कुंजियों में से एक होनी चाहिए: :values।',
    'integer' => 'फ़ील्ड :attribute एक पूर्णांक होना चाहिए।',
    'ip' => 'फ़ील्ड :attribute एक वैध IP पता होना चाहिए।',
    'ipv4' => 'फ़ील्ड :attribute एक वैध IPv4 पता होना चाहिए।',
    'ipv6' => 'फ़ील्ड :attribute एक वैध IPv6 पता होना चाहिए।',
    'json' => 'फ़ील्ड :attribute एक वैध JSON स्ट्रिंग होनी चाहिए।',
    'list' => 'फ़ील्ड :attribute एक सूची होनी चाहिए।',
    'lowercase' => 'फ़ील्ड :attribute लोअरकेस में होना चाहिए।',
    'lt' => [
        'array' => 'फ़ील्ड :attribute में :value से कम तत्व होने चाहिए।',
        'file' => 'फ़ील्ड :attribute :value किलोबाइट से छोटा होना चाहिए।',
        'numeric' => 'फ़ील्ड :attribute :value से छोटा होना चाहिए।',
        'string' => 'फ़ील्ड :attribute :value वर्णों से छोटा होना चाहिए।',
    ],
    'lte' => [
        'array' => 'फ़ील्ड :attribute में :value से अधिक तत्व नहीं होने चाहिए।',
        'file' => 'फ़ील्ड :attribute :value किलोबाइट से छोटा या बराबर होना चाहिए।',
        'numeric' => 'फ़ील्ड :attribute :value से छोटा या बराबर होना चाहिए।',
        'string' => 'फ़ील्ड :attribute :value वर्णों से छोटा या बराबर होना चाहिए।',
    ],
    'mac_address' => 'फ़ील्ड :attribute एक वैध MAC पता होना चाहिए।',
    'max' => [
        'array' => 'फ़ील्ड :attribute में :max से अधिक तत्व नहीं होने चाहिए।',
        'file' => 'फ़ील्ड :attribute :max किलोबाइट से बड़ा नहीं होना चाहिए।',
        'numeric' => 'फ़ील्ड :attribute :max से बड़ा नहीं होना चाहिए।',
        'string' => 'फ़ील्ड :attribute :max वर्णों से बड़ा नहीं होना चाहिए।',
    ],
    'max_digits' => 'फ़ील्ड :attribute में :max से अधिक अंक नहीं होने चाहिए।',
    'mimes' => 'फ़ील्ड :attribute निम्नलिखित प्रकार की फ़ाइल होनी चाहिए: :values।',
    'mimetypes' => 'फ़ील्ड :attribute निम्नलिखित प्रकार की फ़ाइल होनी चाहिए: :values।',
    'min' => [
        'array' => 'फ़ील्ड :attribute में कम से कम :min तत्व होने चाहिए।',
        'file' => 'फ़ील्ड :attribute कम से कम :min किलोबाइट का होना चाहिए।',
        'numeric' => 'फ़ील्ड :attribute कम से कम :min का होना चाहिए।',
        'string' => 'फ़ील्ड :attribute में कम से कम :min वर्ण होने चाहिए।',
    ],
    'min_digits' => 'फ़ील्ड :attribute में कम से कम :min अंक होने चाहिए।',
    'missing' => 'फ़ील्ड :attribute अनुपस्थित होना चाहिए।',
    'missing_if' => 'फ़ील्ड :attribute अनुपस्थित होना चाहिए जब :other :value हो।',
    'missing_unless' => 'फ़ील्ड :attribute अनुपस्थित होना चाहिए जब तक :other :value न हो।',
    'missing_with' => 'फ़ील्ड :attribute अनुपस्थित होना चाहिए जब :values मौजूद हो।',
    'missing_with_all' => 'फ़ील्ड :attribute अनुपस्थित होना चाहिए जब :values मौजूद हों।',
    'multiple_of' => 'फ़ील्ड :attribute :value का गुणक होना चाहिए।',
    'not_in' => 'फ़ील्ड :attribute वैध नहीं है।',
    'not_regex' => 'फ़ील्ड :attribute का प्रारूप वैध नहीं है।',
    'numeric' => 'फ़ील्ड :attribute संख्यात्मक होना चाहिए।',
    'password' => 'पासवर्ड गलत है।',
    'present' => 'फ़ील्ड :attribute मौजूद होना चाहिए।',
    'prohibited' => 'फ़ील्ड :attribute निषिद्ध है।',
    'prohibited_if' => 'फ़ील्ड :attribute निषिद्ध है जब :other :value हो।',
    'prohibited_unless' => 'फ़ील्ड :attribute निषिद्ध है जब तक :other :values में न हो।',
    'prohibits' => 'फ़ील्ड :attribute :other के मौजूद होने को निषिद्ध करता है।',
    'regex' => 'फ़ील्ड :attribute का प्रारूप वैध नहीं है।',
    'required' => 'फ़ील्ड :attribute आवश्यक है।',
    'required_array_keys' => 'फ़ील्ड :attribute में निम्नलिखित के लिए प्रविष्टियां होनी चाहिए: :values।',
    'required_if' => 'फ़ील्ड :attribute आवश्यक है जब :other :value हो।',
    'required_if_accepted' => 'फ़ील्ड :attribute आवश्यक है जब :other स्वीकार किया जाता है।',
    'required_unless' => 'फ़ील्ड :attribute आवश्यक है जब तक :other :values में न हो।',
    'required_with' => 'फ़ील्ड :attribute आवश्यक है जब :values मौजूद हो।',
    'required_with_all' => 'फ़ील्ड :attribute आवश्यक है जब :values मौजूद हों।',
    'required_without' => 'फ़ील्ड :attribute आवश्यक है जब :values मौजूद न हो।',
    'required_without_all' => 'फ़ील्ड :attribute आवश्यक है जब :values में से कोई भी मौजूद न हो।',
    'same' => 'फ़ील्ड :attribute और :other मेल खाने चाहिए।',
    'size' => [
        'array' => 'फ़ील्ड :attribute में :size तत्व होने चाहिए।',
        'file' => 'फ़ील्ड :attribute :size किलोबाइट का होना चाहिए।',
        'numeric' => 'फ़ील्ड :attribute :size का होना चाहिए।',
        'string' => 'फ़ील्ड :attribute में :size वर्ण होने चाहिए।',
    ],
    'starts_with' => 'फ़ील्ड :attribute निम्नलिखित मानों में से किसी के साथ शुरू होना चाहिए: :values।',
    'string' => 'फ़ील्ड :attribute एक स्ट्रिंग होनी चाहिए।',
    'timezone' => 'फ़ील्ड :attribute एक वैध समय क्षेत्र होना चाहिए।',
    'unique' => 'फ़ील्ड :attribute पहले से लिया गया है।',
    'uploaded' => 'फ़ील्ड :attribute अपलोड नहीं किया जा सका।',
    'uppercase' => 'फ़ील्ड :attribute अपरकेस में होना चाहिए।',
    'url' => 'फ़ील्ड :attribute एक वैध URL होना चाहिए।',
    'ulid' => 'फ़ील्ड :attribute एक वैध ULID होना चाहिए।',
    'uuid' => 'फ़ील्ड :attribute एक वैध UUID होना चाहिए।',

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
            'rule-name' => 'कस्टम संदेश',
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
        'name' => 'नाम',
        'username' => 'उपयोगकर्ता नाम',
        'email' => 'ईमेल पता',
        'password' => 'पासवर्ड',
        'password_confirmation' => 'पासवर्ड पुष्टि',
        'city' => 'शहर',
        'country' => 'देश',
        'address' => 'पता',
        'phone' => 'फोन',
        'mobile' => 'मोबाइल',
        'age' => 'उम्र',
        'sex' => 'लिंग',
        'gender' => 'लिंग',
        'day' => 'दिन',
        'month' => 'महीना',
        'year' => 'साल',
        'hour' => 'घंटा',
        'minute' => 'मिनट',
        'second' => 'सेकंड',
        'title' => 'शीर्षक',
        'content' => 'सामग्री',
        'description' => 'विवरण',
        'excerpt' => 'अंश',
        'date' => 'तारीख',
        'time' => 'समय',
        'available' => 'उपलब्ध',
        'size' => 'आकार',
    ],

];
