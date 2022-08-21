
        @yield('css')
         <!-- App css -->
        <link href="{{ URL::asset('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-dark" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app-dark.min.css')}}" id="app-dark" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/toastr/toastr.min.css') }}">

        <style>
            #topnav-menu-content a{
                font-size: 1.1em;
                color: #117acb !important;
            }
            #page-topbar a, span{
                font-size: 1.1em;
            }
            .mini-stats-wid p, button, ol > li, th, td{
                font-size: 1.1em;
            }
            .main-content{
                /*background: linear-gradient(to bottom, #41759e, white);*/
                background-color: #2e5775;
            }
            .rounded-circle{
                background-color: #117acb !important;
            }
            .btn-primary{
                background-color: #117acb !important;
            }
            .active{
                color: #117acb;
            }
            #titlepath h4,
            #titlepath li,
            #titlepath a{
                color: white !important;
            }
            .imgcircle{
                width: 151px;
                height: 151px;
                border-radius: 76px;
                border: solid 2px silver;
                margin-left: auto;
                margin-right: auto;
            }
            .imgfile{
                width: 148px;
                height: 148px;
                border-radius: 76px;
            }
            .pdcard{
                padding: 25px;
                background-color: white;
            }
            .bas{
                border: solid 1px silver;
                border-radius: 5px;
                box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            }
            .steps{
                position: absolute;
                bottom: 0px;
                right: 0px;
            }

            .checkcont{
                width: 50px;
                height: 50px;
                border-radius: 25px;
                border: solid 1px black;
            }

            .round {
              position: relative;
            }

            .round label {
              background-color: #fff;
              border: 1px solid #ccc;
              border-radius: 50%;
              cursor: pointer;
              height: 28px;
              left: 0;
              position: absolute;
              top: 0;
              width: 28px;
            }

            .round label:after {
              border: 2px solid #fff;
              border-top: none;
              border-right: none;
              content: "";
              height: 6px;
              left: 7px;
              opacity: 0;
              position: absolute;
              top: 8px;
              transform: rotate(-45deg);
              width: 12px;
            }

            .round input[type="checkbox"] {
              visibility: hidden;
            }

            .round input[type="checkbox"]:checked + label {
              background-color: #117acb;
              border-color: #117acb;
            }

            .round input[type="checkbox"]:checked + label:after {
              opacity: 1;
            }

            .checkcontainer {
              margin-left: calc(50% - 12.5px);
              margin-right: calc(50% - 12.5px);
            }

            .cardsz100{
                background-color: #50aaee; /*#117acb*/
                width: 100px;
                height: 100px;
                border-radius: 10px;
                margin-left: auto;
                margin-right: auto;
                cursor: pointer;
                margin-bottom: 15px;
            }
            .cardsz100:hover{
                background-color: #117acb;
            }

            .cardsz100 > h1{
                padding-top: 15px;
                color: white;
            }
            .cardsz100 > p{
                color: white;
            }
            .catls{
                background-color: #117acb;
                border: solid 2px black;
            }
            .card{
                background-color: #41759e;
            }
            .card p,
            .card h1,
            .card h2,
            .card h3,
            .card h4,
            .card h5,
            .card span,
            .card li,
            .card label,
            .card blockquote
            {
                color: white;
            }
            .text-muted{
                color: #e0e0e3 !important;
            }
            .active span{
                color: black !important;
            }
            table{
                background-color: white;
            }

            .pdcard h1,
            .pdcard h2,
            .pdcard h3,
            .pdcard h4,
            .pdcard h5,
            .pdcard p
            {
                color: black !important;
            }
        </style>

        @yield('css-bottom')

