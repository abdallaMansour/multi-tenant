<?php

return [
    // Page Title
    'page_title' => '테넌트 등록',

    // Step Titles
    'step_email' => '이메일',
    'step_verify_otp' => 'OTP 확인',
    'step_user_info' => '사용자 정보',

    // Step 1: Email
    'email_title' => '이메일 주소를 입력하세요',
    'email_description' => '이메일 확인을 위한 인증 코드를 보내드립니다.',
    'email_label' => '이메일 주소',
    'email_placeholder' => '이메일 주소를 입력하세요',
    'email_sending' => '전송 중...',
    'email_button' => '인증 코드 보내기',

    // Step 2: OTP Verification
    'otp_title' => '이메일을 확인하세요',
    'otp_description' => '이메일 주소로 보내진 4자리 코드를 입력하세요.',
    'otp_verifying' => '확인 중...',
    'otp_button' => '코드 확인',
    'otp_resend' => '코드 재전송',
    'otp_resending' => '재전송 중...',
    'otp_invalid' => '유효한 4자리 코드를 입력하세요.',

    // Step 3: User Information
    'user_info_title' => '프로필을 완성하세요',
    'user_info_description' => '등록을 완료하기 위해 정보를 제공해 주세요.',
    'name_label' => '전체 이름',
    'name_placeholder' => '전체 이름을 입력하세요',
    'phone_label' => '전화번호',
    'phone_placeholder' => '전화번호를 입력하세요',
    'business_activity_label' => '비즈니스 활동',
    'main_language_label' => '웹사이트 메인 언어',
    'sub_language_label' => '웹사이트 서브 언어',
    'admin_main_language_label' => '관리자 패널 메인 언어',
    'admin_sub_language_label' => '관리자 패널 서브 언어',
    'completing' => '완료 중...',
    'complete_registration' => '등록 완료',
    'previous' => '이전',
    'select_all_required' => '모든 필수 옵션을 선택하세요.',

    // Success Step
    'success_title' => '등록 성공!',
    'success_description' => '테넌트 계정이 성공적으로 생성되었습니다. 이제 대시보드에 접근할 수 있습니다.',
    'go_to_login' => '로그인으로 이동',

    // Language Options
    'language_english' => '영어',
    'language_arabic' => '아랍어',
    'language_french' => '프랑스어',
    'language_spanish' => '스페인어',
    'language_bengali' => '벵골어',
    'language_hindi' => '힌디어',
    'language_japanese' => '일본어',
    'language_korean' => '한국어',
    'language_malayalam' => '말라얄람어',
    'language_portuguese' => '포르투갈어',
    'language_chinese' => '중국어',

    // Controller Messages
    'mail_sent' => '메일 전송됨',
    'invalid_otp' => '유효하지 않은 OTP 코드',
    'otp_expired' => 'OTP 코드 만료',
    'email_verified' => '이메일이 성공적으로 확인됨',
    'no_database_credential' => '활성 데이터베이스 자격 증명을 찾을 수 없음',
    'invalid_otp_expired' => '유효하지 않은 OTP 코드 또는 만료',
    'username_exists' => '사용자 이름이 이미 존재함',
    'registration_completed' => '등록이 성공적으로 완료됨',

    // Error Messages
    'error_occurred' => '오류가 발생했습니다',
    'network_error' => '네트워크 오류 발생',
    'validation_error' => '검증 오류',
    'server_error' => '서버 오류 발생',

    // Form Validation
    'email_required' => '이메일 주소가 필요합니다',
    'email_invalid' => '유효한 이메일 주소를 입력하세요',
    'name_required' => '전체 이름이 필요합니다',
    'phone_required' => '전화번호가 필요합니다',
    'business_activity_required' => '비즈니스 활동이 필요합니다',
    'main_language_required' => '메인 언어가 필요합니다',
    'sub_language_required' => '서브 언어가 필요합니다',
    'admin_main_language_required' => '관리자 메인 언어가 필요합니다',
    'admin_sub_language_required' => '관리자 서브 언어가 필요합니다',

    // Additional Messages
    'loading' => '로딩 중...',
    'please_wait' => '잠시 기다려 주세요...',
    'try_again' => '다시 시도',
    'contact_support' => '지원팀에 문의',
];
