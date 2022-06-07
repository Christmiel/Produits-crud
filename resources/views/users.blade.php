

   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
   </head>
   <body>
   @foreach ($users as $user) 

        {{$user->name}} <br>
        {{$user->email}} 

    @endforeach

   </body>
   </html>