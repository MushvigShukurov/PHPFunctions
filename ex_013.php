<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IG/mushvigsh</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        
         :root {
            --clr: #000;
        }
        
        .container {
            width: 100%;
            height: 100vh;
            overflow: hidden;
            background: var(--clr);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .menuDiv {
            width: 400px;
            height: 70px;
            background: #fff;
            color: #000;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
        }
        
        .menuDiv ul {
            display: flex;
            width: 350px;
        }
        
        .menuDiv ul li {
            list-style: none;
            position: relative;
            width: 70px;
            height: 70px;
            z-index: 1;
        }
        
        .menuDiv ul li a {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            text-align: center;
            font-weight: 500;
        }
        
        .menuDiv ul li a .icon {
            display: block;
            line-height: 75px;
            position: relative;
            font-size: 1.5em;
            text-align: center;
            transition: all 0.5s;
            color: var(--clr);
        }
        
        .menuDiv ul li.active a .icon {
            transform: translateY(-35px);
        }
        
        .menuDiv ul li a .text {
            position: absolute;
            color: var(--clr);
            font-weight: 400;
            font-size: .75em;
            transition: all 0.5s;
            letter-spacing: 0.05em;
            opacity: 0;
            transform: translateY(10px);
        }
        
        .menuDiv ul li.active a .text {
            opacity: 1;
        }
        
        .indicator {
            position: absolute;
            width: 70px;
            height: 70px;
            background: rgb(10, 113, 254);
            top: -50%;
            border-radius: 50%;
            border: 6px solid var(--clr);
            transition: all 0.5s;
        }
        
        .indicator::before {
            content: '';
            width: 20px;
            height: 20px;
            background: #fff;
            position: absolute;
            top: 50%;
            left: -22.6px;
            border-top-right-radius: 20px;
            box-shadow: 0px -10px 0 0 var(--clr);
        }
        
        .indicator::after {
            content: '';
            width: 20px;
            height: 20px;
            background: #fff;
            position: absolute;
            top: 50%;
            right: -22.6px;
            border-top-left-radius: 20px;
            box-shadow: 0px -10px 0 0 var(--clr);
        }
        
        .menuDiv ul li:nth-child(1).active~.indicator {
            transform: translateX(calc(70px * 0));
        }
        
        .menuDiv ul li:nth-child(2).active~.indicator {
            transform: translateX(calc(70px * 1));
        }
        
        .menuDiv ul li:nth-child(3).active~.indicator {
            transform: translateX(calc(70px * 2));
        }
        
        .menuDiv ul li:nth-child(4).active~.indicator {
            transform: translateX(calc(70px * 3));
        }
        
        .menuDiv ul li:nth-child(5).active~.indicator {
            transform: translateX(calc(70px * 4));
        }
    </style>
</head>

<body>
    <!-- Online Tutorials -dan baxaraq yazmisam -->
    <div class="container">
        <div class="menuDiv">
            <ul>
                <li class="list active">
                    <a href="#">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="text">Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="text">About</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon"><ion-icon name="chatbubbles-outline"></ion-icon></span>
                        <span class="text">Message</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon"><ion-icon name="desktop-outline"></ion-icon></span>
                        <span class="text">Blog</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon"><ion-icon name="camera-outline"></ion-icon></span>
                        <span class="text">Gallery</span>
                    </a>
                </li>
                <div class="indicator"></div>
            </ul>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        const list = document.querySelectorAll('.list');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('active')
            );
            this.classList.add('active');
        }
        list.forEach((item) =>
            item.addEventListener('click', activeLink)
        );
    </script>
</body>

</html>