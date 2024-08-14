<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <h1>Formulaire</h1>
    {{-- permet de créer un champs pour ecrire --}}
    <form action="{{route("tasks.update")}}" method="post">
        <label for="title">Title</label>
        <input type="text" name="title">
        <br>
        <br>
        <label for="description">Description</label>
        <input type="text" name="description">
        <br>
        <br>
        {{-- permet de créer le boutton envoyer --}}
        <input type="submit" value="Envoyer">
        {{-- le csrf doit tjrs etre dans le form --}}
        
        @csrf
    
    </form>
       

</head>
<body>
    
</body>
</html>