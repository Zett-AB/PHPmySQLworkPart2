<?php
    $nickname=" Александр!";
    $hello="Привет ";
    $hellow="Продолжаем наше знакомство с SQL и PHP.";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Работа с базами данных(БД). Язык и запросы SQL.</title>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1 class="subtitle">Работа с базами данных(БД). Язык и запросы SQL.</h1>
    <h2 class="subtitle">Часть вторая.</h2>
    <?php
        echo "<h3 class='subtitle bord_php'>".$hello.$nickname."<br>".$hellow."</h3>";
    ?>
    <header class="descr">
        <p>
            Продолжаем наше изучение работы БД и языка и запросов SQL.<br>
            Ранее мы уже узнали о группах запросов SQL, теперь переходим к практике их применения.
        </p>
    </header>
    <div class="descr">
        <h2 class="subtitle">Вставка данных в БД MySQL</h2>
        <p>
            Для добавления новой информации в нашу БД, а конкретнее в нашу таблицу movie, мы создаем в php новую переменную и используем опереатор INSERT языка SQL.
        </p>
        <p class="subtitle bord_php">
            Оператор <b>INSERT</b> - дает команду о добавлении в БД указанную информацию.
        </p>
        <p>
            Обычно указанный оператор <b>INSERT</b> используют  с <b>INTO</b>(что переводится как - в).<br>
            Таким образом, команда <b>INSERT INTO</b> переводится как - <span class="highlight_text">добавить в</span>. 
        </p>
        <p>
            Поэтому для добавления новой информации в таблицу нашей БД нам необходимо используя оператор <b>INSERT</b> вместе с <b>INTO</b>,  далее пишем <i>имя таблицы</i>.<br>
            Затем пишем параметр <b>VALUES</b>(т.е. какие параметры необходимо добавить в таблицу БД).<br>
            После этого, в скобках перечисляем параметры нашей БД, которые необходимо добавить в таблицу БД).
        </p>
        <p class="subtitle bord_php">
            В нашем случаи, т.е. в нашей таблице БД параметрами будут - id, name, descriptions, year, add_date.<br>
             Нужно понимать, что там где мы должны указать id, мы пишем null, так как id у нас присваивается автоматически и в данном случаи null говорит команде, что данный параметр не имеет значения.  
        </p>
        <p>
            Код нашей команды будет следующим:
            <ul>
                <li>
                    создаем переменную - $query;
                </li>
                <li>
                    далее пишем нашу команду:
                </li>
                <li>
                    $query="INSERT INTO movie VALUES(null, 'Безумный Макс', 'Здесь будет описание фильма - Безумный Макс', '2015', Now());";
                </li>
                <li class="important"><span class="color:red;">ВАЖНО!</span> поскольку параметр add-date проставляется у нас автоматически, то мы используем специальную функцию <b>Now();</b></li>
                <li>$mysqli->query($query);</li>
                <li>В указанной строке мы даем команду $mysqli запросить данные из строки query(); данные, которые ранее мы посместили в переменную $query</li>
            </ul>
        </p>
        <p class="subtitle bord_php">
            Напомню, что ранее мы использовали следующий код для созданной нами БД kinomoster:
            <ul>
                <li>
                    $mysqli = new mysqli('localhost', 'root, ' ', 'kinomoster');
                </li>
                <li>
                    if(mysqli_connecnt_errno()){
                </li>
                <li>
                    printf("Соединение с базой данный неустановлено", mysqli_connect_error());
                </li>
                <li>
                    exit();
                </li>
                <li>}</li>
                <li>
                    $mysqli->set_charset('utf8');
                </li>
                <li>
                    $query="INSERT INTO movie VALUES(null, 'Безумный Макс', 'Здесь будет описание фильма Безумный Макс', '2015', Now())";
                </li>
                <li>
                    $mysqli->query($query);
                </li>
                <li>
                    $mysqli->close();
                </li>
            </ul>
        </p>
        <p>
            Теперь пишем наш вышеуказанный код и смотрим на результат в панели управления phpMyAdmin.
        </p>
    </div>
    <div class="code__php">
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'kinomoster');
                if(mysqli_connect_errno()){
                        printf("Соединение с БД неустановлено", mysqli_connect_error());
                        exit();
                    }
                
            $mysqli->set_charset('utf8');
            
            $query="INSERT INTO movie VALUES(null, 'Безумный Макс', 'Здесь будет описание фильма Безумный Макс', '2015', Now())";
            
            $mysqli->query($query);
            
            $mysqli->close();

        ?>
    </div>
    <div class="descr">
        <p>
            А теперь допишем код, чтобы вывести в браузер наши изменения внесенные в таблицу movie, напоминаю наш код:
            <ul>
                <li>
                    $query = $mysqli->query('SELECT * FROM movie');
                </li>
                <li>
                    while( $row = mysqli_fetch_assoc($query)){
                </li>
                <li>
                    echo "br>".$row['name']." ".$row['year']." Описание: ".$row['descriptions']."br>";
                </li>
                <li>
                    }
                </li>                
            </ul> 
        </p>
    </div>
    <div class="code_php">
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'kinomoster');
            if(mysqli_connect_errno()){
                    printf("Соединение с БД неустановлено", mysqli_connect_error());
                    exit();
                }
            
            $mysqli->set_charset('utf8');
            $query = $mysqli->query('SELECT * FROM movie');
    
            while( $row = mysqli_fetch_assoc($query)){
                    echo "<br>".$row['name']." ".$row['year']." Описание: ".$row['descriptions']."<br>";
                }
            
            $mysqli->close();    

        ?>
    </div>
    
</body>
</html>