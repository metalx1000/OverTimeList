#!/bin/bash
url="http://localhost/metalx1000/OverTimeList/update.php"
pid=$RANDOM
fname="$(wget -O- -q "http://pastebin.com/raw.php?i=YbHHxu7p"|shuf|head -n1)"
lname="$(wget -O- -q "http://pastebin.com/raw.php?i=1mt60NeM"|shuf|head -n1)"
rank="Fire Fighter"
phone1=$(( ( RANDOM % 500 )  + 100 ))
phone2=$(( ( RANDOM % 500 )  + 100 ))
phone3=$(( ( RANDOM % 9000 )  + 1000 ))
phone="($phone1)$phone2-$phone3"

wget -q -O- "$url?pid=$pid&name=$fname $lname&rank=$rank&phone=$phone"
