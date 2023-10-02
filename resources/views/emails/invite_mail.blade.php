<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(isset($companyName))
    <p>あなたは{{ $companyName }}に招待されています！</p>
    @else
    <p>companyName変数が設定されていません。</p>
    @endif
    
</body>
</html>
