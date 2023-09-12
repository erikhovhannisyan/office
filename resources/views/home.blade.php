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

    body {
        background-color: gainsboro;
    }

    .main {
        width: 80%;
        min-height: 700px;
        height: auto;
        border: 3px solid grey;
        margin-left: 10%;
        margin-top: 70px;
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
        float: left;
        background-color: gray;
        color: white;
    }

    .input::placeholder {
        text-align: center;
        font-size: 20px;
        color: white;
    }

    .button {
        width: 30%;
        height: 40px;
        float: left;
        margin-top: 50px;
        margin-left: 25%;
        font-size: 18px;
        color: white;
        background-color: gray;
        cursor: pointer;
    }

    .print {
        width: 90%;
        height: auto;
        border: 1px solid green;
        margin-top: 150px;
        margin-left: 5%;
        margin-bottom: 50px;
    }

    .images {
        width: 20%;
        height: 220px;
    }

    .button:hover {
        color: green;
    }

    .input-error::placeholder {
        color: red;
        font-size: 26px;
    }
    </style>
    <div class="main">


        <input type=text placeholder="What you want to search?" class="input" name="data_name" id=data_name>
        <button class="button" id="sendButton">Search</button>
        <div class="print" id="output">

        </div>
    </div>

    <script>
    var old_data = "";
    $('#sendButton').on('click', function() {
        var dataToSend = $('#data_name').val();

        if (dataToSend == "") {
                $("#data_name").addClass("input-error").attr("placeholder", "Can't be Empty");
            } else {
                $("#data_name").removeClass("input-error");
            }
        if (old_data !== dataToSend) {
            old_data = dataToSend;
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
                    $('#data_name').val('');
                }
            });
        }
        
    });
    </script>




    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>

</html>
