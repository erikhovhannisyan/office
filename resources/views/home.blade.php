<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .main{
            width:60%;
            height:700px;
            border:2px solid grey;
            margin-left:20%;
            margin-top: 100px;
        }
        .input{
            width: 30%;
            height: 40px;
            margin-top: 50px;
            margin-left: 5%;
            border-left:none;
            border-right:none;
            border-top:none;
            outline:none;
            text-align:center;
            font-size:18px;
            color:grey;
            float:left
        }
        .input::placeholder {
            text-align:center;
            font-size:15px;
         }
         .button{
            width:30%;
            height:40px;
            float:left;
            margin-top:50px;
            margin-left:25%;
            font-size:18px;
            color:grey;
         }
         .print{
            width:90%;
            height: auto;
            border: 1px solid black;
            margin-top:100px;
            margin-left:5%
         }
    </style>
    <div class="main">
   
     
        <input type=text placeholder="What you want to search?" class="input" name="data_name" id=data_name>
        <button class="button" id="sendButton">Search</button>
        <div class="print" id="output">
         
        </div>
        </div>
       
    <script>
       $(document).ready(function () {
            $('#sendButton').on('click', function () {
                var dataToSend = $('#data_name').val();
          
             $.ajax({
               

                 type: "GET",
                 url: "{{ route('search') }}",
                 data: {
                        data_name: dataToSend
                        
                    },
                    success: function(response) {
                      var Data = typeof response === 'string' ? JSON.parse(response) : response;
                      $('#output').text(JSON.stringify(Data));
                    }   

                 });
                //  console.log(dataToSend);

            });
           
        });

        // function printToDiv(content) {
        //     var print = document.getElementById('print');
        //     print.append = content;
        // }

       
        

    </script>
    



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>