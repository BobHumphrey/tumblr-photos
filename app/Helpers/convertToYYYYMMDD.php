<?php

function convertToYYYYMMDD($MMDDYYYY) {
  $mm = substr($MMDDYYYY, 0, 2);
  $dd = substr($MMDDYYYY, 3, 2);
  $yyyy = substr($MMDDYYYY, 6, 4);
  return $yyyy . '-' . $mm . '-' . $dd;
}

