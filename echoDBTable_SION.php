<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DB SION</title>
        <link rel="stylesheet" href="./css/index.css">
    </head>
    <body>
        <header>
            <h1>DB SION</h1>
        </header>
        <main>
            <div class="wrapper_table"> <!--- START wrapper of table START--->
            <?php

                const my_HOST="public.nhumf.tyo2.database-hosting.conoha.io";

                const my_USER = "nhumf_sion_remote";                
                const my_PASSWORD = "Noriyuki6403";
                const my_DATABASE="nhumf_sion";

                const in_table="select_locale_child_202212011001_cp_csv";

                $my_connection= mysqli_connect(my_HOST,my_USER,my_PASSWORD,my_DATABASE);
                if ($my_connection->connect_errno) {
                    die("Connect to database is failed: ". $my_connection->connect_errno);
                }
                /*const my_USER = "nhumf_sion";*/
                /*echo("<p>"."success to connect DATABASE"."<p>");*/

                $my_sqlstring = "select * from ".in_table;
                $rst_in = $my_connection->query($my_sqlstring);

                /*echo("<p>"."success to open record set from  DATABASE"."<p>");*/

                if ($rst_in->num_rows>0){

                    echo ("<table>");

                    /*** start table header ***/
                    echo ("<thead>");
                        echo ("<tr>");
                            echo("<th>". "出荷日". "</th>");
                            echo("<th>". "出荷便". "</th>");
                            echo("<th>". "窓口". "</th>");
                            echo("<th>". "表示記番号". "</th>");
                            echo("<th>". "コース". "</th>");
                            echo("<th>". "配分順". "</th>");
                            echo("<th>". "配送順". "</th>");
                            echo("<th>". "店番". "</th>");
                            echo("<th>". "店名". "</th>");
                            echo("<th>". "アイテム数". "</th>");
                            echo("<th>". "受注金額". "</th>");
                            echo("<th>". "量販店コード". "</th>");
                        echo ("</tr>");
                    echo ("</thead>");
                    /*** end table header ***/

                    while ($each_row=$rst_in->fetch_assoc()){

                     /***start a row***/
                        echo ("<tr>");

                            echo ("<td>" . $each_row["SYU_YMD"]. "</td>");
                            echo ("<td>" . $each_row["BIN_KB"]. "</td>");
                            echo ("<td>" . $each_row["HAIBUN_MAD"]. "</td>");
                            echo ("<td>" . $each_row["AD_TEN_NO"]. "</td>");
                            echo ("<td>" . $each_row["HAISO_COURSE"]. "</td>");
                            echo ("<td>" . $each_row["HAIBUN_ORDER"]. "</td>");
                            echo ("<td>" . $each_row["HAISO_ORDER"]. "</td>");
                            echo ("<td>" . $each_row["TEN_NO"]. "</td>");
                            echo ("<td>" . $each_row["TEN_NM_KANJI"]. "</td>");
                            echo ("<td class=\"td_numeric\">" . $each_row["NUM_ITEMS"]. "</td>");
                            echo ("<td class=\"td_numeric\">" . $each_row["PRICE_ORDERED"]. "</td>");
                            echo ("<td>" . $each_row["RYOHANTEN_CD"]. "</td>");
                        echo ("</tr>");
                     /***end a row***/
                    }

                    echo ("</table>");

                }else{
                    echo ("<p>" . "Data is not found." . "/p>");
                }

                /* at last close connection.*/
                mysqli_close($my_connection);

                /*echo("<p>"."success to close connection"."<p>");*/
            ?>
            </div>  <!--- END wrapper of table END--->
        </main>
        <footer>
        </footer>
    </body>
</html>