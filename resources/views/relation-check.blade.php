<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relation Check</title>
</head>
<body>
    <h1>Family Pages related to User ID: 3</h1>
    
    @forelse($familyPages as $familyPage)
        <p>ID: {{ $familyPage->id }}, Attribute: {{ $familyPage->some_attribute }}</p>
    @empty
        <p>No related Family Pages found.</p>
    @endforelse
</body>
</html>
