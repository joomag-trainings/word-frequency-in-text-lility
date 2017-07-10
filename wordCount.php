
<?php
$text = file_get_contents('randomText.txt');
$result = array_count_values(str_word_count($text, 1));
?>

<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            google.charts.load('current', {'packages':['table']});
            google.charts.setOnLoadCallback(drawTable);

            function drawTable() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Words');
                data.addColumn('string', 'Used count');
                data.addRows([
                    <?php

                        foreach($result as $key => $value) {
                            echo "['" . $key . "', '" . $value . "'],";
                        }
                    ?>
                ]);
                var table = new google.visualization.Table(document.getElementById('table_div'));
                table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
            }
        </script>
    </head>
    <body>
        <div id="table_div"></div>
    </body>
</html>
