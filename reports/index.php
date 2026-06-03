<?php
echo '
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Atom reports</title>
  <meta name="description" content="Endpoint for running reports on Atom">
  <meta name="author" content="Rohan Ferris - The University of Queensland Library">
  </head>
  <body>
';

echo '<h1>Atom Reports</h1>';
echo '<ul>';
echo '<li>';
echo '<a href="reports.php?query=accessions">Accessions this year.</a>';
echo '</li>';
echo '<li>';
echo '<a href="reports.php?query=allaccessions">All accessions.</a>';
echo '</li>';
echo '<li>';
echo '<a href="reports.php?query=deaccessions">Deaccessions.</a>';
echo '</li>';
echo '</ul>';
