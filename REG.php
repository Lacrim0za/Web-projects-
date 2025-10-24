<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <?php 
     $myList1 = array ("First","Second","Third");
    $toPop = array_pop($myList1);
    echo "No Loop:";
    print_r ($toPop);
    echo"<br> With Loop:";
    for($x=0; $x<count($myList1); $x++){
 echo "$myList1[$x]";}
     ?>
    
</body>
</html>