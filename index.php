<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>页面</title>
</head>
<body>
    <div>这是一个储存页面</div>
    <div id="nan"></div>
    <script type="text/javascript">
        <?php
        $servername = "mysql.sqlpub.com";
        $username = "bbs43s";
        $password = "c701c4fd10ebb416";
        $dbname = "bbs43s";
         
        // 创建连接
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("连接失败: " . mysqli_connect_error());
        }
         
        $sql = "SELECT name, text FROM user";
        $result = mysqli_query($conn, $sql);
         
        if (mysqli_num_rows($result) > 0) {
            // 输出数据
            while($row = mysqli_fetch_assoc($result)) {
                document.getElementById("nan").innerHTML = "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            console.log("0 结果");
        }
         
        mysqli_close($conn);
        ?>
        function getParams(key) {
            var reg = new RegExp("(^|&)" + key + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) {
                return unescape(r[2]);
            }
            return null;
        };
        console.log("参数param1:"+getParams("name"));
        console.log("参数param2:"+getParams("text"));
        // <?php
        // $servername = "localhost";
        // $username = "username";
        // $password = "password";
        // $dbname = "bbs43s";
         
        // // 创建连接
        // $conn = new mysqli($servername, $username, $password, $dbname);
        // // 检测连接
        // if ($conn->connect_error) {
        //     die("连接失败: " . $conn->connect_error);
        // } 
         
        // $sql = "INSERT INTO user (name, text)
        // VALUES (getParams("name"), getParams("text"))";
         
        // if ($conn->query($sql) === TRUE) {
        //     console.log("新记录插入成功");
        // } else {
        //     console.log("Error: " . $sql . "<br>" . $conn->error);
        // }
         
        // $conn->close();
        // ?>
        document.getElementById("nan").insertAdjacentHTML('afterend', getParams("name")+":"+getParams("text")+"\n");
    </script>
</body>
</html>
