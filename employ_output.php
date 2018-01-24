<!DOCTYPE html>
<html lang="ja">
<?php include"head.html";
include"functions.php";

$employ_id = $_POST["employ_id"];
$employ_name = $_POST["employ_name"];
$employ_yomi = $_POST["employ_yomi"];
$employ_birthday = str_replace("-","/",$_POST["employ_birthday"]);
$employ_entryday = str_replace("-","/",$_POST["employ_entryday"]);
$employ_Hwage = $_POST["employ_Hwage"];

$str = $employ_id.",".$employ_name.",".$employ_yomi.",".$employ_birthday.",".$employ_entryday.",".$employ_Hwage;
$str_SJIS = mb_convert_encoding($str, 'SJIS-win','UTF-8');

$file = fopen("employ/employ.csv","a");
flock($file, LOCK_EX);
fwrite($file,$str_SJIS."\n");
flock($file, LOCK_UN);
fclose($file);

?>

<body>

<header>
    <h1>新規登録</h1>
    <h2>登録しました</h2>

</header>

<table>
    <tr>
        <td>社員番号</td>
        <td><?=h($employ_id)?></td>
    </tr>
    <tr>
        <td>氏名</td>
        <td><?=h($employ_name)?></td>
    </tr>
    <tr>
        <td>ふりがな</td>
        <td><?=h($employ_yomi)?></td>
    </tr>
    <tr>
        <td>生年月日</td>
        <td><?=h($employ_birthday)?></td>
    </tr>
    <tr>
        <td>入社日</td>
        <td><?=h($employ_entryday)?></td>
    </tr>
    <tr>
        <td>時給</td>
        <td><?=h($employ_Hwage)?></td>
    </tr>

</table>

<a href="employ_input.php"><button>続けて登録</button></a>
<button>閉じる</button>

</body>
</html>