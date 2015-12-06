<?php

function convertToMMDDYYYY($YYYYMMDD) {
  if ($YYYYMMDD == '0000-00-00') {
    return '';
  }
  if (substr($YYYYMMDD, 0, 11) == '-0001-11-30') {
    return '';
  }
  $mm = substr($YYYYMMDD, 5, 2);
  $dd = substr($YYYYMMDD, 8, 2);
  $yyyy = substr($YYYYMMDD, 0, 4);
  if ($mm && $dd && $yyyy) {
    return $mm . '-' . $dd . '-' . $yyyy;
  }
  else {
    return '';
  }
}

