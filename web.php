<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Web_1</title>

    <style>
        body {
            background: url(img/fl.jpg);
            width: 100%;
            height: 100%;
            color: #FFFAF0;
            background-size: 100%;
        }

        p {
            color: #3f1f0b;
        }

        .btn {
            position: relative;
            overflow: hidden;
            z-index: 1;
            padding: 10px 40px;
            margin: 0 20px;
            font-family: 'Montserrat Alternates', sans-serif;
            font-weight: 600;
            line-height: 30px;
            color: white;
            font-size: 15px;
            text-transform: uppercase;
            background: #f5b08f;
            border-width: 0;
            box-shadow: 5px 5px 0 #532831;
            outline: none;
            cursor: pointer;
            transition: 1.5s;
        }

        .btn:before, .btn:after {
            content: "";
            position: absolute;
            height: 200px;
            left: -50%;
            margin-top: -100px;
            top: 50%;
            width: 200px;
            border-radius: 50%;
            opacity: 0.3;
            z-index: -1;
            transform: scale(0);
        }

        .btn:before {
            background: #ffeede;
            transition: .8s ease-out;
        }

        .btn:after {
            transition: .4s ease-in .3s;
        }

        .btn:hover {
            color: #532831;
        }

        .btn:hover:before, .btn:hover:after {
            opacity: 1;
            transform: scale(4);
        }

        select {
            width: 150px;
        }

        .math {
            background-image: url("img/math.png");
            background-size: 400px 400px;
        }

        dev > table#finish_table {
            color: #3f1f0b;
            background-color: #e3d8c5;
            border: 2px outset #c76d30;
            width: 80%;
            margin: auto;
        }

        dev table#finish_table td, th {
            text-align: center;
            border: black;
            border-bottom: #3f1f0b;
        }

        .header {
            text-align: center;
            background-color: #faebd7;
            color: #93673d;
            size: 3pt;
        }
    </style>
</head>
<body>
<table border="1" width="100%" cellpadding="0" cellspacing="1" bgcolor="#FFFAF0">

    <tr>
        <td colspan="4" bgcolor="#f1dbb0" align="center"><font size="6pt"
                                                               face="Times New Roman, Helvetica, serif"
                                                               color="#6a310a">Лабораторная работа№1
                по Web-программированию</font></td>
    </tr>

    <tr>
        <td colspan="4" class="header">Выполнила: Шаповалова Дарья, Группа: P3230, Вариант 30017.</td>
    </tr>

    <form action="handler.php" method="get">
        <tr>
            <td align="center">
                <p><b>Введите X:</b></p>
                <p><input name="X" type="radio" value="-2">-2</p>
                <p><input name="X" type="radio" value="-1.5">-1.5</p>
                <p><input name="X" type="radio" value="-1">-1</p>
                <p><input name="X" type="radio" value="-0.5">-0.5</p>
                <p><input name="X" type="radio" value="0">0</p>
                <p><input name="X" type="radio" value="0.5">0.5</p>
                <p><input name="X" type="radio" value="1">1</p>
                <p><input name="X" type="radio" value="1.5">1.5</p>
                <p><input name="X" type="radio" value="2">2</p>

            </td>

            <td align="center">
                <p>
                <p><b>Введите Y из диапазона (-5; 3):</b></p>
                <p><input type="text" class="number" data-min="-5" data-max="3" data-separator="." name="Y"
                          placeholder="Y" autocomplete="off"></p>
                </p>
            </td>

            <td align="center">
                <p><b>Введите R:</b></p>
                <p><select size="2" name="R">
                        <option value="1" name="R">1</option>
                        <option value="2" name="R">2</option>
                        <option value="3" name="R">3</option>
                        <option value="4" name="R">4</option>
                        <option value="5" name="R">5</option>
                    </select></p>
            </td>

            <td align="center" rowspan="2">
                <p><b>А теперь определим попадание точки, <br>заданной координатами ранее, в нашу область:</b></p>

                <p><img src="img/grf.jpg" width="200" height="200"></p>
            </td>

        </tr>


        <tr>
            <td class="math" colspan="3" align="center">
                <p>
                    <button class="btn" type="click" name="send">Ввод</button>
                </p>
            </td>
        </tr>
    </form>

    <tfoot>
    <tr>
        <td colspan="4" height="70px" align="center" bgcolor="#faebd7">
            <a href="https://github.com/Dasxunya"><img src="img/round.jpg" title="github" alt="github" width="30"
                                                       height="30"></a>
        </td>
    </tr>
    </tfoot>
</table>

<dev>
    <table id="finish_table">
        <tr>
            <td>
                <caption><h1>История выполнений</h1></caption>
            <th class="res">X</th>
            <th class="res">Y</th>
            <th class="res">R</th>
            <th class="res">Попадание</th>
            <th class="res">Текущее время</th>
            <th class="res">Время исполнения</th>
            </td>
        </tr>

        <tr>
            <?php
            if (isset($_SESSION['rows'])) {
                echo "<tbody>";
                foreach ($_SESSION['rows'] as $row) {
                    echo $row;
                }
                echo "</tbody>";
            }
            ?>
        </tr>

        <form method="get" action="handler.php">
            <tr>
                <td colspan="6" bgcolor="#cec3b1"><br>
                    <button class="btn" type="click" name="clear-table">Очистить</button>
                </td>
            </tr>
        </form>

    </table>
</dev>


</body>
</html>
<script src="validate.js"></script>
