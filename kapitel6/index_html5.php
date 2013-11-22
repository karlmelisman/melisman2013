<!DOCTYPE html>
<html>
  <head>
    <title>Website Karl Melisman</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../boot3/css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
  <div class="container">
    <h1>XHTML 1.0 Tags mit weiteren Angaben</h1>

      <p><a href="https://iversity.org/my/courses/web-engineering-i-grundlagen-der-web-entwicklung/assessment_units/4361/intro">Hausaufgabe</a>
      zum Kurs Web Engineering I bei iversity.org.</p>

    <h2>Erläuterungen</h2>
      <ul>
          <li>Die Darstellung der Tabelle basiert auf den Standard-Styles für
              <a href="http://getbootstrap.com/css/#tables" target="_blank">Tabellen von Bootstrap</a></li>
          <li>Die Einschätzung bzgl. Semantik ist oft unterschiedlich.</li>
          <li>Aus meiner Sicht wichtige Tags sind <span class="text-success">farblich hervorgehoben</span>.
              Dies stellt selbstverständlich nur meine eigene Meinung dar.</li>
      </ul>

    <h2>Und nun die Daten ...</h2>

    <table class="table table-condensed table-hover table-bordered">
        <thead>
            <tr>
                <th>Tag</th>
                <th>Beschreibung</th>
                <th>Inline- oder Block-Element</th>
                <th>Semantisches HTML?</th>
            </tr>
        </thead>
        <?php
            $handle = fopen("tags.csv","r");
            while ( $data = fgetcsv($handle,1000,";")) {
                $num = count($data);
                echo "  <tr>\n";
                for ( $i = 0; $i < 4; $i++) {
                    if ( isset($data[4]) && $data[4] == 1 ) {
                        echo "    <td class=\"success\">";
                    }
                    else
                        echo "<td>";

                    switch ( $i ) {
                        case 0:
                            echo "&lt;";
                            echo htmlentities($data[$i],ENT_SUBSTITUTE,"UTF-8");
                            echo "&gt;";
                            break;
                         case 2:
                            switch ( $data[$i] ) {
                                case 'i':
                                    echo "inline";
                                    break;
                                case 'b':
                                    echo "block";
                                    break;
                                default:
                                    echo "<em>keine Angabe</em>";

                            }
                            break;
                        case 3:
                            switch ( $data[$i] ) {
                                case 's':
                                    echo "ja";
                                    break;
                                case 'n':
                                    echo "nein";
                                    break;
                                case 'b':
                                    echo "kommt darauf an";
                                    break;
                                default:
                                    echo "<em>keine Angabe</em>";

                            }
                            break;
                        case 4: // Priospalte
                            break;
                        default:
                            echo htmlentities($data[$i],ENT_SUBSTITUTE,"UTF-8");
                            break;
                    }
                    echo "</td\n>";
                }
                echo "  </tr>\n";
            }

        ?>
    </table>
 </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../boot3/js/bootstrap.min.js"></script>
  </body>
</html>
