<?php
    include('html/header.html');
?>

<form method="post" action="arrays.php">
    <fieldset>
        <legend>Генерация массива</legend>
        <table>
            <tbody>
                <tr>
                    <td>Количество членов:</td>
                    <td><input id="count" type="number" name="count"/></td>
                </tr>
                <tr>
                    <td>Первый член:</td>
                    <td><input id="first-member" type="text" name="first-member"/></td>
                </tr>
                <tr>
                    <td>Знаменатель:</td>
                    <td><input id="denominator" type="text" name="denominator"/></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <input type="submit" value="Генерировать" name="submit"/>
</form>

<?php
    include('html/footer.html');
?>