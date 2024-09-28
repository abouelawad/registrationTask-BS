<?php 
function prepareInput(string $input): string
{
  return trim(htmlspecialchars($input));
}

function redirect(string $path = "")
{
  header('location:'.URL."$path");
  exit();
}