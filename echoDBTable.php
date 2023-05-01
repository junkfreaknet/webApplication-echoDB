<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DB PHP TABLE</title>
        <link rel="stylesheet" href="./css/index.css">
        <!---<link rel="stylesheet" href="./css/build.css">--->
    </head>
    <body>
        <header>
            <h1>PHP DB TABLE</h1>
        </header>
        
        <main>
            <!--- START put from database --->
            <?php


                const my_HOST = "mysql76.conoha.ne.jp";
                const my_USER = "zs9ve_junkfreaknet";
                const my_PASSWORD = "junkfreak6403@@";
                const my_DATABASE="zs9ve_6403";

                $my_connection= mysqli_connect(my_HOST,my_USER,my_PASSWORD,my_DATABASE);
                if ($my_connection->connect_errno) {
                    die("Connect to database is failed: ". $my_connection->connect_errno);
                }

                /***echo("<p>". "Connection is created successful!". "</p>");***/

                $my_sqlstring = "select * from in_tbl";
                $rst_in = $my_connection->query($my_sqlstring);

                if ($rst_in->num_rows>0){

                    echo ("<table>");

                    /*** start table header ***/
                    echo ("<thead>");
                    echo ("<tr>");
                    echo("<th>". "Code". "</th>");
                    echo("<th>". "Name". "</th>");
                    echo("<th>". "Qty". "</th>");
                    echo ("</tr>");
                    echo ("</thead>");
                    /*** end table header ***/

                    while ($each_row=$rst_in->fetch_assoc()){

                     /***start a row***/
                    echo ("<tr>");

                    echo ("<td>" . $each_row["code"]. "</td>");
                    echo ("<td>" . $each_row["name"]. "</td>");
                    echo ("<td>" . $each_row["qty"]. "</td>");
                    
                    echo ("</tr>");
                     /***end a row***/
                    }

                    echo ("</table>");

                }else{
                    echo ("<p>" . "Data is not found." . "/p>");
                }
                /* at last close connection.*/
                mysqli_close($my_connection);
                /***echo("<p>". "Close database...". "</p>");***/
            ?>
            <!--- END put from database --->
        </main>

        <footer>
        </footer>
    </body>
</html>