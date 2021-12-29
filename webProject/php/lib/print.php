<?php
    // title을 출력하는 함수 print_title
    function print_title(){
        if(isset($_GET['id'])){
            echo htmlspecialchars($_GET['id']);   // 주목
        } else{
            echo 'Welcome';
        }
    }

    // list를 출력하는 함수 print_list
    function print_list(){
        $list = scandir('./data', 0);

        $i = 0;
        while($i < count($list)){
            $title = htmlspecialchars($list[$i]);   // 주목
            
            if($list[$i] !== '.' && $list[$i] !== '..'){
                echo "<li><a href='index.php?id=$title'>$title</a></li>";    
            }

            $i++;
        }
    }

    // description을 출력하는 함수 print_description
    function print_description(){
        if(isset($_GET['id'])){
            echo htmlspecialchars(file_get_contents("data/".$_GET['id']));  // 주목
        } else{
            echo '';
        }
    }
?>