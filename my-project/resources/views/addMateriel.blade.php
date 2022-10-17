<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Formulaires pour saisir un matériel</title>
 
      <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

     <script type="text/javascript" src="{{ asset('js/validator.js') }}"></script>
     
    </head>
    <body>
 
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h3 class="text-center text-danger"><b>Formulaires pour saisir un matériel</b> </h3>
                    <div class="form-group">
                        <form name="myForm" action="/post" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" class="form-group">
                        @csrf
                         <label for="Nom">Nom</label> 
                         <input type="text" name="fname" class="form-control"><br>
                         <label for="Prix">Prix</label>
                        <input type="number" name="fprix" class="form-control"><br>
                         <label for="client">Client</label>
                         <select id="client" name="client" class="form-control">
                           <option value="">--sélectionner un client--</option>
                           @foreach ($clients as $client)
                           <option value="{{$client->id_client}}">{{$client->name}}</option>
                           @endforeach
                         </select>  
                         
                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
 
 
    </body>
</html>