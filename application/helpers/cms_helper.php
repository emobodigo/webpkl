<?php

function btn_edit($uri){
    return anchor($uri, '<i class="icon-edit"></i>');
}

function btn_delete($uri){
    return anchor($uri, '<i class="icon-remove"></i>', array('onclick' => "return confirm('yakin ingin menghapus item ini?');"));
}

?>