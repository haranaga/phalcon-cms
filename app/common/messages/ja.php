<?php
use Phalcon\Validation\Validator\Email;

$messages =[
    // For Debug
    'lang' => 'ja-jp',
    'test' => 'テスト！(jp)',
    'menu' => 'メニュー',

    // Field name and index value
    'user' => 'ユーザー',
    'user_id' => 'ID',
    'user_name' => '氏名',
    'user_display_name' => '表示名',
    'user_login' => 'ログイン名',
    'user_email' => 'メールアドレス',
    'user_password' => 'パスワード',
    'user_password_confirm' => 'パスワード確認',
    'user_agree' => '利用規約',
    'user_status' => 'ステータス',
    'user_status_valid' => '有効',
    'user_status_invalid' => '無効',
    'user_status_check' => 'メール未認証',
    'user_role' => 'アカウント権限',
    'user_role_admin' => '管理者',
    'admin' => '管理者',
    'user_role_owner' => 'サイトオーナー',
    'user_role_editor' => '編集者',
    'user_role_blogger' => '投稿者',
    'user_role_open' => '一般',
    'user_role_ghost' => '架空',
    'user_image' => 'プロフィール画像',

    'site' => 'サイト',
    'site_id' => 'ID',
    'site_name' => 'サイト名',
    'site_domain' => 'ドメイン',
    'site_url' => 'URL',
    'site_title' => 'タイトル',
    'site_description' => 'description',
    'site_keywords' => 'keywords',
    'site_status' => 'ステータス',
    'site_status_valid' => '有効',
    'site_status_invalid' => '無効',
    'site_created_at' => '作成日',
    'site_update_at' => '更新日',


    // Action
    'action_new' => '新規登録',
    'action_edit' => '編集',
    'action_delete' => '削除',
    'action_duplicate' => '複製',
    'action_trash' => 'ゴミ箱',
    'action_search' => '検索',
    'action_index' => '一覧',
    'action_save' => '保存',
    'action_recover' => '復旧',

    // Email
    'signup_mail_title' => 'アカウント登録確認',


    // Messages, Titles
    'All' => '全',
    'Already have an account?' => 'すでに登録済みの方',
    'BulkAction' => '一括操作',
    'Execute' => '実行',
    'Sign in' => 'ログイン',
    'Sign up' => '登録',
    'Search' => '検索',
    'Edit' => '編集',
    'Trash' => 'ゴミ箱',
    'Recycle' => '再利用',
    'is required' => '%name%を入力してください',
    'is alphanumeric characters' => '%name%は半角英数字です',
    'is email format' => '正しいEメールアドレスを入力してください',
    'Please input' => '%name%を入力してください',
    'not match' => '%a%と%b%が合っていません',
    'Agree with terms of use?' => '<a href="%link%">ご利用規約</a>に同意する',
    'Please agree' => 'ご利用規約に同意をお願いします',
    'Password strength weak' => 'パスワードが簡単すぎます',
    'Password strength strong' => 'いいパスワードです',
    'You have error' => '以下の項目を確認してください',
    'Success' => '%name%完了しました',
    'Create success' => '新規作成しました',
    'Done' => '完了',
    'User exists' => '%name%はすでに登録されています',
    'Site domain exists' => '%name%はすでに登録されています',
    'Page' => '%name%ページ',
    'Total' => '全%name%件',

    'We sent a e-mail to the address, Please check your mail and access to URL in the mail.' => 'メールアドレスにメールを送信しました。<br>メール内にあるURLにアクセスして、アカウントを有効にしてください',
];
