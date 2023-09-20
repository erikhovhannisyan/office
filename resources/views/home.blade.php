<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="">
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
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    
    }

    .pop_up {
        width: 86%;
        height: 600px;
        border: 4px solid black;
        margin-top: 60px;
        margin-left: 7%;
        display: none;
        background-color: gainsboro;
        position: relative;
        border-radius: 15px;

    }

    .close {
        float: right;
        width: 5%;
        height: 45px;
        font-size: 50px;
        line-height: 30px;
        text-align: center;
        color: black;
        cursor: pointer;
        display: none;
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
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;

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
        font-size: 25px;
        color: grey;
        float: left;
        background-color: gray;
        color: grey;
        background-color:transparent;
    }

    .input::placeholder {
        text-align: center;
        font-size: 20px;
        color: grey;
    }

    .button {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background-color: grey;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
    left: 350px;
    top: 50px;
    font-size:20px
}

.button:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.button:active {
    color: grey
}

.button:active:after {
    background: transparent;
    
}

.button:hover:before {
    opacity: 1;
}

.button:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: grey;
    left: 0;
    top: 0;
    border-radius: 10px;
}


@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}

    .print {
        width: 90%;
        height: auto;
        border: 2px solid black;
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
        color: white;
    }

    .images {
        width: 20%;
        height: 160px;
    }

    .button:hover {
        color: green;
    }

    .close:hover {
        color: red;
    }

    .div {
        width: 50%;
        min-height: 800px;
        height: auto;
        border: 3px solid black;
        margin-left: 2%;
        margin-top: 45px;
        float: left;
        background-color: grey;
    }

    .carousel-image {
        width: 88%;
        height: 480px;
        margin-top: 55px;
        margin-left: 6%;
        border-radius: 15px;

    }



    #indicators {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .indicator {
        width: 50px;
        height: 10px;
        background-color: grey;
        /* border-radius: 50%; */
        margin: 0 5px;
        cursor: pointer;
    }

    .active {
        background-color: white;
        /* Color for the active indicator */
    }

    .prev {
        width: 5%;
        height: 6%;
        font-size: 70px;
        top: 47%;
        position: absolute;
    }

    .next {
        width: 5%;
        height: 6%;
        font-size: 70px;
        top: 47%;
        position: absolute;
        left: 95%;
    }

    .next:hover {
        color: white;
        cursor: pointer;
    }

    .prev:hover {
        color: white;
        cursor: pointer;
    }

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
        <div class="pop_up" id="pop_up">
            <div class="close" id="close">x</div>
            <div id="prev-button" class="prev">
                <</div>
                    <img id="carousel-image" src="" alt="Carousel Image" class="carousel-image">
                    <div id="next-button" class="next">></div>
            </div>

            <div id="indicators"></div>

        </div>
    </div>
    <div class="for_images" id="image-container">
    </div>

    <script>
    var old_data = "";
    var div1 = document.getElementById('image-container');
    var div2 = document.getElementById('main');
    var div = document.getElementById('div');
    var imageUrls = [];
    var imageUrl = [];
    var display_control = false;
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
                            imageUrl.push(imgElement.src);
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

                            $(".div").sortable();
                        }
                        createDiv();
                    }
                    $("#image-container").css("display", "flex");
                    $("#output").css("display", "block");
                    $('.images').draggable({
                        cursor: "move",
                        revert: true,
                    });
                    $('.div').droppable({
                        accept: ".images",
                        drop: function(event, ui) {
                            var imageType = ui.helper.data('type');
                            if (imageType === this.id) {
                                ui.helper.css({
                                    left: '0',
                                    top: '10px',
                                    width: '80%',
                                    height: '155px'
                                });
                                $(this).append(ui.helper);
                                // var output = document.getElementById('output');
                                var pop_up = document.getElementById('pop_up');
                                var x = document.getElementById('close');
                                if (output.innerHTML.trim() === '') {
                                    if (display_control == false) {
                                        x.style.display = 'block';
                                        pop_up.style.display = 'block';
                                        imageUrls = [];
                                        imageUrl.forEach((element) => {
                                            imageUrls.push(element);
                                            display_control = true;
                                        });
                                        animation_of_carousel();
                                    }
                                    if (display_control == true) {
                                        imageUrls = [];
                                        imageUrl.forEach((element) => {
                                            imageUrls.push(element);
                                        });
                                        animation_of_carousel();
                                    }

                                    function animation_of_carousel() {
                                        var currentIndex = 0;
                                        var carouselImage = document.getElementById(
                                            'carousel-image');
                                        var prevButton = document.getElementById(
                                            'prev-button');
                                        var nextButton = document.getElementById(
                                            'next-button');
                                        var indicatorsContainer = document
                                            .getElementById(
                                                'indicators');

                                        function updateImage() {
                                            carouselImage.src = imageUrls[currentIndex];
                                            updateIndicators();
                                        }

                                        function nextImage() {
                                            currentIndex = (currentIndex + 1) %
                                                imageUrls
                                                .length;
                                            updateImage();
                                        }

                                        function prevImage() {
                                            currentIndex = (currentIndex - 1 + imageUrls
                                                .length) % imageUrls.length;
                                            updateImage();
                                        }

                                        function updateIndicators() {
                                            indicatorsContainer.innerHTML = '';
                                            for (let i = 0; i < imageUrls.length; i++) {
                                                const indicator = document
                                                    .createElement(
                                                        'div');
                                                indicator.classList.add('indicator');
                                                if (i === currentIndex) {
                                                    indicator.classList.add('active');
                                                }
                                                indicator.addEventListener('click',
                                                    () => {
                                                        currentIndex = i;
                                                        updateImage();
                                                    });
                                                indicatorsContainer.appendChild(
                                                    indicator);
                                            }
                                        }

                                        function startCarousel() {
                                            updateImage();
                                        //     setInterval(nextImage, 7000);
                                        }

                                        startCarousel();

                                        prevButton.addEventListener('click', prevImage);
                                        nextButton.addEventListener('click', nextImage);

                                    }
                                    x.onclick = function() {

                                        location.reload();
                                    }
                                }


                            } else {

                                alert(
                                    'You can only drop images in the matching container.'
                                );
                            }
                        }
                    });

                  
                }
            });
        }
    });
    </script>
</body>

</html>
