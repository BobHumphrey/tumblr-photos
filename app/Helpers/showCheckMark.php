<?php

function showCheckMark($val) {
  $display = '';
  if ($val) {
    $display = '<span class="fa fa-check"></span>';
  }
  return $display;
}
