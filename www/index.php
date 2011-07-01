
<html>
<head>
<title>PHP Codeing Exerciese</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="./css/main.css">

<script type="text/javascript">
function runCode()
{
    alert("Hello");
}
function keyFilter(e, field) {
          var key = window.event ? e.keyCode : e.which;
            if (key == 9) {
                         //field.value += "\t";
                              return false;
                                }
              return true;
}
</script>
</head>

<body>

<?php
    $code = "";
    $pass = 0;
    $results = "";
    include 'problems.php';
    include './lib/ResultParser.php';
    if (isset($_POST['frmSubmit'])) {
        //echo "<pre>".print_r($_POST)."</pre>"; 
        $code = $_POST['code'];
        file_put_contents("/tmp/testFile.php", "<?php \n".$_POST['code']."\n?>");
        $out2 = exec("cd harnesses; phpunit --log-junit /tmp/test --group {$_POST['testGroup']}", $out);
        //print_r($out);
        $rp = new ResultParser("/tmp/test");
        $rp->parse();
        if ($rp->passed()) {
                $pass = 1;
        }
        //echo "Results: ".str_replace("\n","<br/>", $rp->getResults())."<br/>";
        $results = "Results:<br/>".str_replace("\n","<br/>", $rp->getResults())."<br/>";
    }
?>
<h1>PHP Problem set</h1>
<div class="Problem">
Problem: <br/>
<?php echo $problems[2]['problem']; ?>
</div>

<div id="code">
<form method="POST">
<textarea name="code" id="coding" onkeydown="return keyFilter(event, this);">
<?php 
if ( strlen($code) <= 0 ) {
        echo $problems[2]['stub'];
        //echo $code;
} else {
        echo $code;
}
?>
</textarea>
<br/>
<input type="hidden" name="problemNum" value=1/>
<input type="hidden" name="testGroup" value="<?echo $problems[2]['testGroup']; ?>" />
<input name="frmSubmit" type="submit" value="Run"/>
</form>
</div>

<div id="results">
<?php echo $results; ?>
</div>


<div id="footer">
<hr>
&copy;2011 Fitzer's House of Code
</div>
</body>
</html>
