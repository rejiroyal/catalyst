<?php

    $number = 100; //define number to 100 - assume there will be 1-100 inputs
    for($i=1; $i<=100; $i++){
        if($i%3==0 && $i%5==0){ //check given number divisble by 3 & 5
            print "foobar";
        }
        else if ($i%3==0){ //check given number divisble by 3
            print "foo";
        }
        else if($i%5==0){ //check given number divisble by 5
            print "bar";
        }
        else
        print $i;
        
        if($i<100){
            print ", "; // to print ", " after each output
        }
    }

?>
