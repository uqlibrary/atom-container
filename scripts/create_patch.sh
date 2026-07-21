#!/bin/bash

if [ "$#" -ne 2 ]; then
    echo "Usage: $0 <original_file_or_directory> <updated_file_or_directory>"
    exit 1
fi
if [ -d "$1" ] && [ -d "$2" ]; then
    echo "Both arguments are directories. Creating a directory patch."
    diff -Naur "$1" "$2" > directory.patch
elif [ -f "$1" ] && [ -f "$2" ]; then
    echo "Both arguments are files. Creating a file patch."
    diff -u "$1" "$2" > file.patch
else
    echo "Error: Both arguments must be either files or directories."
    exit 1
fi
