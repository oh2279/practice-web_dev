<?php
function warn_back($msg) {
    echo "
        <script>
            alert('".$msg."');
            history.back();
        </script>
    ";
    exit;
}

function _goto ($url) {
    echo "<meta http-equiv='refresh' content='0;url=".$url."' />";
}

?>