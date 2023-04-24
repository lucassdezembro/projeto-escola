<?php
    class Message {

        function sendMessage($text, $location) {
            echo "
                <script>
                    window.alert('$text');
                    window.location.href = '$location';
                </script>
            ";
        }
    }
?>