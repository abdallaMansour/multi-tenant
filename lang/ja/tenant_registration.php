<?php

return [
    // Page Title
    'page_title' => 'テナント登録',

    // Step Titles
    'step_email' => 'メール',
    'step_verify_otp' => 'OTP確認',
    'step_user_info' => 'ユーザー情報',

    // Step 1: Email
    'email_title' => 'メールアドレスを入力してください',
    'email_description' => 'メール確認のための認証コードを送信します。',
    'email_label' => 'メールアドレス',
    'email_placeholder' => 'メールアドレスを入力してください',
    'email_sending' => '送信中...',
    'email_button' => '認証コードを送信',

    // Step 2: OTP Verification
    'otp_title' => 'メールを確認してください',
    'otp_description' => 'メールアドレスに送信された4桁のコードを入力してください。',
    'otp_verifying' => '確認中...',
    'otp_button' => 'コードを確認',
    'otp_resend' => 'コードを再送信',
    'otp_resending' => '再送信中...',
    'otp_invalid' => '有効な4桁のコードを入力してください。',

    // Step 3: User Information
    'user_info_title' => 'プロフィールを完了してください',
    'user_info_description' => '登録を完了するために情報を提供してください。',
    'name_label' => 'フルネーム',
    'name_placeholder' => 'フルネームを入力してください',
    'phone_label' => '電話番号',
    'phone_placeholder' => '電話番号を入力してください',
    'business_activity_label' => 'ビジネス活動',
    'main_language_label' => 'ウェブサイトのメイン言語',
    'sub_language_label' => 'ウェブサイトのサブ言語',
    'admin_main_language_label' => '管理パネルのメイン言語',
    'admin_sub_language_label' => '管理パネルのサブ言語',
    'completing' => '完了中...',
    'complete_registration' => '登録を完了',
    'previous' => '前へ',
    'select_all_required' => 'すべての必須オプションを選択してください。',

    // Success Step
    'success_title' => '登録成功！',
    'success_description' => 'テナントアカウントが正常に作成されました。ダッシュボードにアクセスできます。',
    'go_to_login' => 'ログインに移動',

    // Language Options
    'language_english' => '英語',
    'language_arabic' => 'アラビア語',
    'language_french' => 'フランス語',
    'language_spanish' => 'スペイン語',
    'language_bengali' => 'ベンガル語',
    'language_hindi' => 'ヒンディー語',
    'language_japanese' => '日本語',
    'language_korean' => '韓国語',
    'language_malayalam' => 'マラヤーラム語',
    'language_portuguese' => 'ポルトガル語',
    'language_chinese' => '中国語',

    // Controller Messages
    'mail_sent' => 'メール送信済み',
    'invalid_otp' => '無効なOTPコード',
    'otp_expired' => 'OTPコードの有効期限切れ',
    'email_verified' => 'メールが正常に確認されました',
    'no_database_credential' => 'アクティブなデータベース認証情報が見つかりません',
    'invalid_otp_expired' => '無効なOTPコードまたは期限切れ',
    'username_exists' => 'ユーザー名が既に存在します',
    'registration_completed' => '登録が正常に完了しました',

    // Error Messages
    'error_occurred' => 'エラーが発生しました',
    'network_error' => 'ネットワークエラーが発生しました',
    'validation_error' => '検証エラー',
    'server_error' => 'サーバーエラーが発生しました',

    // Form Validation
    'email_required' => 'メールアドレスが必要です',
    'email_invalid' => '有効なメールアドレスを入力してください',
    'name_required' => 'フルネームが必要です',
    'phone_required' => '電話番号が必要です',
    'business_activity_required' => 'ビジネス活動が必要です',
    'main_language_required' => 'メイン言語が必要です',
    'sub_language_required' => 'サブ言語が必要です',
    'admin_main_language_required' => '管理メイン言語が必要です',
    'admin_sub_language_required' => '管理サブ言語が必要です',

    // Additional Messages
    'loading' => '読み込み中...',
    'please_wait' => 'お待ちください...',
    'try_again' => '再試行',
    'contact_support' => 'サポートに連絡',
];
