#!/bin/bash
sudo find /home/link2media/* -type f -mtime +7 | xargs rm -f
echo "At $(date +'%H:%M on %d/%m/%Y'), $(ls /home/link2media/ | wc -l) remaining file(s)." > var/www/link2media/script/wipe.log
