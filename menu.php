<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .jumbotron{
    display: flex;
}
.container{
    width: 50%;
    margin: 0% 5%;
}
#carouselExampleIndicators{
    width: 40%;
    margin: 0% 1%;
}
form{
    width: 300px;
    margin: 200px auto;
    text-align: center;
}
form h1{
    text-transform: capitalize;
}
input{
    display:block;
    margin: 10px auto;
    width: 250px;
    height: 30px;
}

#user_avatar{
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 20px;
}

        body{
            display: flex;
            min-height:100vh; 
            background-color: #e3e9f7;
        }
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        main{
            padding: 20px;
        }
        #sidebar{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #fff;
            height: 100vh;
            border-radius: 0px 18px 18px 0px;
            position: relative;
            transition: all .5s;
            min-width: 82px;
        }
        #sidebar_content{
            padding: 12px;
        }
        #user{
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }
        #user_infos{
            display: flex;
            flex-direction: column;
        }

        #user_infos span:last-child{
            color: #6b6b6b;
            font-size: 12px;
        }
        #side_items{
            display: flex;
            flex-direction: column;
            gap: 8px;
            list-style: none;
        }
        .side-item{
            border-radius: 8px;
            padding: 14px;
            cursor: pointer;
        }
        .side-item.active{
            background-color: #4f46e5;
        }
        .side-item:hover:not(.active), #logout_btn:hover{
            background-color: #e3e9f7;
        }
        .side-item a{
            text-decoration:none;
            display: flex;
            align-items: center;
            
            justify-content:center;
            color: #0a0a0a;
        }
        .side-item.active a {
            color: #e3e9f7;
        }
        .side-item a i{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
        }
        #logout{
            border-top: 1px solid #e3e9f7;
            padding: 12px;
        }
        #logout_btn{
            border: none;
            padding: 12px;
            font-size: 14px;
            display: flex;
            gap: 20px;
            align-items: center;
            border-radius: 8px;
            text-align: start;
            cursor: pointer;
            background-color: transparent;
        }
        #open_btn{
            position: absolute;
            top: 30px;
            right: -10px;
            background-color: #4f46e5;
            color: #e3e9f7;
            border-radius: 100%;
            width: 20px;
            height: 20px;
            border: none;
            cursor: pointer;
        }
        #open_btn_icon{
            transform: tranform .3s ease;
        }
        .open-sidebar #open_btn_icon{
            transform: rotate(180deg);
        }
        .item-description{
            width: 0px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            font-size: 14px;
            transition: width .6s;
            height: 0;
        }
        #sidebar.open-sidebar{
            min-width: 15%;
        }
        #sidebar.open-sidebar .item-description{
            width: 150px;
            height: auto;
        }
        #sidebar.open-sidebar .side-item a{
            justify-content: flex-start;
            gap: 14px;
        }
    </style>
</head>
<body>
    <div class="menu">
    <nav id="sidebar">
        <div id="sidebar_content">
        <div id="user">
            <img src="https://cdn.icon-icons.com/icons2/556/PNG/512/cashier_icon-icons.com_53629.png" id="user_avatar" alt="Avatar">
            <p id="user_infos">
                <span class="item-description">
                    SellWebPos
                </span>
                <span class="item-description">
                    Gerencie seu negócio.
                </span>
            </p>
        </div>

        <ul id="side_items">

            <li class="side-item">
                <a href="/php%20text/cadastro_produtos.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="item-description">
                        Cadastro de Produtos
                    </span>
                </a>
            </li>

            <li class="side-item">
                <a href="/php%20text/realizar_compra.php">
                    <i class="fa-solid fa-cart-plus"></i>
                    <span class="item-description">
                        PDV
                    </span>
                </a>
            </li>

            <li class="side-item">
                <a href="/php%20text/consultar_produtos.php">
                    <i class="fa-solid fa-box"></i>
                    <span class="item-description">
                        Produtos
                    </span>
                </a>
            </li>

            <li class="side-item">
                <a href="/php%20text/consulta_venda.php">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="item-description">
                        Produtos Vendidos
                    </span>
                </a>
            </li>
        </ul>

        <button id="open_btn">
            <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
        </button>
        </div>
        <div id="logout">       
            <button id="logout_btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="item-description">
                    Logout
                </span>
            </button>
        </div>
    </nav>
    </div>
    <main>
        
    </main>
    <script src="script.js"></script>
</body>
</html>