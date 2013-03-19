<?php

function enrich_header($title, $extra_head_html){
  if($title){
    echo "
      <title>{$title}</title>
";
  }
  if($extra_head_html){
    echo "{$extra_head_html}";
  }
}

?>