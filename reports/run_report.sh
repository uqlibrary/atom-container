#!/usr/bin/env bash


php -r '$_GET["query"]="deaccessions"; require_once("reports.php");'
