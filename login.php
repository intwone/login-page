<?php
session_start();

if(isset($_POST['email']) && empty($_POST['email']) == false) {
    $email = addslashes($_POST['email']);
    $password = md5(addslashes($_POST['password']));

    $dsn = "mysql:dbname=blog;host=localhost";
    $dbuser = "root";
    $dbpassword = "";

    try {
        $db = new PDO($dsn, $dbuser, $dbpassword);

        $sql = $db->query("SELECT * FROM users2 WHERE email = '$email' AND pass = '$password'");

        if($sql->rowCount() > 0) {
            $data = $sql->fetch(); //array
            $_SESSION['id'] = $data['id']; //save id in the session
            header("Location: index.php"); //redirect to index
        } else {
            // The user wrong the password
        }

    } catch(PDOexeption $e) {
        echo "Failure: ".$e->getMessage();
    }
}

?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Login Page</title>

        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #11A6D4;
            }
            #login-box {
                background-color: #1992B7;
                width: 380px;
                height: 260px;
                margin: 140px auto 0px;
                border-radius: 5px;
            }
            #login-box-indoor {
                width: 360px;
                height: 240px;
                background-color: #fdfdfd;
                position: absolute;
                margin: 10px;
                border-radius: 5px;
                box-shadow: 0px 0px 5px black;
            }
            #login-box-label {
                background: -moz-linear-gradient(top,  rgba(165,165,165,0.65) 0%, rgba(0,0,0,0) 100%); /* FF3.6-15 */
                background: -webkit-linear-gradient(top,  rgba(165,165,165,0.65) 0%,rgba(0,0,0,0) 100%); /* Chrome10-25,Safari5.1-6 */
                background: linear-gradient(to bottom,  rgba(165,165,165,0.65) 0%,rgba(0,0,0,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6a5a5a5', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */

                height: 45px;
                text-align: center;
                font: bold 14px/45px sans-serif;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
                    
                border-bottom: 1px solid #bfc3c5;
                box-shadow: 1px 0px 3px #dedede;
                color: #555555;
                text-shadow: 1px 0px 1px white;
            }
            .input-div {
                margin: 20px;
                padding: 5px;
                background-color: #f2f5f7;
                border-radius: 3px;
            }
            .input-div input {
                width: 310px;
                height: 35px;
                padding-left: 5px;
                font: normal 13px sans-serif;
                color: #aeaeae;
                border-radius: 3px;
                border: 1px solid #bfc4c6;
                outline: none;
            }
            .input-div:hover {
                background-color: #e0f1fc;
            }
            .input-div:hover {
                border-color: #7dc6dd;
            }
            #input-password {
                margin-top: -10px;
            }
            #buttons {
                width: 310px;
                margin-left: 25px
            }
            #button {
                background-color: yellow;
                float: right;
                padding: 5px 15px;
                font: bold 12px sans-serif;
                border-radius:  20px;
                text-shadow: 0px 1px 0px white;
                border: 1px solid #9eb9c3;
                background: -moz-linear-gradient(top,  rgba(197,235,247,1) 0%, rgba(205,229,238,0) 100%); /* FF3.6-15 */
                background: -webkit-linear-gradient(top,  rgba(197,235,247,1) 0%,rgba(205,229,238,0) 100%); /* Chrome10-25,Safari5.1-6 */
                background: linear-gradient(to bottom,  rgba(197,235,247,1) 0%,rgba(205,229,238,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c5ebf7', endColorstr='#00cde5ee',GradientType=0 ); /* IE6-9 */

                color: #527988;
                box-shadow: 0px 0px 10px #c9c9c9;
            }
            #button:hover {
                background: -moz-linear-gradient(top,  rgba(205,229,238,0) 0%, rgba(197,235,247,1) 100%); /* FF3.6-15 */
                background: -webkit-linear-gradient(top,  rgba(205,229,238,0) 0%,rgba(197,235,247,1) 100%); /* Chrome10-25,Safari5.1-6 */
                background: linear-gradient(to bottom,  rgba(205,229,238,0) 0%,rgba(197,235,247,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00cde5ee', endColorstr='#c5ebf7',GradientType=0 ); /* IE6-9 */
                cursor: pointer; 
            }  
            #remember-password {
                fonte: normal 12px sans-serif;
                color: #555555;
                font: bold;
            }  
        </style>
    </head>
    <body>
        <div id="login-box">
            <div id="login-box-indoor">
                <div id="login-box-label">LOGIN</div>

                <form method="POST">
                    <div class="input-div" id="input-user">
                        <input type="text" value="Email" name="email" onfocus="this.value='';" />
                    </div>
                
                    <div class="input-div" id="input-password">
                        <input type="password" value="Password" name="password" onfocus="this.value='';" />
                    </div>
                
                    <div id=buttons>
                        <div><input type ="submit" value="Login" id="button" /></div>
                        <div id=remember-password>
                            <input type="checkbox" /> Remember password
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
