    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
            width: 50%;
            min-height: 900px;
            /* height: auto; */
            border: 3px solid grey;
            margin-left: 5%;
            margin-top: 50px;
            float: left;
        }

        .for_images {
            width: 40%;
            min-height: 900px;
            height: auto;
            border: 3px solid grey;
            margin-top: 50px;
            float: left;
            font-weight: 300;
            text-align: center;
            display: none;
            /* display: flex; */
            justify-content: center;
        }

        .drop_images {
            width: 80%;
            height: 90%;
            border: 2px solid green;
            margin-left: 10%;
            margin-top: 25px;
            background-color: beige;
            /* height: auto; */
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
            border: 2px solid green;
            margin-top: 150px;
            margin-left: 5%;
            margin-bottom: 50px;
            display: none;
        }

        .new-class {
            width: 100px;
            height: 100px;

        }

        .h1 {
            color: green;
        }

        .images {
            width: 20%;
            height: 160px;
        }

        .button:hover {
            color: green;
        }

        .div {
            width: 50%;
            min-height: 800px;
            height: auto;
            border: 3px solid green;
            margin-left: 2%;
            margin-top: 45px;
            float: left;
            background-color: beige;
        }

        /* .ui-draggable-handle {
            position: relative;
            left: 15%;
            top: 30px;
            width: 70%;
        } */

        .input-error::placeholder {
            color: red;
            font-size: 26px;
        }
        </style>
    </head>

    <body>
        <div class="main" id="main">
            <input type="text" placeholder="What you want to search?" class="input" name="data_name" id="data_name">
            <button class="button" id="sendButton">Search</button>
            <div class="print" id="output"></div>
        </div>
        <div class="for_images" id="image-container">
            <!-- <h1 class="h1">Drop Here</h1> -->
            <!-- <div class="drop_images" id="drop_images"></div> -->
        </div>

        <script>
        var old_data = "";
        var div1 = document.getElementById('image-container');
        var div2 = document.getElementById('main');
        var div = document.getElementById('div');
        $('#sendButton').on('click', function() {
            var dataToSend = $('#data_name').val();

            if (dataToSend == "") {
                $("#data_name").addClass("input-error").attr("placeholder", "Can't be Empty");
            } else {
                $('#data_name').val('');
                $("#data_name").removeClass("input-error");
                $("#data_name").attr("placeholder", "What you want to search?");

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
                                imgElement.setAttribute('data-type', key);
                                imgElement.setAttribute('id', key);
                                output.appendChild(imgElement);
                            }

                            function createDiv() {
                                var newDiv = document.createElement("div");
                                newDiv.className = "div";
                                newDiv.id = key;
                                var h1 = document.createElement("h1");
                                h1.className = "h1";
                                h1.textContent = "For" + " " + key + " " + "images";
                                newDiv.appendChild(h1);
                                document.getElementById("image-container").appendChild(newDiv);

                                // $("#div").sortable();
                            }
                            createDiv();
                        }

                        $("#image-container").css("display", "flex");
                        $("#output").css("display", "block");
                        $('.images').draggable({
                            cursor: "move",
                            revert: "invalid",
                            left: 0,

                        });
                        $('.div').droppable({
                            accept: ".images",
                            drop: function(event, ui) {
                                var imageType = ui.helper.attr('data-type');
                                if (imageType === this.id) {
                                    ui.helper.css({
                                        left: '0',
                                        top: '10px',
                                        width: '80%',
                                        height: '155px'
                                    });
                                    $(this).append(ui.helper);
                                } else {
                                    
                                    alert(
                                        'You can only drop images in the matching container.'
                                        );
                             

                                }
                            }
                        });

                        var div2Height = div2.clientHeight;
                        div1.style.height = div2Height + 6 + 'px';
                    }
                });
            }
        });
        </script>
    </body>

    </html>
