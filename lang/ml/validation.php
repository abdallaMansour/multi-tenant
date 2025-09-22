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

    'accepted' => ':attribute ഫീൽഡ് സ്വീകരിക്കപ്പെടണം.',
    'accepted_if' => ':other :value ആയിരിക്കുമ്പോൾ :attribute ഫീൽഡ് സ്വീകരിക്കപ്പെടണം.',
    'active_url' => ':attribute ഫീൽഡ് ഒരു സാധുവായ URL ആയിരിക്കണം.',
    'after' => ':attribute ഫീൽഡ് :date ന് ശേഷമുള്ള തീയതിയായിരിക്കണം.',
    'after_or_equal' => ':attribute ഫീൽഡ് :date ന് ശേഷമോ അതിന് തുല്യമോ ആയ തീയതിയായിരിക്കണം.',
    'alpha' => ':attribute ഫീൽഡിൽ അക്ഷരങ്ങൾ മാത്രമേ അടങ്ങിയിരിക്കാൻ പാടുള്ളൂ.',
    'alpha_dash' => ':attribute ഫീൽഡിൽ അക്ഷരങ്ങൾ, സംഖ്യകൾ, ഡാഷുകൾ, അണ്ടർസ്കോറുകൾ മാത്രമേ അടങ്ങിയിരിക്കാൻ പാടുള്ളൂ.',
    'alpha_num' => ':attribute ഫീൽഡിൽ അക്ഷരങ്ങളും സംഖ്യകളും മാത്രമേ അടങ്ങിയിരിക്കാൻ പാടുള്ളൂ.',
    'any_of' => ':attribute ഫീൽഡ് സാധുവല്ല.',
    'array' => ':attribute ഫീൽഡ് ഒരു അറേ ആയിരിക്കണം.',
    'ascii' => ':attribute ഫീൽഡിൽ സിംഗിൾ-ബൈറ്റ് അൽഫാന്യൂമെറിക് പ്രതീകങ്ങളും ചിഹ്നങ്ങളും മാത്രമേ അടങ്ങിയിരിക്കാൻ പാടുള്ളൂ.',
    'before' => ':attribute ഫീൽഡ് :date ന് മുമ്പുള്ള തീയതിയായിരിക്കണം.',
    'before_or_equal' => ':attribute ഫീൽഡ് :date ന് മുമ്പോ അതിന് തുല്യമോ ആയ തീയതിയായിരിക്കണം.',
    'between' => [
        'array' => ':attribute ഫീൽഡിൽ :min നും :max നും ഇടയിൽ എലമെന്റുകൾ അടങ്ങിയിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :min നും :max നും ഇടയിൽ കിലോബൈറ്റ് ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :min നും :max നും ഇടയിൽ ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡിൽ :min നും :max നും ഇടയിൽ പ്രതീകങ്ങൾ അടങ്ങിയിരിക്കണം.',
    ],
    'boolean' => ':attribute ഫീൽഡ് ശരിയോ തെറ്റോ ആയിരിക്കണം.',
    'can' => ':attribute ഫീൽഡിൽ അനുവദനീയമല്ലാത്ത മൂല്യം അടങ്ങിയിരിക്കുന്നു.',
    'confirmed' => ':attribute ഫീൽഡിന്റെ സ്ഥിരീകരണം പൊരുത്തപ്പെടുന്നില്ല.',
    'contains' => ':attribute ഫീൽഡിൽ ആവശ്യമായ മൂല്യം അടങ്ങിയിരിക്കുന്നില്ല.',
    'current_password' => 'പാസ്‌വേഡ് തെറ്റാണ്.',
    'date' => ':attribute ഫീൽഡ് ഒരു സാധുവായ തീയതിയായിരിക്കണം.',
    'date_equals' => ':attribute ഫീൽഡ് :date ന് തുല്യമായ തീയതിയായിരിക്കണം.',
    'date_format' => ':attribute ഫീൽഡ് :format ഫോർമാറ്റുമായി പൊരുത്തപ്പെടുന്നില്ല.',
    'decimal' => ':attribute ഫീൽഡിന് :decimal ദശാംശ സ്ഥാനങ്ങൾ ആവശ്യമാണ്.',
    'declined' => ':attribute ഫീൽഡ് നിരസിക്കപ്പെടണം.',
    'declined_if' => ':other :value ആയിരിക്കുമ്പോൾ :attribute ഫീൽഡ് നിരസിക്കപ്പെടണം.',
    'different' => ':attribute ഫീൽഡും :other ഫീൽഡും വ്യത്യസ്തമായിരിക്കണം.',
    'digits' => ':attribute ഫീൽഡിന് :digits അക്കങ്ങൾ ആവശ്യമാണ്.',
    'digits_between' => ':attribute ഫീൽഡിന് :min നും :max നും ഇടയിൽ അക്കങ്ങൾ ആവശ്യമാണ്.',
    'dimensions' => ':attribute ഫീൽഡിന് അസാധുവായ ഇമേജ് അളവുകൾ ഉണ്ട്.',
    'distinct' => ':attribute ഫീൽഡിന് ഒരു ഡുപ്ലിക്കേറ്റ് മൂല്യം ഉണ്ട്.',
    'doesnt_contain' => ':attribute ഫീൽഡിൽ ഇനിപ്പറയുന്ന മൂല്യങ്ങളിൽ ഒന്നും അടങ്ങിയിരിക്കാൻ പാടില്ല: :values.',
    'doesnt_end_with' => ':attribute ഫീൽഡ് ഇനിപ്പറയുന്ന മൂല്യങ്ങളിൽ ഒന്നിനോടും അവസാനിക്കാൻ പാടില്ല: :values.',
    'doesnt_start_with' => ':attribute ഫീൽഡ് ഇനിപ്പറയുന്ന മൂല്യങ്ങളിൽ ഒന്നിനോടും ആരംഭിക്കാൻ പാടില്ല: :values.',
    'email' => ':attribute ഫീൽഡ് ഒരു സാധുവായ ഇമെയിൽ വിലാസമായിരിക്കണം.',
    'ends_with' => ':attribute ഫീൽഡ് ഇനിപ്പറയുന്ന മൂല്യങ്ങളിൽ ഒന്നിനോട് അവസാനിക്കണം: :values.',
    'enum' => ':attribute ഫീൽഡ് സാധുവല്ല.',
    'exists' => ':attribute ഫീൽഡ് സാധുവല്ല.',
    'extensions' => ':attribute ഫീൽഡിന് ഇനിപ്പറയുന്ന എക്സ്റ്റൻഷനുകളിൽ ഒന്ന് ആവശ്യമാണ്: :values.',
    'file' => ':attribute ഫീൽഡ് ഒരു ഫയൽ ആയിരിക്കണം.',
    'filled' => ':attribute ഫീൽഡിന് ഒരു മൂല്യം ആവശ്യമാണ്.',
    'gt' => [
        'array' => ':attribute ഫീൽഡിൽ :value നേക്കാൾ കൂടുതൽ എലമെന്റുകൾ അടങ്ങിയിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :value കിലോബൈറ്റിനേക്കാൾ വലുതായിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :value നേക്കാൾ വലുതായിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് :value പ്രതീകങ്ങളേക്കാൾ വലുതായിരിക്കണം.',
    ],
    'gte' => [
        'array' => ':attribute ഫീൽഡിൽ :value അല്ലെങ്കിൽ അതിലധികം എലമെന്റുകൾ അടങ്ങിയിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :value കിലോബൈറ്റിനേക്കാൾ വലുതോ തുല്യമോ ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :value നേക്കാൾ വലുതോ തുല്യമോ ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് :value പ്രതീകങ്ങളേക്കാൾ വലുതോ തുല്യമോ ആയിരിക്കണം.',
    ],
    'hex_color' => ':attribute ഫീൽഡ് ഒരു സാധുവായ ഹെക്സ് കളർ ആയിരിക്കണം.',
    'image' => ':attribute ഫീൽഡ് ഒരു ഇമേജ് ആയിരിക്കണം.',
    'in' => ':attribute ഫീൽഡ് സാധുവല്ല.',
    'in_array' => ':attribute ഫീൽഡ് :other ൽ നിലവിലുണ്ടായിരിക്കണം.',
    'in_array_keys' => ':attribute ഫീൽഡിൽ ഇനിപ്പറയുന്ന കീകളിൽ ഒന്ന് അടങ്ങിയിരിക്കണം: :values.',
    'integer' => ':attribute ഫീൽഡ് ഒരു പൂർണ്ണസംഖ്യ ആയിരിക്കണം.',
    'ip' => ':attribute ഫീൽഡ് ഒരു സാധുവായ IP വിലാസമായിരിക്കണം.',
    'ipv4' => ':attribute ഫീൽഡ് ഒരു സാധുവായ IPv4 വിലാസമായിരിക്കണം.',
    'ipv6' => ':attribute ഫീൽഡ് ഒരു സാധുവായ IPv6 വിലാസമായിരിക്കണം.',
    'json' => ':attribute ഫീൽഡ് ഒരു സാധുവായ JSON സ്ട്രിംഗ് ആയിരിക്കണം.',
    'list' => ':attribute ഫീൽഡ് ഒരു ലിസ്റ്റ് ആയിരിക്കണം.',
    'lowercase' => ':attribute ഫീൽഡ് ചെറിയക്ഷരത്തിൽ ആയിരിക്കണം.',
    'lt' => [
        'array' => ':attribute ഫീൽഡിൽ :value നേക്കാൾ കുറവ് എലമെന്റുകൾ അടങ്ങിയിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :value കിലോബൈറ്റിനേക്കാൾ ചെറുതായിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :value നേക്കാൾ ചെറുതായിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് :value പ്രതീകങ്ങളേക്കാൾ ചെറുതായിരിക്കണം.',
    ],
    'lte' => [
        'array' => ':attribute ഫീൽഡിൽ :value നേക്കാൾ കൂടുതൽ എലമെന്റുകൾ അടങ്ങിയിരിക്കാൻ പാടില്ല.',
        'file' => ':attribute ഫീൽഡ് :value കിലോബൈറ്റിനേക്കാൾ ചെറുതോ തുല്യമോ ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :value നേക്കാൾ ചെറുതോ തുല്യമോ ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് :value പ്രതീകങ്ങളേക്കാൾ ചെറുതോ തുല്യമോ ആയിരിക്കണം.',
    ],
    'mac_address' => ':attribute ഫീൽഡ് ഒരു സാധുവായ MAC വിലാസമായിരിക്കണം.',
    'max' => [
        'array' => ':attribute ഫീൽഡിൽ :max നേക്കാൾ കൂടുതൽ എലമെന്റുകൾ അടങ്ങിയിരിക്കാൻ പാടില്ല.',
        'file' => ':attribute ഫീൽഡ് :max കിലോബൈറ്റിനേക്കാൾ വലുതായിരിക്കാൻ പാടില്ല.',
        'numeric' => ':attribute ഫീൽഡ് :max നേക്കാൾ വലുതായിരിക്കാൻ പാടില്ല.',
        'string' => ':attribute ഫീൽഡ് :max പ്രതീകങ്ങളേക്കാൾ വലുതായിരിക്കാൻ പാടില്ല.',
    ],
    'max_digits' => ':attribute ഫീൽഡിന് :max നേക്കാൾ കൂടുതൽ അക്കങ്ങൾ ആവശ്യമില്ല.',
    'mimes' => ':attribute ഫീൽഡ് ഇനിപ്പറയുന്ന തരത്തിലുള്ള ഫയൽ ആയിരിക്കണം: :values.',
    'mimetypes' => ':attribute ഫീൽഡ് ഇനിപ്പറയുന്ന തരത്തിലുള്ള ഫയൽ ആയിരിക്കണം: :values.',
    'min' => [
        'array' => ':attribute ഫീൽഡിൽ കുറഞ്ഞത് :min എലമെന്റുകൾ അടങ്ങിയിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് കുറഞ്ഞത് :min കിലോബൈറ്റ് ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് കുറഞ്ഞത് :min ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡിൽ കുറഞ്ഞത് :min പ്രതീകങ്ങൾ അടങ്ങിയിരിക്കണം.',
    ],
    'min_digits' => ':attribute ഫീൽഡിന് കുറഞ്ഞത് :min അക്കങ്ങൾ ആവശ്യമാണ്.',
    'missing' => ':attribute ഫീൽഡ് ഇല്ലാതിരിക്കണം.',
    'missing_if' => ':other :value ആയിരിക്കുമ്പോൾ :attribute ഫീൽഡ് ഇല്ലാതിരിക്കണം.',
    'missing_unless' => ':other :value അല്ലാത്തിടത്തോളം :attribute ഫീൽഡ് ഇല്ലാതിരിക്കണം.',
    'missing_with' => ':values നിലവിലുള്ളപ്പോൾ :attribute ഫീൽഡ് ഇല്ലാതിരിക്കണം.',
    'missing_with_all' => ':values എല്ലാം നിലവിലുള്ളപ്പോൾ :attribute ഫീൽഡ് ഇല്ലാതിരിക്കണം.',
    'multiple_of' => ':attribute ഫീൽഡ് :value ന്റെ ഗുണിതമായിരിക്കണം.',
    'not_in' => ':attribute ഫീൽഡ് സാധുവല്ല.',
    'not_regex' => ':attribute ഫീൽഡിന്റെ ഫോർമാറ്റ് സാധുവല്ല.',
    'numeric' => ':attribute ഫീൽഡ് സംഖ്യാത്മകമായിരിക്കണം.',
    'password' => 'പാസ്‌വേഡ് തെറ്റാണ്.',
    'present' => ':attribute ഫീൽഡ് നിലവിലുണ്ടായിരിക്കണം.',
    'prohibited' => ':attribute ഫീൽഡ് നിരോധിച്ചിരിക്കുന്നു.',
    'prohibited_if' => ':other :value ആയിരിക്കുമ്പോൾ :attribute ഫീൽഡ് നിരോധിച്ചിരിക്കുന്നു.',
    'prohibited_unless' => ':other :values ൽ ഇല്ലാത്തിടത്തോളം :attribute ഫീൽഡ് നിരോധിച്ചിരിക്കുന്നു.',
    'prohibits' => ':attribute ഫീൽഡ് :other ന്റെ നിലവിലുള്ളതിനെ നിരോധിക്കുന്നു.',
    'regex' => ':attribute ഫീൽഡിന്റെ ഫോർമാറ്റ് സാധുവല്ല.',
    'required' => ':attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_array_keys' => ':attribute ഫീൽഡിൽ ഇനിപ്പറയുന്നവയ്ക്കായി എൻട്രികൾ അടങ്ങിയിരിക്കണം: :values.',
    'required_if' => ':other :value ആയിരിക്കുമ്പോൾ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_if_accepted' => ':other സ്വീകരിക്കപ്പെടുമ്പോൾ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_unless' => ':other :values ൽ ഇല്ലാത്തിടത്തോളം :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_with' => ':values നിലവിലുള്ളപ്പോൾ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_with_all' => ':values എല്ലാം നിലവിലുള്ളപ്പോൾ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_without' => ':values നിലവിലില്ലാത്തപ്പോൾ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_without_all' => ':values എല്ലാം നിലവിലില്ലാത്തപ്പോൾ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'same' => ':attribute ഫീൽഡും :other ഫീൽഡും പൊരുത്തപ്പെടണം.',
    'size' => [
        'array' => ':attribute ഫീൽഡിൽ :size എലമെന്റുകൾ അടങ്ങിയിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :size കിലോബൈറ്റ് ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :size ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡിൽ :size പ്രതീകങ്ങൾ അടങ്ങിയിരിക്കണം.',
    ],
    'starts_with' => ':attribute ഫീൽഡ് ഇനിപ്പറയുന്ന മൂല്യങ്ങളിൽ ഒന്നിനോട് ആരംഭിക്കണം: :values.',
    'string' => ':attribute ഫീൽഡ് ഒരു സ്ട്രിംഗ് ആയിരിക്കണം.',
    'timezone' => ':attribute ഫീൽഡ് ഒരു സാധുവായ ടൈംസോൺ ആയിരിക്കണം.',
    'unique' => ':attribute ഫീൽഡ് ഇതിനകം എടുത്തിരിക്കുന്നു.',
    'uploaded' => ':attribute ഫീൽഡ് അപ്‌ലോഡ് ചെയ്യാൻ കഴിഞ്ഞില്ല.',
    'uppercase' => ':attribute ഫീൽഡ് വലിയക്ഷരത്തിൽ ആയിരിക്കണം.',
    'url' => ':attribute ഫീൽഡ് ഒരു സാധുവായ URL ആയിരിക്കണം.',
    'ulid' => ':attribute ഫീൽഡ് ഒരു സാധുവായ ULID ആയിരിക്കണം.',
    'uuid' => ':attribute ഫീൽഡ് ഒരു സാധുവായ UUID ആയിരിക്കണം.',

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
            'rule-name' => 'കസ്റ്റം സന്ദേശം',
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
        'name' => 'പേര്',
        'username' => 'ഉപയോക്തൃനാമം',
        'email' => 'ഇമെയിൽ വിലാസം',
        'password' => 'പാസ്‌വേഡ്',
        'password_confirmation' => 'പാസ്‌വേഡ് സ്ഥിരീകരണം',
        'city' => 'നഗരം',
        'country' => 'രാജ്യം',
        'address' => 'വിലാസം',
        'phone' => 'ഫോൺ',
        'mobile' => 'മൊബൈൽ',
        'age' => 'വയസ്സ്',
        'sex' => 'ലിംഗം',
        'gender' => 'ലിംഗം',
        'day' => 'ദിവസം',
        'month' => 'മാസം',
        'year' => 'വർഷം',
        'hour' => 'മണിക്കൂർ',
        'minute' => 'മിനിറ്റ്',
        'second' => 'സെക്കൻഡ്',
        'title' => 'തലക്കെട്ട്',
        'content' => 'ഉള്ളടക്കം',
        'description' => 'വിവരണം',
        'excerpt' => 'ചുരുക്കം',
        'date' => 'തീയതി',
        'time' => 'സമയം',
        'available' => 'ലഭ്യമാണ്',
        'size' => 'വലിപ്പം',
    ],

];
