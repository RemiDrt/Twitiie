<?php require "Header.php"; ?>
<?php 
var_dump($data); 
?>
<table>
<tr><th><?=$data["Pseudo"]?></th></tr>
<tr>
    <th>Score</th>
    <th>Pattern</th>
</tr>
<tr>
    <th>Ever</th>
    <td><?=$data["PlayerScoreTot"]?></td>
    <td><?=$data["PlayerPatternTot"]?></td>
</tr>
<tr>
    <th>Month</th>
    <td><?=$data["PlayerScoreMon"]?></td>
    <td><?=$data["PlayerPatternMon"]?></td>
</tr>
<tr>
    <th>Week</th>
    <td><?=$data["PlayerScoreWeek"]?></td>
    <td><?=$data["PlayerPatternWeek"]?></td>
</tr>
</table>




<?php require "Footer.php"; ?>