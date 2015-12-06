<?php
\Debugbar::info($submission);
?>

<h1>Results</h1>

  <?php echo $submission->submission_id; ?> <br><br>
  
  <?php echo $submission->photo->file_name; ?> <br><br>
  
  <?php echo $submission->gallery->name; ?> <br><br>

