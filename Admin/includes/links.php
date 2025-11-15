    <!-- Bootstrap Links -->
    <link rel="stylesheet" href="./Assets/Bootstrap/css/bootstrap.min.css" />
    <script src="./Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./Assets/Bootstrap/icons/font/bootstrap-icons.css">
    <!-- Fontawsom Links -->
    <link rel="stylesheet" href="./Assets/font-awsome/css/all.css" />
    <script src="./Assets/font-awsome/js/all.js"></script>
       <!-- jquery include -->
       <script src="./Assets/jquery/jquery.js"></script>




       <!-- sidebar toggle funtion -->
       <script>
        $(document).ready(function() {
            $("#bars").click(function() {
                $("#sidebar").toggleClass("sidebar-hidden");
                $("#content").toggleClass("content-full-width");
            });
        });
    </script>



<style>
        #sidebar {
            min-height: 100vh;
            width: 24%;
            transition: all 0.3s;
        }

        .menu {
            font-size: 1.2rem;
        }

        .menu:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        #sidebar.sidebar-hidden {
            width: 0%;
            overflow: hidden;
            transition: width 0.5s ease;
        }

        #content {
            width: 100%;
        }

        #content.content-full-width {
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }
        #bg-off{
            background:#fcb603;
      
        }

        @media screen and (max-width : 567px) {
            #bars {
                display: none;
            }

        }
    </style>