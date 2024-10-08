<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventory System</title>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body id="page-top">
    <center>
        <div class="quotebackground">
            <h2 class="display-2 text-center mb-2" id='quotes'>Loading Quote...</h2>
            <p id="author" class="display-5" style="font-style: italic">Loading Author...</p>
        </div>
    </center>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                
                </div>

                <div class="welcome_content">
                    <center>
                        <form action="{{ route('login') }}" method="get">
                            <input type="submit" name="submit" class="btn_login" value="⮞⮞⮞Click Here to Log-In⮜⮜⮜">
                        </form>
                        
                        <div class="container">
                            <h1 class="inventorytitle display-4 text-center">INVENTORY</h1>
                        </div>
                    </center>

                    <script>
const apiEndpoint = 'https://v2.jokeapi.dev/joke/Any'; // Joke API endpoint

window.addEventListener('load', axiosGet);

function axiosGet() {
    axios.get(apiEndpoint)
    .then(response => {
        output(response);
    })
    .catch(error => {
        const fallbackResponse = {
            data: {
                content: 'Papasara mi sirrrrr T_T',
                author: 'yourbelovedstudents',
            }
        };
        output(fallbackResponse);
        console.error('Error fetching joke:', error.response || error.message);
    });
}

function output(response) {
    const container = document.querySelector('#quotes');
    const authorContainer = document.querySelector('#author');

    // Handle the response based on its type
    if (response.data.type === 'single') {
        // Single joke
        container.innerText = response.data.joke;
        authorContainer.innerText = ''; // No author for single jokes
    } else if (response.data.type === 'twopart') {
        // Two-part joke
        container.innerText = `${response.data.setup} - ${response.data.delivery}`;
        authorContainer.innerText = ''; // No author for two-part jokes
    } else {
        // Unknown joke type
        container.innerText = 'No joke available';
        authorContainer.innerText = '';
    }
}

                    </script>
                </div>
            </div> 
        </div>
    </div>
</body>

<!-- End of Main Content -->

<!-- Footer -->
<!-- End of Footer -->

<!-- Bootstrap core JavaScript-->
<script src={{asset("vendor/jquery/jquery.min.js")}}></script>
<script src={{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>

<!-- Core plugin JavaScript-->
<script src={{asset("vendor/jquery-easing/jquery.easing.min.js")}}></script>

<!-- Custom scripts for all pages-->
<script src={{asset("js/sb-admin-2.min.js")}}></script>

<!-- Page level plugins -->
<script src={{asset("vendor/chart.js/Chart.min.js")}}></script>

<!-- Page level custom scripts -->
<script src={{asset("js/demo/chart-area-demo.js")}}></script>
<script src={{asset("js/demo/chart-pie-demo.js")}}></script>

<style>
    body {
        background-image: url('{{ asset('img/bg-01.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .pull-right {
        position: absolute;
        right: 50px;
        top: 10px;
    }

    .welcome_content {
        height: 100%;
    }

    .first_h1 {
        padding-top: 170px;
        color: white;
        text-shadow: 2px 2px 2px black;
    }

    .btn_login {
        margin-top: 60px;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10%;
        border: 1px solid;
        padding: 15px;
        width: 350px;
        border-radius: 20px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;
        --border-size: 3px;
        --border-angle: 0turn;
        background-image: conic-gradient(from var(--border-angle), #213, #112 50%, #213), conic-gradient(from var(--border-angle), transparent 20%, #08f, rgb(0, 255, 26));
        background-size: calc(100% - (var(--border-size) * 2)) calc(100% - (var(--border-size) * 2)), cover;
        background-position: center center;
        background-repeat: no-repeat;
        -webkit-animation: bg-spin 3s linear infinite;
        animation: bg-spin 3s linear infinite;
    }

    @-webkit-keyframes bg-spin {
        to {
            --border-angle: 1turn;
        }
    }

    @keyframes bg-spin {
        to {
            --border-angle: 1turn;
        }
    }

    .btn_login:hover {
        -webkit-animation-play-state: paused;
        animation-play-state: paused;
        color: rgb(22, 235, 114);
        background-color: rgb(22, 235, 114);
        cursor: pointer;
    }

    @property --border-angle {
        syntax: "<angle>";
        inherits: true;
        initial-value: 0turn;
    }

    .quotebackground {
        color: white;
        text-shadow: 2px 2px 2px black;
        background-color: lightgray;
        padding: 15px;
        border-radius: 10px;
        background-color: rgba(168, 167, 167, 0.5);
        font-family: "Lucida Console", "Courier New", monospace;
    }

    .inventorytitle.display-4.text-center {
        font-size: 1000%;
        color: white;
        background-color: rgba(0, 0, 0, 0.7); /* Dark background for better visibility */
        padding: 20px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Subtle shadow for depth */
        display: inline-block; /* Ensure the box fits tightly around the text */
    }

    @media screen and (max-width: 650px) {
        .inventorytitle.display-4.text-center {
            font-size: 500%;
        }
    }

    @media screen and (max-width: 480px) {
        .inventorytitle.display-4.text-center {
            font-size: 290%;
        }
    }
</style>

</html>
