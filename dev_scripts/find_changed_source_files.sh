#!/bin/bash
# Script to check for any patched files that differ between releases (in their unpatched state)
# Download current release of atom e.g. atom-2.10.2.tar.gz
# Download target release of atom e.g. atom-2.10.3.tar.gz
# Create a reference directory with the unpatched target release 
# Create current directory with the unpatched current release
# For all files under atom-fixes/<current>/patch/reference_files
#   diff atom-2.10.2/path/to/file atom-2.10.3/path/to/file

