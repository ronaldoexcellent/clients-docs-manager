<?php
    function alert($getType, $msg) {
        $type = $getType;
        
        // if ($getType === "success") {
        //     $type = "success";
        // } elseif ($getType === "error") {
        //     $type = "danger";
        // }

        echo '
            <div class="fixed-top d-flex justify-content-center align-items-center text-center p-1 alert alert-' . $type . ' alert-dismissible fade show fw-bold" style="font-size: 13.5px">
                <div class="word-break: break-word text-break px-1 w-100">' . $msg . '</div>
                <button type="button" class="p-0 p-md-2 position-relative btn-close" data-bs-dismiss="alert"></button>
            </div>
        ';
    }
?>