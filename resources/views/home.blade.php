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
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .main {
        width: 80%;
        height: 700px;
        border: 2px solid grey;
        margin-left: 10%;
        margin-top: 100px;
    }

    .input {
        width: 30%;
        height: 40px;
        margin-top: 50px;
        margin-left: 5%;
        border-left: none;
        border-right: none;
        border-top: none;
        outline: none;
        text-align: center;
        font-size: 18px;
        color: grey;
        float: left
    }

    .input::placeholder {
        text-align: center;
        font-size: 15px;
    }

    .button {
        width: 30%;
        height: 40px;
        float: left;
        margin-top: 50px;
        margin-left: 25%;
        font-size: 18px;
        color: grey;
    }

    .print {
        width: 90%;
        height: auto;
        border: 1px solid black;
        margin-top: 100px;
        margin-left: 5%
    }
    .images{
        width:20%;
        height:220px;
    }
    </style>
    <div class="main">


        <input type=text placeholder="What you want to search?" class="input" name="data_name" id=data_name>
        <button class="button" id="sendButton">Search</button>
        <div class="print" id="output">

        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#sendButton').on('click', function() {
            var dataToSend = $('#data_name').val();

            $.ajax({
                type: "GET",
                url: "{{ route('search') }}",
                dataType: "Json",
                data: {
                    data_name: dataToSend

                },
                success: function(response) {
                    const output = document.getElementById('output');
                    const keys = Object.keys(response);
                    for (const key of keys) {
                        const values = response[key];
                        console.log(`Key: ${key}`);
                        for (const value of values) {
                            console.log(`Value: ${value}`);
                            const imgElement = document.createElement('img');
                            imgElement.className = 'images';
                            imgElement.src = value;
                            imgElement.alt = key;
                            output.appendChild(imgElement);
                        }
                    }

                    //  const imgElement = document.getElementById('imageElement');
                    //     imgElement.src = value;
                }
                // $('#output').attr('src', value);
                // console.log(response);   

            });
            //  console.log(dataToSend);

        });

    });
    </script>




    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>

</html>