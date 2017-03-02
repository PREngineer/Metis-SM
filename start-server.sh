#!/bin/bash
# Script Name: start-server.sh
# Author: PREngineer (Jorge Pabon) - pianistapr@hotmail.com
# Publisher: Jorge Pabon
# License: Personal Use (1 device)
###########################################################

# Color definition variables
# YELLOW='\e[33;3m'
# RED='\e[91m'
# BLACK='\033[0m'
# CYAN='\e[96m'
# GREEN='\e[92m'

SCRIPTPATH=$(pwd)

sudo php -S 0.0.0.0:80 -t $SCRIPTPATH
