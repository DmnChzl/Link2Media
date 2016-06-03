#!/bin/bash
sudo find /home/link2media/* -mtime +7 -type f -delete
echo "At $(date +'%H:%M on %d/%m/%Y'), $(ls /home/link2media/ | wc -l) deteled file(s)." > log.txt
