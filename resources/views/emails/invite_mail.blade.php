<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>招待メール</title>
</head>
<body>
    <div style="padding: 20px; border: 1px solid #e0e0e0; max-width: 600px; margin: 20px auto;">
        @if(isset($companyName) && isset($family_page_id))
        <h2>相続手続きサポート「かぞくの窓口」への招待</h2>
        <p>こんにちは！</p>
        <p>{{ $companyName }} から相続手続きのサポート「かぞくの窓口」への招待がありました。</p>
        <p>以下のリンクをクリックして、手続きページにアクセスしてください。</p>
        
        {{-- ここで直接ファミリーページのIDをURLに埋め込みます --}}
        <a href="{{ url('/invitation/accept/' . $token)  }}" style="background-color: #3490dc; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 3px;">招待リンク</a>
        
        <p>このリンクは一定期間のみ有効ですので、お早めにご利用ください。</p>
        <p>ご不明点や問題が発生した場合は、{{ $companyName }}までご連絡ください。</p>
        @else
        <p>エラーが発生しました。招待メールの送信に失敗しました。</p>
        @endif
    </div>
</body>
</html>
